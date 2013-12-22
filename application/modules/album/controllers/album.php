<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * ZonStudio
 * 
 * A free and open source web based invoicing system
 *
 * @package		ZonStudio
 * @author		duongbq
 * @copyright	Copyright (c) 2012 - 2013 ZonStudio, LLC
 * @license		http://www.zonstudio.com
 * @link		http://www.zonstudio.com
 * 
 */

class Album extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_album');
    }

    public function index()
    {
        $albums = $this->mdl_album->get_all();
        $this->layout->view('index', array('albums' => $albums));
    }

    function create()
    {
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_album->run_validation()) {
                $view_data['error'] = $this->mdl_album->get_last_messages();
            } else {
                $this->mdl_album->add_new_album();
                redirect('album');
            }
        }

        $this->layout->view('form', $view_data);
    }

    function edit($id) {
        
        if($id <= 0){
            redirect('album/create');
        }
        
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_album->run_validation()) {
                $view_data['error'] = $this->mdl_album->get_last_messages();
            } else {
                $this->mdl_album->update_album();
                redirect('album');
            }
        }
        $album = $this->mdl_album->get_by_id($id);
        $view_data['id'] = $album->id;
        $view_data['album_caption'] = $album->album_caption;
        $view_data['summary'] = $album->summary;
        $view_data['description'] = $album->description;
        $this->layout->view('form', $view_data);
    }
    

    public function delete($id)
    {
        $this->mdl_album->delete($id);
        redirect('album');
    }

    function upload($id) {
        if ($id <= 0) {
            redirect('album');
        }

        $view_data = array();
        if ($this->is_postback()) {

            $return_val = $this->mdl_album->upload_images_for_album($id);
            if ($return_val != NULL && !is_numeric($return_val)) {
                $view_data['error'] = $return_val;
            } else {
                redirect('album/upload/'.$id);
            }

        }
        
        $album = $this->mdl_album->get_by_id($id);
        $view_data['album_caption'] = $album->album_caption;
        $view_data['album_id'] = $id;
        $view_data['images'] = $this->mdl_album->get_all_images_by_album_id($id);

        $this->layout->view('upload', $view_data);
    }

   function remove_image($album_id , $image_id = 0, $photo_id = 0) {

        $this->mdl_album->remove_img($image_id, $photo_id);
        redirect('album/upload/'.$album_id);
    }

   

}

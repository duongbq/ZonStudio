<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of file
 *
 * @author duongbq
 */
class File extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mdl_file');
    }

    public function index() {
        $files = $this->mdl_file->get_all();
        $this->layout->view('index', array('files' => $files));
    }

    function home_img_upload() {
        $home_files = $this->mdl_file->get_files(array('is_home_display' => 1));
        $this->load->view('home_img_upload', array('home_files' => $home_files));
    }

    function upload_home_image() {
        $options = array(
            'folder_name' => 'home'
        );
        //Upload image file with options above
        $return_val = $this->mdl_file->upload_file($options);
        if (is_numeric($return_val) && $return_val > 0) {

            $this->mdl_file->update(array('id' => $return_val, 'is_home_display' => 1, 'uploaded_date' =>date('Y-m-d h:i:s')));
            redirect('dashboard');
        }
    }
    
    function remove_home_image($image_id = 0) {
        $this->mdl_file->delete_file(array('file_id' => $image_id, 'folder_name' => 'home'));
        redirect('dashboard');
    }

}

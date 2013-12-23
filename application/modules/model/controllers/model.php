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

class Model extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_model');
    }

    public function index()
    {
        $models = $this->mdl_model->get_all();
        $this->layout->view('index', array('models' => $models));
    }

    function create()
    {
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_model->run_validation()) {
                $view_data['error'] = $this->mdl_model->get_last_messages();
            } else {
                $this->mdl_model->add_new_model();
                redirect('model');
            }
        }

        $this->layout->view('form', $view_data);
    }

    function edit($id) {
        
        if($id <= 0){
            redirect('model/create');
        }
        
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_model->run_validation()) {
                $view_data['error'] = $this->mdl_model->get_last_messages();
            } else {
                $this->mdl_model->update_model();
                redirect('model');
            }
        }
        $model = $this->mdl_model->get_by_id($id);
        $view_data['id'] = $model->id;
        $view_data['model_name'] = $model->model_name;
        $view_data['summary'] = $model->summary;
        $view_data['description'] = $model->description;
        $view_data['sex'] = $model->sex;
        $this->layout->view('form', $view_data);
    }
    

    public function delete($id)
    {
        $this->mdl_model->delete($id);
        redirect('model');
    }

    function upload($id) {
        if ($id <= 0) {
            redirect('model');
        }

        $view_data = array();
        if ($this->is_postback()) {

            $return_val = $this->mdl_model->upload_photos_for_model($id);
            if ($return_val != NULL && !is_numeric($return_val)) {
                $view_data['error'] = $return_val;
            } else {
                redirect('model/upload/'.$id);
            }

        }
        
        $model = $this->mdl_model->get_by_id($id);
        $view_data['model_name'] = $model->model_name;
        $view_data['model_id'] = $id;
        $view_data['images'] = $this->mdl_model->get_all_photos_by_model_id($id);

        $this->layout->view('upload', $view_data);
    }

   function remove_image($model_id , $image_id = 0, $photo_id = 0) {

        $this->mdl_model->remove_img($image_id, $photo_id);
        redirect('model/upload/'.$model_id);
    }

   

}
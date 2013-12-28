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

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_model');
    }

    public function index() {
        $models = $this->mdl_model->get_all();
        $this->layout->view('index', array('models' => $models));
    }

    function create() {

        $view_data = $this->mdl_model->get_view_data();
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_model->add_new_model();
            redirect('model');
        }
        $this->layout->view('form', $view_data);
    }

    function edit($model_id) {

        if ($model_id <= 0) {
            redirect('model/create');
        }

        $view_data = $this->mdl_model->get_view_data($model_id);
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_model->update_model($model_id);
            redirect('model');
        }
        $this->layout->view('form', $view_data);
    }

    public function delete($id) {
        $this->mdl_model->delete($id);
        redirect('model');
    }

    function upload($model_id) {
        
        if ($model_id <= 0) {
            redirect('model');
        }

        $view_data = $this->mdl_model->get_view_data($model_id);
        $view_data['images'] = $this->mdl_model->get_all_images_by_model_id($model_id);
        $this->load->view('upload', $view_data);
    }
    
    function upload_model_image($model_id) {

        $return_val = $this->mdl_model->upload_images_for_model($model_id);

        if (is_numeric($return_val) && $return_val > 0) {
            $images = $this->mdl_model->get_all_images_by_model_id($model_id);
            echo $this->load->view('images_list', array('images' => $images));
        } else {
            echo '0';
        }
    }
    
    function set_model_slider() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $image_id = $this->input->post('image_id');
            $model_id = $this->input->post('model_id');
            $this->load->model('mdl_models_files');

            $this->mdl_models_files->set_model_slider($image_id, $model_id);

            $images = $this->mdl_model->get_all_images_by_model_id($model_id);
            echo $this->load->view('images_list', array('images' => $images));
        } else {
            redirect(base_url());
        }
    }

    function remove_model_image() {
        
        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $image_id = $this->input->post('image_id');
            $model_id = $this->input->post('model_id');
            
            $this->load->model('mdl_models_files');

            $this->mdl_models_files->remove_model_image($image_id, $model_id);

            $images = $this->mdl_model->get_all_images_by_model_id($model_id);
            echo $this->load->view('images_list', array('images' => $images));
            
        } else {
            redirect(base_url());
        }
    }

}

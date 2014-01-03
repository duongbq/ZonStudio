<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portraits
 *
 * @author duongbq
 */
class Portraits extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_portraits');
        
    }

    function index() {

        $portraits = $this->mdl_portraits->get_all();
        $this->layout->view('index', array('portraits' => $portraits));
    }

    function create() {

        $view_data = $this->mdl_portraits->get_view_data();
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_portraits->add_new_portrait();
            redirect('portraits');
        }
        $this->layout->view('form', $view_data);
    }

    function edit($portrait_id) {

        if ($portrait_id <= 0) {
            redirect('portraits/create');
        }

        $view_data = $this->mdl_portraits->get_view_data($portrait_id);
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_portraits->update_portrait();
            redirect('portraits');
        }
        $this->layout->view('form', $view_data);
    }

    function upload($portrait_id) {

        if ($portrait_id <= 0) {
            redirect('portraits');
        }

        $view_data = $this->mdl_portraits->get_view_data($portrait_id);
        $view_data['images'] = $this->mdl_portraits->get_all_images_by_portrait_id($portrait_id);
        $this->load->view('upload', $view_data);
    }

    function upload_portrait_image($portrait_id) {

        $return_val = $this->mdl_portraits->upload_images_for_portrait($portrait_id);

        if (is_numeric($return_val) && $return_val > 0) {
            $images = $this->mdl_portraits->get_all_images_by_portrait_id($portrait_id);
            echo $this->load->view('images_list', array('images' => $images));
        } else {
            echo '0';
        }
    }

    public function delete($portrait_id) {
        $this->mdl_portraits->delete($portrait_id);
        redirect('portraits');
    }

    function remove_portrait_image() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $image_id = $this->input->post('image_id');
            $portrait_id = $this->input->post('portrait_id');

            $this->load->model('mdl_portraits_files');

            $this->mdl_portraits_files->remove_portrait_image($image_id, $portrait_id);

            $images = $this->mdl_portraits->get_all_images_by_portrait_id($portrait_id);
            echo $this->load->view('images_list', array('images' => $images));
        } else {
            redirect(base_url());
        }
    }
    
    function set_display() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $image_id = $this->input->post('image_id');
            $portrait_id = $this->input->post('portrait_id');
            $this->load->model('portraits/mdl_portraits_files');
//
            $this->mdl_portraits_files->update_display_image($image_id, $portrait_id);
//
//            $images = $this->mdl_portraits->get_all_images_by_portrait_id($portrait_id);
//            $images['portrait_id'] = $portrait_id;
            echo 1;
        } else {
            redirect(base_url());
        }
    }

}

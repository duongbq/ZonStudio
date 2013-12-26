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

        $return_val = $this->mdl_file->upload_file(array('folder_name' => 'home'));
        if (is_numeric($return_val) && $return_val > 0) {

            $this->mdl_file->update(array('id' => $return_val, 'is_home_display' => 1, 'uploaded_date' => date('Y-m-d h:i:s')));

            $home_files = $this->mdl_file->get_files(array('is_home_display' => 1));
            echo $this->load->view('home_images_list', array('home_files' => $home_files));
        } else {
            echo '0';
        }
    }

    function remove_home_image() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {
            $image_id = $this->input->post('img_id');
            $this->mdl_file->delete_file(array('file_id' => $image_id, 'folder_name' => 'home'));

            echo '1';
        } else {
            redirect(base_url());
        }
    }
    
    function set_home_display_index() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {
            
            $image_id = $this->input->post('img_id');
            $index = $this->input->post('index');
            
            $this->mdl_file->update_home_display_index($image_id, $index);

            $home_files = $this->mdl_file->get_files(array('is_home_display' => 1));
            echo $this->load->view('home_images_list', array('home_files' => $home_files));
        } else {
            redirect(base_url());
        }
    }
    
    

}

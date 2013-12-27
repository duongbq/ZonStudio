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

class Packages extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_packages');
        $this->load->model('services/mdl_services');

//        $this->output->enable_profiler();
    }

    public function index() {

        $packages = $this->mdl_packages->get_all();
        $this->layout->view('index', array('packages' => $packages));
    }

    function create() {

        $view_data = $this->mdl_packages->get_view_data();
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_packages->add_new_package();
            redirect('packages');
        }
        $this->layout->view('form', $view_data);
    }

    function edit($package_id) {

        if ($package_id <= 0) {
            redirect('packages/create');
        }

        $view_data = $this->mdl_packages->get_view_data($package_id);
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_packages->update_package();
            redirect('packages');
        }
        $this->layout->view('form', $view_data);
    }

    function upload($package_id) {

        if ($package_id <= 0) {
            redirect('packages');
        }

        $view_data = $this->mdl_packages->get_view_data($package_id);
        $view_data['images'] = $this->mdl_packages->get_all_images_by_package_id($package_id);
        $this->load->view('upload', $view_data);
    }

    function upload_package_image($package_id) {

        $return_val = $this->mdl_packages->upload_images_for_package($package_id);

        if (is_numeric($return_val) && $return_val > 0) {
            $images = $this->mdl_packages->get_all_images_by_package_id($package_id);
            echo $this->load->view('images_list', array('images' => $images));
        } else {
            echo '0';
        }
    }

    public function delete($package_id) {
        $this->mdl_packages->delete($package_id);
        redirect('packages');
    }

    function remove_package_image() {
        
        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $image_id = $this->input->post('image_id');
            $package_id = $this->input->post('package_id');
            
            $this->load->model('mdl_packages_files');

            $this->mdl_packages_files->remove_package_image($image_id, $package_id);

            $images = $this->mdl_packages->get_all_images_by_package_id($package_id);
            echo $this->load->view('images_list', array('images' => $images));
            
        } else {
            redirect(base_url());
        }
    }

    function set_package_slider() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $image_id = $this->input->post('image_id');
            $package_id = $this->input->post('package_id');
            $this->load->model('mdl_packages_files');

            $this->mdl_packages_files->set_package_slider($image_id, $package_id);

            $images = $this->mdl_packages->get_all_images_by_package_id($package_id);
            echo $this->load->view('images_list', array('images' => $images));
        } else {
            redirect(base_url());
        }
    }

}

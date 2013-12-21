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
    }

    public function index() {

        $packages = $this->mdl_packages->get_all();
        $this->layout->view('index', array('packages' => $packages));
    }

    function create() {
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_packages->run_validation()) {
                $view_data['error'] = $this->mdl_packages->get_last_messages();
            } else {
                $this->mdl_packages->add_new_package();
                redirect('packages');
            }
        }
        $view_data['services_combo'] = $this->mdl_services->get_combo(array('combo_name' => 'service', 'service' => $this->input->post('service')));
        $this->layout->view('form', $view_data);
    }

    function edit($id) {

        if ($id <= 0) {
            redirect('packages/create');
        }

        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_packages->run_validation()) {
                $view_data['error'] = $this->mdl_packages->get_last_messages();
            } else {
                $this->mdl_packages->update_package();
                redirect('packages');
            }
        }
        $package = $this->mdl_packages->get_by_id($id);
        $view_data['services_combo'] = $this->mdl_services->get_combo(array('combo_name' => 'service', 'service' => $package->service_id));
        $view_data['id'] = $package->id;
        $view_data['package_name'] = $package->package_name;
        $view_data['summary'] = $package->summary;
        $view_data['description'] = $package->description;
        $view_data['price'] = $package->price;
        $this->layout->view('form', $view_data);
    }

    function upload($id) {
        if ($id <= 0) {
            redirect('packages');
        }

        $view_data = array();
        if ($this->is_postback()) {

            $return_val = $this->mdl_packages->upload_images_for_package($id);
            if ($return_val != NULL && !is_numeric($return_val)) {
                $view_data['error'] = $return_val;
            } else {
                redirect('packages/upload/'.$id);
            }

        }
        
        $package = $this->mdl_packages->get_by_id($id);
        $view_data['package_name'] = $package->package_name;
        $view_data['id'] = $id;
        $view_data['images'] = $this->mdl_packages->get_all_images_by_package_id($id);

        $this->layout->view('upload', $view_data);
    }

    public function delete($id) {
        $this->mdl_packages->delete($id);
        redirect('packages');
    }

}

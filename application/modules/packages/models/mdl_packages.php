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

class Mdl_Packages extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'packages';
        $this->_join_table_name = 'services';
        $this->_foreign_key = 'service_id';

        $this->_rules = array(
            'package_name' => array(
                'field' => 'package_name',
                'label' => 'Tên gói dịch vụ',
                'rules' => 'required'
            ),
        );
    }

    function get_all() {
        $this->select(array($this->_join_table_name . '.service_name', $this->_table_name . '.*'));
        $this->join('left');

        $this->db->order_by($this->_join_table_name . '.service_name');

        return parent::get_all();
    }

    function get_view_data($package_id = NULL) {
        
        $service = NULL;
        $package_name = NULL;
        $summary = NULL;
        $description = NULL;
        $price = NULL;

        if ($this->is_postback()) {

            if (!$this->run_validation()) {
                $view_data['error'] = $this->get_last_messages();
            }

            $service = $this->input->post('service');
            $package_name = $this->input->post('package_name');
            $summary = $this->input->post('summary');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
        } else {

            if ($package_id > 0) {
                $package = $this->get_by_id($package_id);
                $service = $package->service_id;
                $package_name = $package->package_name;
                $summary = $package->summary;
                $description = $package->description;
                $price = $package->price;
            }
        }

        $view_data['services_combo'] = $this->mdl_services->get_combo(array('combo_name' => 'service', 'service' => $service));
        $view_data['package_name'] = $package_name;
        $view_data['summary'] = $summary;
        $view_data['description'] = $description;
        $view_data['price'] = $price;
        $view_data['package_id'] = $package_id;

        return $view_data;
    }

    function add_new_package() {
        $data = array(
            'service_id' => $this->input->post('service'),
            'package_name' => $this->input->post('package_name'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );
        return parent::add_new($data);
    }

    function update_package() {
        $data = array(
            'service_id' => $this->input->post('service'),
            'package_name' => $this->input->post('package_name'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'id' => $this->input->post('package_id')
        );
        return parent::update($data);
    }

    function upload_images_for_package($package_id = 0) {

        $this->load->model('file/mdl_file');

        $options = array(
            'folder_name' => $this->_table_name,
        );
        //Upload image file with options above
        $return_val = $this->mdl_file->upload_file($options);
        if (is_numeric($return_val) && $return_val > 0) {
            
            $this->mdl_file->update(array('id' => $return_val, 'uploaded_date' => date('Y-m-d h:i:s')));
            $this->load->model('mdl_packages_files');
            $this->mdl_packages_files->add_new(array('package_id' => $package_id, 'file_id' => $return_val));
        }

        return $return_val;
    }

    function get_all_images_by_package_id($package_id) {
        
        $this->load->model('mdl_packages_files');

        return $this->mdl_packages_files->get_images_by_package_id($package_id);
    }

    function remove_img($img_id = 0) {

        $this->load->model('file/mdl_file');

        $options = array(
            'file_id' => $img_id,
            'folder_name' => $this->_table_name
        );

        return $this->mdl_file->delete_file($options);
    }

    function delete($package_id) {
        
        $this->load->model('mdl_packages_files');
        $images = $this->get_all_images_by_package_id($package_id);
        foreach ($images as $image) {
            $this->mdl_packages_files->remove_package_image($image->id, $package_id);
        }
        parent::delete($package_id);
    }

}

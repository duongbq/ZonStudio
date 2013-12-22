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

        $this->_table_name = 'package';

        $this->_rules = array(
            'package_name' => array(
                'field' => 'package_name',
                'label' => 'Tên gói dịch vụ',
                'rules' => 'required'
            ),
            'price' => array(
                'field' => 'price',
                'label' => 'Giá',
                'rules' => 'required|is_natural_no_zero'
            )
        );
    }

    function get_all() {
        $this->db->select(' service.service_name, package.*');
        $this->db->join('service', 'service.id = package.service_id', 'left');

        return parent::get_all();
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

    function upload_images_for_package($id = 0) {

        $this->load->model('file/mdl_file');

        $options = array(
            'folder_name' => $this->_table_name,
            'img_process' => TRUE,
            'thumbnail' => TRUE
        );
        //Upload image file with options above
        $return_val = $this->mdl_file->upload_file($options);
        if (is_numeric($return_val) && $return_val > 0) {

            $data = array(
                'package_id' => $id, 
                'id' => $return_val,
                'uploaded_date' => date('Y-m-d H:i:s'),
            );
            
            if ($this->input->post('is_slide')) {
                $data['is_slide'] = $this->input->post('is_slide');
            }
            
            $this->mdl_file->update($data);
        }

        return $return_val;
    }

    function get_all_images_by_package_id($id) {
        $this->load->model('file/mdl_file');

        return $this->mdl_file->get_files(array('package_id' => $id));
    }
    
    function remove_img($img_id = 0) {
        
        $this->load->model('file/mdl_file');
        
        $options = array(
            'file_id' => $img_id,
            'folder_name'=>  $this->_table_name
        );

        return $this->mdl_file->delete_file($options);
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_packages_files
 *
 * @author duongbq
 */
class Mdl_packages_files extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'packages_files';
        $this->_join_table_name = 'files';
        $this->_foreign_key = 'file_id';
    }

    function get_images_by_package_id($package_id = 0) {
        $this->join();
        $this->db->where('package_id', $package_id);
        $this->db->order_by('uploaded_date');
        return parent::get_all();
    }

    function set_package_slider($image_id, $package_id) {

        $this->db->where('package_id', $package_id);
        $this->db->where('file_id', $image_id);

        $record = $this->db->get($this->_table_name)->result();

        if (count($record) == 1) {
            $this->db->where('package_id', $package_id);
            $this->db->where('file_id', $image_id);
            $this->db->update($this->_table_name, array('is_slide' => $record[0]->is_slide == 1 ? 0 : 1));
        }
    }
            
    function remove_package_image($image_id, $package_id) {

        $this->db->where('package_id', $package_id);
        $this->db->where('file_id', $image_id);
        $this->db->delete($this->_table_name);
        
        $this->load->model('file/mdl_file');
        $this->mdl_file->delete_file(array('file_id' => $image_id, 'folder_name' => 'packages'));
        
    }

}

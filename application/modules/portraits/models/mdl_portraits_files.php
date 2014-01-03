<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_portraits
 *
 * @author duongbq
 */
class mdl_portraits_files extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'portraits_files';
        $this->_join_table_name = 'files';
        $this->_foreign_key = 'file_id';
    }

    function get_images_by_portrait_id($portrait_id = 0) {
        $this->join();
        $this->db->where('portrait_id', $portrait_id);
        $this->db->order_by('uploaded_date');
        return parent::get_all();
    }

    function remove_portrait_image($image_id, $portrait_id) {

        $this->db->where('portrait_id', $portrait_id);
        $this->db->where('file_id', $image_id);
        $this->db->delete($this->_table_name);

        $this->load->model('file/mdl_file');
        $this->mdl_file->delete_file(array('file_id' => $image_id, 'folder_name' => 'portraits'));
    }

    function get_file_id_array() {

        $portraits = parent::get_all();
        $output = array();
        foreach ($portraits as $portrait) {
            $output[$portrait->portrait_id] = $portrait->file_id;
        }
        return $output;
    }

    function update_display_image($image_id = 0, $portrait_id = 0) {

        $this->db->where('portrait_id', $portrait_id);
        $this->db->where('file_id', $image_id);
        $image = $this->db->get($this->_table_name)->result();

        if (count($image) == 1) {
            $is_displayed = $image[0]->is_displayed == 1 ? 0 : 1;
            $query = 'update ' . $this->_table_name . ' set is_displayed = ' . $is_displayed . 'where portrait_id = ' . $portrait_id . 'and file_id = ' . $image_id;

            $this->db->query($query);
        }
    }

}

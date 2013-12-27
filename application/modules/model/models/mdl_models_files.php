<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * ZonStudio
 * 
 * A free and open source web based invoicing system
 *
 * @model		ZonStudio
 * @author		duongbq
 * @copyright	Copyright (c) 2012 - 2013 ZonStudio, LLC
 * @license		http://www.zonstudio.com
 * @link		http://www.zonstudio.com
 * 
 */

class Mdl_models_files extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'models_files';
        $this->_join_table_name = 'files';
        $this->_foreign_key = 'file_id';
    }

    function get_images_by_model_id($model_id = 0) {
        $this->join();
        $this->db->where('model_id', $model_id);
        $this->db->order_by('uploaded_date');
        return parent::get_all();
    }

    function set_model_slider($image_id, $model_id) {

        $this->db->where('model_id', $model_id);
        $this->db->where('file_id', $image_id);

        $record = $this->db->get($this->_table_name)->result();

        if (count($record) == 1) {
            $this->db->where('model_id', $model_id);
            $this->db->where('file_id', $image_id);
            $this->db->update($this->_table_name, array('is_slide' => $record[0]->is_slide == 1 ? 0 : 1));
        }
    }
            
    function remove_model_image($image_id, $model_id) {

        $this->db->where('model_id', $model_id);
        $this->db->where('file_id', $image_id);
        $this->db->delete($this->_table_name);
        
        $this->load->model('file/mdl_file');
        $this->mdl_file->delete_file(array('file_id' => $image_id, 'folder_name' => 'models'));
        
    }

}

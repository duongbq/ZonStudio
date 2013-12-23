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

class Mdl_model extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'model';
        $this->_rules = array(
            'model_name' => array(
                'field' => 'model_name',
                'label' => 'Tên model',
                'rules' => 'required'
            )
        );
    }

    function add_new_model() {
        //TODO: FIXME
        $data = array(
            'model_name' => $this->input->post('model_name'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'sex' => $this->input->post('sex'),
        );
        return parent::add_new($data);
    }
    
    function update_model()
    {
        $data = array(
            'model_name' => $this->input->post('model_name'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'id' => $this->input->post('model_id'),
        );
        return parent::update($data);
    }
    
    function upload_photos_for_model($model_id = 0) {

        $this->load->model('file/mdl_file');

        $options = array(
            'folder_name' => $this->_table_name,
//            'img_process' => TRUE,
//            'thumbnail' => TRUE
        );
        //Upload image file with options above
        $return_val = $this->mdl_file->upload_file($options);
        if (is_numeric($return_val) && $return_val > 0) {
            
            $this->load->model('photos/mdl_photo');
                                    
            $photo_data = array(
                'model_id' => $model_id,
                'photo_caption' => $this->input->post('photo_caption'),
                'summary' => $this->input->post('summary'),
                'description' => $this->input->post('description'),
                'file_id' => $return_val,
                'is_slide' => $this->input->post('is_slide'),
            );
            
            $this->mdl_photo->add_new($photo_data);
            
            $file_data = array(
                'id' => $return_val,
                'uploaded_date' => date('Y-m-d H:i:s'),
            );
            
            $this->mdl_file->update($file_data);
        }

        return $return_val;
    }
    
    function get_all_photos_by_model_id($model_id) {
        
        $this->load->model('photos/mdl_photo');
        
        return $this->mdl_photo->get_photos(array('model_id' => $model_id));
    }
    
    function remove_img($img_id, $photo_id) {
        
        $this->load->model('file/mdl_file');
        $options = array(
            'file_id' => $img_id,
            'folder_name'=>  $this->_table_name
        );
        $this->mdl_file->delete_file($options);
        
        $this->load->model('photos/mdl_photo');
        
        $this->mdl_photo->delete($photo_id);
    }

}

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
class Mdl_portraits extends MY_Model{
    
    function __construct() {
        parent::__construct();
        $this->_table_name = 'portraits';
        $this->_rules = array(
            'portrait_name' => array(
                'field' => 'portrait_name',
                'label' => 'Tên chân dung',
                'rules' => 'required'
            ),
        );
    }
    
    function get_all() {
        $this->db->select('portraits.*, files.file_name');
        $this->db->join('portraits_files', 'portraits_files.portrait_id = portraits.id', 'left');
        $this->db->join('files', 'files.id = portraits_files.file_id', 'left');
        
        $this->db->order_by('files.uploaded_date');
        
        return $this->db->get($this->_table_name)->result();
    }
    
    function get_view_data($portrait_id = NULL) {
        
        $portrait_name = NULL;

        if ($this->is_postback()) {

            if (!$this->run_validation()) {
                $view_data['error'] = $this->get_last_messages();
            }

            $portrait_name = $this->input->post('portrait_name');
            $portrait_id = $this->input->post('portrait_id');
        } else {

            if ($portrait_id > 0) {
                $portrait = $this->get_by_id($portrait_id);
                $portrait_name = $portrait->portrait_name;
                $portrait_id = $portrait->id;
            }
        }

        $view_data['portrait_name'] = $portrait_name;
        $view_data['portrait_id'] = $portrait_id;

        return $view_data;
    }
    
    function add_new_portrait() {
        $data = $this->get_view_data();
        unset($data['portrait_id']);
        return parent::add_new($data);
    }
    
    function update_portrait() {
        $data = $this->get_view_data();
        $data['id'] = $data['portrait_id'];
        unset($data['portrait_id']);
        return parent::update($data);
    }
}

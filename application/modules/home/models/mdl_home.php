<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_fashion
 *
 * @author duongbq
 */
class Mdl_home extends CI_Model{
    
    
    
    function __construct() {
        parent::__construct();
    }
    
    
    function get_all_images_by_service_id($service_id) {
        
        $this->db->select('package.*, file.id file_id, file.file_name');
        $this->db->join('file', 'package.id = file.package_id', 'left');
        
        $this->db->where('file.is_slide', 1);
        $this->db->where('package.service_id', $service_id);
        
        return $this->db->get('package')->result(); 
    }
    
    function get_all_packages_by_service_id($service_id) {
        
        $this->db->where('package.service_id', $service_id);
        
        return $this->db->get('package')->result(); 
    }
    
    function get_models($sex) {
        
        $this->db->where('model.sex', $sex);
        
        return $this->db->get('model')->result();
    }
    
    function get_model_for_slider() {
        
        $this->db->order_by('RAND()'); 
        $this->db->limit(1);
        
        $model = $this->db->get('model')->row();
        
        return $model;
    }
    
    function get_images_for_slider_model($model_id) {
        
        $this->db->select('photo.id photo_id, file.id file_id, file.file_name, file.uploaded_date');
        $this->db->join('file', 'file.id = photo.file_id', 'left');
        
        $this->db->where('model_id', $model_id);
        
        return $this->db->get('photo')->result();
    }
}

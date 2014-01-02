<?php

if (!function_exists('get_displayed_image_by_portrait_id')) {

    function get_displayed_image_by_portrait_id($portrait_id = 0) {
        
        $CI =& get_instance();
        
        $CI->db->where('portraits_files.is_displayed', 1);
        $CI->db->where('portraits_files.portrait_id', $portrait_id);
        
        $CI->db->join('files', 'files.id = portraits_files.file_id');

        $CI->db->order_by('files.uploaded_date');
        
        return $CI->db->get('portraits_files')->row();
    }

}

if (!function_exists('get_fancy_images_by_portrait_id')) {

    function get_fancy_images_by_portrait_id($portrait_id = 0) {
        
        $CI =& get_instance();
        $CI->load->model('portraits/mdl_portraits');
        
        return $CI->mdl_portraits->get_all_images_by_portrait_id($portrait_id);
    }

}
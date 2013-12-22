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

class Mdl_photo extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->_table_name = 'photo';
    }
    
    private function _set_where($params = array())
    {
        if (isset($params['id'])) {
            $this->db->where('id', $params['id']);
        }
        if (isset($params['album_id'])) {
            $this->db->where('album_id', $params['album_id']);
        }
        if (isset($params['file_name'])) {
            $this->db->where('file_name', $params['file_name']);
        }
    }

    function get_photos($params = array()) {
        
        $this->db->select('photo.id photo_id, file.id file_id, file.file_name, file.uploaded_date');
        $this->db->join('file', 'file.id = photo.file_id', 'left');
        
        $this->_set_where($params);
        
        return $this->db->get($this->_table_name)->result();
    }

}

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
    }

    function get_all() {
        $this->db->select(' service.service_name, package.*');
        $this->db->join('service', 'service.id = package.service_id', 'left');
        
        return parent::get_all();
    }

}

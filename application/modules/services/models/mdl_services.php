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

class Mdl_Services extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'service';
        $this->_rules = array(
            'service_name' => array(
                'field' => 'service_name',
                'label' => 'Tên dịch vụ',
                'rules' => 'required'
            )
        );
    }

    function add_new_service() {
        $data = array('service_name' => $this->input->post('service_name'));
        return parent::add_new($data);
    }

    function update_service() {
        $data = array(
            'service_name' => $this->input->post('service_name'),
            'id' => $this->input->post('id')
        );
        return parent::update($data);
    }

}

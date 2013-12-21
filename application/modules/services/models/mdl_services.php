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

class Mdl_Services extends MY_Model
{

    function __construct()
    {
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

    function add_new_service()
    {
        $data = array('service_name' => $this->input->post('service_name'));
        return parent::add_new($data);
    }

    function update_service()
    {
        $data = array(
            'service_name' => $this->input->post('service_name'),
            'id' => $this->input->post('id')
        );
        return parent::update($data);
    }


    function get_combo($options = array())
    {
        // Default categories name
        if (!isset($options['combo_name'])) {
            $options['combo_name'] = $this->_table_name;
        }

        if (!isset($options['extra'])) {
            $options['extra'] = '';
        }

        if (isset($options['order'])) {

            $this->db->order_by($options['order']);
        }

        $objects = parent::get_all();

        $data_options = array();

        if (isset($options['ALL']))
            $data_options[-1] = 'Tất cả';

        foreach ($objects as $obj) {

            $data_options[$obj->id] = $obj->service_name;

        }

        if (!isset($options[$options['combo_name']])) {
            $options[$options['combo_name']] = -1;
        }
        return form_dropdown($options['combo_name'], $data_options, $options[$options['combo_name']], $options['extra']);
    }

}

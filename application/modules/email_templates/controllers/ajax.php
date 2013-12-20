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

class Ajax extends Admin_Controller {

    public $ajax_controller = TRUE;
    
    public function get_content()
    {
        $this->load->model('email_templates/mdl_email_templates');
        
        echo $this->mdl_email_templates->get_by_id($this->input->post('email_template_id'))->email_template_body;
    }
    
}
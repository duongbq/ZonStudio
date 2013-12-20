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

class Base_Controller extends MX_Controller {

    private $_libraries = array(
        'session',
        'csession',
        'form_validation',
        'pagination',
        'encrypt',
        'layout'
    );
    private $_helpers = array(
        'html',
        'form',
        'url',
        'string',
        'text',
        'language',
        'security',
        'paging',
        'friendly_url'
    );

    public function __construct() {
        parent::__construct();

        $this->load->library($this->_libraries);
        $this->load->helper($this->_helpers);
        $this->load->database();
        
    }
    
    

}

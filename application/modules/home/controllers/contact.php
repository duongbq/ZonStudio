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

class Contact extends Zon_Controller {
    
    public function __construct() {
        
        $this->_page_title = 'ZonStudio - Liên hệ';
        $this->_layout = 'layouts/home/home_layout';
        
        parent::__construct();
    }

    public function index() {
        $this->layout->view('contact');
    }

}

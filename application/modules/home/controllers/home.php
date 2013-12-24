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

class Home extends Zon_Controller {

    public function __construct() {

        $this->_page_title = 'ZonStudio';
        $this->_layout = 'layouts/home/home_index';

        parent::__construct();
    }

    public function index() {
        $this->load->model('file/mdl_file');
        $home_files = $this->mdl_file->get_files(array('is_home_display' => 1));
        $this->layout->view('home', array('home_files' => $home_files));
    }

}

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

class Portrait extends Zon_Controller {

    public function __construct() {

        $this->_page_title = 'ZonStudio - Ảnh chân dung';
        $this->_layout = 'layouts/home/home_layout';

        parent::__construct();

        $this->load->model('portraits/mdl_portraits');
        
        $this->load->helper('portraits/portraits');
    }

    public function index($page) {
        $view_data['portraits'] = $this->mdl_portraits->get_all_with_paging(array('page' => $page, 'per_page' => 9));
        $view_data['pagination'] = $this->mdl_portraits->get_pagination_link();
        
        $this->layout->view('portrait', $view_data);
    }

}

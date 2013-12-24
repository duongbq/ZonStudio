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

class Fashion extends Zon_Controller {
    
    
    
    public function __construct() {
        
        $this->_page_title = 'ZonStudio - Dịch vụ ảnh thời trang';
        $this->_layout = 'layouts/home/home_layout';
        
        parent::__construct();
        
        $this->load->model('mdl_home');
        
        
    }

    public function index() {
        
        $images = $this->mdl_home->get_all_images_by_service_id(1);
        $packages = $this->mdl_home->get_all_packages_by_service_id(1);
        $view_data = array('images' => $images, 'packages' => $packages);
        $this->layout->view('fashion', $view_data);
    }

}

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

class Wedding extends Zon_Controller {
    
    public function __construct() {
        
        $this->_page_title = 'ZonStudio - Dịch vụ ảnh cưới';
        $this->_layout = 'layouts/home/home_layout';
        
        parent::__construct();
        
        $this->load->model('packages/mdl_packages');
    }

    public function index() {
        
        $images = $this->mdl_packages->get_all_images_by_service_id(2);
        $packages = $this->mdl_packages->get_all_packages_by_service_id(2);
        $view_data = array('images' => $images, 'packages' => $packages);
        $this->layout->view('wedding', $view_data);
    }

}

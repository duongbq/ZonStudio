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
        
        $fashion_image = $this->mdl_file->get_files(array('home_display_index' => 1));
        $wedding_image = $this->mdl_file->get_files(array('home_display_index' => 2));
        $product_image = $this->mdl_file->get_files(array('home_display_index' => 3));
        
        $view_data = array(
            'fashion_image' => count($fashion_image) == 1 ? $fashion_image[0] : NULL,
            'wedding_image' => count($wedding_image) == 1 ? $wedding_image[0] : NULL,
            'product_image' => count($product_image) == 1 ? $product_image[0] : NULL
        );
        
        $this->layout->view('home', $view_data);
    }

}

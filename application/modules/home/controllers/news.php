<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author duongbq
 */
class News extends Zon_Controller {
    
    public function __construct() {

        $this->_page_title = 'ZonStudio - Tin tức';
        $this->_layout = 'layouts/home/home_layout';

        parent::__construct();
    }

    public function index() {
        
//        $this->load->model('file/mdl_file');
//        
//        $fashion_image = $this->mdl_file->get_files(array('home_display_index' => 1));
//        $wedding_image = $this->mdl_file->get_files(array('home_display_index' => 2));
//        $product_image = $this->mdl_file->get_files(array('home_display_index' => 3));
//        
//        $view_data = array(
//            'fashion_image' => count($fashion_image) == 1 ? $fashion_image[0] : NULL,
//            'wedding_image' => count($wedding_image) == 1 ? $wedding_image[0] : NULL,
//            'product_image' => count($product_image) == 1 ? $product_image[0] : NULL
//        );
        
        $this->layout->view('news');
    }
}

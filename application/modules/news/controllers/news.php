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
class News extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mdl_news');
    }
    
    function index() {
        
    }

    
    function create() {

        $view_data = $this->mdl_news->get_view_data();
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_news->post_news();
            redirect('news');
        }
        $this->layout->view('form', $view_data);
    }
}

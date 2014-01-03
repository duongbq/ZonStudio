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

        $this->load->model('news/mdl_news');
    }

    public function index($page = 1) {

        $view_data['news'] = $this->mdl_news->get_all_with_paging(array('page' => $page, 'per_page' => 9));
        $view_data['pagination'] = $this->mdl_news->get_pagination_link();

        $this->layout->view('news', $view_data);
    }
    
    function view_detail($news_id = 0) {
        echo $news_id;
    }

}

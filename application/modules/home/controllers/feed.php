<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feed
 *
 * @author duongbq
 */
class Feed extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news/mdl_news');
    }

    function show_rss() {

        $view_data['news'] = $this->mdl_news->get_news_rss();
        
        header("Content-Type: application/rss+xml");
        $this->load->view('feed_rss', $view_data);
    }

}

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
        $news = $this->mdl_news->get_all();
        $this->layout->view('index', array('news' => $news));
    }
    
    function detail($news_id) {
        $article = $this->mdl_news->get_by_id($news_id);
        $this->load->view('detail', array('article' => $article));
    }
    
    function create() {

        $view_data = $this->mdl_news->get_view_data();
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_news->post_news();
            redirect('news');
        }
        $this->layout->view('form', $view_data);
    }
    
    function edit($news_id) {

        if ($news_id <= 0) {
            redirect('news/create');
        }

        $view_data = $this->mdl_news->get_view_data($news_id);
        if ($this->is_postback() && !isset($view_data['error'])) {
            $this->mdl_news->update_news();
            redirect('news');
        }
        $this->layout->view('form', $view_data);
    }
    
    function delete($news_id) {
        $this->mdl_news->delete($news_id);
        redirect('news');
    }
}

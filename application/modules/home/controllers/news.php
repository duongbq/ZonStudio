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
        $this->load->model('file/mdl_file');
    }

    public function index($page = 1) {

        $view_data['news'] = $this->mdl_news->get_all_with_paging(array('page' => $page, 'per_page' => 9));
        $view_data['pagination'] = $this->mdl_news->get_pagination_link();
        $view_data['file_arr'] = $this->mdl_file->get_files_array();

        $this->layout->view('news', $view_data);
    }
    
    function view_detail($news_id = 0) {
        
        if($news_id <= 0) redirect ('tin-tuc');
        
        $news = $this->mdl_news->get_by_id($news_id);
        $other_news = $this->mdl_news->get_other_news($news_id);
        $view_data = array(
            'news' => $news,
            'other_news' => $other_news,
            'file_arr' => $this->mdl_file->get_files_array()
        );
        $this->layout->view('news_detail', $view_data);         
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_news
 *
 * @author duongbq
 */
class Mdl_news extends MY_Model {

    function __construct() {
        parent::__construct();
        
        $this->_table_name = 'news';

        $this->_rules = array(
            'title' => array(
                'field' => 'title',
                'label' => 'Tiêu đề',
                'rules' => 'required'
            ),
            'summary' => array(
                'field' => 'summary',
                'label' => 'Tóm tắt nội dung',
                'rules' => 'required'
            ),
            'description' => array(
                'field' => 'description',
                'label' => 'Nội dung chi tiết',
                'rules' => 'required'
            ),
        );
    }
    
    function get_view_data($news_id = NULL) {
        
        $title = NULL;
        $summary = NULL;
        $description = NULL;
        $is_active = NULL;

        if ($this->is_postback()) {

            if (!$this->run_validation()) {
                $view_data['error'] = $this->get_last_messages();
            }

            $title = $this->input->post('title');
            $summary = $this->input->post('summary');
            $description = $this->input->post('description');
            $is_active = $this->input->post('is_active');
            $news_id = $this->input->post('news_id');
        } else {

            if ($news_id > 0) {
                $news = $this->get_by_id($news_id);
                $title = $news->title;
                $summary = $news->summary;
                $description = $news->description;
                $is_active = $news->is_active;
                $news_id = $news->id;
            }
        }

        $view_data['title'] = $title;
        $view_data['summary'] = $summary;
        $view_data['description'] = $description;
        $view_data['is_active'] = $is_active;
        $view_data['news_id'] = $news_id;

        return $view_data;
    }

}

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
                'rules' => 'trim|required|max_length[255]'
            ),
            'summary' => array(
                'field' => 'summary',
                'label' => 'Tóm tắt nội dung',
                'rules' => 'trim|required|max_length[500]'
            ),
            'description' => array(
                'field' => 'description',
                'label' => 'Nội dung chi tiết',
                'rules' => 'trim|required'
            ),
        );
    }

    function get_view_data($news_id = NULL) {

        $title = NULL;
        $file_id = NULL;
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
            $file_id = $this->input->post('file_id');
        } else {

            if ($news_id > 0) {
                $news = $this->get_by_id($news_id);
                $title = $news->title;
                $summary = $news->summary;
                $description = $news->description;
                $is_active = $news->is_active;
                $news_id = $news->id;
                $file_id = $news->file_id;
            }
        }

        $view_data['title'] = $title;
        $view_data['summary'] = $summary;
        $view_data['description'] = $description;
        $view_data['is_active'] = $is_active;
        $view_data['news_id'] = $news_id;
        $view_data['file_id'] = $file_id;

        return $view_data;
    }

    function post_news() {
        $data = array(
            'title' => $this->input->post('title'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'is_active' => $this->input->post('is_active'),
        );

        return parent::add_new($data);
    }

    function upload_new_image() {
        $this->load->model('file/mdl_file');
        $options = array(
            'folder_name' => $this->_table_name,
            'img_process' => TRUE,
            'width' => 100,
            'height' => 75,
        );
        return $this->mdl_file->upload_file($options);
    }

    function update_news() {
        $data = array(
            'title' => $this->input->post('title'),
            'summary' => $this->input->post('summary'),
            'description' => $this->input->post('description'),
            'is_active' => $this->input->post('is_active'),
            'id' => $this->input->post('news_id'),
        );

        parent::update($data);
    }

    function get_other_news($news_id) {

        $this->db->where('id !=', $news_id);
        $this->db->limit(3);
        $this->db->order_by("created_at", "desc");
        return $this->db->get($this->_table_name)->result();
    }

    function get_news_rss() {

        $this->db->limit(9);
        $this->db->order_by("created_at", "desc");
        return $this->db->get($this->_table_name)->result();
    }

}

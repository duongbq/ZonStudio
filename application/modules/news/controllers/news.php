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
        $this->load->model('file/mdl_file');
    }

    function index() {
        $news = $this->mdl_news->get_all();
        $file_arr = $this->mdl_file->get_files_array();
        $this->layout->view('index', array('news' => $news, 'file_arr' => $file_arr));
    }

    function detail($news_id) {
        $article = $this->mdl_news->get_by_id($news_id);
        $file_arr = $this->mdl_file->get_files_array();
        $this->load->view('detail', array('article' => $article, 'file_arr' => $file_arr));
    }

    function create() {

        $view_data = $this->mdl_news->get_view_data();
        if ($this->is_postback() && !isset($view_data['error'])) {

            $return_val = NULL;
            if ($_FILES['userfile']['name'] != '') {
                $return_val = $this->mdl_news->upload_new_image();
            } else {
                $this->mdl_news->post_news();
                redirect('news');
            }

            if (is_numeric($return_val) && $return_val > 0) {
                $news_id = $this->mdl_news->post_news();
                $this->mdl_news->update(array('id' => $news_id, 'file_id' => $return_val));
                redirect('news');
            }

            $view_data['error'] = $return_val;
        }
        $this->layout->view('form', $view_data);
    }

    function edit($news_id) {

        if ($news_id <= 0) {
            redirect('news/create');
        }
//        $redirect = FALSE;
        $view_data = $this->mdl_news->get_view_data($news_id);
        $view_data['file_arr'] = $this->mdl_file->get_files_array();

        if ($this->is_postback() && !isset($view_data['error'])) {

            $return_val = NULL;

            if ($_FILES['userfile']['name'] != '') {
                $return_val = $this->mdl_news->upload_new_image();
            } else {
                $this->mdl_news->update_news();
                redirect('news');
            }

            if (is_numeric($return_val) && $return_val > 0) {
                $this->mdl_news->update(array('id' => $news_id, 'file_id' => $return_val));
                $this->mdl_file->delete_file(array('file_id' => $view_data['file_id'], 'folder_name' => 'news'));

                $this->mdl_news->update_news();
                redirect('news');
            }


            $view_data['error'] = $return_val;
        }

        $this->layout->view('form', $view_data);
    }

    function delete($news_id) {
        $news = $this->mdl_news->get_by_id($news_id);
        $this->mdl_news->delete($news_id);
        $this->mdl_file->delete_file(array('file_id' => $news->file_id, 'folder_name' => 'news'));
        redirect('news');
    }

}

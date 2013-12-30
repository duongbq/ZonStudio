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

class Portrait extends Zon_Controller {

    public function __construct() {

        $this->_page_title = 'ZonStudio - Ảnh chân dung';
        $this->_layout = 'layouts/home/home_layout';

        parent::__construct();

        $this->load->model('portraits/mdl_portraits');
        $this->load->model('portraits/mdl_portraits_files');
        $this->load->model('file/mdl_file');
    }

    public function index($page) {
        $view_data['images'] = $this->mdl_portraits->get_all();
        $view_data['portraits'] = $this->mdl_portraits->get_all_with_paging(array(
                'page' => $page,
                'per_page' => 3
        ));
        $view_data['pagination'] = $this->mdl_portraits->get_pagination_link();
        $view_data['portraits_files_arr'] = $this->mdl_portraits_files->get_file_id_array();
        $view_data['files_arr'] = $this->mdl_file->get_files_array();
        
        $this->layout->view('portrait', $view_data);
    }

}

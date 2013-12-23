<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of file
 *
 * @author duongbq
 */
class File extends Admin_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('mdl_file');
    }
    
    
    public function index()
    {
        $files = $this->mdl_file->get_all();
        $this->layout->view('index', array('files' => $files));
    }
}

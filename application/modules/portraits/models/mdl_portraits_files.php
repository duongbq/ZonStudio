<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_portraits
 *
 * @author duongbq
 */
class mdl_portraits_files extends MY_Model {
    
    function __construct() {
        parent::__construct();
        $this->_table_name = 'portraits_files';
    }
    
    
}

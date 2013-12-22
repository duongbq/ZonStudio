<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author duongbq
 */
class Error extends CI_Controller {

    public function __construct() {
        show_404();
    }

}

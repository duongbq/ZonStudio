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

class Packages extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_packages');
    }

    public function index() {
        
        $packages = $this->mdl_packages->get_all();
        $this->layout->view('index', array('packages' => $packages));
    }
    
    function create()
    {
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_packages->run_validation()) {
                $view_data['error'] = $this->mdl_packages->get_last_messages();
            } else {
                $this->mdl_packages->add_new_package();
                redirect('packages');
            }
        }

        $this->layout->view('form', $view_data);
    }

    
    public function delete($id) {
        $this->mdl_packages->delete($id);
        redirect('packages');
    }

}

?>
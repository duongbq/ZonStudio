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

    public function form($id = NULL) {
        if ($this->input->post('btn_cancel')) {
            redirect('packages');
        }

        if ($this->mdl_packages->run_validation()) {
            $this->mdl_packages->save($id);
            redirect('packages');
        }

        if ($id and !$this->input->post('btn_submit')) {
            if (!$this->mdl_packages->prep_form($id)) {
                show_404();
            }
        }
        $services = $this->mdl_services->result();
        $this->layout->set('services', $services);
        $this->layout->buffer('content', 'packages/form');
        $this->layout->render();
    }

    public function delete($id) {
        $this->mdl_packages->delete($id);
        redirect('packages');
    }

}

?>
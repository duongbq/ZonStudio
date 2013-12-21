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

class Services extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_services');
    }

    public function index()
    {
        $services = $this->mdl_services->get_all();
        $this->layout->view('index', array('services' => $services));
    }

    function create()
    {
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_services->run_validation()) {
                $view_data['error'] = $this->mdl_services->get_last_messages();
            } else {
                $this->mdl_services->add_new_service();
                redirect('services');
            }
        }

        $this->layout->view('form', $view_data);
    }
    
    function edit($id) {
        
        if($id <= 0){
            redirect('services/create');
        }
        
        $view_data = array();
        if ($this->is_postback()) {
            if (!$this->mdl_services->run_validation()) {
                $view_data['error'] = $this->mdl_services->get_last_messages();
            } else {
                $this->mdl_services->update_service();
                redirect('services');
            }
        }
        $service = $this->mdl_services->get_by_id($id);
        $view_data['id'] = $service->id;
        $view_data['service_name'] = $service->service_name;
        $this->layout->view('form', $view_data);
    }

    public function delete($id)
    {
        $this->mdl_services->delete($id);
        redirect('services');
    }

}

?>
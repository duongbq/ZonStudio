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

class Profile extends Admin_Controller {

    public function index() {
        $this->load->view('profile');
    }

    function check_current_password() {
        
        if ($this->is_postback() && $this->input->is_ajax_request()) {
            
            $old_password = $this->input->post('old_password');
            $this->load->model('mdl_sessions');
            
            if($this->mdl_sessions->check_current_password_of_loggedin_user($old_password)){
                echo '1';
            } else {
                echo '0';
            }
        } else {
            redirect(base_url());
        }
        
    }
    
    function update_info() {
        if ($this->is_postback() && $this->input->is_ajax_request()) {
            
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'user_name' => $this->input->post('user_name'),
                'password' => md5($this->input->post('new_password')),
                'id' => $this->csession->get('user_id')
            );
            $this->load->model('mdl_sessions');
            $this->mdl_sessions->update_info_for_loggedin_user($data);
            echo '1';
        } else {
            redirect(base_url());
        }
    }

}

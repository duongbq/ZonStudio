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

class Sessions extends Base_Controller {

    public function index()
    {
        redirect('sessions/login');
    }

    public function login()
    {
        if ($this->csession->get('user_id'))
        {
            redirect('dashboard');
        }

        $view_data = array();
        if ($this->is_postback())
        {
            $user_name = $this->input->post('user_name');
            $password = $this->input->post('password');
            $this->load->model('mdl_sessions');

            if ($this->mdl_sessions->auth($user_name, $password))
            {
                redirect('dashboard');
            }

            $view_data['login_msg'] = $this->mdl_sessions->get_login_msg();

        }

        $this->load->view('session_login', $view_data);
    }

    public function logout()
    {
         $this->csession->clear();

        redirect('sessions/login');
    }


}

?>
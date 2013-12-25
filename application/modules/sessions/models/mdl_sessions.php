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

class Mdl_Sessions extends CI_Model {

    private $_login_msg = 'Đăng nhập không thành công';

    public function get_login_msg() {
        return $this->_login_msg;
    }

    public function auth($user_name, $password) {
        $this->db->where('user_name', $user_name);

        $query = $this->db->get('account');

        if ($query->num_rows() == 1) {
            $user = $query->row();

            if (md5($password) == $user->password) {
                $this->csession->save('user_id', $user->id);
                $this->csession->save('user_name', $user->user_name);
                $this->csession->save('first_name', $user->first_name);
                $this->csession->save('last_name', $user->last_name);
                $this->csession->save('full_name', $user->first_name . $user->last_name);
                return TRUE;
            }
            $this->_login_msg = 'Tên đăng nhập hoặc mật khẩu không đúng';
            return FALSE;
        }

        return FALSE;
    }

    function check_current_password_of_loggedin_user($password) {

        $this->db->where('id', $this->csession->get('user_id'));
        $query = $this->db->get('account');

        if ($query->num_rows() == 1) {
            $user = $query->row();

            if (md5($password) == $user->password) {
                return TRUE;
            }
            return FALSE;
        }

        return FALSE;
    }

    function update_info_for_loggedin_user($data = array()) {
        if (isset($data['id'])) {
            
            $this->db->update('account', $data, array('id' => $data['id']));
            $this->csession->save('user_id', $data['id']);
            $this->csession->save('user_name', $data['user_name']);
            $this->csession->save('first_name', $data['first_name']);
            $this->csession->save('last_name', $data['last_name']);
            $this->csession->save('full_name', $data['first_name'] . $data['last_name']);
        }
        
    }

}

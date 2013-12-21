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

class Mdl_User_Custom extends MY_Model {
    
    public $table = 'fi_user_custom';
    public $primary_key = 'fi_user_custom.user_custom_id';
    
    public function save_custom($user_id, $db_array)
    {
        $user_custom_id = NULL;
        
        $db_array['user_id'] = $user_id;
        
        $user_custom = $this->where('user_id', $user_id)->get();
        
        if ($user_custom->num_rows())
        {
            $user_custom_id = $user_custom->row()->user_custom_id;
        }

        parent::save($user_custom_id, $db_array);
    }
    
}

?>
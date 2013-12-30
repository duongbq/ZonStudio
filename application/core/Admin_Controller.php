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

class Admin_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->csession->get('user_id')) {
            redirect('sessions/login');
        }

        $this->layout->title('Trang quản trị - Zon Studio');
        $this->layout->render_layout('layouts/admin/layout');
    }

}

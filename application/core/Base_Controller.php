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

class Base_Controller extends MX_Controller {

    public function __construct() {
        parent::__construct();

//        if (defined('ENVIRONMENT') && ENVIRONMENT == 'development'){
//            $this->output->enable_profiler();
//        }
        
    }
    
    

}

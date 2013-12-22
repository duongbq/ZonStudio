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

class Zon_Controller extends Base_Controller {
    
    protected $_page_title = '';
    protected $_layout = '';
    
    public function __construct() {
        parent::__construct();
        
        $this->layout->title($this->_page_title);
        $this->layout->render_layout($this->_layout);
    }

}

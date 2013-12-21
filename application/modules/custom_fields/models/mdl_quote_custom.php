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

class Mdl_Quote_Custom extends MY_Model {
    
    public $table = 'fi_quote_custom';
    public $primary_key = 'fi_quote_custom.quote_custom_id';
    
    public function save_custom($quote_id, $db_array)
    {
        $quote_custom_id = NULL;
        
        $db_array['quote_id'] = $quote_id;
        
        $quote_custom = $this->where('quote_id', $quote_id)->get();
        
        if ($quote_custom->num_rows())
        {
            $quote_custom_id = $quote_custom->row()->quote_custom_id;
        }

        parent::save($quote_custom_id, $db_array);
    }
    
}

?>
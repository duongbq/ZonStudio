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

class Mdl_Payment_Methods extends Response_Model {
	
	public $table = 'fi_payment_methods';
	public $primary_key = 'fi_payment_methods.payment_method_id';
    
    public function default_select()
    {
        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
    }
	
	public function order_by()
	{
		$this->db->order_by('fi_payment_methods.payment_method_name');
	}
	
	public function validation_rules()
	{
		return array(
			'payment_method_name' => array(
				'field' => 'payment_method_name',
				'label' => lang('payment_method'),
				'rules' => 'required'
			)
		);
	}
	
}

?>
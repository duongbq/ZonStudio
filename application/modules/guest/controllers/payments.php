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

class Payments extends Guest_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('services/mdl_payments');
	}

	public function index($page = 0)
	{
        $this->mdl_payments->where('(fi_payments.invoice_id IN (SELECT invoice_id FROM fi_invoices WHERE client_id IN (' . implode(',', $this->user_clients) . ')))');
        $this->mdl_payments->paginate(site_url('guest/services/index'), $page);
        $payments = $this->mdl_payments->result();
            
		$this->layout->set(
			array(
				'services'			 => $payments,
				'filter_display'	 => TRUE,
				'filter_placeholder' => lang('filter_payments'),
				'filter_method'		 => 'filter_payments'
			)
		);
        
		$this->layout->buffer('content', 'guest/payments_index');
		$this->layout->render('layout_guest');
	}

}

?>
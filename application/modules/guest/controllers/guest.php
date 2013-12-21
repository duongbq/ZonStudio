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

class Guest extends Guest_Controller {

    public function index()
    {
        $this->load->model('quotes/mdl_quotes');
        $this->load->model('invoices/mdl_invoices');

        $this->layout->set(
            array(
                'overdue_invoices' => $this->mdl_invoices->is_overdue()->where_in('fi_invoices.client_id', $this->user_clients)->get()->result(),
                'open_quotes'      => $this->mdl_quotes->is_open()->where_in('fi_quotes.client_id', $this->user_clients)->get()->result(),
                'open_invoices'    => $this->mdl_invoices->is_open()->where_in('fi_invoices.client_id', $this->user_clients)->get()->result()
            )
        );

        $this->layout->buffer('content', 'guest/index');
        $this->layout->render('layout_guest');
    }

}

?>
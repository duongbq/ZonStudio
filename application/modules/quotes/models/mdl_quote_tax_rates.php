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

class Mdl_Quote_Tax_Rates extends Response_Model {

    public $table       = 'fi_quote_tax_rates';
    public $primary_key = 'fi_quote_tax_rates.quote_tax_rate_id';

    public function default_select()
    {
        $this->db->select('fi_tax_rates.tax_rate_name AS quote_tax_rate_name');
        $this->db->select('fi_tax_rates.tax_rate_percent AS quote_tax_rate_percent');
        $this->db->select('fi_quote_tax_rates.*');
    }

    public function default_join()
    {
        $this->db->join('fi_tax_rates', 'fi_tax_rates.tax_rate_id = fi_quote_tax_rates.tax_rate_id');
    }

    public function save($quote_id, $id = NULL, $db_array = NULL)
    {
        parent::save($id, $db_array);

        $this->load->model('quotes/mdl_quote_amounts');
        $this->mdl_quote_amounts->calculate($quote_id);
    }

    public function validation_rules()
    {
        return array(
            'quote_id'         => array(
                'field' => 'quote_id',
                'label' => lang('quote'),
                'rules' => 'required'
            ),
            'tax_rate_id'      => array(
                'field' => 'tax_rate_id',
                'label' => lang('tax_rate'),
                'rules' => 'required'
            ),
            'include_item_tax' => array(
                'field' => 'include_item_tax',
                'label' => lang('tax_rate_placement'),
                'rules' => 'required'
            )
        );
    }

}

?>
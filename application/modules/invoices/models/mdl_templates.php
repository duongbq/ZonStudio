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

class Mdl_Templates extends CI_Model {

    public function get_invoice_templates($type = 'pdf')
    {
        $this->load->helper('directory');

        if ($type == 'pdf')
        {
            $templates = directory_map(APPPATH . '/views/invoice_templates/pdf', TRUE);
        }
        elseif ($type == 'public')
        {
            $templates = directory_map(APPPATH . '/views/invoice_templates/public', TRUE);
        }

        $templates = $this->remove_extension($templates);

        return $templates;
    }

    public function get_quote_templates($type = 'pdf')
    {
        $this->load->helper('directory');

        if ($type == 'pdf')
        {
            $templates = directory_map(APPPATH . '/views/quote_templates/pdf', TRUE);
        }
        elseif ($type == 'public')
        {
            $templates = directory_map(APPPATH . '/views/quote_templates/public', TRUE);
        }

        $templates = $this->remove_extension($templates);

        return $templates;
    }

    private function remove_extension($files)
    {
        foreach ($files as $key => $file)
        {
            $files[$key] = str_replace('.php', '', $file);
        }

        return $files;
    }

}

?>
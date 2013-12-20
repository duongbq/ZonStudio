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

class Mdl_Settings extends CI_Model {

	public $settings = array();

	public function get($key)
	{
		$this->db->select('setting_value');
		$this->db->where('setting_key', $key);
		$query = $this->db->get('settings');

		if ($query->row())
		{
			return $query->row()->setting_value;
		}
		else
		{
			return NULL;
		}
	}

	public function save($key, $value)
	{
		$db_array = array(
			'setting_key' => $key,
			'setting_value' => $value
		);

		if ($this->get($key) !== NULL)
		{
			$this->db->where('setting_key', $key);
			$this->db->update('settings', $db_array);
		}
		else
		{
			$this->db->insert('settings', $db_array);
		}
	}

	public function delete($key)
	{
		$this->db->where('setting_key', $key);
		$this->db->delete('settings');
	}

	public function load_settings()
	{
		$settings = $this->db->get('settings')->result();

		foreach ($settings as $data)
		{
			$this->settings[$data->setting_key] = $data->setting_value;
		}
	}

	public function setting($key)
	{
		return (isset($this->settings[$key])) ? $this->settings[$key] : '';
	}

	public function set_setting($key, $value)
	{
		$this->settings->$key = $value;
	}

}

?>
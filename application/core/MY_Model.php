<?php

class MY_Model extends CI_Model
{

    protected $_table_name;
    protected $_where = array();
    protected $_rules = array();
    protected $_last_message;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_last_messages()
    {
        return $this->_last_message;
    }

    private function _set_where($key, $value)
    {
        $this->_where->$key = $value;
    }

    function get_all_with_paging($options = array())
    {
        $total_row = $this->db->count_all($this->_table_name);
        $config = get_config_paging(array('page' => $options['page'], 'total_rows' => $total_row));
        $this->pagination->initialize($config);
        $pagination_link = $this->pagination->create_ajax_links();
        $this->db->limit($config['limit'], $config['offset']);
        return array($this->db->get($this->_table_name)->result(), $pagination_link);
    }

    function get_all()
    {
        return $this->db->get($this->_table_name)->result();
    }

    function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table_name)->row();
    }

    function add_new($data = array())
    {
        $this->db->insert($this->_table_name, $data);
        return $this->db->insert_id();
    }

    function update($data = array())
    {
        if (isset($data['id']))
            $this->db->update($this->_table_name, $data, array('id' => $data['id']));
    }

    function delete($id = 0)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table_name);
    }

    /**
     *
     * @param type $rules
     */
    function run_validation()
    {

        $this->form_validation->set_rules($this->_rules);
        if (!$this->form_validation->run()) {
            $this->_last_message = validation_errors();
            return FALSE;
        }
        return TRUE;
    }


}

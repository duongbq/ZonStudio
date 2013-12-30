<?php

class MY_Model extends CI_Model {

    protected $_primary_key;
    protected $_foreign_key;
    protected $_table_name;
    protected $_join_table_name;
    protected $_where = array();
    protected $_rules = array();
    protected $_last_message;
    protected $pagination_link = NULL;
                function __construct() {
        parent::__construct();
    }

    private function get_join_condition() {
        return $this->_join_table_name . '.id' . '=' . $this->_table_name . '.' . $this->_foreign_key;
    }

    function join($option = '') {

        $this->db->join($this->_join_table_name, $this->get_join_condition(), $option);
    }

    function select($columns = array()) {
        $select = '';
        foreach ($columns as $column) {
            if ($select == '') {
                $select = $column;
            } else {
                $select .= ', ' . $column;
            }
        }
        $this->db->select($select);
    }

    function get_last_messages() {
        return $this->_last_message;
    }

    function get_all_with_paging($options = array()) {
        $total_row = $this->db->count_all($this->_table_name);
        $config = get_config_paging(array('page' => $options['page'], 'per_page' => $options['per_page'], 'total_rows' => $total_row));
        $this->pagination->initialize($config);
        $this->pagination_link = $this->pagination->create_ajax_links();
        $this->db->limit($config['limit'], $config['offset']);
        return $this->db->get($this->_table_name)->result();
    }
    
    function get_pagination_link() {
        return $this->pagination_link;
    }

    function get_all() {
        return $this->db->get($this->_table_name)->result();
    }

    private function _set_where_conditions($options = array()) {

        while ($value = current($options)) {
            if (isset($options[key($options)])) {
                $this->db->where(key($options), $value);
            }
            next($options);
        }
    }

    function get_all_with_conditions($options = array()) {
        $this->_set_where_conditions($options);
        return $this->db->get($this->_table_name)->result();
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->_table_name)->row();
    }

    function add_new($data = array()) {
        $this->db->insert($this->_table_name, $data);
        return $this->db->insert_id();
    }

    function update($data = array()) {
        if (isset($data['id']))
            $this->db->update($this->_table_name, $data, array('id' => $data['id']));
    }

    function delete($id = 0) {
        $this->db->where('id', $id);
        $this->db->delete($this->_table_name);
    }

    /**
     *
     * @param type $rules
     */
    function run_validation() {

        $this->form_validation->set_rules($this->_rules);
        if (!$this->form_validation->run()) {
            $this->_last_message = validation_errors();
            return FALSE;
        }
        return TRUE;
    }

    function is_postback() {
        return empty($_POST) ? FALSE : TRUE;
    }

}

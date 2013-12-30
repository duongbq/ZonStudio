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

class Mdl_model extends MY_Model {

    function __construct() {
        parent::__construct();

        $this->_table_name = 'models';
        $this->_rules = array(
            'model_name' => array(
                'field' => 'model_name',
                'label' => 'Tên model',
                'rules' => 'required'
            )
        );
    }

    function get_all() {
        $this->db->order_by('model_name');
        return parent::get_all();
    }
    
    function get_models_by_sex($sex) {
        $this->db->order_by('model_name');
        $this->db->where('sex', $sex);
        return $this->db->get($this->_table_name)->result();        
    }
    
    function get_model_for_home_slider($options = array()) {

        if (isset($options['rand'])) {
            $this->db->order_by('RAND()');
        } elseif (isset($options['model_id'])) {
            $this->db->where('id', $options['model_id']);
        }

        $this->db->limit(1);

        $model = $this->db->get($this->_table_name)->row();

        return $model;
    }
    
    function get_view_data($model_id = NULL) {

        $model_name = NULL;
        $nick_name = NULL;
        $description = NULL;
        $sex = NULL;
        $height = NULL;
        $weight = NULL;
        $body_measure = NULL;
        $trousers_size = NULL;
        $shirt_size = NULL;
        $shoes_size = NULL;
        $photo_shoot_fee = NULL;

        if ($this->is_postback()) {

            if (!$this->run_validation()) {
                $view_data['error'] = $this->get_last_messages();
            }

            $model_name = $this->input->post('model_name');
            $nick_name = $this->input->post('nick_name');
            $description = $this->input->post('description');
            $sex = $this->input->post('sex');
            $height = $this->input->post('height');
            $weight = $this->input->post('weight');
            $body_measure = $this->input->post('body_measure');
            $trousers_size = $this->input->post('trousers_size');
            $shirt_size = $this->input->post('shirt_size');
            $shoes_size = $this->input->post('shoes_size');
            $photo_shoot_fee = $this->input->post('photo_shoot_fee');
            $model_id = $this->input->post('model_id');
        } else {

            if ($model_id > 0) {

                $model = $this->get_by_id($model_id);

                $model_name = $model->model_name;
                $nick_name = $model->nick_name;
                $description = $model->description;
                $sex = $model->sex;
                $height = $model->height;
                $weight = $model->weight;
                $body_measure = $model->body_measure;
                $trousers_size = $model->trousers_size;
                $shirt_size = $model->shirt_size;
                $shoes_size = $model->shoes_size;
                $photo_shoot_fee = $model->photo_shoot_fee;
                $model_id = $model->id;
            }
        }

        $view_data['model_name'] = $model_name;
        $view_data['nick_name'] = $nick_name;
        $view_data['description'] = $description;
        $view_data['sex'] = $sex;
        $view_data['height'] = $height;
        $view_data['weight'] = $weight;
        $view_data['body_measure'] = $body_measure;
        $view_data['trousers_size'] = $trousers_size;
        $view_data['shirt_size'] = $shirt_size;
        $view_data['shoes_size'] = $shoes_size;
        $view_data['photo_shoot_fee'] = $photo_shoot_fee;
        $view_data['model_id'] = $model_id;

        return $view_data;
    }

    function add_new_model() {
        $data = $this->get_view_data();
        unset($data['model_id']);
        return parent::add_new($data);
    }

    function update_model() {
        $data = $this->get_view_data();
        $data['id'] = $data['model_id'];
        unset($data['model_id']);
        return parent::update($data);
    }

    function get_all_images_by_model_id($model_id) {

        $this->load->model('model/mdl_models_files');

        return $this->mdl_models_files->get_images_by_model_id($model_id);
    }

    function upload_images_for_model($model_id = 0) {

        $this->load->model('file/mdl_file');

        $options = array(
            'folder_name' => $this->_table_name,
        );
        //Upload image file with options above
        $return_val = $this->mdl_file->upload_file($options);
        if (is_numeric($return_val) && $return_val > 0) {

            $this->mdl_file->update(array('id' => $return_val, 'uploaded_date' => date('Y-m-d h:i:s')));
            $this->load->model('mdl_models_files');
            $this->mdl_models_files->add_new(array('model_id' => $model_id, 'file_id' => $return_val));
        }

        return $return_val;
    }

    function delete($model_id) {
        
        $this->load->model('mdl_models_files');
        $images = $this->get_all_images_by_model_id($model_id);
        foreach ($images as $image) {
            $this->mdl_models_files->remove_model_image($image->id, $model_id);
        }
        parent::delete($model_id);
    }

}

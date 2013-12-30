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

class Models extends Zon_Controller {

    public function __construct() {

        $this->_page_title = 'ZonStudio - Dịch vụ người mẫu';
        $this->_layout = 'layouts/home/home_layout';

        parent::__construct();

        $this->load->model('model/mdl_model');
        
    }

    public function index() {
        
        $female_models = $this->mdl_model->get_models_by_sex(0);
//        print_r($female_models);die;
        $male_models = $this->mdl_model->get_models_by_sex(1);
//        print_r($male_models);die;
        $model_for_slider = $this->mdl_model->get_model_for_home_slider(array('rand' => TRUE));
//        print_r($model_for_slider);die;
        $images_for_slider_model = $this->mdl_model->get_all_images_by_model_id(is_object($model_for_slider) ? $model_for_slider->id : 0);
//        print_r($images_for_slider_model);die;
        $view_data = array(
            'female_models' => $female_models,
            'male_models' => $male_models,
            'model_for_slider' => $model_for_slider,
            'images_for_slider_model' => $images_for_slider_model
        );

        $this->layout->view('models', $view_data);
    }

    /**
     * 
     */
    function display_model() {

        if ($this->is_postback() && $this->input->is_ajax_request()) {

            $model_id = $this->input->post('model_id');
            
            $images_for_slider_model = $this->mdl_model->get_all_images_by_model_id($model_id);
            $model_for_slider = $this->mdl_model->get_model_for_home_slider(array('model_id' => $model_id));

            $view_data = array(
                'images_for_slider_model' => $images_for_slider_model,
                'model_for_slider' => $model_for_slider,
            );

            echo $this->load->view('display_model', $view_data);
        } else {
            redirect(base_url());
        }
    }

}

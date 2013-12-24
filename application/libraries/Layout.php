<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * @author Quý Dương Bùi <duongbq83@gmail.com>
 */
class Layout
{

    private $obj;
    private $layout_view;
    private $title = '';
    private $meta_description = '';
    private $meta_keywords = '';
    
    private $css_list = array(), $js_list = array();

    function __construct()
    {
        $this->obj = & get_instance();
    }

    /**
     * Grab layout from called controller.
     * If there is no layout grap from controller, the default will be choosen
     * @param string|\type $layout
     */
    function render_layout($layout = "")
    {

        $this->layout_view = $layout != "" ? $layout . EXT : "layouts/default" . EXT;

        if (isset($this->obj->layout_view))
            $this->layout_view = $this->obj->layout_view;

        if (!file_exists(APPPATH . "/views/" . $this->layout_view)) {
            exit("Layout not found! It should be located in views directory of your application");
        }
    }

    /**
     *
     * @param type $view
     * @param type $data
     * @param bool|\type $return
     * @return type
     */
    function view($view, $data = null, $return = false)
    {
        // Render template
        $data['content_for_layout'] = $this->obj->load->view($view, $data, true);
        $data['title_for_layout'] = $this->title;
        $data['meta_description'] = $this->meta_description;
        $data['meta_keywords'] = $this->meta_keywords;

        // Render resources
        $data['js_for_layout'] = '';
        foreach ($this->js_list as $js_list)
            $data['js_for_layout'] .= sprintf('<script type="text/javascript" src="%s"></script>', $js_list);

        $data['css_for_layout'] = '';
        foreach ($this->css_list as $css_list)
            $data['css_for_layout'] .= sprintf('<link rel="stylesheet" type="text/css"  href="%s" />', $css_list);

        // Render template
        $output = $this->obj->load->view($this->layout_view, $data, $return);

        return $output;
    }

    /**
     * Set page title
     *
     * @param $title
     */
    function meta_description($meta_description)
    {
        $this->meta_description = $meta_description;
    }
    
    function meta_keywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
    }
    
    function title($title)
    {
        $this->title = $title;
    }

    /**
     * Adds Javascript resource to current page
     * @param $item
     */
    function js($item)
    {
        $this->js_list[] = $item;
    }

    /**
     * Adds CSS resource to current page
     * @param $item
     */
    function css($item)
    {
        $this->css_list[] = $item;
    }

    

}

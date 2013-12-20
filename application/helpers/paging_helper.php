<?php

if (!function_exists('get_config_paging')) {

    /**
     * @param array $options
     * @return array
     */
    function get_config_paging($options = array()) {
        $config = array();
        $config['total_rows'] = $options['total_rows'];
        $config['per_page'] = isset($options['per_page']) ? $options['per_page'] : 1;

        $total_pages = (int) ($options['total_rows'] / $config['per_page']);
        if ($total_pages * $config['per_page'] < $options['total_rows'])
            $total_pages++;
        if ((int) $options['page'] > $total_pages)
            $options['page'] = $total_pages;

        $config['offset'] = $options['page'] <= 1 ? 0 : ((int) $options['page'] - 1) * $config['per_page'];
        $config['limit'] = $config['per_page'];
        $config['num_links'] = isset($options['num_links']) ? $options['num_links'] : 5;
        $config['js_function'] = isset($options['js_function']) ? $options['js_function'] : 'change_page';

        $config['first_link'] = '«««';
        $config['prev_link'] = '«';
        $config['next_link'] = '»';
        $config['last_link'] = '»»»';

//        $config['use_page_numbers'] = TRUE;
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['prev_link'] = '&laquo;';
//        $config['prev_tag_open'] = '<li>';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//
//        $config['next_link'] = '&raquo;';

        return $config;
    }

}
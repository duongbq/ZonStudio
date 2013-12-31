<?php
/**
 * Created by JetBrains PhpStorm.
 * User: duongbq
 * Date: 2/16/13
 * Time: 11:23 AM
 * To change this template use File | Settings | File Templates.
 */

/**
 * @param array $options
 * @return string
 */
function get_years_combo($options = array())
{

    if (!isset($options['combo_name'])) {
        $options['combo_name'] = 'year';
    }

    if (!isset($options['extra'])) {
        $options['extra'] = '';
    }

    $data_options = array();
    $data_options[-1] = 'All years';
    for ($i = $options['from_year']; $i <= $options['to_year']; $i++) {
        $data_options[$i] = $i;
    }

    if (!isset($options['year'])) {
        $options['year'] = $options['to_year'];
    }

    return form_dropdown($options['combo_name'], $data_options, $options['year'], $options['extra']);
}

/**
 * @param array $options
 * @return string
 */
function get_months_combo($options = array())
{

    if (!isset($options['combo_name'])) {
        $options['combo_name'] = 'month';
    }
    if (!isset($options['extra'])) {
        $options['extra'] = '';
    }

    $data_options = array();
    $data_options[-1] = 'All months';
    for ($i = 1; $i <= 12; $i++) {
        $data_options[$i] = $i;
    }

    return form_dropdown($options['combo_name'], $data_options, $options['month'], $options['extra']);
}

/**
 * @param array $options
 * @return string
 */
function get_days_combo($options = array())
{

    if (!isset($options['combo_name'])) {
        $options['combo_name'] = 'day';
    }
    if (!isset($options['extra'])) {
        $options['extra'] = '';
    }

    $data_options = array();
    $data_options[-1] = 'All days';
    for ($i = 1; $i <= 31; $i++) {
        $data_options[$i] = $i;
    }

    return form_dropdown($options['combo_name'], $data_options, $options[$options['combo_name']], $options['extra']);
}

/**
 * Add day/week/month to a particular date
 * @param $date yyyy-mm-dd
 * @param $day integer
 * @return string
 */
function add_date($date, $day)
{ //add days
    $sum = strtotime(date("Y-m-d H:i:s", strtotime("$date")) . " +$day days");
    $dateTo = date('Y-m-d H:i:s', $sum);
    return $dateTo;
}

/**
 * @param $old_date
 * @param $new_date
 * @return int Return the different days between 2 date
 */
function my_date_diff($old_date, $new_date)
{
    $offset = strtotime($new_date . " UTC") - strtotime($old_date . " UTC");
    return (int)($offset / 60 / 60 / 24);
}

function get_vndate_string($input) {
    if (empty($input))
        return $input;

    $today = strtotime(date('Ymd H:i:s'));
    if (!is_numeric($input))
        $input = strtotime($input);
    // Nếu tin được đăng trong 3 ngày gần nhất thì hiện màu đỏ
    if (date("Ymd", $input) >= date("Ymd", $today - 60 * 60 * 24 * 2)) {
        if (date("Ymd", $input) == date("Ymd", $today))
            return '<span style="color: red;">' . 'Hôm nay lúc '. date("H:i", $input) . '</span>';
        else if (date("Ymd", $input) == date("Ymd", $today - 60 * 60 * 24))
            return '<span style="color: green;">'. 'Hôm qua' .'</span>';
        else
            return '<span style="color: blue;">'. 'Hôm kia' .'</span>';
    }
    // Nếu tin đăng trong năm hiện tại thì hiện tháng và ngày
    if (date("Y", $input) == date("Y", $today)) {
        return date("d/m", $input);
    }
    // Các năm khác thì hiện đầy đủ
    else {
        return date("d/m/y", $input);
    }
}
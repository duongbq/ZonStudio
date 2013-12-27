<?php

/**
 * Created by JetBrains PhpStorm.
 * User: duongbq
 * Date: 1/31/13
 * Time: 9:30 AM
 * To change this template use File | Settings | File Templates.
 */
class Mdl_file extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');

        $this->_table_name = 'files';
    }

    /**
     * Set where conditions for select query
     */
    private function _set_where($params = array()) {
        if (isset($params['id'])) {
            $this->db->where('id', $params['id']);
        }
        if (isset($params['package_id'])) {
            $this->db->where('package_id', $params['package_id']);
        }
        if (isset($params['is_slide'])) {
            $this->db->where('is_slide', $params['is_slide']);
        }
        if (isset($params['is_home_display'])) {
            $this->db->where('is_home_display', $params['is_home_display']);
        }
        if (isset($params['home_display_index'])) {
            $this->db->where('home_display_index', $params['home_display_index']);
        }
        if (isset($params['file_name'])) {
            $this->db->where('file_name', $params['file_name']);
        }
    }

    /**
     * @param array $params
     * @return objects(result set) array
     */
    function get_files($params = array()) {
        $this->_set_where($params);

        if (isset($params['order_by'])) {

            $this->db->order_by($params['order_by']);
        } else {
            $this->db->order_by('uploaded_date', 'desc');
        }
        return $this->db->get($this->_table_name)->result();
    }

    /**
     * @param array $params
     * @return array
     */
    function get_files_array($params = array()) {
        $files = $this->get_files($params);
        $output = array();
        foreach ($files as $file) {
            $output[$file->id] = $file->file_name;
        }
        return $output;
    }

    /**
     * @param array $data
     * @return id of record that has just inserted
     */
    function add_file($data = array()) {
        $this->db->insert($this->_table_name, $data);
        return $this->db->insert_id();
    }

    /**
     * @param array $options
     * @return null
     */
    public function delete_file($options = array()) {
        // Get file
        $files = $this->get_files(array('id' => $options['file_id']));
        if (count($files) == 1) {
            // delete data from DB
            $this->db->where('id', $options['file_id']);
            $this->db->delete($this->_table_name);
            // physically delete image file
            $config = $this->_config_upload();
            //Delete origin file
            if (file_exists($config['upload_path'] . $options['folder_name'] . '/' . $files[0]->file_name)) {
                unlink($config['upload_path'] . $options['folder_name'] . '/' . $files[0]->file_name);
            }

            //Delete thumbnail file
            if (file_exists($config['upload_path'] . $options['folder_name'] . '/thumb/' . $files[0]->file_name)) {
                unlink($config['upload_path'] . $options['folder_name'] . '/thumb/' . $files[0]->file_name);
            }
        }
    }

    /**
     * @param array $options
     * @return id
     */
    public function upload_file($options = array()) {
        $config = $this->_config_upload($options);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            return $this->upload->display_errors();
        } else {
            //Upload file to server
            $data = $this->upload->data();
            //Create directory if not existed
            $spec_dir = $config['upload_path'] . $options['folder_name'];
            $this->_create_directory($spec_dir);
            //Upload file is located by default in upload path
            $uploaded_file = $config['upload_path'] . $data['file_name'];
            //Rename with unique string
            $new_file_name = random_string('unique', date('YmdHis')) . $data['file_ext'];
            //Copy to specify folder
            copy($uploaded_file, $spec_dir . '/' . $new_file_name);
            //If params['img_process'] is set
            if (isset($options['img_process'])) {
                $this->_process_image($spec_dir . '/' . $new_file_name, $options);
                if (isset($options['thumbnail'])) {
                    $thumb_dir = $spec_dir . '/thumb';
                    $this->_create_directory($thumb_dir);
                    copy($spec_dir . '/' . $new_file_name, $thumb_dir . '/' . $new_file_name);
                    $this->_process_image($thumb_dir . '/' . $new_file_name, $options);
                }
            }
            //Delete origin file from upload path
            unlink($uploaded_file);
            //save to DB and return File ID
            return $this->add_file(array('file_name' => $new_file_name));
        }
    }

    function upload_multi_files($options = array()) {

        $config = $this->_config_upload($options);

        $uploaded_files = array();

        foreach ($_FILES['userfile']['error'] as $key => $error) {
            //Nếu không có lỗi 
            if ($error == UPLOAD_ERR_OK) {

                $file_name = $_FILES['userfile']['name'][$key];

                move_uploaded_file($_FILES['userfile']['tmp_name'][$key], $config['upload_path'] . $file_name);

                $spec_dir = $config['upload_path'] . $options['folder_name'];
                $this->_create_directory($spec_dir);

                $uploaded_file = $config['upload_path'] . $file_name;
                $new_file_name = random_string('unique', date('YmdHis')) . '.' . pathinfo($uploaded_file, PATHINFO_EXTENSION);

                copy($uploaded_file, $spec_dir . '/' . $new_file_name);
                unlink($uploaded_file);

                $file_id = $this->add_file(array('file_name' => $new_file_name));

//                $uploaded_files[$file_id] = $new_file_name;
                array_push($uploaded_files, $file_id);
            }
        }

        return $uploaded_files;
    }

    /**
     * @param array $options
     * @return array
     */
    private function _config_upload($options = array()) {
        $config = array();
        //@Fixme Default upload_path should be received in settings module
        $config['upload_path'] = './uploads/';
        //@Fixme Default allowed_types should be received in settings module
        $config['allowed_types'] = isset($options['allowed_types']) ? $options['allowed_types'] : 'gif|jpg|png';
        //@Fixme
        $config['max_size'] = isset($options['max_size']) ? $options['max_size'] : 1024;
        $config['encrypt_name'] = TRUE;
        //Config images processing
        $config['image_library'] = 'gd2';
//        $config['source_image'] = $config['upload_path'] . $image['file_name'];
        $config['maintain_ratio'] = TRUE;
//        $config['maintain_ratio'] = isset($options['maintain_ratio']) ? TRUE : FALSE;

        $config['width'] = isset($options['width']) ? $options['width'] : 400;
        $config['height'] = isset($options['height']) ? $options['height'] : 300;
        $config['thumb_width'] = isset($options['thumb_width']) ? $options['thumb_width'] : 40;
        $config['thumb_height'] = isset($options['thumb_height']) ? $options['thumb_height'] : 30;

        return $config;
    }

    /**
     * @param $directory
     */
    private function _create_directory($directory) {
        if (!file_exists($directory))
            mkdir($directory);
    }

    /**
     * @param $image_file
     * @param array $options
     * @return void
     */
    private function _process_image($image_file, $options = array()) {
        $this->load->library('image_lib');
        $config = $this->_config_upload($options);
        $config['source_image'] = $image_file;
        $size = getimagesize($image_file);
        if ($size[0] < $size[1]) {
            $config['width'] = $size[1];
            $config['height'] = $size[0];
        }
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    function update_home_display_index($image_id = 0, $index = 0) {

        $image = $this->get_files(array('home_display_index' => $index));
        if (count($image) == 1) {
            $this->update(array('id' => $image[0]->id, 'home_display_index' => 0));
        }

        $this->update(array('id' => $image_id, 'home_display_index' => $index));
    }

}

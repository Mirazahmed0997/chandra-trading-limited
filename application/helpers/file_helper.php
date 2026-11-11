<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('update_file')) {
    function update_file($field_name, $upload_path, $old_file = '', $allowed_types = '*') {
        $CI =& get_instance();

        if (!empty($_FILES[$field_name]['name'])) {
            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = $allowed_types;
            $config['file_name']     = time() . '_' . str_replace(' ', '_', $_FILES[$field_name]['name']);

            $CI->load->library('upload');
            $CI->upload->initialize($config);

            if ($CI->upload->do_upload($field_name)) {
                $uploadData = $CI->upload->data();
                $new_file = $uploadData['file_name'];

                if (!empty($old_file) && file_exists($upload_path . $old_file)) {
                    @unlink($upload_path . $old_file);
                }

                return $new_file;
            }
        }

        return $old_file;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('has_menu_access')) {

    function has_menu_access($menu_key)
    {

        $CI =& get_instance();

        $user = $CI->session->userdata('login_user_info_all');

        $user_id=$user->id;

        
        if (!$user) {
            return false;
        }

        $exists = $CI->db
            ->where('user_id', $user_id)
            ->where('menu_key', $menu_key)
            ->get('user_menu_access')
            ->num_rows();

        return $exists > 0;
    }
}

?>
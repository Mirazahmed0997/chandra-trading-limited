<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard extends CI_Controller
{

    private $main_layout = 'user_dashboard/master_layout';
    private $side_menu = 'user_dashboard/side_menu';
    private $serverDateTime = '';




    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login_user_info_all')) {

            $this->session->set_flashdata('login_failed', 'Please login first');

            redirect('user_login_form');
        }
    }


    public function index()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        // $data['member_count'] = $this->db->count_all('members_table');

        $path = 'user_dashboard/dashboard';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


     public function deposit_vouchar()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $path = 'admin/reciepts/deposit_vouchar';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }
    public function cost_vouchar()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $path = 'admin/reciepts/cost_vouchar';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


}
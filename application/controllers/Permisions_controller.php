<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisions_controller extends CI_Controller
{

    private $main_layout = 'applicant/master_layout';
    private $side_menu = 'applicant/side_menu';
    private $serverDateTime = '';




    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login_user_info_all')) {

            $this->session->set_flashdata('login_failed', 'Please login first');

            redirect('member_login');
        }
    }




    public function permisssions_form()
    {
        $data = $this->engine->store_nav('permisssions_form', 'permisssions_form', 'ফরম');

        $path = "applicant/permissions_table/permissions_form";
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function create_permission()
    {
        $login_user = $this->session->userdata('login_user_info_all');

        if (!$login_user) {
            redirect('admin');
        }

        $data = array(
            'per_identification' => $this->input->post('per_identification'),
            'per_name' => $this->input->post('per_name'),
            'per_type' => $this->input->post('per_type'),
            'per_extra_type' => $this->input->post('per_extra_type'),
            'per_amount1' => $this->input->post('per_amount1'),
            'per_amount2' => $this->input->post('per_amount2'),
            'per_status' => $this->input->post('per_status'),
            'per_server_status' => $this->input->post('per_server_status'),
            'per_branch_code' => $this->input->post('per_branch_code'),
            'per_account_type' => $this->input->post('per_account_type'),
            'per_online_offline_submit' => $this->input->post('per_online_offline_submit'),

            'per_created_by' => $login_user->id,

        );

        $this->db->insert('permissions', $data);

        $this->session->set_flashdata('success', 'Permission created successfully!');

        redirect("permisssions");
    }


    public function permissions_list()
    {
        $data = $this->engine->store_nav('permissions_list', 'permissions_list', 'Permission List');

        $login_user = $this->session->userdata('login_user_info_all');

        if (!$login_user) {
            redirect('admin');
        }

        $where_data = array();

        $per_id = $this->input->get('per_id');
        $per_identification = $this->input->get('per_identification');
        $per_name = $this->input->get('per_name');
        $per_type = $this->input->get('per_type');
        $per_status = $this->input->get('per_status');
        $per_branch_code = $this->input->get('per_branch_code');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $order_by = $this->input->get('order_by');
        $order_column = $this->input->get('order_column');

        $allowed_columns = ['per_amount1', 'per_amount2', 'per_id'];

        if (!in_array($order_column, $allowed_columns)) {
            $order_column = 'per_amount2';
        }

        if ($order_by != 'asc' && $order_by != 'desc') {
            $order_by = 'desc';
        }

        // echo '<pre>';
        // print_r($order_by);
        // exit;

        if (!empty($per_id)) {
            $where_data['per_id'] = $per_id;
        }

        if (!empty($per_identification)) {
            $where_data['per_identification'] = $per_identification;
        }

        if (!empty($per_name)) {
            $this->db->like('per_name', $per_name);
        }

        if (!empty($per_type)) {
            $where_data['per_type'] = $per_type;
        }

        if (!empty($per_status)) {
            $where_data['per_status'] = $per_status;
        }

        if (!empty($per_branch_code)) {
            $where_data['per_branch_code'] = $per_branch_code;
        }

        if (!empty($where_data)) {
            $this->db->where($where_data);
        }

        if (!empty($from_date)) {
            $this->db->where('per_created_at >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('per_created_at <=', $to_date);
        }

        $this->db->order_by($order_column, $order_by);

        $data['permissions'] = $this->db->get('permissions')->result();


        $path = 'applicant/permissions_table/permissions_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    public function daily_installment_list()
    {
        $data = $this->engine->store_nav('permissions_list', 'permissions_list', 'Permission List');

        $login_user = $this->session->userdata('login_user_info_all');

        if (!$login_user) {
            redirect('admin');
        }

        $where_data = array();

        $per_id = $this->input->get('per_id');
        $per_identification = $this->input->get('per_identification');
        $per_name = $this->input->get('per_name');
        $per_type = $this->input->get('per_type');
        $per_status = $this->input->get('per_status');
        $per_branch_code = $this->input->get('per_branch_code');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $order_by = $this->input->get('order_by');
        $order_column = $this->input->get('order_column');

        $allowed_columns = ['per_amount1', 'per_amount2', 'per_id'];

        if (!in_array($order_column, $allowed_columns)) {
            $order_column = 'per_amount2';
        }

        if ($order_by != 'asc' && $order_by != 'desc') {
            $order_by = 'desc';
        }

        // echo '<pre>';
        // print_r($order_by);
        // exit;

        if (!empty($per_id)) {
            $where_data['per_id'] = $per_id;
        }

        if (!empty($per_identification)) {
            $where_data['per_identification'] = $per_identification;
        }

        if (!empty($per_name)) {
            $this->db->like('per_name', $per_name);
        }

        if (!empty($per_type)) {
            $where_data['per_type'] = $per_type;
        }

        if (!empty($per_status)) {
            $where_data['per_status'] = $per_status;
        }

        if (!empty($per_branch_code)) {
            $where_data['per_branch_code'] = $per_branch_code;
        }

        if (!empty($where_data)) {
            $this->db->where($where_data);
        }

        if (!empty($from_date)) {
            $this->db->where('per_created_at >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('per_created_at <=', $to_date);
        }

        $this->db->order_by($order_column, $order_by);

        $data['permissions'] = $this->db->get('permissions')->result();


        $path = 'applicant/permissions_table/daily_installment_list';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function edit_permission($id)
    {


        $data = $this->engine->store_nav('edit_permission', 'edit_permission', 'edit_permission_form');



        $this->db->where('per_id', $id);
        $data['permission'] = $this->db->get('permissions')->row();

        // echo '<pre>';
        // print_r($data);
        // exit;

        if (!$data['permission']) {
            show_404();
        }

        $path = 'applicant/permissions_table/permissions_update_form';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function permission_details($id)
    {


        $data = $this->engine->store_nav('permission_details', 'permission_details', 'permission_details');



        $this->db->where('per_id', $id);
        $data['permission'] = $this->db->get('permissions')->row();

        // echo '<pre>';
        // print_r($data);
        // exit;

        if (!$data['permission']) {
            show_404();
        }

        $path = 'applicant/permissions_table/permission_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    public function update_permission()
    {
        $login_user = $this->session->userdata('login_user_info_all');

        if (!$login_user) {
            redirect('admin');
        }

        $per_id = $this->input->post('per_id');

        $data = array(
            'per_identification' => $this->input->post('per_identification'),
            'per_name' => $this->input->post('per_name'),
            'per_type' => $this->input->post('per_type'),
            'per_extra_type' => $this->input->post('per_extra_type'),
            'per_amount1' => $this->input->post('per_amount1'),
            'per_amount2' => $this->input->post('per_amount2'),
            'per_status' => $this->input->post('per_status'),
            'per_server_status' => $this->input->post('per_server_status'),
            'per_branch_code' => $this->input->post('per_branch_code'),
            'per_account_type' => $this->input->post('per_account_type'),

            'per_updated_by' => $login_user->id
        );

        $this->db->where('per_id', $per_id);
        $this->db->update('permissions', $data);

        $this->session->set_flashdata('success', 'Permission updated successfully!');

        redirect('permisssions');
    }



    public function delete_permission($id)
    {
        $this->Common->delete_data('permissions', 'per_id', $id);
        redirect('permisssions');
    }



    public function installment()
    {
        $data = $this->engine->store_nav('edit_permission', 'edit_permission', 'edit_permission_form');
        $path='applicant/permissions_table/installment_amount_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);


        // $this->load->view('applicant/permissions_table/permissions_table');
    }
    public function due_list()
    {
        $data = $this->engine->store_nav('edit_permission', 'edit_permission', 'edit_permission_form');
        $path='applicant/permissions_table/due_list';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    public function due_list_details()
    {
        $data = $this->engine->store_nav('edit_permission', 'edit_permission', 'edit_permission_form');
        $path='applicant/permissions_table/due_list_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


}
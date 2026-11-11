<?php

use LDAP\Result;
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Accounts extends CI_Controller
{

    private $main_layout = 'admin/master_layout';
    private $side_menu = 'admin/side_menu';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
        $date = new DateTime();
        $this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
        // Check if user is logged in
        $user = $this->session->userdata('login_user_info_all');
        if (!$user) {
            $this->session->set_flashdata('login_failed', 'Please login first');
            redirect('admin');
            return;
        }

        // Check role
        if (!in_array($user->role, ['admin', 'super_admin'])) {
            // $this->session->set_flashdata('error', 'আপনার এই পৃষ্ঠাটি অ্যাক্সেস করার অনুমতি নেই। অনুগ্রহ করে আপনার অ্যাডমিন ক্রেডেনশিয়াল দিয়ে লগইন করুন।');
            redirect('home');
            return;
        }



    }

    private function _apply_property_filters_projects(array $filters)
    {
        if ($filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('project_name', $filters['search']);
            $this->db->or_like('project_id', $filters['search']);
            $this->db->or_like('status', $filters['search']);
            $this->db->or_like('address', $filters['search']);
            $this->db->group_end();
        }

        if ($filters['project_id'] !== '') {
            $this->db->where('project_id', $filters['project_id']);
        }

        if ($filters['project_name'] !== '') {
            $this->db->where('project_name', $filters['project_name']);
        }

        if ($filters['status'] !== '') {
            $this->db->where('status', $filters['status']);
        }
        if ($filters['address'] !== '') {
            $this->db->where('address', $filters['address']);
        }
    }

    public function check_access($menu)
    {
        // echo '<pre>';
        // print_r($menu);
        // echo '</pre>';
        // exit;
        $user = $this->session->userdata('login_user_info_all');
        $hasAccess = $this->db
            ->where('user_id', $user->id)
            ->where('menu_key', $menu) // Your menu key
            ->count_all_results('user_menu_access');

        if ($hasAccess == 0) {
            $this->session->set_flashdata('access_error', "You don't have access.");
            redirect('admin/users_list/users_list');
            exit;
        }
    }


    private function upload_file($field_name, $file_path)
    {
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($field_name)) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            return '';
        }
    }



    public function accountHeadForm()
    {
        $this->check_access('Account Head Management');
        $data = $this->engine->store_nav(
            'projects cost',
            'projects cost',
            'Project costs'
        );

        $path = "admin/DepositExpenseAccountHeadManagement/accountHeadForm";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function Deposit_Expense_Account_HeadManagement_Save()
    {
        $this->check_access('Account Head Management');
        $loggedUser = $this->session->userdata('login_user_info_all');



        $account_head_name = trim($this->input->post('account_head_name'));
        $account_type = trim($this->input->post('account_type'));
        $account_code = trim($this->input->post('account_code'));
        $category = trim($this->input->post('category'));

        $data = array(

            'account_head_name' => $account_head_name,
            'account_type' => $account_type,
            'account_code' => $account_code,
            'category' => $category,
            'created_at' => date('Y-m-d H:i:s')
        );


        $insert = $this->db
            ->insert('account_heads', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'account_heads_success',
                'account_heads added successfully.'
            );

            redirect('DepositExpenseAccountHeadManagement');

        } else {

            $this->session->set_flashdata(
                'account_heads_error',
                'Unable to save property. Please try again.'
            );

            redirect('accountHeadForm');
        }
    }
    public function DepositExpenseAccountHeadManagement()
    {
        $this->check_access('Account Head Management');
        $data = $this->engine->store_nav(
            'head list',
            'head list',
            'head list'
        );


        $where_data = array();

        $account_head_name = $this->input->get('account_head_name');
        $account_type = $this->input->get('account_type');
        $account_code = $this->input->get('account_code');

        if (!empty($account_head_name)) {
            $where_data['account_head_name'] = $account_head_name;
        }

        if (!empty($account_type)) {
            $where_data['account_type'] = $account_type;
        }
        if (!empty($account_code)) {
            $where_data['account_code'] = $account_code;
        }



        if (!empty($where_data)) {
            $this->db->where($where_data);
        }



        $data['account_heads'] = $this->db->get('account_heads')->result();


        $path = "admin/DepositExpenseAccountHeadManagement/DepositExpenseAccountHeadManagement";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function delete_accountHead($id)
    {
        $this->check_access('Account Head Management');
        $this->Common->delete_data('account_heads', 'id', $id);
        redirect('DepositExpenseAccountHeadManagement');
    }

    public function create_debit_credit_form($type = '')
    {
        $this->check_access("Project {$type} Vouchar");
        $data = $this->engine->store_nav(
            'projects cost',
            'projects cost',
            'Project costs'
        );

        $data['projects'] = $this->db->get('projects')->result();

        $data['account_heads'] = $this->db->where('account_type', $type)->get('account_heads')->result();
        $data['type'] = $type;


        $path = "admin/accounts/add_cost";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function create_debit_credit()
    {
        // $this->check_access("Project {$type} Vouchar");
        $project_id = $this->input->post('project_id');

        $account_head = $this->input->post('account_head');
        $amount_words = $this->input->post('amount_words');
        $share_holder_no = $this->input->post('share_holder_no');
        $name = $this->input->post('name');
        $father_or_hausband = $this->input->post('father_or_hausband');
        $address = $this->input->post('address');
        $amount = $this->input->post('amount');
        // $additional_cost = $this->input->post('additional_cost');
        $descriptions = trim($this->input->post('descriptions'));
        $method = $this->input->post('method');

        $date = date('d-m-Y');

        $document = $this->upload_file('document', './assets/uploads/accounts_attachments/');
        $user = $this->session->userdata('login_user_info_all');
        $created_by = $user->username;

        $account = $this->Common->get_data_single_conditional('account_heads', 'account_code', $account_head)->row();
        $count = $this->db->count_all_results('a_account') + 1;

        $account_type = $account->account_type;
        $account_head_name = $account->account_head_name;
        if ($project_id === null || $project_id === '') {
            $vouchar_no = 'CTL' . '/' . $account->account_code . '/' . $count;
        } else {
            $vouchar_no = 'CTL' . '/' . $project_id . '/' . $count;
        }

        // echo '<pre>';
        // print_r($count);
        // echo '</pre>';
        // exit;


        $data = array(
            'project_id' => $project_id ?? 'NA',
            'account_head' => $account_head,
            'amount' => $amount,
            'amount_words' => $amount_words,
            'share_holder_no' => $share_holder_no,
            'name' => $name,
            'father_or_hausband' => $father_or_hausband,
            'address' => $address,
            // 'additional_cost' => $additional_cost,
            'descriptions' => $descriptions,
            'method' => $method,
            'account_type' => $account_type,
            'account_head_name' => $account_head_name,
            'vouchar_no' => $vouchar_no,


            'document' => $document,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $created_by,
        );

        $this->db->insert('a_account', $data);

        $this->session->set_flashdata('success', 'Submitted successfully!');
        if ($project_id === null || $project_id === '') {
            redirect("office_expenses_list");
        } else {
            redirect("projects_cost/".$account_type);
        }
    }


    public function projects_cost($type = '')
    {
        if($type=='Pending'){
            $this->check_access("Pending Vouchars");
        }else{
            $this->check_access("Project {$type} Vouchar");
        }
        $data = $this->engine->store_nav(
            'projects cost',
            'projects cost',
            'Project costs'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'project_id' => trim((string) $this->input->get('project_id', TRUE)),
            'account_head' => trim((string) $this->input->get('account_head', TRUE)),
            'from_date' => $this->input->get('from_date', TRUE),
            'to_date' => $this->input->get('to_date', TRUE)
        );

        $per_page = 10;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_property_filters($filters);
        $total_rows = $this->db->where('account_type', $type)->count_all_results('a_account');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('projects_cost'),
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'page_query_string' => TRUE,
            'query_string_segment' => 'page',
            'reuse_query_string' => TRUE,
            'use_page_numbers' => FALSE,
            'full_tag_open' => '<ul class="pagination pagination-sm mb-0">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'attributes' => array('class' => 'page-link')
        );

        $this->pagination->initialize($config);

        if ($type == 'Pending') {
            $this->_apply_property_filters($filters);
            $this->db->order_by('id', 'asc');
            $this->db->limit($per_page, $page);
            $this->db->where('status', $type);
            $data['a_accounts'] = $this->db->get('a_account')->result();
        } else {
            $this->_apply_property_filters($filters);
            $this->db->order_by('id', 'asc');
            $this->db->limit($per_page, $page);
            $this->db->where('account_type', $type);
            $data['a_accounts'] = $this->db->get('a_account')->result();
        }

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['type'] = $type;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $path = "admin/accounts/projects_cost";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function vouchars($id)
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        if (empty($id)) {
            redirect(base_url('projects_cost'));
        }


        // Fetch the specific news
        $data['account'] = $this->Common->get_data_single_conditional('a_account', 'id', $id)->row();
        $account_type = $data['account']->account_type;
        // echo '<pre>';
        // print_r($data['account']);
        // echo '</pre>';
        // exit;

        if (!$data['account']) {
            show_404();
        }
        if ($account_type == 'Deposit') {
            $path = 'admin/reciepts/deposit_vouchar';
        } else {
            $path = 'admin/reciepts/cost_vouchar';
        }


        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function accept_account($id)
    {

        $update_data = [

            'status' => 'Accepted'
        ];


        $this->db->where('id', $id);
        $this->db->update('a_account', $update_data);

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deposit_vouchar($id)
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
    public function cost_vouchar($id)
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


    public function transactions()
    {
        // $this->check_access('Project Deposite/Expense Management');
        $data = $this->engine->store_nav(
            'transactions',
            'transactions',
            'transactions'
        );


        // $account_types = $this->db
        //     ->select('account_type')
        //     ->from('a_account')
        //     ->group_by('account_type')
        //     ->order_by('account_type', 'ASC')
        //     ->get()
        //     ->result();

        // echo '<pre>';
        // print_r($account_types);
        // echo '</pre>';
        // exit;



        $path = "admin/accounts/transactions";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function transactions_table($type = '')
    {



        // $this->check_access('Project Deposite/Expense Management');
        $data = $this->engine->store_nav(
            'transaction_table',
            'transaction_table',
            'transaction_table'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'project_id' => trim((string) $this->input->get('project_id', TRUE)),
            'account_head' => trim((string) $this->input->get('account_head', TRUE)),
            'from_date' => $this->input->get('from_date', TRUE),
            'to_date' => $this->input->get('to_date', TRUE)
        );

        $per_page = 10;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_property_filters($filters);
        $total_rows = $this->db->where('account_type', $type)->count_all_results('a_account');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('projects_cost'),
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'page_query_string' => TRUE,
            'query_string_segment' => 'page',
            'reuse_query_string' => TRUE,
            'use_page_numbers' => FALSE,
            'full_tag_open' => '<ul class="pagination pagination-sm mb-0">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'attributes' => array('class' => 'page-link')
        );

        $this->pagination->initialize($config);

        if ($type == 'Transactions') {
            $this->_apply_property_filters($filters);
            $this->db->order_by('id', 'asc');
            $this->db->limit($per_page, $page);
            $data['a_accounts'] = $this->db->get('a_account')->result();
        } else {
            $this->_apply_property_filters($filters);
            $this->db->order_by('id', 'asc');
            $this->db->where('account_type', $type);
            $this->db->limit($per_page, $page);
            $data['a_accounts'] = $this->db->get('a_account')->result();
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['type'] = $type;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;





        $path = "admin/accounts/transaction_table";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function projects_expenses($id = '')
    {



        $this->check_access('Project Deposite/Expense Management');
        $data = $this->engine->store_nav(
            'transaction_table',
            'transaction_table',
            'transaction_table'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'project_id' => trim((string) $this->input->get('project_id', TRUE)),
            'account_head' => trim((string) $this->input->get('account_head', TRUE)),
            'from_date' => $this->input->get('from_date', TRUE),
            'to_date' => $this->input->get('to_date', TRUE)
        );

        $per_page = 10;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_property_filters($filters);
        $total_rows = $this->db->where('project_id', $id)->count_all_results('a_account');

        $project = $this->db->where('project_id', $id)
            ->get('projects')->result();

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('projects_cost'),
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'page_query_string' => TRUE,
            'query_string_segment' => 'page',
            'reuse_query_string' => TRUE,
            'use_page_numbers' => FALSE,
            'full_tag_open' => '<ul class="pagination pagination-sm mb-0">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'attributes' => array('class' => 'page-link')
        );

        $this->pagination->initialize($config);

        $this->_apply_property_filters($filters);
        $this->db->order_by('id', 'asc');
        $this->db->where('project_id', $id);
        $this->db->limit($per_page, $page);
        $data['a_accounts'] = $this->db->get('a_account')->result();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['project'] = $project;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;





        $path = "admin/accounts/projects_expenses";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }



    public function office_expenses()
    {
        $this->check_access('Office Expense Managment');
        $data = $this->engine->store_nav(
            'projects cost',
            'projects cost',
            'Project costs'
        );

        $data['account_heads'] = $this->db
            ->where('account_type', 'Expense')
            ->get('account_heads')
            ->result();

        $path = "admin/accounts/office_expenses_form";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }



    public function office_expenses_list()
    {
        $this->check_access('Office Expense Managment');
        $data = $this->engine->store_nav(
            'projects cost',
            'projects cost',
            'Project costs'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'project_id' => trim((string) $this->input->get('project_id', TRUE)),
            'account_head' => trim((string) $this->input->get('account_head', TRUE)),
            'from_date' => $this->input->get('from_date', TRUE),
            'to_date' => $this->input->get('to_date', TRUE)
        );

        $per_page = 10;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_property_filters($filters);
        $total_rows = $this->db->where('project_id', 'NA')->count_all_results('a_account');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('projects_cost'),
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'page_query_string' => TRUE,
            'query_string_segment' => 'page',
            'reuse_query_string' => TRUE,
            'use_page_numbers' => FALSE,
            'full_tag_open' => '<ul class="pagination pagination-sm mb-0">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',
            'attributes' => array('class' => 'page-link')
        );

        $this->pagination->initialize($config);

        $this->_apply_property_filters($filters);
        $data['a_accounts'] = $this->db
            ->where('project_id', 'NA')
            ->order_by('id', 'ASC')
            ->limit($per_page, $page)
            ->get('a_account')
            ->result();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $path = "admin/accounts/office_expenses";
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }




    private function _apply_property_filters(array $filters)
    {
        if ($filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('project_id', $filters['search']);
            $this->db->or_like('account_head', $filters['search']);
            $this->db->group_end();
        }

        if ($filters['project_id'] !== '') {
            $this->db->where('project_id', $filters['project_id']);
        }

        if ($filters['account_head'] !== '') {
            $this->db->where('account_head', $filters['account_head']);
        }

        if (!empty($filters['from_date'])) {
            $this->db->where('DATE(created_at) >=', $filters['from_date']);
        }

        if (!empty($filters['to_date'])) {
            $this->db->where('DATE(created_at) <=', $filters['to_date']);
        }
    }

}
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


    public function DepositExpenseAccountHeadManagement()
    {
        $this->check_access('Deposit/Expense Account Head Management');
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
    public function accountHeadForm()
    {
        $this->check_access('Deposit/Expense Account Head Management');
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
        $this->check_access('Deposit/Expense Account Head Management');
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

    public function delete_accountHead($id)
	{
		$this->check_access('Deposit/Expense Account Head Management');
		$this->Common->delete_data('account_heads', 'id', $id);
		redirect('DepositExpenseAccountHeadManagement');
	}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller
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



    public function my_orders()
    {
        $data = $this->engine->store_nav('my_orders', 'my_orders', 'তালিকা');

        $login_user = $this->session->userdata('login_user_info_all');

        if (!$login_user) {
            redirect('member_login');
        }


        $this->db->where('user_id', $login_user->id);


        $where_data = array();

        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $mobile_number = $this->input->get('mobile_number');
        $address = $this->input->get('address');
        $status = $this->input->get('status');
        $payment_method = $this->input->get('payment_method');
        $total_amount = $this->input->get('total_amount');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }

        if (!empty($name)) {
            $where_data['name'] = $name;
        }

        if (!empty($mobile_number)) {
            $where_data['mobile_number'] = $mobile_number;
        }

        if (!empty($address)) {
            $where_data['address'] = $address;
        }


        if (!empty($status)) {
            $where_data['status'] = $status;
        }

        if (!empty($total_amount)) {
            $where_data['total_amount'] = $total_amount;
        }
        if (!empty($payment_method)) {
            $where_data['payment_method'] = $payment_method;
        }



        if (!empty($where_data)) {
            $this->db->where($where_data);
        }

        if (!empty($from_date)) {
            $this->db->where('created_at >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('created_at <=', $to_date);
        }

        // $data['orders'] = $this->db->get('orders_table')->result();
        $data['orders'] = $this->db
            ->order_by('id', 'asc')
            ->get('orders_table')
            ->result();

        $path = 'applicant/orders_table/orders_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);


    }

    public function order_details($order_id)
    {
        $this->db->where('id', $order_id);
        $data = $this->engine->store_nav('my_orders', 'my_orders', 'তালিকা');
        $data['orders'] = $this->db->get_where('orders_table', [
            'id' => $order_id
        ])->row();

        $this->db->select('order_items.*, products.title');
        $this->db->from('order_items');
        $this->db->join('products', 'products.id = order_items.product_id');
        $this->db->where('order_items.order_id', $order_id);



        $data['items'] = $this->db->get()->result();

        // $this->load->view('order_details', $data);
        $path = 'applicant/orders_table/orders_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    public function members_count()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

        $data['member_count'] = $this->db->count_all('members_n');

        $path = 'applicant/dashboard';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -------------------single member---------------------

    public function view_member($id = null)
    {
        if (empty($id)) {
            redirect(base_url('Applicant/members_list'));
        }

        $data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

        // Fetch the specific member
        $data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

        //  Check if member exists
        if (!$data['member']) {
            show_404();
        }

        //  Render the member details inside dashboard layout
        $path = 'Applicant/members_list/member_Details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }





    // -------------------member account details---------------------

    public function members_account($id = null)
    {
        $data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

        // OPTIONAL: comment this for now
        // if (empty($id)) {
        //     redirect(base_url('Applicant/members_list'));
        // }

        // OPTIONAL: disable DB check for now
        // $data['member'] = ...
        // if (!$data['member']) {
        //     show_404();
        // }

        $path = 'applicant/members_list/members_accounts_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    // -------------------Form View---------------------

    public function form_view($id = null)
    {
        if (empty($id)) {
            redirect(base_url('Applicant/members_list'));
        }

        //  Set dashboard navigation & page title
        $data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

        // Fetch the specific member
        $data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

        if (!$data['member']) {
            show_404();
        }

        //  Render the member details inside dashboard layout
        $path = 'Applicant/members_list/form_view';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // ---------------------get all members-----------------


    public function members_list()
    {
        $data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য তালিকা');

        $login_user = $this->session->userdata('login_user_info_all');

        if (!$login_user) {
            redirect('member_login');
        }


        $this->db->where('id', $login_user->id);


        $where_data = array();

        $id = $this->input->get('id');
        $branch_registration_no = $this->input->get('branch_registration_no');
        $mobile_number = $this->input->get('mobile_number');
        $branch_name = $this->input->get('branch_name');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }

        if (!empty($branch_registration_no)) {
            $where_data['branch_registration_no'] = $branch_registration_no;
        }

        if (!empty($mobile_number)) {
            $where_data['mobile_number'] = $mobile_number;
        }

        if (!empty($branch_name)) {
            $where_data['branch_name'] = $branch_name;
        }

        if (!empty($where_data)) {
            $this->db->where($where_data);
        }

        if (!empty($from_date)) {
            $this->db->where('created_at >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('created_at <=', $to_date);
        }

        $data['members'] = $this->db->get('members_n')->result();

        $path = 'applicant/members_list/members_list';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -------------------Update member details---------------------

    public function edit_member($id = null)
    {
        if (empty($id)) {
            redirect(base_url('Applicant/members_list'));
        }

        //  Set dashboard navigation & page title
        $data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

        // Fetch the specific member
        $data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

        //  Check if member exists
        if (!$data['member']) {
            show_404();
        }

        //  Render the member details inside dashboard layout
        $path = 'Applicant/members_list/updateForm';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // ---------------for payment----------

    public function payment_method()
    {
        $id = $this->input->post('member_id');

        $data = [
            'payment_status' => 'paid',
            'payment_year' => date('Y')
        ];

        $this->db->where('id', $id);
        $this->db->update('members_n', $data);

        echo "success";
    }


    // ---------------------Delete single members-----------------


    public function delete_member($id)
    {
        $this->Common->delete_data('members_n', 'id', $id);
        redirect('members');
    }
}
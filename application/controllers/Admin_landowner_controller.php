<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_landowner_controller extends CI_Controller
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
    public function landowners_query()
    {
        $this->check_access('Landowners');
        $data = $this->engine->store_nav(
            'Landowners',
            'Landowners',
            'landowners_query'
        );

        // Map inputs to consistent array keys matching table fields
        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'property_id' => trim((string) $this->input->get('property_id', TRUE)),
            'property_type' => trim((string) $this->input->get('property_type', TRUE)),
            'location' => trim((string) $this->input->get('location', TRUE)),
            'mobile' => trim((string) $this->input->get('mobile', TRUE)),
            'email' => trim((string) $this->input->get('email', TRUE)),
        );

        // Pagination setup
        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        // Total filtered records (using correct table name 'landowner_leads')
        $this->_apply_property_filters($filters);
        $total_rows = $this->db->count_all_results('landowner_leads');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('landowners_query'), // Fixed route URL
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

        // Fetch records
        $this->_apply_property_filters($filters);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $page);
        $data['landowner_leads'] = $this->db->get('landowner_leads')->result();

        // View data assignment
        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $path = 'admin/leads/landowner';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    private function _apply_property_filters(array $filters)
    {
        if (!empty($filters['search'])) {
            $this->db->group_start();
            $this->db->like('name', $filters['search']);
            $this->db->or_like('property_id', $filters['search']);
            $this->db->or_like('location', $filters['search']);
            $this->db->or_like('mobile', $filters['search']);
            $this->db->or_like('email', $filters['search']);
            $this->db->group_end();
        }

        if (!empty($filters['property_id'])) {
            $this->db->where('property_id', $filters['property_id']);
        }

        if (!empty($filters['property_type'])) {
            $this->db->where('property_type', $filters['property_type']);
        }

        if (!empty($filters['location'])) {
            $this->db->like('location', $filters['location']);
        }

        if (!empty($filters['mobile'])) {
            $this->db->like('mobile', $filters['mobile']);
        }

        if (!empty($filters['email'])) {
            $this->db->like('email', $filters['email']);
        }
    }


    public function landowners_query_details($id = NULL)
    {
        $this->check_access('Landowners');
        if (empty($id)) {
            show_404();
        }

        $this->db->where('id', $id);
        $landowner_leads = $this->db->get('landowner_leads')->row();

        if (!$landowner_leads) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'Landowners',
            'Landowners',
            'Landowners Details:' . $landowner_leads->name
        );

        $data['landowner_leads'] = $landowner_leads;

        $path = 'admin/leads/land_leads_details';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function update_land_query_status($id)
    {
        $this->check_access('Landowners');
        $query = $this->db->get_where('landowner_leads', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('landowner_leads', $update_data);

        redirect(base_url('landowners_query'));
    }

    public function delete_land_query($id)
    {
        $this->check_access('Landowners');
        $this->Common->delete_data('landowner_leads', 'id', $id);
        redirect('landowners_query');
    }


    public function contact_messages()
    {
        $this->check_access('General Inquiry');
        $data = $this->engine->store_nav(
            'contact_messages',
            'contact_messages',
            'contact_messages'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'full_name' => trim((string) $this->input->get('full_name', TRUE)),
            'phone ' => trim((string) $this->input->get('phone', TRUE)),
            'email ' => trim((string) $this->input->get('email ', TRUE)),
            'property_type' => trim((string) $this->input->get('property_type', TRUE)),
            'message' => trim((string) $this->input->get('message', TRUE)),
            'status' => trim((string) $this->input->get('status', TRUE)),
            'created_at ' => trim((string) $this->input->get('created_at ', TRUE)),
        );

        // Pagination setup
        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        // Total filtered records (using correct table name 'landowner_leads')
        $this->_apply_property_filters($filters);
        $total_rows = $this->db->count_all_results('contact_messages');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('contact_messages'), // Fixed route URL
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

        // Fetch records
        $this->_apply_property_filters($filters);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $page);
        $data['contact_messages'] = $this->db->get('contact_messages')->result();

        // View data assignment
        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $path = 'admin/leads/contact_message';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function contact_messages_details($id = NULL)
    {
        $this->check_access('General Inquiry');
        if (empty($id)) {
            show_404();
        }

        $this->db->where('id', $id);
        $contact_messages = $this->db->get('contact_messages')->row();

        if (!$contact_messages) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'contact messages',
            'contact messages',
            'contact messages Details:' . $contact_messages->full_name
        );

        $data['contact_messages'] = $contact_messages;

        $path = 'admin/leads/contact_messages_details';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function delete_contact_message($id)
    {
        $this->check_access('General Inquiry');
        $this->Common->delete_data('contact_messages', 'id', $id);
        redirect('contact_messages');
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





}
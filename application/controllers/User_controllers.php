<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controllers extends MY_Controller
{

    private $main_layout = 'site/master_layout';
    private $header = 'site/header';
    private $footer = 'site/footer';
    private $serverDateTime = '';

    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {
        $data = $this->engine->store_nav(
            'home',
            'home',
            'Chandra Trading Limited'
        );



        $filters = array(
            'property_type' => trim((string) $this->input->get('property_type', TRUE)),
            'location' => trim((string) $this->input->get('location', TRUE)),
            'min_price' => trim((string) $this->input->get('min_price', TRUE)),
            'max_price' => trim((string) $this->input->get('max_price', TRUE))
        );




        $this->_apply_property_filters($filters);

        $total_rows = $this->db->count_all_results('properties');




        $this->_apply_property_filters($filters);

        $this->db->where('status', 'Available');
        $this->db->order_by('id', 'DESC');

        $this->db->limit(5);

        $data['properties'] = $this->db->get('properties')->result();




        foreach ($filters as $key => $value) {
            $data[$key] = $value;
        }

        $data['total_rows'] = $total_rows;




        $path = 'site/pages/property_search_section';

        $this->engine->render_front_view(
            $data,
            $path,
            $this->header,
            $this->footer,
            $this->main_layout
        );
    }


    public function user_login_form()
    {
        $data = $this->engine->store_nav('login', 'Nothing', 'User Login');

        $path = "site/pages/user_registration/user_login_form";
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }


    public function user_login_process()
    {

        $userInfo = $this->input->post('userInfo');
        $password = $this->input->post('password');

        $this->db->group_start();
        $this->db->where('mobile_number', $userInfo);
        $this->db->or_where('email', $userInfo);
        $this->db->group_end();

        $user = $this->db->get('clients')->row();

        if ($user) {

            // if (password_verify($password, $user->password))
            if ($password == $user->password) {

                $this->session->set_userdata('current_type', 2);
                $this->session->set_userdata('login_user_info_all', $user);
                $this->session->set_flashdata('login_success', 'Successfully logged in');
                redirect(base_url());
                // redirect('members');

            } else {

                $this->session->set_flashdata('login_failed', 'Wrong Password');
                redirect('user_login_form');

            }

        } else {

            $this->session->set_flashdata('login_failed', 'Mobile number not found');
            redirect('user_login_form');
        }
    }

    public function user_logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }







    public function user_registration_form()
    {
        $data = $this->engine->store_nav('registration', 'Nothing', 'User Registration');

        $path = "site/pages/user_registration/user_registration_form";
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }

    public function user_registration_save()
    {

        $mobile_number = $this->input->post('mobile_number');
        $email = $this->input->post('email');


        $this->db->where('mobile_number', $mobile_number);
        $existing_member = $this->db->get('clients')->row();

        if ($existing_member) {
            $this->session->set_flashdata('reg_error', 'Already have account with this Mobile number');
            redirect('user_registration_form');
            return;
        }

        $this->db->where('email', $email);
        $existing_member = $this->db->get('clients')->row();

        if ($existing_member) {
            $this->session->set_flashdata('reg_error', 'Already have account with this Email');
            redirect('user_registration_form');
            return;
        }

        $data = array(

            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),

            'username' => $this->input->post('username'),
            'mobile_number' => $this->input->post('mobile_number'),
            'password' => $this->input->post('password'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('clients', $data);
        $this->session->set_flashdata('reg_success', 'Registration Completed');
        redirect('user_login_form');
    }





    // ------------Clients Site-------------
    public function properties()
    {
        $data = $this->engine->store_nav(
            'properties',
            'properties',
            'Property List'
        );

        // Filter values
        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'property_id' => trim((string) $this->input->get('property_id', TRUE)),
            'property_type' => trim((string) $this->input->get('property_type', TRUE)),
            'location' => trim((string) $this->input->get('location', TRUE)),
            'status' => trim((string) $this->input->get('status', TRUE)),
            'featured' => $this->input->get('featured', TRUE),
            'min_price' => trim((string) $this->input->get('min_price', TRUE)),
            'max_price' => trim((string) $this->input->get('max_price', TRUE))
        );

        // Pagination setup
        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        // Total filtered records
        $this->_apply_property_filters($filters);
        $total_rows = $this->db->count_all_results('properties');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('properties'),
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
        $data['properties'] = $this->db->get('properties')->result();

        // View data assignment
        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $path = 'site/pages/property_search_section';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }


    public function properties_details_view($id = NULL)
    {
        if (empty($id)) {
            show_404();
        }

        $this->db->where('id', $id);
        $property = $this->db->get('properties')->row();

        if (!$property) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'properties',
            'properties',
            'Property Details: ' . $property->property_name
        );

        // $data = $this->engine->store_nav('site', 'Nothing', 'সদস্য আবেদন ফরম');

        $data['property'] = $property;

        $path = 'site/pages/properties/properties_Details_view';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }

    private function _apply_property_filters(array $filters)
    {
        if ($filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('property_name', $filters['search']);
            $this->db->or_like('property_id', $filters['search']);
            $this->db->or_like('location', $filters['search']);
            $this->db->group_end();
        }

        if ($filters['property_id'] !== '') {
            $this->db->where('property_id', $filters['property_id']);
        }

        if ($filters['property_type'] !== '') {
            $this->db->where('property_type', $filters['property_type']);
        }

        if ($filters['location'] !== '') {
            $this->db->like('location', $filters['location']);
        }

        if ($filters['status'] !== '') {
            $this->db->where('status', $filters['status']);
        }

        if ($filters['featured'] !== '' && $filters['featured'] !== NULL) {
            $this->db->where('featured', $filters['featured']);
        }

        if ($filters['min_price'] !== '' && is_numeric($filters['min_price'])) {
            $this->db->where('price >=', (float) $filters['min_price']);
        }

        if ($filters['max_price'] !== '' && is_numeric($filters['max_price'])) {
            $this->db->where('price <=', (float) $filters['max_price']);
        }
    }


}
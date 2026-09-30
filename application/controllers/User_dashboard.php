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


    public function property_book($id)
    {

        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            redirect(base_url('user_login_form'));
            return;
        }

        $this->db->where('id', $id);
        $property = $this->db->get('properties')->row();

        $notes = $this->input->post('notes');

        $data = array(
            'property_id' => $id,
            'property_name' => $property->property_name,
            'user_name' => $user->username,
            'user_email' => $user->email,
            'user_phone' => $user->mobile_number,
            'user_id' => $user->id,
            'notes' => $notes,
            'created_at' => date('Y-m-d H:i:s'),
        );


        $this->db->insert('property_bookings', $data);
        $this->session->set_flashdata('booking_success', 'Successfully Booked A Property !');
        redirect('User_dashboard');

    }

    public function user_property_book_data()
    {
        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            redirect(base_url('user_login_form'));
            return;
        }

        // Filters
        $search = trim($this->input->get('search', TRUE));
        $booking_date = $this->input->get('booking_date', TRUE);
        $status = $this->input->get('status', TRUE);

        // Pagination
        $per_page = 10;
        $page = (int) $this->input->get('page');

        if ($page < 1) {
            $page = 1;
        }

        $offset = ($page - 1) * $per_page;

        /*
         * -------------------------
         * COUNT QUERY
         * -------------------------
         */
        $this->db->where('user_id', $user->id);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('property_name', $search);
            $this->db->or_like('property_id', $search);
            $this->db->group_end();
        }

        if (!empty($booking_date)) {
            $this->db->where('booking_date', $booking_date);
        }

        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        $total_rows = $this->db
            ->count_all_results('property_bookings');


        /*
         * -------------------------
         * DATA QUERY
         * -------------------------
         */
        $this->db->where('user_id', $user->id);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('property_name', $search);
            $this->db->or_like('property_id', $search);
            $this->db->group_end();
        }

        if (!empty($booking_date)) {
            $this->db->where('booking_date', $booking_date);
        }

        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $offset);

        $property_bookings = $this->db
            ->get('property_bookings')
            ->result();


        /*
         * -------------------------
         * PAGINATION
         * -------------------------
         */
        $this->load->library('pagination');

        $config['base_url'] = base_url('user_property_book_data');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination mb-0">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = [
            'class' => 'page-link'
        ];

        $this->pagination->initialize($config);


        /*
         * -------------------------
         * VIEW DATA
         * -------------------------
         */
        $data = $this->engine->store_nav(
            'property_bookings',
            'property_bookings',
            'Property Bookings'
        );

        $data['property_bookings'] = $property_bookings;

        $data['search'] = $search;
        $data['booking_date'] = $booking_date;
        $data['status'] = $status;

        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();

        $data['sl_start'] = $offset + 1;

        $path = 'user_dashboard/user_bookings/user_bookings';

        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

      public function visit_book($id)
    {

        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            redirect(base_url('user_login_form'));
            return;
        }

        $this->db->where('id', $id);
        $property = $this->db->get('properties')->row();

        $notes = $this->input->post('notes');
        $booking_date = $this->input->post('booking_date');

        $data = array(
            'property_id' => $id,
            'property_name' => $property->property_name,
            'user_name' => $user->username,
            'user_email' => $user->email,
            'user_phone' => $user->mobile_number,
            'user_id' => $user->id,
            'notes' => $notes,
            'booking_date' => $booking_date,
            'created_at' =>date('Y-m-d H:i:s'),
        );


        $this->db->insert('visit_bookings', $data);
        $this->session->set_flashdata('booking_success', 'Successfully Booked A Property for visit !');
        redirect('User_dashboard');




    }


    public function user_visit_book_data()
    {
        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            redirect(base_url('user_login_form'));
            return;
        }

        // Filters
        $search = trim($this->input->get('search', TRUE));
        $booking_date = $this->input->get('booking_date', TRUE);
        $status = $this->input->get('status', TRUE);

        // Pagination
        $per_page = 10;
        $page = (int) $this->input->get('page');

        if ($page < 1) {
            $page = 1;
        }

        $offset = ($page - 1) * $per_page;

       
        $this->db->where('user_id', $user->id);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('property_name', $search);
            $this->db->or_like('property_id', $search);
            $this->db->group_end();
        }

        if (!empty($booking_date)) {
            $this->db->where('booking_date', $booking_date);
        }

        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        $total_rows = $this->db
            ->count_all_results('visit_bookings');


        $this->db->where('user_id', $user->id);

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('property_name', $search);
            $this->db->or_like('property_id', $search);
            $this->db->group_end();
        }

        if (!empty($booking_date)) {
            $this->db->where('booking_date', $booking_date);
        }

        if (!empty($status)) {
            $this->db->where('status', $status);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $offset);

        $property_bookings = $this->db
            ->get('visit_bookings')
            ->result();



        $this->load->library('pagination');

        $config['base_url'] = base_url('user_visit_book_data');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination mb-0">';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = [
            'class' => 'page-link'
        ];

        $this->pagination->initialize($config);


       
        $data = $this->engine->store_nav(
            'visit_bookings',
            'visit_bookings',
            'visit Bookings'
        );

        $data['visit_bookings'] = $property_bookings;

        $data['search'] = $search;
        $data['booking_date'] = $booking_date;
        $data['status'] = $status;

        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();

        $data['sl_start'] = $offset + 1;

        $path = 'user_dashboard/user_bookings/user_visit_book_data';

        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function booked_property_details($id = NULL)
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

        $path = 'user_dashboard/user_bookings/booked_property_details';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

}
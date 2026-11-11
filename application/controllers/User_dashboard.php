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


    public function index()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $data['staff_info'] = $this->session->userdata('login_user_info_all');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $this->db->where('employee_id', $data['staff_info']->staff_id);
        $this->db->where('status', 'Approved');
        $data['staff_joining_letter'] = $this->db->get('staff_joining_letters')->row();

        $this->db->where('id', $data['staff_info']->id);
        $data['staff_login_info'] = $this->db->get('staff_login_info')->row();

        $path = 'user_dashboard/dashboard';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    public function side_menu()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $data['staff_info'] = $this->session->userdata('login_user_info_all');
        


        $this->db->where('id', $data['staff_info']->id);
        $data['staff_login_info'] = $this->db->get('staff_login_info')->row();
        // echo '<pre>';
        // print_r($data['staff_login_info']);
        // echo '</pre>';
        // exit;

        // $path = 'user_dashboard/side_menu';
        $path = 'user_dashboard/profile_update_portal';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function joining_letter_form()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $data['staff_info'] = $this->session->userdata('login_user_info_all');

        $this->db->where('applicant_id', $data['staff_info']->application_id);
        $data['appointment_letter'] = $this->db->get('appointment_letters')->row();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'user_dashboard/joining_letter/joining_letter_form';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function joining_letter_save()
    {
        $name = $this->input->post('name');
        $submitted_to = $this->input->post('submitted_to');
        $reference_no = $this->input->post('reference_no');
        $employee_id = $this->input->post('employee_id');
        $designation = $this->input->post('designation');
        $joining_date = $this->input->post('joining_date');
        $signature = $this->upload_file('signature', './assets/uploads/staff_sign/');

        $user = $this->session->userdata('login_user_info_all');


        $data = array(
            'name' => $name,
            'submitted_to' => $submitted_to,
            'reference_no' => $reference_no,
            'employee_id' => $employee_id,
            'designation' => $designation,
            'joining_date' => $joining_date,
            'signature' => $signature,


            'created_at' => date('Y-m-d H:i:s')
        );

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $this->db->insert('staff_joining_letters', $data);

        $this->session->set_flashdata('success', 'Notice created successfully!');
        redirect("joining_letter");
    }





    public function joining_letter()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
        $user = $this->session->userdata('login_user_info_all');



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
        // $this->_apply_property_filters($filters);

        $total_rows = $this->db->count_all_results('staff_joining_letters');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('joining_letter'),
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
        $this->db->where('employee_id', $user->staff_id);
        $data['staff_joining_letters'] = $this->db->get('staff_joining_letters')->result();

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


        $path = 'user_dashboard/joining_letter/joining_letter';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function joining_letter_details($id = NULL)
    {
        if (empty($id)) {
            show_404();
        }

        $this->db->where('id', $id);
        $staff_joining_letters = $this->db->get('staff_joining_letters')->row();

        if (!$staff_joining_letters) {
            show_404();
        }

        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');


        $data['staff_joining_letters'] = $staff_joining_letters;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'user_dashboard/joining_letter/joining_letter_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
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
            'created_at' => date('Y-m-d H:i:s'),
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


    public function update_profile()
{
    $user = $this->session->userdata('login_user_info_all');
    $id = $user->id;

    $password = $this->input->post('password');

    $staff_info = $this->db->get_where('staff_login_info', [
        'id' => $id
    ])->row();

    if (!$staff_info) {
        show_error('Staff information not found.');
        return;
    }

    $update_data = [];

    if (!empty($password)) {
        $update_data['password'] = $password;
    }

    $new_image = update_file(
        'staff_image',
        './assets/uploads/staff/',
        $staff_info->staff_image,
        'jpg|jpeg|png'
    );

    if (!empty($new_image)) {
        $update_data['staff_image'] = $new_image;
    }

    if (!empty($update_data)) {
        $this->db->where('id', $id);
        $this->db->update('staff_login_info', $update_data);
    }

    $updated_staff = $this->db->get_where('staff_login_info', [
        'id' => $id
    ])->row();

    $this->session->set_userdata(
        'login_user_info_all',
        $updated_staff
    );

    $this->session->set_flashdata(
        'success',
        'Profile updated successfully'
    );

    redirect('User_dashboard');
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
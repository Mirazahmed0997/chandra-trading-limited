<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruit_controllers extends CI_Controller
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

        $this->load->library('upload');

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

    public function application_form()
    {
        // $this->check_access('Add new Properties');

        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $path = 'admin/staff_recruitment/application_form';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    public function pending_applications_list()
    {
        $this->check_access('Pending Applications');
        $data = $this->engine->store_nav(
            'Job Portal',
            'pending_applications_list',
            'Pending Applications'
        );



        // Filter values matched to job_applications schema
        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'application_id' => trim((string) $this->input->get('application_id', TRUE)),
            'contact_mobile' => trim((string) $this->input->get('contact_mobile', TRUE)),
            'applicant_name' => trim((string) $this->input->get('applicant_name', TRUE)),
            'applied_position' => trim((string) $this->input->get('applied_position', TRUE))
        );

        // Pagination setup
        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        // Total filtered records
        $this->_apply_applications_filters($filters);
        $total_rows = $this->db->count_all_results('job_applications');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('applications_list'),
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

        // Fetch records ordered by application_id
        $this->_apply_applications_filters($filters);
        $this->db->order_by('application_id', 'DESC');
        $this->db->where('application_status', 'Pending');
        $this->db->limit($per_page, $page);
        $data['job_applications'] = $this->db->get('job_applications')->result();

        // View data assignment
        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;


        $data['title'] = $data['tittle'];

        $path = 'admin/staff_recruitment/applications_list';

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }



    public function accepted_applications_list()
    {
        $this->check_access('Accepted List');
        $data = $this->engine->store_nav(
            'Job Portal',
            'accepted_applications_list',
            'Accepted List'
        );
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'application_id' => trim((string) $this->input->get('application_id', TRUE)),
            'contact_mobile' => trim((string) $this->input->get('contact_mobile', TRUE)),
            'applicant_name' => trim((string) $this->input->get('applicant_name', TRUE)),
            'applied_position' => trim((string) $this->input->get('applied_position', TRUE))
        );

        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_applications_filters($filters);
        $total_rows = $this->db->count_all_results('job_applications');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('applications_list'),
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

        $this->_apply_applications_filters($filters);
        $this->db->order_by('application_id', 'DESC');
        $this->db->where('application_status', 'Accepted');
        $this->db->limit($per_page, $page);
        $data['job_applications'] = $this->db->get('job_applications')->result();

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $data['title'] = $data['tittle'];

        $path = 'admin/staff_recruitment/applications_list';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }
    public function staff_list()
    {
        $this->check_access('Staff list');
        $data = $this->engine->store_nav(
            'Staff',
            'staff_list',
            'Staff List'
        );
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'staff_name' => trim((string) $this->input->get('staff_name', TRUE)),
            'mobile' => trim((string) $this->input->get('mobile', TRUE)),
            'staff_id' => trim((string) $this->input->get('staff_id', TRUE)),
            'designation' => trim((string) $this->input->get('designation', TRUE))
        );

        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_staff_filters($filters);
        $total_rows = $this->db->count_all_results('staff_login_info');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('staff_list'),
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

        $this->_apply_staff_filters($filters);
        $this->db->order_by('id', 'DESC');
        // $this->db->where('status', 'Active');
        $this->db->limit($per_page, $page);
        $data['staff_login_info'] = $this->db->get('staff_login_info')->result();
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

        $data['title'] = $data['tittle'];

        $path = 'admin/staff_recruitment/staff_list';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }



    public function rejected_applications_list()
    {
        $this->check_access('Rejected Applications');
        $data = $this->engine->store_nav(
            'Job Portal',
            'rejected_applications_list',
            'Rejected Applications'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'application_id' => trim((string) $this->input->get('application_id', TRUE)),
            'contact_mobile' => trim((string) $this->input->get('contact_mobile', TRUE)),
            'applicant_name' => trim((string) $this->input->get('applicant_name', TRUE)),
            'applied_position' => trim((string) $this->input->get('applied_position', TRUE))
        );

        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_applications_filters($filters);
        $total_rows = $this->db->count_all_results('job_applications');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('applications_list'),
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

        $this->_apply_applications_filters($filters);
        $this->db->order_by('application_id', 'DESC');
        $this->db->where('application_status', 'Rejected');
        $this->db->limit($per_page, $page);
        $data['job_applications'] = $this->db->get('job_applications')->result();

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $data['title'] = $data['tittle'];

        $path = 'admin/staff_recruitment/applications_list';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function applicant_details($id = NULL)
    {


        if (empty($id)) {
            show_404();
        }

        $this->db->where('application_id', $id);
        $applicant = $this->db->get('job_applications')->row();

        $this->db->where('application_id', $id);
        $educations = $this->db->get('applicant_educations')->result();

        $this->db->where('application_id ', $id);
        $experiences = $this->db->get('applicant_experiences')->result();

        $this->db->where('application_id ', $id);
        $trainnings = $this->db->get('applicant_trainings')->result();

        $this->db->where('application_id ', $id);
        $languages = $this->db->get('applicant_languages')->result();

        $this->db->where('application_id ', $id);
        $references = $this->db->get('applicant_references')->result();


        if (!$applicant) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'apllicant',
            'apllicant',
            'apllicant Details: ' . $applicant->applicant_name
        );


        $data['applicant'] = $applicant;
        $data['educations'] = $educations;
        $data['experiences'] = $experiences;
        $data['trainnings'] = $trainnings;
        $data['languages'] = $languages;
        $data['references'] = $references;

        $path = 'admin/staff_recruitment/recruit_form_view';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function appointment_letter_form($id = NULL)
    {
        // $this->check_access('Add new Properties');
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');


        if (empty($id)) {
            show_404();
        }

        $this->db->where('application_id', $id);
        $applicant = $this->db->get('job_applications')->row();

        $this->db->where('application_id', $id);
        $educations = $this->db->get('applicant_educations')->result();

        $this->db->where('application_id ', $id);
        $experiences = $this->db->get('applicant_experiences')->result();

        $this->db->where('application_id ', $id);
        $trainnings = $this->db->get('applicant_trainings')->result();

        $this->db->where('application_id ', $id);
        $languages = $this->db->get('applicant_languages')->result();

        $this->db->where('application_id ', $id);
        $references = $this->db->get('applicant_references')->result();


        if (!$applicant) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'apllicant',
            'apllicant',
            'apllicant Details: ' . $applicant->applicant_name
        );


        $data['applicant'] = $applicant;
        $data['educations'] = $educations;
        $data['experiences'] = $experiences;
        $data['trainnings'] = $trainnings;
        $data['languages'] = $languages;
        $data['references'] = $references;

        $path = 'admin/staff_recruitment/appointment_letter_form';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function appointment_letter_save()
    {
        $loggedUser = $this->session->userdata('login_user_info_all');

        function convert_to_bangla_number($number)
        {
            $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $bangla = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

            return str_replace($english, $bangla, (string) $number);
        }

        if (!$loggedUser) {
            redirect('login');
            return;
        }

        $password = trim($this->input->post('password'));

        $employee_name = trim($this->input->post('employee_name'));
        $father_name = trim($this->input->post('father_name'));
        $mother_name = trim($this->input->post('mother_name'));

        $employee_id = trim($this->input->post('employee_id'));
        $employee_email = trim($this->input->post('employee_email'));

        $permanent_address = trim($this->input->post('permanent_address'));
        $employee_phone = trim($this->input->post('employee_phone'));
        $present_address = trim($this->input->post('present_address'));

        $designation = trim($this->input->post('designation'));
        $employment_type = trim($this->input->post('employment_type'));

        $joining_date = trim($this->input->post('joining_date'));
        $probation_period = trim($this->input->post('probation_period'));

        $reporting_authority = trim($this->input->post('reporting_authority'));
        $reporting_authority_designation = trim(
            $this->input->post('reporting_authority_designation')
        );

        $basic_salary = trim($this->input->post('basic_salary'));
        $gross_salary = trim($this->input->post('gross_salary'));

        $conditions = trim($this->input->post('conditions'));
        $additional_instructions = trim(
            $this->input->post('additional_instructions')
        );

        $applicant_id = trim($this->input->post('applicant_id'));

        $status = 'Draft';

        $date = date('d-m-Y');

        $count = $this->db->count_all('appointment_letters') + 1;

        $letter_number = 'সিটিএল-০' . convert_to_bangla_number($count) . '/' . convert_to_bangla_number($date);

        $reporting_authority_sign = $this->upload_file(
            'reporting_authority_sign',
            './assets/uploads/letter_pad/'
        );



        $data = array(
            'employee_name' => $employee_name,
            'father_name' => $father_name,
            'mother_name' => $mother_name,
            'employee_id' => $employee_id,
            'status' => $status,
            'employee_email' => $employee_email,
            'permanent_address' => $permanent_address,
            'employee_phone' => $employee_phone,
            'present_address' => $present_address,
            'designation' => $designation,
            'employment_type' => $employment_type,
            'appointment_date' => $date,
            'joining_date' => $joining_date,
            'probation_period' => $probation_period,
            'reporting_authority' => $reporting_authority,
            'reporting_authority_designation' => $reporting_authority_designation,
            'reporting_authority_sign' => $reporting_authority_sign,
            'basic_salary' => $basic_salary,
            'gross_salary' => $gross_salary,
            'conditions' => $conditions,
            'additional_instructions' => $additional_instructions,
            'letter_number' => $letter_number,
            'password' => $password,
            'applicant_id' => $applicant_id,
            'created_at' => date('Y-m-d H:i:s')
        );

        $staff_login_info = array(
            'staff_id' => $employee_id,
            'application_id' => $applicant_id,
            'staff_name' => $employee_name,
            'mobile' => $employee_phone,
            'email' => $employee_email,
            'password' => $password,
            'designation' => $designation,
            'address' => $permanent_address,
            'created_at' => date('Y-m-d H:i:s')
        );


        // echo '<pre>';
        // print_r($data);
        // print_r($staff_login_info);
        // echo '</pre>';
        // exit;

        $this->db->trans_begin();

        $this->db->insert('appointment_letters', $data);

        $appointment_insert_id = $this->db->insert_id();

        if ($appointment_insert_id) {
            $this->db->insert('staff_login_info', $staff_login_info);
        }

        if (
            $appointment_insert_id &&
            $this->db->trans_status() === TRUE
        ) {
            $this->db->trans_commit();

            $this->session->set_flashdata(
                'appointment_success',
                'Appointment added successfully.'
            );

            redirect('appointment_letter/' . $applicant_id);

        } else {

            $this->db->trans_rollback();

            $this->session->set_flashdata(
                'appointment_error',
                'Unable to save appointment. Please try again.'
            );

            redirect($_SERVER['HTTP_REFERER'] ?? 'admin');
        }
    }

    public function update_application_verification($id)
    {
        $application = $this->db->get_where('job_applications', ['application_id' => $id])->row();

        $verifier_name = trim($this->input->post('verifier_name'));
        $verification_comments = trim($this->input->post('verification_comments'));
        $reverifier_name = trim($this->input->post('reverifier_name'));
        $reverification_comments = trim($this->input->post('reverification_comments'));

        $update_data = [

            'verifier_name' => $verifier_name,
            'verification_comments' => $verification_comments,
            'reverifier_name' => $reverifier_name,
            'reverification_comments' => $reverification_comments,
        ];

        // echo '<pre>';
        // print_r($update_data);
        // echo '</pre>';
        // exit;


        $this->db->where('application_id', $id);
        $this->db->update('job_applications', $update_data);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function accept_application($id)
    {

        $update_data = [

            'application_status' => 'Accepted'
        ];


        $this->db->where('application_id', $id);
        $this->db->update('job_applications', $update_data);

        redirect('accept_mail/' . $id);
    }
    public function reject_application($id = NULL)
    {
        $this->db->where('application_id', $id);
        $applicant = $this->db->get('job_applications')->row();

        if (!$applicant) {
            $this->session->set_flashdata('error', 'Applicant not found.');
            redirect($_SERVER['HTTP_REFERER'] ?? base_url('admin'));
            return;
        }

        // Update application status
        $this->db->where('application_id', $id);
        $this->db->update('job_applications', [
            'application_status' => 'Rejected'
        ]);

        redirect('rejection_mail/' . $id);

    }

    public function appointment_letter($id = NULL)
    {
        // $this->check_access('Add new Properties');
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (empty($id)) {
            show_404();
        }

        $this->db->where('applicant_id', $id);
        $appointment_letters = $this->db->get('appointment_letters')->row();

        $this->db->where('application_id', $id);
        $application = $this->db->get('job_applications')->row();



        if (!$id) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'appointment_letters',
            'appointment_letters',
            'appointment_letters Details: '
        );



        $data['appointment_letters'] = $appointment_letters;
        $data['application'] = $application;
        $data['loggedUser'] = $loggedUser;



        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $path = 'admin/staff_recruitment/appointment_letter';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function delete_application($id)
    {
        $this->Common->delete_data('job_applications', 'application_id', $id);
        redirect('applications_list');
    }





    public function joining_letter_list()
    {
        $this->check_access('Joining Letter');
        $data = $this->engine->store_nav(
            'Staff',
            'admin_joining_letter_list',
            'Joining Letter'
        );

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

        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_property_filters($filters);

        $total_rows = $this->db->count_all_results('staff_joining_letters');

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


        $path = 'admin/staff_recruitment/joining_letter_list';

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

        $data = $this->engine->store_nav(
            'Staff',
            'admin_joining_letter_list',
            'Joining Letter Details'
        );


        $data['staff_joining_letters'] = $staff_joining_letters;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'admin/staff_recruitment/joining_letter_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function accept_joining_letter($id)
    {
        $staff = $this->session->userdata('login_user_info_all');
        // echo '<pre>';
        // print_r($staff);
        // echo '</pre>';
        // exit;
        $date = date('d-m-Y');

        $update_data = [

            'status' => 'Approved',
            'approved_by' => $staff->username,
        ];


        $this->db->where('id', $id);
        $this->db->update('staff_joining_letters', $update_data);

        redirect('admin_joining_letter_details/' . $id);
    }



    private function _apply_applications_filters(array $filters)
    {
        // Search across applicant name, applied position, and parents' names
        if (isset($filters['search']) && $filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('applicant_name', $filters['search']);
            $this->db->or_like('applied_position', $filters['search']);
            $this->db->or_like('contact_mobile', $filters['search']);
            $this->db->or_like('application_id', $filters['search']);
            $this->db->group_end();
        }

        // Filter by specific position
        if (isset($filters['applied_position']) && $filters['applied_position'] !== '') {
            $this->db->like('applied_position', $filters['applied_position']);
        }

        // Filter by gender
        if (isset($filters['applicant_name']) && $filters['applicant_name'] !== '') {
            $this->db->where('applicant_name', $filters['applicant_name']);
        }

        // Filter by status (if present in your table)
        if (isset($filters['contact_mobile']) && $filters['contact_mobile'] !== '') {
            $this->db->where('contact_mobile', $filters['contact_mobile']);
        }
        if (isset($filters['application_id']) && $filters['application_id'] !== '') {
            $this->db->where('application_id', $filters['application_id']);
        }
    }
    private function _apply_staff_filters(array $filters)
    {
        if (isset($filters['search']) && $filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('staff_id', $filters['search']);
            $this->db->or_like('staff_name', $filters['search']);
            $this->db->or_like('mobile', $filters['search']);
            $this->db->or_like('designation', $filters['search']);
            $this->db->group_end();
        }

        if (isset($filters['staff_id']) && $filters['staff_id'] !== '') {
            $this->db->like('staff_id', $filters['staff_id']);
        }

        if (isset($filters['staff_name']) && $filters['staff_name'] !== '') {
            $this->db->like('staff_name', $filters['staff_name']);
        }

        if (isset($filters['mobile']) && $filters['mobile'] !== '') {
            $this->db->like('mobile', $filters['mobile']);
        }

        if (isset($filters['designation']) && $filters['designation'] !== '') {
            $this->db->like('designation', $filters['designation']);
        }
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



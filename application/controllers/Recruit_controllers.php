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


    public function create_application()
    {

        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }

        $applied_position = trim($this->input->post('applied_position'));
        $applicant_name = trim($this->input->post('applicant_name'));
        $gender = $this->input->post('gender');
        $father_name = trim($this->input->post('father_name'));
        $mother_name = trim($this->input->post('mother_name'));
        $permanent_address = trim($this->input->post('permanent_address'));
        $present_address = trim($this->input->post('present_address'));
        $contact_address = trim($this->input->post('contact_address'));
        $contact_mobile = trim($this->input->post('contact_mobile'));
        $contact_email = trim($this->input->post('contact_email'));
        $date_of_birth = $this->input->post('date_of_birth');
        $marital_status = $this->input->post('marital_status');
        $spouse_name = trim($this->input->post('spouse_name'));
        $nationality = trim($this->input->post('nationality')) ?: 'Bangladeshi';
        $religion = trim($this->input->post('religion'));
        $blood_group = trim($this->input->post('blood_group'));
        $nid_number = trim($this->input->post('nid_number'));
        $emergency_contact_name = trim($this->input->post('emergency_contact_name'));
        $emergency_contact_mobile = trim($this->input->post('emergency_contact_mobile'));
        $it_skills = trim($this->input->post('it_skills'));
        $expected_salary = $this->input->post('expected_salary');
        $is_salary_negotiable = $this->input->post('is_salary_negotiable') ? 1 : 0;
        $future_expectations = trim($this->input->post('future_expectations'));
        $role_in_organization = trim($this->input->post('role_in_organization'));

        if (empty($applied_position) || empty($applicant_name) || empty($contact_mobile) || empty($contact_email)) {
            $this->session->set_flashdata('application_error', 'Position, Applicant Name, Mobile, and Email are required.');
            redirect('application_form');
            return;
        }

        if (!empty($nid_number)) {
            $existingNid = $this->db->where('nid_number', $nid_number)->get('job_applications')->row();
            if ($existingNid) {
                $this->session->set_flashdata('application_error', 'NID Number already exists in system.');
                redirect('application_form');
                return;
            }
        }

        $upload_base = FCPATH . 'assets/uploads/applications/';
        $dirs = ['photo', 'nid', 'signature', 'education', 'experience', 'training'];
        foreach ($dirs as $dir) {
            if (!is_dir($upload_base . $dir)) {
                mkdir($upload_base . $dir, 0777, true);
            }
        }

        $upload_file = function ($field_name, $sub_folder, $allowed_types) {
            if (isset($_FILES[$field_name]) && !empty($_FILES[$field_name]['name'])) {
                $config['upload_path'] = './assets/uploads/applications/' . $sub_folder;
                $config['allowed_types'] = $allowed_types;
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload($field_name)) {
                    $upload_data = $this->upload->data();
                    return $upload_data['file_name'];
                } else {
                    log_message('error', "Upload failure ($field_name): " . $this->upload->display_errors('', ''));
                    return null;
                }
            }
            return null;
        };

        $photo_url = $upload_file('photo', 'photo', 'jpg|jpeg|png|webp');
        $nid_document = $upload_file('nid_document', 'nid', 'pdf|jpg|jpeg|png');
        $applicant_signature_url = $upload_file('applicant_signature', 'signature', 'jpg|jpeg|png');

        $this->db->trans_start();

        $main_data = array(
            'applied_position' => $applied_position,
            'applicant_name' => $applicant_name,
            'photo_url' => $photo_url,
            'gender' => $gender,
            'father_name' => $father_name,
            'mother_name' => $mother_name,
            'permanent_address' => $permanent_address,
            'present_address' => $present_address,
            'contact_address' => $contact_address,
            'contact_mobile' => $contact_mobile,
            'contact_email' => $contact_email,
            'date_of_birth' => !empty($date_of_birth) ? $date_of_birth : null,
            'marital_status' => $marital_status,
            'spouse_name' => $spouse_name,
            'nationality' => $nationality,
            'religion' => $religion,
            'blood_group' => $blood_group,
            'nid_number' => !empty($nid_number) ? $nid_number : null,
            'nid_document' => $nid_document,
            'emergency_contact_name' => $emergency_contact_name,
            'emergency_contact_mobile' => $emergency_contact_mobile,
            'it_skills' => $it_skills,
            'expected_salary' => !empty($expected_salary) ? $expected_salary : null,
            'is_salary_negotiable' => $is_salary_negotiable,
            'future_expectations' => $future_expectations,
            'role_in_organization' => $role_in_organization,
            'applicant_signature_url' => $applicant_signature_url,
            'application_status' => 'Pending',
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('job_applications', $main_data);
        $application_id = $this->db->insert_id();

        $educations = $this->input->post('education');
        if (!empty($educations) && is_array($educations)) {
            foreach ($educations as $i => $edu) {
                if (!empty($edu['exam_name'])) {
                    $edu_doc = null;
                    if (isset($_FILES['education']['name'][$i]['document']) && !empty($_FILES['education']['name'][$i]['document'])) {
                        $_FILES['single_edu_doc']['name'] = $_FILES['education']['name'][$i]['document'];
                        $_FILES['single_edu_doc']['type'] = $_FILES['education']['type'][$i]['document'];
                        $_FILES['single_edu_doc']['tmp_name'] = $_FILES['education']['tmp_name'][$i]['document'];
                        $_FILES['single_edu_doc']['error'] = $_FILES['education']['error'][$i]['document'];
                        $_FILES['single_edu_doc']['size'] = $_FILES['education']['size'][$i]['document'];

                        $config['upload_path'] = './assets/uploads/applications/education';
                        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
                        $config['max_size'] = 5120;
                        $config['encrypt_name'] = TRUE;

                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('single_edu_doc')) {
                            $edu_doc = $this->upload->data('file_name');
                        }
                    }

                    $this->db->insert('applicant_educations', [
                        'application_id' => $application_id,
                        'exam_name' => trim($edu['exam_name']),
                        'passing_year' => (int) $edu['passing_year'],
                        'group_major' => trim($edu['group_major']),
                        'board_institution' => trim($edu['board_institution']),
                        'result_gpa' => !empty($edu['result_gpa']) ? $edu['result_gpa'] : null,
                        'document' => $edu_doc
                    ]);
                }
            }
        }

        $experiences = $this->input->post('experience');
        if (!empty($experiences) && is_array($experiences)) {
            foreach ($experiences as $i => $exp) {
                if (!empty($exp['organization_name'])) {
                    $exp_doc = null;
                    if (isset($_FILES['experience']['name'][$i]['document_url']) && !empty($_FILES['experience']['name'][$i]['document_url'])) {
                        $_FILES['single_exp_doc']['name'] = $_FILES['experience']['name'][$i]['document_url'];
                        $_FILES['single_exp_doc']['type'] = $_FILES['experience']['type'][$i]['document_url'];
                        $_FILES['single_exp_doc']['tmp_name'] = $_FILES['experience']['tmp_name'][$i]['document_url'];
                        $_FILES['single_exp_doc']['error'] = $_FILES['experience']['error'][$i]['document_url'];
                        $_FILES['single_exp_doc']['size'] = $_FILES['experience']['size'][$i]['document_url'];

                        $config['upload_path'] = './assets/uploads/applications/experience';
                        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
                        $config['max_size'] = 5120;
                        $config['encrypt_name'] = TRUE;

                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('single_exp_doc')) {
                            $exp_doc = $this->upload->data('file_name');
                        }
                    }

                    $this->db->insert('applicant_experiences', [
                        'application_id' => $application_id,
                        'experience_type' => trim($exp['experience_type']),
                        'organization_name' => trim($exp['organization_name']),
                        'address' => trim($exp['address']),
                        'start_date' => !empty($exp['start_date']) ? $exp['start_date'] : null,
                        'end_date' => !empty($exp['end_date']) ? $exp['end_date'] : null,
                        'is_current_job' => isset($exp['is_current_job']) ? 1 : 0,
                        'document_url' => $exp_doc
                    ]);
                }
            }
        }

        $trainings = $this->input->post('training');
        if (!empty($trainings) && is_array($trainings)) {
            foreach ($trainings as $i => $trn) {
                if (!empty($trn['training_title'])) {
                    $trn_doc = null;
                    if (isset($_FILES['training']['name'][$i]['document_url']) && !empty($_FILES['training']['name'][$i]['document_url'])) {
                        $_FILES['single_trn_doc']['name'] = $_FILES['training']['name'][$i]['document_url'];
                        $_FILES['single_trn_doc']['type'] = $_FILES['training']['type'][$i]['document_url'];
                        $_FILES['single_trn_doc']['tmp_name'] = $_FILES['training']['tmp_name'][$i]['document_url'];
                        $_FILES['single_trn_doc']['error'] = $_FILES['training']['error'][$i]['document_url'];
                        $_FILES['single_trn_doc']['size'] = $_FILES['training']['size'][$i]['document_url'];

                        $config['upload_path'] = './assets/uploads/applications/training';
                        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
                        $config['max_size'] = 5120;
                        $config['encrypt_name'] = TRUE;

                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('single_trn_doc')) {
                            $trn_doc = $this->upload->data('file_name');
                        }
                    }

                    $this->db->insert('applicant_trainings', [
                        'application_id' => $application_id,
                        'training_title' => trim($trn['training_title']),
                        'subject' => trim($trn['subject']),
                        'institution_name' => trim($trn['institution_name']),
                        'address' => trim($trn['address']),
                        'country' => !empty($trn['country']) ? trim($trn['country']) : 'Bangladesh',
                        'training_year' => !empty($trn['training_year']) ? (int) $trn['training_year'] : null,
                        'duration' => trim($trn['duration']),
                        'document_url' => $trn_doc
                    ]);
                }
            }
        }

        $languages = $this->input->post('language');
        if (!empty($languages) && is_array($languages)) {
            foreach ($languages as $lang) {
                if (!empty($lang['language_name'])) {
                    $this->db->insert('applicant_languages', [
                        'application_id' => $application_id,
                        'language_name' => trim($lang['language_name']),
                        'reading_skill' => $lang['reading_skill'],
                        'writing_skill' => $lang['writing_skill'],
                        'speaking_skill' => $lang['speaking_skill']
                    ]);
                }
            }
        }

        $references = $this->input->post('reference');
        if (!empty($references) && is_array($references)) {
            foreach ($references as $ref) {
                if (!empty($ref['ref_name'])) {
                    $this->db->insert('applicant_references', [
                        'application_id' => $application_id,
                        'ref_name' => trim($ref['ref_name']),
                        'designation' => trim($ref['designation']),
                        'organization_name' => trim($ref['organization_name']),
                        'email' => trim($ref['email']),
                        'mobile_number' => trim($ref['mobile_number']),
                        'address' => trim($ref['address'])
                    ]);
                }
            }
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('application_error', 'Unable to submit application. Please try again.');
            redirect('application_form');
        } else {
            $this->session->set_flashdata('application_success', 'Job application submitted successfully.');
            redirect('success_page');
        }
    }

    public function pending_applications_list()
    {
        $this->check_access('Application List');
        $data = $this->engine->store_nav(
            'Applications',
            'Applications',
            'Pending Applications List'
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
        $this->check_access('Application List');
        $data = $this->engine->store_nav(
            'Applications',
            'Applications',
            'Staffs List'
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



    public function rejected_applications_list()
    {
        $this->check_access('Application List');
        $data = $this->engine->store_nav(
            'Applications',
            'Applications',
            'Rejected Applications List'
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

        function convert_to_bangla_number($number)
        {
            $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $bangla = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

            return str_replace($english, $bangla, (string) $number);
        }
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }

        $count = $this->db->count_all_results('appointment_letters') + 1;
        // echo '<pre>';
        // print_r($count);
        // echo '</pre>';
        // exit;

        $date = date('d-m-Y');

        $employee_name = trim($this->input->post('employee_name'));
        $father_name = trim($this->input->post('father_name'));
        $mother_name = $this->input->post('mother_name');

        $employee_id = trim($this->input->post('employee_id'));
        $employee_email = trim($this->input->post('employee_email'));
        $permanent_address = trim($this->input->post('permanent_address'));
        $employee_phone = trim($this->input->post('employee_phone'));
        $present_address = trim($this->input->post('present_address'));
        $designation = trim($this->input->post('designation'));
        $employment_type = trim($this->input->post('employment_type'));
        // $appointment_date = trim($this->input->post('appointment_date'));
        $joining_date = trim($this->input->post('joining_date'));
        $probation_period = trim($this->input->post('probation_period'));
        $reporting_authority = trim($this->input->post('reporting_authority'));
        $reporting_authority_designation = trim($this->input->post('reporting_authority_designation'));
        $reporting_authority_sign = $this->upload_file('reporting_authority_sign', './assets/uploads/letter_pad/');
        $basic_salary = trim($this->input->post('basic_salary'));
        $gross_salary = trim($this->input->post('gross_salary'));
        $conditions = trim($this->input->post('conditions'));
        $additional_instructions = trim($this->input->post('additional_instructions'));
        $applicant_id = trim($this->input->post('applicant_id'));
        $letter_number = 'সিটিএল-০' . convert_to_bangla_number($count) . '/' . convert_to_bangla_number($date);


        $data = array(
            'employee_name' => $employee_name,
            'father_name' => $father_name,
            'mother_name' => $mother_name,
            'employee_id' => $employee_id,
            'status' => !empty($status) ? $status : 'Draft',
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
            'applicant_id' => $applicant_id,
            'created_at' => date('Y-m-d H:i:s')
        );

        $insert = $this->db
            ->insert('appointment_letters', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'appointment_success',
                'appointment added successfully.'
            );

            redirect('appointment_letter/' . $applicant_id);

        } else {

            $this->session->set_flashdata(
                'appointment_error',
                'Unable to save appointment. Please try again.'
            );

            redirect($_SERVER['HTTP_REFERER']);
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

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function reject_application($id)
    {

        $update_data = [

            'application_status' => 'Rejected'
        ];


        $this->db->where('application_id', $id);
        $this->db->update('job_applications', $update_data);

        redirect($_SERVER['HTTP_REFERER']);
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


    
public function send_appointment_letter($id = NULL)
{
    $this->db->where('application_id', $id);
    $applicant = $this->db->get('job_applications')->row();



    $date = date('d-m-Y');
    // $letter_number = 'CTL0' . $id . '-' . $date;

    if ($applicant && !empty($applicant->contact_email)) {
        $email = 'ahmedmiraz87@gmail.com';
        // $email = $applicant->contact_email;

        
        // echo '<pre>';
        // print_r($body);
        // echo '</pre>';
        // exit;

        $this->load->library('email');

        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('ctl05.2026@gmail.com', 'Chandra Trading Limited');
        $this->email->to($email);
        $this->email->subject('Appointment Letter');

        $data['applicant'] = $applicant;
        $body = base_url(
            'appointment_letter_email/' . $id
        );
        // echo '<pre>';
        // print_r($body);
        // echo '</pre>';
        // exit;

        $this->email->message($body);

        $update_data = [

            // 'letter_number ' => $letter_number,
            'is_sent' => 1
        ];


        $this->db->where('applicant_id', $id);
        $this->db->update('appointment_letters', $update_data);

        if ($this->email->send()) {
            $this->session->set_flashdata(
                'success',
                'Appointment letter sent successfully!'
            );
        } else {
            echo $this->email->print_debugger();
            return;
        }

    } else {
        $this->session->set_flashdata(
            'error',
            'Email not found or applicant does not exist'
        );
    }

    redirect($_SERVER['HTTP_REFERER']);
}


    // public function send_appointment_letter($id = NULL)
    // {
    //     $loggedUser = $this->session->userdata('login_user_info_all');


    //     $this->db->where('application_id', $id);
    //     $applicant = $this->db->get('job_applications')->row();
    //     $date = date('d-m-Y');


    //     $this->db->where('applicant_id', $id);
    //     $appointment_letters = $this->db->get('appointment_letters')->row();

    //     if ($applicant && !empty($applicant->contact_email)) {
    //         $email = 'ahmedmiraz87@gmail.com';
    //         // $email = $applicant->contact_email;

    //         $data['application'] = $applicant;
    //         $data['appointment_letters'] = $appointment_letters;
    //         $data['loggedUser'] = $loggedUser;

    //         $html_content = $this->load->view('admin/staff_recruitment/appointment_letter_email_pdf', $data, True);
    //         // $html_content = $this->load->view('appointment_letter_email/'. $id);




    //         if (empty($html_content)) {
    //             $this->session->set_flashdata('error', 'Failed to generate HTML content for the PDF.');
    //             redirect($_SERVER['HTTP_REFERER']);
    //             return;
    //         }

    //         $pdf_path = $this->generate_appointment_pdf($html_content, $id);


    //         // echo '<pre>';
    //         // print_r($html_content);
    //         // echo '</pre>';
    //         // exit;

    //         $this->load->library('email');

    //         $config['mailtype'] = 'html';
    //         $this->email->initialize($config);

    //         $this->email->from('ctl05.2026@gmail.com', 'Chandra Trading Limited');
    //         $this->email->to($email);
    //         $this->email->subject('Appointment Letter');

    //         $message = '<p>Dear ' . ($applicant->name ?? 'Applicant') . ',</p>';
    //         $message .= '<p>Please find attached your official appointment letter from Chandra Trading Limited.</p>';
    //         $this->email->message($message);

    //         $this->email->attach($pdf_path);

    //         $update_data = [
    //             'is_sent' => 1
    //         ];

    //         $this->db->where('applicant_id', $id);
    //         $this->db->update('appointment_letters', $update_data);

    //         if ($this->email->send()) {
    //             if (file_exists($pdf_path)) {
    //                 unlink($pdf_path);
    //             }

    //             $this->session->set_flashdata(
    //                 'success',
    //                 'Appointment letter PDF sent successfully!'
    //             );
    //         } else {
    //             echo $this->email->print_debugger();
    //             return;
    //         }

    //     } else {
    //         $this->session->set_flashdata(
    //             'error',
    //             'Email not found or applicant does not exist'
    //         );
    //     }

    //     redirect($_SERVER['HTTP_REFERER']);
    // }




    private function generate_appointment_pdf($html, $id)
    {
        $autoloader_path = APPPATH . 'third_party/dompdf/autoload.inc.php';

        if (!file_exists($autoloader_path)) {
            show_error('Dompdf autoloader file not found at: ' . $autoloader_path);
        }

        require_once $autoloader_path;

        if (!class_exists('Dompdf\Dompdf')) {
            show_error('Dompdf class not found. Make sure you downloaded the official Dompdf Release ZIP package.');
        }

        $dompdf = new \Dompdf\Dompdf();

        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Helvetica');
        $dompdf->setOptions($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        $previous_error_reporting = error_reporting();
        error_reporting($previous_error_reporting & ~E_WARNING & ~E_NOTICE);

        $dompdf->render();

        error_reporting($previous_error_reporting);

        $output = $dompdf->output();

        $upload_dir = FCPATH . 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, TRUE);
        }

        $file_path = $upload_dir . "appointment_letter_$id.pdf";

        file_put_contents($file_path, $output);

        return $file_path;
    }




    public function appointment_letter_email($id = NULL)
    {
        // $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
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

        // $data = $this->engine->store_nav(
        //     'appointment_letters',
        //     'appointment_letters',
        //     'appointment_letters Details: ' . $appointment_letters->employee_name
        // );



        $data['appointment_letters'] = $appointment_letters;
        $data['application'] = $application;
        $data['loggedUser'] = $loggedUser;



        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        // $path = 'admin/staff_recruitment/appointment_letter_email';
        $this->load->view('admin/staff_recruitment/appointment_letter_email', $data);
        // $this->engine->render_view($data, $path);
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

}



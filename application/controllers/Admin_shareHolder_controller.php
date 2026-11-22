<?php

use LDAP\Result;
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_shareHolder_controller extends CI_Controller
{

    private $main_layout = 'admin/master_layout';
    private $side_menu = 'admin/side_menu';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
        $date = new DateTime();
        $this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
        $user = $this->session->userdata('login_user_info_all');
        if (!$user) {
            $this->session->set_flashdata('login_failed', 'Please login first');
            redirect('admin');
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
            ->where('menu_key', $menu)
            ->count_all_results('user_menu_access');

        if ($hasAccess == 0) {
            $this->session->set_flashdata('access_error', "You don't have access.");
            redirect('admin/users_list/users_list');
            exit;
        }
    }

    public function share_application_form()
    {

        // $this->check_access('Add new Project');
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'admin/shareholder/share_application_form';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function create_shareholder()
    {
        //  echo '<pre>';
        // print_r('Hitted');
        // echo '</pre>';
        // exit;
        $this->load->library('upload');

        $strPost = function ($key) {
            $val = $this->input->post($key, TRUE);
            return is_string($val) ? trim($val) : '';
        };

        $applicant_name_bn = $strPost('applicant_name_bn');
        $applicant_name_en = $strPost('applicant_name_en');
        $father_name = $strPost('father_name');
        $mother_name = $strPost('mother_name');
        $husband_wife_name = $strPost('husband_wife_name');
        $gender = $strPost('gender');
        $birth_date = $strPost('birth_date');
        $nationality = $strPost('nationality');
        $profession = $strPost('profession');
        $nid_no = $strPost('nid_no');
        $tin_no = $strPost('tin_no');

        $present_village = $strPost('present_village');
        $present_post_office = $strPost('present_post_office');
        $present_sub_district = $strPost('present_sub_district');
        $present_district = $strPost('present_district');

        $permanent_village = $strPost('permanent_village');
        $permanent_post_office = $strPost('permanent_post_office');
        $permanent_sub_district = $strPost('permanent_sub_district');
        $permanent_district = $strPost('permanent_district');

        $mobile_no = $strPost('mobile_no');
        $email = $strPost('email');
        $additional_contact = $strPost('additional_contact');
        $additional_email = $strPost('additional_email');

        $nominee_name = $strPost('nominee_name');
        $nominee_father_husband_name = $strPost('nominee_father_husband_name');
        $relation_with_applicant = $strPost('relation_with_applicant');
        $nominee_date_of_birth = $strPost('nominee_date_of_birth');
        $nominee_nid_no = $strPost('nominee_nid_no');
        $nominee_mobile_no = $strPost('nominee_mobile_no');
        $nominee_address = $strPost('nominee_address');
        $nominee_share = $strPost('nominee_share');

        $share_type = $strPost('share_type');
        $share_quantity = $strPost('share_quantity');
        $share_price = $strPost('share_price');
        $share_no = $strPost('share_no');
        $total_share_price = $strPost('total_share_price');
        $total_invest_amount = $strPost('total_invest_amount');
        $invest_type = $strPost('invest_type');
        $medium_of_payment = $strPost('medium_of_payment');
        $date_of_payment = $strPost('date_of_payment');
        $transaction_vouchar_no = $strPost('transaction_vouchar_no');

        $bank_name = $strPost('bank_name');
        $branch_name = $strPost('branch_name');
        $account_name = $strPost('account_name');
        $account_no = $strPost('account_no');
        $routing_no = $strPost('routing_no');

        $redirect_form = 'share_application_form';

        if ($applicant_name_bn === '' || $nid_no === '' || $mobile_no === '') {
            $this->session->set_flashdata('application_error', 'Name, NID, Mobile, and TIN are required.');
            redirect($redirect_form);
            return;
        }

        $existingNid = $this->db->where('nid_no', $nid_no)->get('shareholder_applications')->row();
        if ($existingNid) {
            $this->session->set_flashdata('application_error', 'NID Number already exists in system.');
            redirect($redirect_form);
            return;
        }

        $upload_base = FCPATH . 'assets/uploads/shareholder_applications/';
        $dirs = ['applicant_img', 'nid', 'signature', 'documents', 'nominee_img', 'receipts'];
        foreach ($dirs as $dir) {
            $target_dir = $upload_base . $dir;
            if (!is_dir($target_dir) && !mkdir($target_dir, 0755, true) && !is_dir($target_dir)) {
                log_message('error', 'Failed to create upload directory: ' . $target_dir);
                $this->session->set_flashdata('application_error', 'Server upload directory error. Please contact support.');
                redirect($redirect_form);
                return;
            }
        }

        $upload_errors = [];
        $upload_file = function ($field_name, $sub_folder, $allowed_types) use ($upload_base, &$upload_errors) {
            if (!isset($_FILES[$field_name]) || empty($_FILES[$field_name]['name']) || (int) $_FILES[$field_name]['error'] === UPLOAD_ERR_NO_FILE) {
                return null;
            }

            $config = [
                'upload_path' => $upload_base . $sub_folder . '/',
                'allowed_types' => $allowed_types,
                'max_size' => 5120,
                'encrypt_name' => TRUE,
            ];

            $this->upload->initialize($config);

            if ($this->upload->do_upload($field_name)) {
                $upload_data = $this->upload->data();
                return $upload_data['file_name'];
            }

            $err = strip_tags($this->upload->display_errors('', ''));
            log_message('error', "Upload failure ($field_name): " . $err);
            $upload_errors[] = ucfirst(str_replace('_', ' ', $field_name)) . ': ' . $err;
            return null;
        };

        $applicant_img = $upload_file('applicant_img', 'applicant_img', 'jpg|jpeg|png|webp');
        $applicant_nid_att = $upload_file('applicant_nid_att', 'nid', 'pdf|jpg|jpeg|png');
        $applicant_sign = $upload_file('applicant_sign', 'signature', 'jpg|jpeg|png');
        $nominee_nid_att = $upload_file('nominee_nid_att', 'nid', 'jpg|jpeg|png|pdf');
        $nominee_sign = $upload_file('nominee_sign', 'signature', 'jpg|jpeg|png');
        $nominee_img = $upload_file('nominee_img', 'nominee_img', 'jpg|jpeg|png|webp');
        $payment_reciept = $upload_file('payment_reciept', 'receipts', 'jpg|jpeg|png|pdf');
        $documents = $upload_file('documents', 'documents', 'jpg|jpeg|png|pdf');

        if (!empty($upload_errors)) {
            foreach ([$applicant_img, $applicant_nid_att, $applicant_sign, $nominee_nid_att, $nominee_sign, $nominee_img, $payment_reciept, $documents] as $idx => $uploaded_name) {
                $folders = ['applicant_img', 'nid', 'signature', 'nid', 'signature', 'nominee_img', 'receipts', 'documents'];
                if ($uploaded_name) {
                    @unlink($upload_base . $folders[$idx] . '/' . $uploaded_name);
                }
            }

            $this->session->set_flashdata('application_error', implode(' | ', $upload_errors));
            redirect($redirect_form);
            return;
        }

        $this->db->trans_start();

        $main_data = [
            'applicant_name_bn' => $applicant_name_bn,
            'applicant_name_en' => $applicant_name_en,
            'father_name' => $father_name,
            'gender' => $gender,
            'nationality' => $nationality,
            'mother_name' => $mother_name,
            'husband_wife_name' => $husband_wife_name,
            'birth_date' => $birth_date !== '' ? $birth_date : null,
            'profession' => $profession,
            'nid_no' => $nid_no,
            'tin_no' => $tin_no,
            'mobile_no' => $mobile_no,
            'email' => $email,
        ];



        $this->db->insert('shareholder_applications', $main_data);
        $share_application_id = $this->db->insert_id();

        $contact_information = [
            'share_application_id' => $share_application_id,
            'present_village' => $present_village,
            'present_post_office' => $present_post_office,
            'present_sub_district' => $present_sub_district,
            'present_district' => $present_district,
            'permanent_village' => $permanent_village,
            'permanent_post_office' => $permanent_post_office,
            'permanent_sub_district' => $permanent_sub_district,
            'permanent_district' => $permanent_district,
            'additional_email' => $additional_email,
            'additional_contact' => $additional_contact,
        ];
        $this->db->insert('shareholder_contact_information', $contact_information);

        $nominee_information = [
            'share_application_id' => $share_application_id,
            'nominee_name' => $nominee_name,
            'nominee_father_husband_name' => $nominee_father_husband_name,
            'relation_with_applicant' => $relation_with_applicant,
            'nominee_date_of_birth' => $nominee_date_of_birth !== '' ? $nominee_date_of_birth : null,
            'nominee_nid_no' => $nominee_nid_no,
            'nominee_mobile_no' => $nominee_mobile_no,
            'nominee_address' => $nominee_address,
            'nominee_share' => $nominee_share !== '' ? $nominee_share : null,
        ];
        $this->db->insert('shareholder_nominee_information', $nominee_information);

        $invest_share_details = [
            'share_application_id' => $share_application_id,
            'share_type' => $share_type,
            'share_no' => $share_no,
            'share_quantity' => $share_quantity !== '' ? $share_quantity : 0,
            'share_price' => $share_price !== '' ? $share_price : 0,
            'total_share_price' => $total_share_price !== '' ? $total_share_price : 0,
            'total_invest_amount' => $total_invest_amount !== '' ? $total_invest_amount : 0,
            'invest_type' => $invest_type,
            'medium_of_payment' => $medium_of_payment,
            'date_of_payment' => $date_of_payment !== '' ? $date_of_payment : null,
            'transaction_vouchar_no' => $transaction_vouchar_no,
        ];
        $this->db->insert('share_holder_invest_share_details', $invest_share_details);

        // echo '<pre>';
        // print_r($invest_share_details);
        // echo '</pre>';
        // exit;

        $bank_details = [
            'share_application_id' => $share_application_id,
            'bank_name' => $bank_name,
            'branch_name' => $branch_name,
            'account_name' => $account_name,
            'account_no' => $account_no,
            'routing_no' => $routing_no,
        ];
        $this->db->insert('shareholder_bank_details', $bank_details);

        $sharholder_att = [
            'share_application_id' => $share_application_id,
            'applicant_img' => $applicant_img,
            'applicant_nid_att' => $applicant_nid_att,
            'applicant_sign' => $applicant_sign,
            'nominee_nid_att' => $nominee_nid_att,
            'nominee_sign' => $nominee_sign,
            'nominee_img' => $nominee_img,
            'payment_reciept' => $payment_reciept,
            'documents' => $documents,
        ];
        $this->db->insert('shareholder_att', $sharholder_att);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('application_error', 'Unable to submit application. Please try again.');
            redirect($redirect_form);
            return;
        }

        $this->session->set_flashdata('application_success', 'Shareholder application submitted successfully.');
        redirect('success_page');
    }

    public function prev_create_shareholder()
    {



        $applicant_name_bn = trim($this->input->post('applicant_name_bn'));
        $applicant_name_en = trim($this->input->post('applicant_name_en'));
        $father_name = trim($this->input->post('father_name'));
        $mother_name = trim($this->input->post('mother_name'));
        $husband_wife_name = trim($this->input->post('husband_wife_name'));
        $gender = trim($this->input->post('gender'));
        $birth_date = trim($this->input->post('birth_date'));
        $nationality = trim($this->input->post('nationality'));
        $profession = trim($this->input->post('profession'));
        $nid_no = trim($this->input->post('nid_no'));
        $tin_no = trim($this->input->post('tin_no'));


        $present_village = $this->input->post('present_village');
        $present_post_office = $this->input->post('present_post_office');
        $present_sub_district = trim($this->input->post('present_sub_district'));
        $present_district = trim($this->input->post('present_district'));

        $permanent_village = $this->input->post('permanent_village');
        $permanent_post_office = $this->input->post('permanent_post_office');
        $permanent_sub_district = trim($this->input->post('permanent_sub_district'));
        $permanent_district = trim($this->input->post('permanent_district'));

        $mobile_no = trim($this->input->post('mobile_no'));
        $email = trim($this->input->post('email'));



        $nominee_name = trim($this->input->post('nominee_name'));
        $nominee_father_husband_name = trim($this->input->post('nominee_father_husband_name'));
        $relation_with_applicant = trim($this->input->post('relation_with_applicant'));
        $nominee_date_of_birth = trim($this->input->post('nominee_date_of_birth'));
        $nominee_nid_no = trim($this->input->post('nominee_nid_no'));
        $nominee_mobile_no = trim($this->input->post('nominee_mobile_no'));
        $nominee_address = $this->input->post('nominee_address');
        $nominee_share = $this->input->post('nominee_share');


        $share_type = trim($this->input->post('share_type'));
        $share_quantity = trim($this->input->post('share_quantity'));
        $share_price = trim($this->input->post('share_price'));
        $total_invest_amount = trim($this->input->post('total_invest_amount'));
        $invest_type = trim($this->input->post('invest_type'));
        $medium_of_payment = trim($this->input->post('medium_of_payment'));
        $date_of_payment = trim($this->input->post('date_of_payment'));
        $transaction_vouchar_no = trim($this->input->post('transaction_vouchar_no'));


        $bank_name = trim($this->input->post('bank_name'));
        $branch_name = trim($this->input->post('branch_name'));
        $account_name = trim($this->input->post('account_name'));
        $account_no = trim($this->input->post('account_no'));
        $routing_no = trim($this->input->post('routing_no'));


        $applicant_img = trim($this->input->post('applicant_img'));
        $applicant_nid_att = trim($this->input->post('applicant_nid_att'));
        $applicant_sign = trim($this->input->post('applicant_sign'));
        $nominee_nid_att = trim($this->input->post('nominee_nid_att'));
        $nominee_img = trim($this->input->post('nominee_img'));
        $payment_reciept = trim($this->input->post('payment_reciept'));
        $documents = trim($this->input->post('documents'));
        $nominee_sign = trim($this->input->post('nominee_sign'));





        if (empty($applicant_name_bn) || empty($nid_no) || empty($tin_no) || empty($mobile_no)) {
            $this->session->set_flashdata('application_error', 'Name, NID, Mobile, and TIN are required.');
            redirect('application_form');
            return;
        }

        if (!empty($nid_no)) {
            $existingNid = $this->db->where('nid_no', $nid_no)->get('shareholder_applications')->row();
            if ($existingNid) {
                $this->session->set_flashdata('application_error', 'NID Number already exists in system.');
                redirect('share_application_form');
                return;
            }
        }

        $upload_base = FCPATH . 'assets/uploads/shareholder_applications/';
        $dirs = ['applicant_img', 'nid', 'signature', 'documents', 'nominee_img'];
        foreach ($dirs as $dir) {
            if (!is_dir($upload_base . $dir)) {
                mkdir($upload_base . $dir, 0777, true);
            }
        }

        $upload_file = function ($field_name, $sub_folder, $allowed_types) {
            if (isset($_FILES[$field_name]) && !empty($_FILES[$field_name]['name'])) {
                $config['upload_path'] = './assets/uploads/shareholder_applications/' . $sub_folder;
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

        $applicant_img = $upload_file('applicant_img', 'applicant_img', 'jpg|jpeg|png|webp');
        $applicant_nid_att = $upload_file('applicant_nid_att', 'nid', 'pdf|jpg|jpeg|png');
        $applicant_sign = $upload_file('applicant_sign', 'signature', 'jpg|jpeg|png');
        $nominee_nid_att = $upload_file('nominee_nid_att', 'nid', 'jpg|jpeg|png');
        $nominee_sign = $upload_file('nominee_sign', 'signature', 'jpg|jpeg|png');
        $nominee_img = $upload_file('nominee_img', 'nominee_img', 'jpg|jpeg|png');
        $payment_reciept = $upload_file('payment_reciept', 'signature', 'jpg|jpeg|png|pdf');
        $documents = $upload_file('documents', 'documents', 'jpg|jpeg|png|pdf');

        $this->db->trans_start();

        $main_data = array(
            'applicant_name_bn' => $applicant_name_bn,
            'applicant_name_en' => $applicant_name_en,
            'father_name' => $father_name,
            'gender' => $gender,
            'nationality' => $nationality,
            'mother_name' => $mother_name,
            'husband_wife_name' => $husband_wife_name,
            'birth_date' => $birth_date,
            'profession' => $profession,
            'tin_no' => $tin_no,
            'mobile_no' => $mobile_no,
            'email' => $email,
        );

        $this->db->insert('shareholder_applications', $main_data);
        $share_application_id = $this->db->insert_id();


        $contact_information = array(
            'share_application_id' => $share_application_id,

            'present_village' => $present_village,
            'present_post_office' => $present_post_office,
            'present_sub_district' => $present_sub_district,
            'present_district' => $present_district,

            'permanent_village' => $permanent_village,
            'permanent_post_office' => $permanent_post_office,
            'permanent_sub_district' => $permanent_sub_district,
            'permanent_district' => $permanent_district,
        );
        $this->db->insert('contact_information', $contact_information);

        $nominee_information = array(
            'share_application_id' => $share_application_id,
            'nominee_name' => $nominee_name,
            'nominee_father_husband_name' => $nominee_father_husband_name,
            'relation_with_applicant' => $relation_with_applicant,
            'nominee_date_of_birth' => $nominee_date_of_birth,
            'nominee_nid_no' => $nominee_nid_no,
            'nominee_mobile_no' => $nominee_mobile_no,
            'nominee_address' => $nominee_address,
            'nominee_share' => $nominee_share,
        );
        $this->db->insert('nominee_information', $nominee_information);

        $invest_share_details = array(
            'share_application_id' => $share_application_id,
            'share_type' => $share_type,
            'share_quantity' => $share_quantity,
            'share_price' => $share_price,
            'total_invest_amount' => $total_invest_amount,
            'invest_type' => $invest_type,
            'medium_of_payment' => $medium_of_payment,
            'date_of_payment' => $date_of_payment,
            'transaction_vouchar_no' => $transaction_vouchar_no,
        );
        $this->db->insert('invest_share_details', $invest_share_details);

        $bank_details = array(
            'share_application_id' => $share_application_id,
            'bank_name' => $bank_name,
            'branch_name' => $branch_name,
            'account_name' => $account_name,
            'account_no' => $account_no,
            'routing_no' => $routing_no,

        );
        $this->db->insert('bank_details', $bank_details);

        $sharholder_att = array(
            'share_application_id' => $share_application_id,
            'applicant_img' => $applicant_img,
            'applicant_nid_att' => $applicant_nid_att,
            'applicant_sign' => $applicant_sign,
            'nominee_nid_att' => $nominee_nid_att,
            'nominee_sign' => $nominee_sign,
            'nominee_img' => $nominee_img,
            'payment_reciept' => $payment_reciept,
            'documents' => $documents,
        );
        $this->db->insert('sharholder_att', $sharholder_att);





        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('application_error', 'Unable to submit application. Please try again.');
            redirect('share_application_form');
        } else {
            $this->session->set_flashdata('application_success', 'Job application submitted successfully.');
            redirect('success_page');
        }
    }

    private function _apply_applications_filters(array $filters)
    {
        if (isset($filters['search']) && $filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('nid_no', $filters['search']);
            $this->db->or_like('mobile_no', $filters['search']);
            $this->db->or_like('email', $filters['search']);
            $this->db->group_end();
        }

        if (isset($filters['nid_no']) && $filters['nid_no'] !== '') {
            $this->db->like('nid_no', $filters['nid_no']);
        }

        if (isset($filters['mobile_no']) && $filters['mobile_no'] !== '') {
            $this->db->like('mobile_no', $filters['mobile_no']);
        }

        if (isset($filters['email']) && $filters['email'] !== '') {
            $this->db->like('email', $filters['email']);
        }
    }

    public function pending_shareholder_applications_list()
    {
        $data = $this->engine->store_nav(
            'Applications',
            'Applications',
            'Pending Shareholder List'
        );

        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'nid_no' => trim((string) $this->input->get('nid_no', TRUE)),
            'mobile_no' => trim((string) $this->input->get('mobile_no', TRUE)),
            'email' => trim((string) $this->input->get('email', TRUE)),
        );

        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_applications_filters($filters);
        $this->db->where('status', 'Pending');
        $total_rows = $this->db->count_all_results('shareholder_applications');

        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('pending_shareholder_applications_list'),
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
        $this->db->where('status', 'pending');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $page);
        $data['shareholder_applications'] = $this->db->get('shareholder_applications')->result();

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;
        $data['title'] = $data['tittle'] ?? 'Pending Applications List';

        $path = 'admin/shareholder/pending_shareholder_applications_list';

        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }


    public function shareholder_details($id = NULL)
    {


        if (empty($id)) {
            show_404();
        }

        $this->db->where('id', $id);
        $shareholder_applications = $this->db->get('shareholder_applications')->row();

        $this->db->where('share_application_id ', $id);
        $shareholder_att = $this->db->get('shareholder_att')->result();

        $this->db->where('share_application_id  ', $id);
        $shareholder_bank_details = $this->db->get('shareholder_bank_details')->result();

        $this->db->where('share_application_id  ', $id);
        $shareholder_contact_information = $this->db->get('shareholder_contact_information')->result();

        $this->db->where('share_application_id  ', $id);
        $shareholder_nominee_information = $this->db->get('shareholder_nominee_information')->result();

        $this->db->where('share_application_id  ', $id);
        $share_holder_invest_share_details = $this->db->get('share_holder_invest_share_details')->result();


        if (!$shareholder_applications) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'apllicant',
            'apllicant',
            'apllicant Details'
        );


        $data['shareholder_applications'] = $shareholder_applications;
        $data['shareholder_att'] = $shareholder_att;
        $data['shareholder_bank_details'] = $shareholder_bank_details;
        $data['shareholder_contact_information'] = $shareholder_contact_information;
        $data['shareholder_nominee_information'] = $shareholder_nominee_information;
        $data['share_holder_invest_share_details'] = $share_holder_invest_share_details;

        $path = 'admin/shareholder/share_application_form_view';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }







}
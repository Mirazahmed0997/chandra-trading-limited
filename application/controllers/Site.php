<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller
{

	private $main_layout = 'site/master_layout';
	private $header = 'site/header';
	private $footer = 'site/footer';
	private $serverDateTime = '';
	public function __construct()
	{
		parent::__construct();
	}

	protected function check_login()
	{
		$user = $this->session->userdata('login_user_info_all');

		if (!$user) {
			$this->session->set_flashdata('login_error', 'Please login first');
			redirect('user_login_form');
			// exit;
		}

		return $user;
	}
	protected function check_login_user()
	{
		$user = $this->session->userdata('login_user_info_all');

		if (!$user) {
			$this->session->set_flashdata('error', 'পেইজটি এক্সেসেস করতে, দয়া করে আইডি লগইন করুন');
			redirect('admin');
			// exit;
		}
		return $user;
	}


	public function index()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');
		$ip = $this->input->ip_address();
		$db_ip = $this->Common->get_data_single_conditional('visitors', 'ip', $ip)->row();
		if (!empty($db_ip)) {
			$data_table = array(
				'date' => get_current_time(),
				'hits' => $db_ip->hits + 1,
			);
			$table = 'visitors';
			$this->Common->update_data($table, 'id', $db_ip->id, $data_table);

		} else {
			$data_table = array(
				'date' => get_current_time(),
				'ip' => $ip,
				'hits' => 1,
			);
			$table = 'visitors';
			$this->Common->set_data($table, $data_table);

		}

		$where_notice['status'] = 1;
		$data['notices'] = $this->Common->get_data_multi_conditional_desc('notice_board', $where_notice, 'id')->result();
		$data['prize'] = $this->Common->get_data('prize')->result();
		$data['social_works'] = $this->Common->get_data('page4')->result();
		$data['somity_works'] = $this->Common->get_data('page1')->result();
		$data['songothon_works'] = $this->Common->get_data('page6')->result();
		$where_data_slide['status'] = 1;
		$data['slider_images'] = $this->Common->get_data_multi_conditional_desc('slider', $where_data_slide, 'id')->result();
		$data['our_info'] = $this->Common->get_data('page7')->result();
		$data['partners'] = $this->Common->get_data('page2')->result();
		$data['president'] = $this->Common->get_data_multi_conditional_limit_desc('president', 'id', 1)->row();
		$data['secretary'] = $this->Common->get_data_multi_conditional_limit_desc('jointsecretary', 'id', 1)->row();
		$data['ceo'] = $this->Common->get_data_multi_conditional_limit_desc('ceo', 'id', 1)->row();
		// $data['vice_presidents'] = $this->Common->get_data('vpresidentpic')->result();
		$data['emp_recruitment'] = $this->Common->get_data('page5')->result();
		$data['management_info'] = $this->Common->get_data('page3')->result();
		$data['social_media'] = $this->Common->get_data('media')->row();
		$where_data_br['status'] = 1;
		$data['ftchBrakingNws'] = $this->Common->get_data_multi_conditional_desc('tbl_breking_news', $where_data_br, 'id')->result();
		$where_data_vd['status'] = 1;
		$data['videos'] = $this->Common->get_data_conditional_limit_desc('video', $where_data_vd, 'id', 6)->result();
		$path = 'site/pages/homepage';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}




	//   ---------------------------- function for file uploads------------------

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





	public function all_products()
	{
		$this->check_login_user();
		$data = $this->engine->store_nav('site', 'Nothing', 'products');
		$path = 'site/pages/all_products/product_card';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function checkout()
	{
		$this->check_login_user();
		$data = $this->engine->store_nav('site', 'Nothing', 'products');
		$path = 'site/pages/checkout/checkout';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	// ---------------------create member-----------------

	public function our_mission()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/about_us/our_mission";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function our_managment()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/about_us/our_managment";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function contact_us()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Contact Us');
		$path = "site/pages/contact_us/contact_us";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function our_vission()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/about_us/our_vission";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function our_concern()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/our_concern/our_concern";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function showcase()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/showcase/showcase";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function properties()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/properties/properties";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
	public function visit_book()
	{
		$this->check_login();
		$data = $this->engine->store_nav('site', 'Nothing', 'Our Mission');

		$path = "site/pages/visit_book/visit_book";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}


	public function application_form()
	{
		// $this->check_access('Add new Properties');
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

		$path = 'admin/staff_recruitment/application_form';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	public function create_application()
	{
		// $this->check_access('Add Job Application');

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

		// echo '<pre>';
        // print_r($photo_url);
        // print_r($nid_document);
        // echo '</pre>';
        // exit;

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

	public function success_page()
	{
		// $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
		// $path = "site/pages/success_page";
		$this->load->view('site/pages/success_page');
		// $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}



}
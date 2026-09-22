<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends  MY_Controller
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
			redirect('member_login');
			// exit;
		}

		echo($user->active_status);

		if ($user->active_status != 1) {
			$this->session->set_flashdata('error', 'আপনার মেম্বারশিপ একটিভ নয়, দয়া করে কতৃপক্ষের সাথে যোগাযোগ করুন');
			redirect('member_login');
			exit;
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

	public function member_application()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'সদস্য আবেদন ফরম');

		$path = "site/pages/member_application";
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}
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


	public function member_application_save()
	{

		$mobile_number = $this->input->post('mobile_number');


		$this->db->where('mobile_number', $mobile_number);
		$existing_member = $this->db->get('members_n')->row();

		if ($existing_member) {
			$this->session->set_flashdata('error', 'ইতিমধ্যে এই নম্বর যে একজন সদস্য বিদ্যমান!');
			redirect('member_registration');
			return;
		}

		$logo = $this->upload_file('logo', './assets/uploads/project/members/logo/');
		$document_1 = $this->upload_file('document_1', './assets/uploads/project/members/members_document/');
		$nomini_sign = $this->upload_file('nomini_sign', './assets/uploads/project/members/nominee_sign/');
		$Admission_Issuer_sign = $this->upload_file('Admission_Issuer_sign', './assets/uploads/project/members/admission_issuer_sign/');

		$data = array(

			'sarok_no' => $this->input->post('sarok_no'),
			'sarok_date' => $this->input->post('sarok_date'),

			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'nid' => $this->input->post('nid'),
			'birth_date' => $this->input->post('birth_date'),
			'mobile_number' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),

			'village' => $this->input->post('village'),
			'post' => $this->input->post('post'),
			'sub_district' => $this->input->post('sub_district'),
			'district' => $this->input->post('district'),

			'association_designation' => $this->input->post('association_designation'),
			'association_district' => $this->input->post('association_district'),
			'association_name' => $this->input->post('association_name'),

			'paid_amount' => $this->input->post('paid_amount'),
			'voucher_no' => $this->input->post('voucher_no'),
			'managing_committee_date' => $this->input->post('managing_committee_date'),

			'Cooperative_association_name' => $this->input->post('Cooperative_association_name'),
			'Cooperative_association_number' => $this->input->post('Cooperative_association_number'),
			'Cooperative_association_registration_address' => $this->input->post('Cooperative_association_registration_address'),
			'Cooperative_association_address' => $this->input->post('Cooperative_association_address'),
			'Cooperative_association_chairman' => $this->input->post('Cooperative_association_chairman'),
			'Cooperative_association_secretary' => $this->input->post('Cooperative_association_secretary'),
			'Cooperative_association_registration_no' => $this->input->post('Cooperative_association_registration_no'),
			'Cooperative_association_registration_date' => $this->input->post('Cooperative_association_registration_date'),
			'Cooperative_association_class' => $this->input->post('Cooperative_association_class'),
			'Cooperative_association_type' => $this->input->post('Cooperative_association_type'),
			'Cooperative_association_member_count' => $this->input->post('Cooperative_association_member_count'),
			'Cooperative_association_working_area' => $this->input->post('Cooperative_association_working_area'),

			'nomini_name' => $this->input->post('nomini_name'),
			'nomini_designation' => $this->input->post('nomini_designation'),
			'nomini_mobile_no' => $this->input->post('nomini_mobile_no'),
			'nomini_date' => $this->input->post('nomini_date'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

			'Admission_Issue_date' => $this->input->post('Admission_Issue_date'),
			'Admission_Issuer_designation' => $this->input->post('Admission_Issuer_designation'),

			'logo' => $logo,
			'document_1' => $document_1,
			'nomini_sign' => $nomini_sign,
			'Admission_Issuer_sign' => $Admission_Issuer_sign,
		);

		$this->db->insert('members_n', $data);
		$this->session->set_flashdata('success', 'অভিনন্দন, আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে। সদস্যপদ টি একটিভ করতে সদস্য ফী প্রদান করুন ');
		redirect('member_login');
	}


	// ---------------------Edit member's Data-----------------


	public function edit_member($id)
	{
		$data['member'] = $this->db->get_where('members_n', ['id' => $id])->row();
		$this->load->view('site/members_list/updateForm', $data);
	}


	public function update_member($id)
	{
		$member = $this->db->get_where('members_n', ['id' => $id])->row();

		$update_data = [
			'sarok_no' => $this->input->post('sarok_no'),
			'sarok_date' => $this->input->post('sarok_date'),

			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'nid' => $this->input->post('nid'),
			'birth_date' => $this->input->post('birth_date'),
			'mobile_number' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender'),

			'village' => $this->input->post('village'),
			'post' => $this->input->post('post'),
			'sub_district' => $this->input->post('sub_district'),
			'district' => $this->input->post('district'),

			'association_designation' => $this->input->post('association_designation'),
			'association_district' => $this->input->post('association_district'),
			'association_name' => $this->input->post('association_name'),

			'paid_amount' => $this->input->post('paid_amount'),
			'voucher_no' => $this->input->post('voucher_no'),
			'managing_committee_date' => $this->input->post('managing_committee_date'),

			'Cooperative_association_name' => $this->input->post('Cooperative_association_name'),
			'Cooperative_association_number' => $this->input->post('Cooperative_association_number'),
			'Cooperative_association_registration_address' => $this->input->post('Cooperative_association_registration_address'),

			'Cooperative_association_address' => $this->input->post('Cooperative_association_address'),
			'Cooperative_association_chairman' => $this->input->post('Cooperative_association_chairman'),
			'Cooperative_association_secretary' => $this->input->post('Cooperative_association_secretary'),
			'Cooperative_association_registration_no' => $this->input->post('Cooperative_association_registration_no'),
			'Cooperative_association_registration_date' => $this->input->post('Cooperative_association_registration_date'),
			'Cooperative_association_class' => $this->input->post('Cooperative_association_class'),
			'Cooperative_association_type' => $this->input->post('Cooperative_association_type'),
			'Cooperative_association_member_count' => $this->input->post('Cooperative_association_member_count'),
			'Cooperative_association_working_area' => $this->input->post('Cooperative_association_working_area'),

			'nomini_name' => $this->input->post('nomini_name'),
			'nomini_designation' => $this->input->post('nomini_designation'),
			'nomini_mobile_no' => $this->input->post('nomini_mobile_no'),
			'nomini_date' => $this->input->post('nomini_date'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

			'Admission_Issue_date' => $this->input->post('Admission_Issue_date'),
			'Admission_Issuer_designation' => $this->input->post('Admission_Issuer_designation'),

		];

		// Handle file uploads


		function update_file($field_name, $upload_path, $old_file = '', $allowed_types = '*')
		{
			$CI =& get_instance();

			if (!empty($_FILES[$field_name]['name'])) {

				$config['upload_path'] = $upload_path;
				$config['allowed_types'] = $allowed_types;
				$config['file_name'] = time() . '_' . $_FILES[$field_name]['name'];

				$CI->load->library('upload');
				$CI->upload->initialize($config);

				if ($CI->upload->do_upload($field_name)) {

					$uploadData = $CI->upload->data();
					$new_file = $uploadData['file_name'];

					// delete old file
					if (!empty($old_file) && file_exists($upload_path . $old_file)) {
						unlink($upload_path . $old_file);
					}

					return $new_file;
				}
			}

			return $old_file;
		}

		$update_data['logo'] = update_file(
			'logo',
			'./assets/uploads/project/members/logo/',
			$member->logo,
			'jpg|jpeg|png'
		);

		$update_data['nomini_sign'] = update_file(
			'nomini_sign',
			'./assets/uploads/project/members/nominee_sign/',
			$member->nomini_sign,
			'jpg|jpeg|png'
		);

		$update_data['document_1'] = update_file(
			'document_1',
			'./assets/uploads/project/members/members_document',
			$member->document_1,
			'pdf'
		);


		$update_data['Admission_Issuer_sign'] = update_file(
			'Admission_Issuer_sign',
			'./assets/uploads/project/members/admission_issuer_sign/',
			$member->Admission_Issuer_sign,
			'jpg|jpeg|png'
		);

		$this->db->where('id', $id);
		$this->db->update('members_n', $update_data);

		redirect(base_url('applicant/members_list/member_Details/' . $id));
	}

}
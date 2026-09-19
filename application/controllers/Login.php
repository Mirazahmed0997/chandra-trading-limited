<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	private $main_layout = 'site/master_layout';
	private $header = 'site/header';
	private $footer = 'site/footer';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function index()
	{
		$data = $this->engine->store_nav('site', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$data['ftchBrakingNws'] = $this->Common->get_data('tbl_breking_news')->result();
		$path = 'login/login';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}


	public function admin_registration()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/registration/registration';
		$this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
	}

	public function admin_registration_saved()
	{
			$username= $this->input->post('username');
			$mobile_number= $this->input->post('mobile_number');

			$this->db->where("username", $username);
			$this->db->where("mobile_number", $mobile_number);

			$isExist= $this->db->get("users")->row();
			if ($isExist) {
			$this->session->set_flashdata('error', 'Already registered');

			redirect('admin_dashboard');
			return;
		}


		$data = array(

			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),

			'username' => $this->input->post('username'),
			'mobile_number' => $this->input->post('mobile_number'),
			'designation' => $this->input->post('designation'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);

		$this->db->insert('users', $data);
		redirect("admin_dashboard");


	}

}
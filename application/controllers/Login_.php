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

}

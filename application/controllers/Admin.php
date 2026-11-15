<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

	}


	public function index()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

		$data['users_count'] = $this->db->count_all('users');

		$data['contact_messages_count'] = $this->db->count_all('contact_messages');

		$data['landowner_leads_count'] = $this->db->count_all('landowner_leads');

		$data['projects_count'] = $this->db->count_all('projects');

		$data['property_bookings_count'] = $this->db->count_all('property_bookings');


		$data['news_count'] = $this->db
			->where('status', 1)
			->count_all_results('news');

		$path = 'admin/dashboard';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
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



	public function require_super_admin()
	{
		$user = $this->session->userdata('login_user_info_all');
		// echo $user;
		// exit;

		if ($user->role !== 'super_admin') {
			$this->session->set_flashdata('error', 'Only Super Admin have access to Update & Delete user.');
			redirect('admin/users_list/users_list');
			exit;
		}
	}

	public function menu_access($user_id)
	{

		$menus = $this->input->post('menus');

		$this->db->where('user_id', $user_id);
		$this->db->delete('user_menu_access');

		foreach ($menus as $menu) {
			$this->db->insert('user_menu_access', [
				'user_id' => $user_id,
				'menu_key' => $menu
			]);
		}

		redirect($_SERVER['HTTP_REFERER']);
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

	public function admin_registration()
	{
		$this->check_access('Add new User');
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

		$path = 'admin/registration/registration';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function admin_registration_saved()
	{
		// echo '<pre>';
		// print_r($this->input->post());
		// echo '</pre>';
		// exit;
		$this->check_access('Add new User');
		$username = $this->input->post('username');
		$mobile_number = $this->input->post('mobile_number');
		$email = $this->input->post('email');
		$user_sign = $this->upload_file('user_sign', './assets/uploads/user_sign/');



		$this->db->where("username", $username);
		$this->db->where("mobile_number", $mobile_number);
		$this->db->where("email", $email);





		$isExist = $this->db->get("users")->row();
		if ($isExist) {
			$this->session->set_flashdata('reg_error', 'Already registered with this number');
			redirect('admin_registration_form');
			return;
		}




		$data = array(

			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),

			'username' => $this->input->post('username'),
			'mobile_number' => $this->input->post('mobile_number'),
			'designation' => $this->input->post('designation'),
			'role' => $this->input->post('role'),
			'password' => $this->input->post('password'),
			'user_sign' => $user_sign
			// 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);

		$this->db->insert('users', $data);
		redirect("user_list");


	}


	public function admin_profile()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
		$loggedUser = $this->session->userdata('login_user_info_all');

		$data['user'] = $this->db
			->where('id', $loggedUser->id)
			->get('users')
			->row();

		$path = 'admin/users_list/users_profile';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function change_password()
	{
		$loggedUser = $this->session->userdata('login_user_info_all');


		if (!$loggedUser) {
			redirect('login');
			return;
		}

		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');

		// echo '<pre>';
		// print_r($current_password);
		// print_r($new_password);
		// print_r($confirm_password);
		// echo '</pre>';
		// exit;



		if (empty($current_password) || empty($new_password) || empty($confirm_password)) {

			$this->session->set_flashdata(
				'pass_error',
				'All password fields are required.'
			);

			redirect($_SERVER['HTTP_REFERER']);
			return;
		}

		if ($new_password !== $confirm_password) {

			$this->session->set_flashdata(
				'pass_error',
				'New password and confirm password do not match.'
			);

			redirect($_SERVER['HTTP_REFERER']);
			return;
		}

		if (strlen($new_password) < 6) {

			$this->session->set_flashdata(
				'pass_error',
				'New password must be at least 6 characters long.'
			);

			redirect($_SERVER['HTTP_REFERER']);
			return;
		}

		$user = $this->db
			->where('id', $loggedUser->id)
			->get('users')
			->row();



		// echo '<pre>';
		// print_r($loggedUser);
		// print_r($user);
		// exit;
		if (!$user) {

			$this->session->set_flashdata(
				'pass_error',
				'User account not found.'
			);

			redirect($_SERVER['HTTP_REFERER']);
			return;
		}

		if ($current_password !== $user->password) {

			$this->session->set_flashdata(
				'pass_error',
				'Current password is incorrect.'
			);

			redirect($_SERVER['HTTP_REFERER']);
			return;
		}

		// $hashed_password = password_hash(
		// 	$new_password,
		// 	PASSWORD_DEFAULT
		// );



		$this->db
			->where('id', $loggedUser->id)
			->update('users', [
				'password' => $new_password
			]);

		if ($this->db->affected_rows() > 0) {

			$this->session->set_flashdata(
				'success',
				'Password changed successfully.'
			);

		} else {

			$this->session->set_flashdata(
				'pass_error',
				'Unable to change password. Please try again.'
			);
		}

		redirect($_SERVER['HTTP_REFERER']);
	}



	public function update_admin_profile()
	{
		$loggedUser = $this->session->userdata('login_user_info_all');

		if (!$loggedUser) {
			redirect('admin_login');
			return;
		}

		$user = $this->db->get_where('users', [
			'id' => $loggedUser->id
		])->row();

		if (!$user) {
			show_404();
			return;
		}

		$update_data = [
			'first_name' => $this->input->post('first_name', TRUE),
			'last_name' => $this->input->post('last_name', TRUE),
			'username' => $this->input->post('username', TRUE),
			'mobile_number' => $this->input->post('mobile_number', TRUE),
			'email' => $this->input->post('email', TRUE),
			'designation' => $this->input->post('designation', TRUE),
		];

		if (!empty($_FILES['user_img']['name'])) {
			$update_data['user_img'] = update_file(
				'user_img',
				'./assets/uploads/user_img/',
				$user->user_img,
				'jpg|jpeg|png'
			);
		}

		if (!empty($_FILES['user_sign']['name'])) {
			$update_data['user_sign'] = update_file(
				'user_sign',
				'./assets/uploads/user_sign/',
				$user->user_sign,
				'jpg|jpeg|png'
			);
		}

		$this->db->where('id', $user->id);
		$this->db->update('users', $update_data);

		$updatedUser = $this->db->get_where('users', [
			'id' => $user->id
		])->row();

		$this->session->set_userdata('login_user_info_all', $updatedUser);

		$this->session->set_flashdata('success', 'Profile updated successfully.');

		redirect('admin_profile');
	}


	// ----------------------------users list--------------------



	public function users_list()
	{
		$this->check_access('User');
		$data = $this->engine->store_nav('users_list', 'users_list', 'User List');

		$where_data = array();

		$id = $this->input->get('id');
		$username = $this->input->get('username');
		$mobile_number = $this->input->get('mobile_number');
		$role = $this->input->get('role');

		if (!empty($id)) {
			$where_data['id'] = $id;
		}

		if (!empty($username)) {
			$where_data['username'] = $username;
		}

		if (!empty($mobile_number)) {
			$where_data['mobile_number'] = $mobile_number;
		}

		if (!empty($role)) {
			$where_data['role'] = $role;
		}

		if (!empty($where_data)) {
			$this->db->where($where_data);
		}



		$data['users'] = $this->db->get('users')->result();

		$path = 'admin/users_list/users_list';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// -----------------------update users role--------------

	public function update_users_role($id)
	{
		$this->check_access('User');
		$this->require_super_admin();
		$users = $this->db->get_where('users', ['id' => $id])->row();

		$update_data = [

			'role' => $this->input->post('role'),
		];


		$this->db->where('id', $id);
		$this->db->update('users', $update_data);

		redirect(base_url('admin/users_list/users_list'));
	}



	// ---------------single user detail-----------------------


	public function view_user($id = null)
	{
		$this->check_access('User');
		if (empty($id)) {
			redirect(base_url('Admin/users_list'));
		}

		$data = $this->engine->store_nav('users_list', 'users_list', 'User List');

		$data['user'] = $this->Common->get_data_single_conditional('users', 'id', $id)->row();

		if (!$data['user']) {
			show_404();
		}

		$path = 'admin/users_list/users_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function view_profile()
	{
		$this->check_access('User');
		$data = $this->engine->store_nav(
			'users_list',
			'users_list',
			'user info'
		);

		$login_user = $this->session->userdata('login_user_info_all');

		if (!$login_user || empty($login_user->id)) {
			redirect(base_url('Admin/login'));
		}

		$user_id = $login_user->id;

		$data['user'] = $this->Common
			->get_data_single_conditional('users', 'id', $user_id)
			->row();

		if (!$data['user']) {
			show_404();
		}

		$path = 'admin/users_list/users_profile';

		$this->engine->render_view(
			$data,
			$path,
			$this->side_menu,
			$this->main_layout
		);
	}


	// -------------------Upadate USer-----------------
	public function update_users_details($id)
	{
		$this->check_access('User');
		$users = $this->db->get_where('users', ['id' => $id])->row();

		$update_data = [

			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),

			'username' => $this->input->post('username'),
			'mobile_number' => $this->input->post('mobile_number'),
			'designation' => $this->input->post('designation'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];


		$this->db->where('id', $id);
		$this->db->update('users', $update_data);

		redirect(base_url('admin/users_list/users_details'));
	}



	// ---------------------delete user-----------------

	public function delete_user($id)
	{
		$this->check_access('User');
		$this->require_super_admin();
		$this->Common->delete_data('users', 'id', $id);
		redirect('admin/users_list/users_details');
	}


	public function admin_property_book_data()
	{
		$this->check_access('Bookings');
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

		$config['base_url'] = base_url('admin_property_book_data');
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

		$path = 'admin/admin_property_book_data/admin_property_book_data';


		$this->engine->render_view(
			$data,
			$path,
			$this->side_menu,
			$this->main_layout
		);
	}

	public function admin_booked_property_details($id = NULL)
	{
		$this->check_access('Bookings');


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

		$path = 'admin/admin_property_book_data/admin_booked_property_details';
		$this->engine->render_view(
			$data,
			$path,
			$this->side_menu,
			$this->main_layout
		);
	}



	public function update_booked_property_status($id)
	{
		$property = $this->db->get_where('property_bookings', ['id' => $id])->row();

		$update_data = [

			'status' => $this->input->post('status'),
		];


		$this->db->where('id', $id);
		$this->db->update('property_bookings', $update_data);

		redirect(base_url('admin_property_book_data'));
	}

	public function admin_property_visit_data()
	{



		$this->check_access('Site Visits');
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

		$config['base_url'] = base_url('admin_property_visit_data');
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

		$path = 'admin/admin_visit_bookings/admin_visit_bookings';


		$this->engine->render_view(
			$data,
			$path,
			$this->side_menu,
			$this->main_layout
		);
	}

	public function admin_booked_property_visit_details($id = NULL)
	{
		$this->check_access('Site Visits');


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

		$path = 'admin/admin_property_book_data/admin_booked_property_details';
		$this->engine->render_view(
			$data,
			$path,
			$this->side_menu,
			$this->main_layout
		);
	}

	public function update_booked_property_visit_status($id)
	{
		$property = $this->db->get_where('visit_bookings', ['id' => $id])->row();

		$update_data = [

			'status' => $this->input->post('status'),
		];


		$this->db->where('id', $id);
		$this->db->update('visit_bookings', $update_data);

		redirect(base_url('admin_property_visit_data'));
	}


	public function set_attendence_form()
	{
		$this->check_access('Set Attendence');
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

		$path = 'admin/attendance/set_attendance';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function set_attendence()
	{
		$this->check_access('Set Attendence');

		$staff_id = trim($this->input->post('staff_id'));

		$this->db->where('staff_id', $staff_id);
		$existing_staff_id = $this->db->get('staff_attendance_settings')->row();

		if ($existing_staff_id) {
			$this->session->set_flashdata('existing_staff_id_error', 'Already set attendance for this staff');
			redirect('set_attendence_form');
			return;
		}

		$office_start = trim($this->input->post('office_start'));
		$office_end = trim($this->input->post('office_end'));
		$grace_minutes = trim($this->input->post('grace_minutes'));
		$weekend_day = trim($this->input->post('weekend_day'));
		$working_hours = trim($this->input->post('working_hours'));

		// $entry_time = DateTime::createFromFormat('h:i A', $office_start);
		// $exit_time = DateTime::createFromFormat('h:i A', $office_end);

		$data = array(
			'staff_id' => $staff_id,
			'office_start' => $office_start,
			'office_end' => $office_end,
			// 'office_start' => $entry_time ? $entry_time->format('H:i:s') : $office_start,
			// 'office_end' => $exit_time ? $exit_time->format('H:i:s') : $office_end,
			'grace_minutes' => $grace_minutes,
			'weekend_day' => $weekend_day,
			'working_hours' => $working_hours
		);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$insert = $this->db->insert('staff_attendance_settings', $data);

		if ($insert) {
			$this->session->set_flashdata(
				'set_attendence_success',
				'Attendance set successfully.'
			);
			redirect('set_attendence_form');
		} else {
			$this->session->set_flashdata(
				'set_attendence_error',
				'Unable to set attendance. Please try again.'
			);
			redirect('set_attendence_form');
		}
	}

	public function set_holidays_form()
	{
		$this->check_access('Set Holidays');
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

		$path = 'admin/attendance/set_holidays';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function set_holidays()
	{
		$this->check_access('Set Holidays');

		$holiday_name = $this->input->post("holiday_name");
		$holiday_date = $this->input->post("holiday_date");
		$holiday_type = $this->input->post("holiday_type");
		$description = $this->input->post("description");

		$data = array(
			'holiday_name' => $holiday_name,
			'holiday_date' => $holiday_date,
			'holiday_type' => $holiday_type,
			'description' => $description,
		);

		$insert = $this->db->insert('staff_holidays', $data);


		if ($insert) {
			$this->session->set_flashdata(
				'set_holiday_success',
				'Successfully set holiday.'
			);
			redirect('set_holidays_form');
		} else {
			$this->session->set_flashdata(
				'set_holiday_error',
				'Unable to set . Please try again.'
			);
			redirect('set_holidays_form');
		}

	}





	public function admin_leave_application_list()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');



		$per_page = 10;

		$page = (int) $this->input->get('page');

		if ($page < 0) {
			$page = 0;
		}


		$total_rows = $this->db->count_all_results('staff_leave_applications');

		$this->load->library('pagination');

		$config = array(
			'base_url' => base_url('admin_leave_application_list'),
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


		$this->db->order_by('id', 'DESC');
		$this->db->limit($per_page, $page);



		$data['applications'] = $this->db
			->get('staff_leave_applications')
			->result();


		$data['total_rows'] = $total_rows;
		$data['pagination'] = $this->pagination->create_links();
		$data['page'] = $page;
		$data['per_page'] = $per_page;
		$data['sl_start'] = $page + 1;

		// echo '<pre>';
		// print_r($data['staff_attendance']);
		// echo '</pre>';
		// exit;

		$path = 'admin/attendance/leave_application_list';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function admin_leave_application_details($id = NULL)
	{
		if (empty($id)) {
			show_404();
		}

		$this->db->where('id', $id);
		$staff_leave_applications = $this->db->get('staff_leave_applications')->row();

		$staff_id = $staff_leave_applications->staff_id;




		$this->db->where('staff_id', $staff_id);
		$staff_info = $this->db->get('staff_login_info')->row();

		// echo '<pre>';
		// print_r($staff_info);
		// echo '</pre>';
		// exit;

		if (!$staff_leave_applications) {
			show_404();
		}

		$data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');


		$data['staff_leave_applications'] = $staff_leave_applications;
		$data['staff_info'] = $staff_info;



		$path = 'admin/attendance/leave_application_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function update_leave_application_status($id = NULL)
	{
		$this->check_access('Leave Applications');
		$user = $this->session->userdata('login_user_info_all');
		$approved_by = $user->first_name . ' ' . $user->last_name;
		$approved_at = date('Y-m-d H:i:s');

		$status = $this->input->post('status');
		// echo '<pre>';
		// print_r($status);
		// echo '</pre>';
		// exit;

		$update_data = [

			'approved_by' => $approved_by,
			'approved_at' => $approved_at,
			'status' => $status
		];


		$this->db->where('id', $id);
		$this->db->update('staff_leave_applications', $update_data);

		redirect(base_url('admin_leave_application_list'));



	}

}

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

		// Get member count
		$data['member_count'] = $this->db->count_all('members_n');

		$path = 'admin/dashboard';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// function access_required()
	// {
	// 	$user = $this->session->userdata('login_user_info_all');
	// 	$menu_access = $this->db
	// 		->select('menu_key')
	// 		->where('user_id', $user->id)
	// 		->get('user_menu_access')
	// 		->result_array();

	// 	if ($menu_access) {
	// 		$this->session->set_flashdata('error', `Don't have access`);
	// 		redirect('admin/users_list/users_list');
	// 		exit;
	// 	}
	// }

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
			'password' => $this->input->post('password')
			// 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		);

		$this->db->insert('users', $data);
		redirect("admin");


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
}

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



	public function admin_registration()
	{
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
		$this->require_super_admin();
		$this->Common->delete_data('users', 'id', $id);
		redirect('admin/users_list/users_details');
	}




	public function admin_orders_table()
	{
		$data = $this->engine->store_nav('my_orders', 'my_orders', 'তালিকা');


		$where_data = array();

		$id = $this->input->get('id');
		$name = $this->input->get('name');
		$mobile_number = $this->input->get('mobile_number');
		$address = $this->input->get('address');
		$status = $this->input->get('status');
		$payment_method = $this->input->get('payment_method');
		$total_amount = $this->input->get('total_amount');
		$from_date = $this->input->get('from_date');
		$to_date = $this->input->get('to_date');



		if (!empty($id)) {
			$where_data['id'] = $id;
		}

		if (!empty($name)) {
			$where_data['name'] = $name;
		}

		if (!empty($mobile_number)) {
			$where_data['mobile_number'] = $mobile_number;
		}

		if (!empty($address)) {
			$where_data['address'] = $address;
		}


		if (!empty($status)) {
			$where_data['status'] = $status;
		}

		if (!empty($total_amount)) {
			$where_data['total_amount'] = $total_amount;
		}
		if (!empty($payment_method)) {
			$where_data['payment_method'] = $payment_method;
		}



		if (!empty($where_data)) {
			$this->db->where($where_data);
		}

		if (!empty($from_date)) {
			$this->db->where('created_at >=', $from_date);
		}

		if (!empty($to_date)) {
			$this->db->where('created_at <=', $to_date);
		}

		// $data['orders'] = $this->db->get('orders_table')->result();
		$data['orders'] = $this->db
			->order_by('id', 'DESC')
			->get('orders_table')
			->result();

		$path = 'admin/orders_table/orders_table';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);


	}

	public function order_details($order_id)
	{
		$this->db->where('id', $order_id);
		$data = $this->engine->store_nav('my_orders', 'my_orders', 'তালিকা');
		$data['orders'] = $this->db->get_where('orders_table', [
			'id' => $order_id
		])->row();

		$this->db->select('order_items.*, products.title');
		$this->db->from('order_items');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->where('order_items.order_id', $order_id);



		$data['items'] = $this->db->get()->result();

		// $this->load->view('order_details', $data);
		$path = 'admin/orders_table/orders_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	public function order_status($id)
	{

		$order = $this->db->get_where('orders_table', ['id' => $id])->row();



		$update_data = [

			'status' => $this->input->post('status'),

		];

		if ($update_data['status'] == 'completed') {
			$this->db->where('id', $id);
			$this->db->update('orders_table', [
				'payment_status' => 'paid'
			]);
		}

		// echo '<pre>';
		// print_r($update_data);
		// exit;

		$this->db->where('id', $id);
		$this->db->update('orders_table', $update_data);



		redirect(base_url('admin_orders_table'));
	}


}

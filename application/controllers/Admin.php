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
		echo $user;
		exit;

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







	public function table()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/c_38';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function id_card1()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/id_card/id_card1';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function id_card2()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/id_card/id_card2';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function id_card3()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/id_card/id_card3';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function id_card4()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/id_card/id_card4';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function id_card2_both()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/id_card/id_card2_both';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function table2()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/table2';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function investment_report()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/investment_report1';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function due_list_details()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/due_list_details';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function due_list_details1()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/due_list_details1';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function daily_installment()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/daily_installment';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function c_47()
	{
		$data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

		$path = 'admin/sbcl/c_47';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}

	// ---------------------middle ware--------------------



	// --------------single member details------------

	public function view_member($id = null)
	{
		if (empty($id)) {
			redirect(base_url('Admin/members_list'));
		}

		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

		//  Check if member exists
		if (!$data['member']) {
			show_404(); // member not found
		}

		$path = 'admin/members_list/member_Details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}



	// -------------------Form View---------------------

	public function form_view($id = null)
	{
		//  Redirect if no ID
		if (empty($id)) {
			redirect(base_url('Admin/members_list'));
		}

		//  Set dashboard navigation & page title
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// Fetch the specific member
		$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

		//  Check if member exists
		if (!$data['member']) {
			show_404(); // member not found
		}

		//  Render the member details inside dashboard layout
		// $path = 'admin/members_list/IdentityForm';
		$path = 'admin/members_list/form_view';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function IdentityForm_view($id = null)
	{
		//  Redirect if no ID
		if (empty($id)) {
			redirect(base_url('Admin/members_list'));
		}

		//  Set dashboard navigation & page title
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// Fetch the specific member
		$data['member'] = $this->Common->get_data_single_conditional('members_n', 'id', $id)->row();

		//  Check if member exists
		if (!$data['member']) {
			show_404(); // member not found
		}

		//  Render the member details inside dashboard layout
		$path = 'admin/members_list/IdentityForm';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}



	// ---------------------delete member-----------------

	public function members_list()
	{
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');
		$ch = curl_init('http://localhost:8080/bjsu/Pubilc_api/members_table_api');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);

		$data['members'] = json_decode($response);

		$path = 'admin/members_list/members_list';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}
	public function members_details($id)
	{
		echo $id;
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');
		$ch = curl_init('http://localhost:8080/bjsu/Pubilc_api/members_table_single_api/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);

		$data['member'] = json_decode($response);

		$path = 'admin/members_list/form_view';

		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}


	public function delete_member($id)
	{
		$this->Common->delete_data('members_n', 'id', $id);
		redirect('members');
	}




	public function edit_member($id)
	{
		$data['member'] = $this->db->get_where('members_n', ['id' => $id])->row();
		$this->load->view('site/members_list/updateForm', $data);
	}






	public function save_charge()
	{
		$id = $this->input->post('member_id');

		$data = [
			'subscription_fee' => $this->input->post('subscription_fee'),
		];

		$this->db->where('id', $id);
		$this->db->update('members_n', $data);

		echo "success";
	}


	public function approval_update()
	{
		$id = $this->input->post('member_id');

		$user = $this->session->userdata('login_user_info_all');


		$approved_by = $user->username;

		$data = [
			'active_status' => 1,
			'approved_by' => $approved_by,
			'approved_date' => date('Y-m-d H:i:s')
		];

		$this->db->where('id', $id);
		$this->db->update('members_n', $data);

		echo "success";
	}



	// -------------------member account details---------------------

	public function members_account($id = null)
	{
		$data = $this->engine->store_nav('members_list', 'members_list', 'সদস্য বিস্তারিত');

		// OPTIONAL: comment this for now
		// if (empty($id)) {
		//     redirect(base_url('Applicant/members_list'));
		// }

		// OPTIONAL: disable DB check for now
		// $data['member'] = ...
		// if (!$data['member']) {
		//     show_404();
		// }

		$path = 'admin/members_list/members_accounts_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	}










	// ----------------------------users list--------------------



	public function users_list()
	{
		$data = $this->engine->store_nav('users_list', 'users_list', 'সদস্য তালিকা');

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

		$data = $this->engine->store_nav('users_list', 'users_list', 'সদস্য বিস্তারিত');

		$data['user'] = $this->Common->get_data_single_conditional('users', 'id', $id)->row();

		if (!$data['user']) {
			show_404();
		}

		$path = 'admin/users_list/users_details';
		$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
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


	// public function calculator()
	// {
	// 	$data = $this->engine->store_nav('members_list', 'members_list', 'Calculator');
	// 	$path = 'admin/calculator/calculator';
	// 	$this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
	// }

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

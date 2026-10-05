<?php

use LDAP\Result;
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Projects extends CI_Controller
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
            ->where('menu_key', $menu) // Your menu key
            ->count_all_results('user_menu_access');

        if ($hasAccess == 0) {
            $this->session->set_flashdata('access_error', "You don't have access.");
            redirect('admin/users_list/users_list');
            exit;
        }
    }

    public function add_project($category = '')
    {

        $this->check_access('Add new Project');
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
        $data['category'] = $category ? $category : '';

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'admin/projects/add_projects';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function create_projects($category = '')
    {
        $this->check_access('Add new Project');
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }

        // echo '<pre>';
        // print_r($category);
        // echo '</pre>';
        // exit;

        $project_name = trim($this->input->post('project_name'));


        // $category = trim($this->input->post('category'));

        $category_data = $this->db
            ->where('name', $category)
            ->get('property_categories')
            ->row();
        $prefix = $category_data->slug;



        $this->db->like('project_id', $prefix . '-', 'after');
        $this->db->order_by('id', 'DESC');
        $last_property = $this->db->get('projects')->row();

        if ($last_property) {
            $last_number = (int) str_replace($prefix . '-', '', $last_property->project_id);
            $next_number = $last_number + 1;
        } else {
            $next_number = 1;
        }
        $project_id = $prefix . '-' . $next_number;
        $address = trim($this->input->post('address'));
        $status = $this->input->post('status');


        if (empty($project_name)) {
            $this->session->set_flashdata(
                'Project_error',
                'Project name is required.'
            );

            redirect('add_project');
            return;
        }


        // 4. Check duplicate property ID

        // $existingProject = $this->db
        //     ->where('project_id', $project_id)
        //     ->get('projects')
        //     ->row();

        // if ($existingProject) {

        //     $this->session->set_flashdata(
        //         'Project_error',
        //         'Project ID already exists.'
        //     );

        //     redirect('get_all_categories');
        //     return;
        // }


        $data = array(

            'project_name' => $project_name,

            'project_id' => $project_id,

            'category' => $category,

            'address' => $address,

            'status' => !empty($status) ? $status : 'Publish',

            'created_by' => $loggedUser->username,

            'created_at' => date('Y-m-d H:i:s')
        );




        $insert = $this->db
            ->insert('projects', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'Project_success',
                'Project added successfully.'
            );

            redirect('projects_list/' . urlencode($category));

        } else {

            $this->session->set_flashdata(
                'project_error',
                'Unable to save project. Please try again.'
            );

            redirect('projects_list/' . urlencode($category));
        }
    }
    public function project_update_form($id)
    {
        $this->check_access('Add new Project');
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
        $data['projects'] = $this->db->get_where('projects', ['id' => $id])->row();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'admin/projects/project_update_form';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }
    public function update_project($id)
    {
        $this->check_access('Our Projects');
        // 1. Authentication check
        $loggedUser = $this->session->userdata('login_user_info_all');
        if (!$loggedUser) {
            redirect('login');
            return;
        }

        // 2. Fetch target property
        $project = $this->db->where('id', $id)->get('projects')->row();

        // echo '<pre>';
        // print_r($project->category);
        // echo '</pre>';
        // exit;


        if (!$project) {
            $this->session->set_flashdata('Project_error', 'Project not found.');
            redirect('projects_list/' . $project->category);
            return;
        }

        // 3. Extract POST inputs
        $project_name = trim($this->input->post('project_name'));
        $project_id = trim($this->input->post('project_id'));
        $category = trim($this->input->post('category'));
        $address = trim($this->input->post('address'));



        // 4. Form Validation
        if (empty($project_name) || empty($project_id) || empty($category) || empty($address)) {
            $this->session->set_flashdata('Project_error', 'Please fill in all mandatory fields (*).');
            redirect('update_project/' . $id);
            return;
        }




        $update_data = [
            'project_name' => $project_name,
            'project_id' => $project_id,
            'category' => $category,
            'address' => $address,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        if ($this->db->update('projects', $update_data)) {
            $this->session->set_flashdata('projects_success', 'projects updated successfully.');
        } else {
            $this->session->set_flashdata('projects_error', 'Failed to update projects details.');
        }

        redirect('projects_list/' . $category);
    }
    public function delete_project($id)
    {
        // echo '<pre>';
        // print_r($id);
        // echo '</pre>';
        // exit;
        $this->check_access('Our Projects');
        $this->Common->delete_data('projects', 'id', $id);
        // redirect('projects_category');

        redirect($_SERVER['HTTP_REFERER']);

    }


    public function create_category()
    {
        $this->check_access('Add new Project');
        // 1. Check login
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }

        $name = trim($this->input->post('name'));
        $slug = trim($this->input->post('slug'));

        $data = array(

            'name' => $name,
            'slug' => $slug,
            'created_at' => date('Y-m-d H:i:s')
        );


        $insert = $this->db
            ->insert('property_categories', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'property_categories_success',
                'property_categories added successfully.'
            );

            redirect('projects_category');

        } else {

            $this->session->set_flashdata(
                'property_categories_error',
                'Unable to save property. Please try again.'
            );

            redirect('projects_category');
        }
    }


    public function projects_category()
    {
        $this->check_access('Add new Project');
        $data = $this->engine->store_nav('Category', 'Category', 'Chandra Trading Limited');
      
        // echo '<pre>';
        // print_r($categories);
        // echo '</pre>';
        // exit;

        $categories = $this->db
            ->select('
            property_categories.id,
            property_categories.name,
            COUNT(projects.id) AS project_count
        ')
            ->from('property_categories')
            ->join(
                'projects',
                'property_categories.name = projects.category',
                'left'
            )
            ->group_by([
                // 'property_categories.id',
                'property_categories.name'
            ])
            ->order_by('property_categories.id', 'ASC')
            ->get()
            ->result();

        $data['categories'] = $categories ? $categories : [];

        $path = 'admin/projects/projects_category';

        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function delete_category($id)
    {
        $this->check_access('Our Projects');
        // 1. Check login
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }
        $this->Common->delete_data('property_categories', 'id', $id);
        redirect('projects_category');
    }
    public function create_type()
    {
        $this->check_access('Add new Project');
        // 1. Check login
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }

        $name = trim($this->input->post('name'));
        $slug = strtolower($name);
        $data = array(

            'name' => $name,
            'slug' => $slug,
            'created_at' => date('Y-m-d H:i:s')
        );


        $insert = $this->db
            ->insert('property_types', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'property_types_success',
                'property_types added successfully.'
            );

            redirect('add_properties');

        } else {

            $this->session->set_flashdata(
                'property_types_error',
                'Unable to save property. Please try again.'
            );

            redirect('add_properties');
        }
    }
    public function delete_type($id)
    {
        $this->check_access('Our Projects');
        // 1. Check login
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }
        $this->Common->delete_data('property_types', 'id', $id);
        redirect('add_properties');
    }



    public function projects_list($category = '')
    {
        $this->check_access('Our Projects');
        $category = urldecode($category);

        $this->check_access('Our Projects');
        $data = $this->engine->store_nav(
            'projects',
            'projects',
            'Project List'
        );

        // Filter values
        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'project_name' => trim((string) $this->input->get('project_name', TRUE)),
            'project_id' => trim((string) $this->input->get('project_id', TRUE)),
            'status' => trim((string) $this->input->get('status', TRUE)),
            'address' => trim((string) $this->input->get('address', TRUE)),
            // 'category' => $category, 
        );

        // Pagination setup
        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_property_filters_projects($filters);
        $this->db->where('category', $category);
        $total_rows = $this->db->count_all_results('projects');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('projects_list/' . urlencode($category)),
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

        // Fetch records
        $this->_apply_property_filters_projects($filters);
        $this->db->where('category', $category);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $page);
        $data['projects'] = $this->db->get('projects')->result();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        // View data assignment
        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['category'] = $category;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;




        $path = 'admin/projects/projects_list';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }
    public function projects_details($id = NULL)
    {

        $this->check_access('Our Projects');
        if (empty($id)) {
            show_404();
        }

        $this->db->where('id', $id);
        $projects = $this->db->get('projects')->row();


        if (!$projects) {
            show_404();
        }

        $data = $this->engine->store_nav(
            'projects',
            'projects',
            'projects Details: ' . $projects->project_name
        );

        // $data = $this->engine->store_nav('site', 'Nothing', 'সদস্য আবেদন ফরম');

        $data['projects'] = $projects;
        //       echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        $path = 'admin/projects/project_details';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }











    //  public function projects_category()
//     {
//         $this->check_access('Add new Project');
//         $data = $this->engine->store_nav('Category', 'Category', 'Chandra Trading Limited');
//         $categories = $this->db
//             ->select('category, COUNT(id) as project_count')
//             ->where('category IS NOT NULL')
//             ->where('category !=', '')
//             ->group_by('category')
//             ->order_by('category', 'ASC')
//             ->get('property_categories')
//             ->result();

    //         $data['categories'] = $categories ? $categories : [];

    //         $path = 'admin/projects/projects_category';

    //         $this->engine->render_view(
//             $data,
//             $path,
//             $this->side_menu,
//             $this->main_layout
//         );
//     }


}
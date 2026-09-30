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



    public function add_project()
    {
        // $this->check_access('Add new Properties');
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $path = 'admin/projects/add_projects';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function create_projects()
    {
        $this->check_access('Add new Project');
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }


        $project_name = trim($this->input->post('project_name'));

        $category = trim($this->input->post('category'));

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

            'status' => !empty($status) ? $status : 'Draft',

            'created_by' => $loggedUser->username,

            'created_at' => date('Y-m-d H:i:s')
        );

        //    echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;


        $insert = $this->db
            ->insert('projects', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'Project_success',
                'Project added successfully.'
            );

            redirect('get_all_categories');

        } else {

            $this->session->set_flashdata(
                'project_error',
                'Unable to save project. Please try again.'
            );

            redirect('get_all_categories');
        }
    }


    public function create_category()
    {
        $this->check_access('Add new Properties');
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

            redirect('add_properties');

        } else {

            $this->session->set_flashdata(
                'property_categories_error',
                'Unable to save property. Please try again.'
            );

            redirect('add_properties');
        }
    }


    public function projects_category()
    {
        $data = $this->engine->store_nav('Category', 'Category', 'Chandra Trading Limited');
        $categories = $this->db
            ->select('category, COUNT(id) as project_count')
            ->where('category IS NOT NULL')
            ->where('category !=', '')
            ->group_by('category')
            ->order_by('category', 'ASC')
            ->get('projects')
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
        $this->check_access('Add new Properties');
        // 1. Check login
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }
        $this->Common->delete_data('property_categories', 'id', $id);
        redirect('add_properties');
    }


    public function create_type()
    {
        $this->check_access('Add new Properties');
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
        $this->check_access('Add new Properties');
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
            // Include $category in base_url so generated links preserve URL structure
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
    public function properties_details($id = NULL)
    {


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

        $path = 'admin/properties/property_details';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

   



    public function update_properties_form($id)
    {
        $this->check_access('Our Properties');
        if (empty($id)) {
            redirect('properties_list');
            return;
        }

        $data = $this->engine->store_nav(
            'Nothing',
            'Nothing',
            'Chandra Trading Limited'
        );

        $data['property'] = $this->Common->get_data_single_conditional(
            'properties',
            'id',
            $id
        )->row();

        if (!$data['property']) {
            show_404();
            return;
        }

        // Decode gallery
        $data['gallery_images'] = [];
        if (!empty($data['property']->gallery)) {
            $gallery = json_decode($data['property']->gallery, true);
            if (is_array($gallery)) {
                $data['gallery_images'] = $gallery;
            }
        }

        // Decode amenities
        $data['amenities'] = [];
        if (!empty($data['property']->amenities)) {
            $amenities = json_decode($data['property']->amenities, true);
            if (is_array($amenities)) {
                $data['amenities'] = $amenities;
            }
        }

        $path = 'admin/properties/update_properties_form';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    public function update_properties($id)
    {
        $this->check_access('Our Properties');
        // 1. Authentication check
        $loggedUser = $this->session->userdata('login_user_info_all');
        if (!$loggedUser) {
            redirect('login');
            return;
        }

        // 2. Fetch target property
        $property = $this->db->where('id', $id)->get('properties')->row();
        if (!$property) {
            $this->session->set_flashdata('property_error', 'Property not found.');
            redirect('properties_list');
            return;
        }

        // 3. Extract POST inputs
        $property_name = trim($this->input->post('property_name'));
        $property_id = trim($this->input->post('property_id'));
        $property_type = trim($this->input->post('property_type'));
        $location = trim($this->input->post('location'));
        $price = trim($this->input->post('price'));
        $size = trim($this->input->post('size'));
        $bedrooms = $this->input->post('bedrooms');
        $bathrooms = $this->input->post('bathrooms');
        $floor = trim($this->input->post('floor'));
        $parking = trim($this->input->post('parking'));
        $description = trim($this->input->post('description'));
        $map_location = trim($this->input->post('map_location'));
        $featured = $this->input->post('featured') ? 1 : 0;
        $status = $this->input->post('status');

        // 4. Form Validation
        if (empty($property_name) || empty($property_id) || empty($property_type) || empty($location)) {
            $this->session->set_flashdata('property_error', 'Please fill in all mandatory fields (*).');
            redirect('update_properties/' . $id);
            return;
        }

        // Duplicate Property ID Check
        $existingProperty = $this->db->where('property_id', $property_id)
            ->where('id !=', $id)
            ->get('properties')
            ->row();
        if ($existingProperty) {
            $this->session->set_flashdata('property_error', 'Property ID already exists.');
            redirect('update_properties/' . $id);
            return;
        }

        $this->load->library('upload');

        // 5. Multi-Image Upload (Gallery Append)
        $gallery_images = [];
        if (!empty($property->gallery)) {
            $old_gallery = json_decode($property->gallery, true);
            if (is_array($old_gallery)) {
                $gallery_images = $old_gallery;
            }
        }

        if (isset($_FILES['gallery']['name']) && !empty($_FILES['gallery']['name'][0])) {
            $gallery_count = count($_FILES['gallery']['name']);

            // Ensure folder existence
            $img_dir = './assets/uploads/properties/images';
            if (!is_dir($img_dir)) {
                mkdir($img_dir, 0777, true);
            }

            for ($i = 0; $i < $gallery_count; $i++) {
                if (empty($_FILES['gallery']['name'][$i])) {
                    continue;
                }

                $_FILES['gallery_single']['name'] = $_FILES['gallery']['name'][$i];
                $_FILES['gallery_single']['type'] = $_FILES['gallery']['type'][$i];
                $_FILES['gallery_single']['tmp_name'] = $_FILES['gallery']['tmp_name'][$i];
                $_FILES['gallery_single']['error'] = $_FILES['gallery']['error'][$i];
                $_FILES['gallery_single']['size'] = $_FILES['gallery']['size'][$i];

                $config = [
                    'upload_path' => $img_dir,
                    'allowed_types' => 'jpg|jpeg|png|webp|avif',
                    'max_size' => 5120,
                    'encrypt_name' => TRUE
                ];

                $this->upload->initialize($config, TRUE);

                if ($this->upload->do_upload('gallery_single')) {
                    $upload_data = $this->upload->data();
                    $gallery_images[] = $upload_data['file_name'];
                }
            }
        }

        // 6. Floor Plan File Handling
        $floor_plan = $property->floor_plan;
        if (isset($_FILES['floor_plan']) && !empty($_FILES['floor_plan']['name'])) {
            $fp_dir = './assets/uploads/properties/floor_plan';
            if (!is_dir($fp_dir)) {
                mkdir($fp_dir, 0777, true);
            }

            $config = [
                'upload_path' => $fp_dir,
                'allowed_types' => 'jpg|jpeg|png|webp|pdf',
                'max_size' => 5120,
                'encrypt_name' => TRUE
            ];

            $this->upload->initialize($config, TRUE);

            if ($this->upload->do_upload('floor_plan')) {
                $upload_data = $this->upload->data();
                $floor_plan = $upload_data['file_name'];

                // Remove old file
                if (!empty($property->floor_plan) && file_exists(FCPATH . 'assets/uploads/properties/floor_plan/' . $property->floor_plan)) {
                    unlink(FCPATH . 'assets/uploads/properties/floor_plan/' . $property->floor_plan);
                }
            }
        }

        // 7. Brochure File Handling
        $brochure = $property->brochure;
        if (isset($_FILES['brochure']) && !empty($_FILES['brochure']['name'])) {
            $b_dir = './assets/uploads/properties/brochure';
            if (!is_dir($b_dir)) {
                mkdir($b_dir, 0777, true);
            }

            $config = [
                'upload_path' => $b_dir,
                'allowed_types' => 'pdf|doc|docx',
                'max_size' => 10240,
                'encrypt_name' => TRUE
            ];

            $this->upload->initialize($config, TRUE);

            if ($this->upload->do_upload('brochure')) {
                $upload_data = $this->upload->data();
                $brochure = $upload_data['file_name'];

                // Remove old file
                if (!empty($property->brochure) && file_exists(FCPATH . 'assets/uploads/properties/brochure/' . $property->brochure)) {
                    unlink(FCPATH . 'assets/uploads/properties/brochure/' . $property->brochure);
                }
            }
        }

        // 8. Prepare Database Update Array
        $update_data = [
            'property_name' => $property_name,
            'property_id' => $property_id,
            'property_type' => $property_type,
            'location' => $location,
            'price' => $price,
            'size' => $size,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'floor' => $floor,
            'parking' => $parking,
            'description' => $description,
            'map_location' => $map_location,
            'featured' => $featured,
            'status' => $status,
            'gallery' => json_encode($gallery_images, JSON_UNESCAPED_UNICODE),
            'floor_plan' => $floor_plan,
            'brochure' => $brochure,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // 9. Execute DB Update
        $this->db->where('id', $id);
        if ($this->db->update('properties', $update_data)) {
            $this->session->set_flashdata('property_success', 'Property updated successfully.');
        } else {
            $this->session->set_flashdata('property_error', 'Failed to update property details.');
        }

        redirect('update_properties_form/' . $id);
    }

    // Optional Method to Handle Single Gallery Image Deletion
    public function delete_property_image($id, $image_name)
    {
        $this->check_access('Our Properties');
        $image_name = urldecode($image_name);
        $property = $this->db->where('id', $id)->get('properties')->row();

        if ($property && !empty($property->gallery)) {
            $gallery = json_decode($property->gallery, true);

            if (is_array($gallery) && in_array($image_name, $gallery)) {
                // Remove item from array
                $gallery = array_values(array_diff($gallery, [$image_name]));

                $file_path = FCPATH . 'assets/uploads/properties/images/' . $image_name;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }

                $this->db->where('id', $id)->update('properties', [
                    'gallery' => json_encode($gallery, JSON_UNESCAPED_UNICODE)
                ]);

                $this->session->set_flashdata('property_success', 'Image removed successfully.');
            }
        }

        redirect('update_properties_form/' . $id);
    }

    public function delete_property($id)
    {
        $this->check_access('Our Properties');
        $this->Common->delete_data('properties', 'id', $id);
        redirect('properties_list');
    }







    //  public function get_all_categories()
//     {
//         $data = $this->engine->store_nav('Category', 'Category', 'Chandra Trading Limited');
//         $categories = $this->db
//             ->order_by('name', 'ASC')
//             ->get('property_categories')
//             ->result();

    //         foreach ($categories as $category) {

    //             $projects = $this->db
//                 ->where('category', $category->name)
//                 ->get('projects')
//                 ->result();
//             $project_count = count($projects);

    //             $data['project_count'] = $project_count ? $project_count : [];

    //         }





    //         $data['categories'] = $categories ? $categories : [];

    //         echo '<pre>';
//         print_r($data);
//         echo '</pre>';
//         exit;

    //         $path = 'admin/projects/projects_category';

    //         $this->engine->render_view(
//             $data,
//             $path,
//             $this->side_menu,
//             $this->main_layout
//         );
//     }


}
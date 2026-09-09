<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Properties extends CI_Controller
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



    public function add_properties()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $path = 'admin/properties/add_properties';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function create_properties()
    {
        // 1. Check login
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (!$loggedUser) {
            redirect('login');
            return;
        }


        // 2. Get form data
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

        // Amenities
        $amenities = $this->input->post('amenities');

        if (!empty($amenities) && is_array($amenities)) {
            $amenities = json_encode($amenities, JSON_UNESCAPED_UNICODE);
        } else {
            $amenities = json_encode([]);
        }


        // 3. Validation
        if (empty($property_name)) {
            $this->session->set_flashdata(
                'property_error',
                'Property name is required.'
            );

            redirect('add_properties');
            return;
        }

        if (empty($property_id)) {
            $this->session->set_flashdata(
                'property_error',
                'Property ID is required.'
            );

            redirect('add_properties');
            return;
        }

        if (empty($property_type)) {
            $this->session->set_flashdata(
                'property_error',
                'Property type is required.'
            );

            redirect('add_properties');
            return;
        }

        if (empty($location)) {
            $this->session->set_flashdata(
                'property_error',
                'Location is required.'
            );

            redirect('add_properties');
            return;
        }


        // 4. Check duplicate property ID

        $existingProperty = $this->db
            ->where('property_id', $property_id)
            ->get('properties')
            ->row();

        if ($existingProperty) {

            $this->session->set_flashdata(
                'property_error',
                'Property ID already exists.'
            );

            redirect('add_properties');
            return;
        }


        // 5. Upload Directory & Load Library
        $upload_path = FCPATH . './assets/uploads/properties/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $this->load->library('upload');


        // 6. Upload Gallery Images
        $gallery_images = array();

        if (
            isset($_FILES['gallery']['name']) &&
            !empty($_FILES['gallery']['name'][0])
        ) {

            $gallery_count = count($_FILES['gallery']['name']);

            for ($i = 0; $i < $gallery_count; $i++) {

                if (empty($_FILES['gallery']['name'][$i])) {
                    continue;
                }

                $_FILES['gallery_single']['name'] =
                    $_FILES['gallery']['name'][$i];

                $_FILES['gallery_single']['type'] =
                    $_FILES['gallery']['type'][$i];

                $_FILES['gallery_single']['tmp_name'] =
                    $_FILES['gallery']['tmp_name'][$i];

                $_FILES['gallery_single']['error'] =
                    $_FILES['gallery']['error'][$i];

                $_FILES['gallery_single']['size'] =
                    $_FILES['gallery']['size'][$i];


                $config['upload_path'] = './assets/uploads/properties/images';
                // $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);


                if ($this->upload->do_upload('gallery_single')) {

                    $upload_data = $this->upload->data();

                    $gallery_images[] = $upload_data['file_name'];

                } else {

                    log_message(
                        'error',
                        'Gallery upload error: ' .
                        $this->upload->display_errors('', '')
                    );
                }
            }
        }


        $floor_plan = null;

        if (
            isset($_FILES['floor_plan']) &&
            !empty($_FILES['floor_plan']['name'])
        ) {

            $config['upload_path'] = './assets/uploads/properties/floor_plan';
            $config['allowed_types'] = 'jpg|jpeg|png|webp|pdf';
            $config['max_size'] = 5120;
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('floor_plan')) {

                $upload_data = $this->upload->data();

                $floor_plan = $upload_data['file_name'];

            } else {

                $this->session->set_flashdata(
                    'property_error',
                    'Floor plan upload failed: ' .
                    $this->upload->display_errors('', '')
                );

                redirect('add_properties');
                return;
            }
        }


        $brochure = null;

        if (
            isset($_FILES['brochure']) &&
            !empty($_FILES['brochure']['name'])
        ) {

            $config['upload_path'] = './assets/uploads/properties/brochure';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = 10240;
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('brochure')) {

                $upload_data = $this->upload->data();

                $brochure = $upload_data['file_name'];

            } else {

                $this->session->set_flashdata(
                    'property_error',
                    'Brochure upload failed: ' .
                    $this->upload->display_errors('', '')
                );

                redirect('add_properties');
                return;
            }
        }


        $data = array(

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

            'amenities' => $amenities,

            'gallery' => json_encode(
                $gallery_images,
                JSON_UNESCAPED_UNICODE
            ),

            'floor_plan' => $floor_plan,

            'brochure' => $brochure,

            'map_location' => $map_location,

            'featured' => $featured,

            'status' => !empty($status) ? $status : 'Draft',

            'created_by' => $loggedUser->id,

            'created_at' => date('Y-m-d H:i:s')
        );


        $insert = $this->db
            ->insert('properties', $data);


        if ($insert) {

            $this->session->set_flashdata(
                'property_success',
                'Property added successfully.'
            );

            redirect('properties_list');

        } else {

            $this->session->set_flashdata(
                'property_error',
                'Unable to save property. Please try again.'
            );

            redirect('properties_list');
        }
    }


    public function properties_list()
    {
        $data = $this->engine->store_nav(
            'properties',
            'properties',
            'Property List'
        );

        // Filter values
        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'property_id' => trim((string) $this->input->get('property_id', TRUE)),
            'property_type' => trim((string) $this->input->get('property_type', TRUE)),
            'location' => trim((string) $this->input->get('location', TRUE)),
            'status' => trim((string) $this->input->get('status', TRUE)),
            'featured' => $this->input->get('featured', TRUE),
            'min_price' => trim((string) $this->input->get('min_price', TRUE)),
            'max_price' => trim((string) $this->input->get('max_price', TRUE))
        );

        // Pagination setup
        $per_page = 5;
        $page = (int) $this->input->get('page');
        if ($page < 0) {
            $page = 0;
        }

        // Total filtered records
        $this->_apply_property_filters($filters);
        $total_rows = $this->db->count_all_results('properties');

        // Pagination config
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('properties_list'),
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
        $this->_apply_property_filters($filters);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $page);
        $data['properties'] = $this->db->get('properties')->result();

        // View data assignment
        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }
        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        $path = 'admin/properties/properties_list';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

    private function _apply_property_filters(array $filters)
    {
        if ($filters['search'] !== '') {
            $this->db->group_start();
            $this->db->like('property_name', $filters['search']);
            $this->db->or_like('property_id', $filters['search']);
            $this->db->or_like('location', $filters['search']);
            $this->db->group_end();
        }

        if ($filters['property_id'] !== '') {
            $this->db->where('property_id', $filters['property_id']);
        }

        if ($filters['property_type'] !== '') {
            $this->db->where('property_type', $filters['property_type']);
        }

        if ($filters['location'] !== '') {
            $this->db->like('location', $filters['location']);
        }

        if ($filters['status'] !== '') {
            $this->db->where('status', $filters['status']);
        }

        if ($filters['featured'] !== '' && $filters['featured'] !== NULL) {
            $this->db->where('featured', $filters['featured']);
        }

        if ($filters['min_price'] !== '' && is_numeric($filters['min_price'])) {
            $this->db->where('price >=', (float) $filters['min_price']);
        }

        if ($filters['max_price'] !== '' && is_numeric($filters['max_price'])) {
            $this->db->where('price <=', (float) $filters['max_price']);
        }
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

        $data['property'] = $property;

        $path = 'admin/properties/property_details';
        $this->engine->render_view(
            $data,
            $path,
            $this->side_menu,
            $this->main_layout
        );
    }

}
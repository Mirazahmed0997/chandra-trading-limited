<?php
defined('BASEPATH') or exit('No direct script access allowed');

class news_notice_management extends CI_Controller
{

    private $main_layout = 'admin/master_layout';
    private $side_menu = 'admin/side_menu';
    private $serverDateTime = '';



    //   ---------------------------- function for file/image uploads------------------



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



    // ---------------------news method----------------------
    public function create_news()
    {
        $this->check_access('News Management');
        $headline = $this->input->post('headline');
        $details = $this->input->post('details');
        $image = $this->upload_file('image', './assets/uploads/project/news_image/');
        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;


        $data = array(
            'headline' => $headline,
            'details' => $details,
            'image' => $image,
            'posted_by' => $posted_by,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('news', $data);

        $this->session->set_flashdata('success', 'News created successfully!');
        redirect("news_list");
    }


    // -----------------------all news---------------


    public function news_list()
    {
        $this->check_access('News Management');
        $data = $this->engine->store_nav('news', 'news', 'সংবাদ');

        // Retrieve GET inputs
        $id = $this->input->get('id');
        $headline = $this->input->get('headline');
        $details = $this->input->get('details');
        $status = $this->input->get('status');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $posted_by = $this->input->get('posted_by');

        // Helper function to apply active filter criteria to query builder
        $apply_filters = function () use ($id, $headline, $details, $status, $from_date, $to_date, $posted_by) {
            if (!empty($id)) {
                $this->db->where('id', $id);
            }
            if (!empty($headline)) {
                $this->db->like('headline', $headline);
            }
            if (!empty($details)) {
                $this->db->like('details', $details);
            }
            if ($status !== '' && $status !== null) {
                $this->db->where('status', $status);
            }
            if (!empty($posted_by)) {
                $this->db->where('posted_by', $posted_by);
            }
            if (!empty($from_date)) {
                $this->db->where('created_at >=', $from_date . ' 00:00:00');
            }
            if (!empty($to_date)) {
                $this->db->where('created_at <=', $to_date . ' 23:59:59');
            }
        };

        // 1. Get total rows for filtered results
        $apply_filters();
        $total_rows = $this->db->count_all_results('news');

        // 2. Pagination Configuration
        $this->load->library('pagination');

        $config['base_url'] = base_url('news_notice_management/news_list');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['reuse_query_string'] = TRUE; // Retains search filters across pages

        // Bootstrap 4/5 Pagination Markup
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end mb-0">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // 3. Get Paginated Data
        $offset = $this->input->get('per_page') ? (int) $this->input->get('per_page') : 0;
        $apply_filters();
        $this->db->limit($config['per_page'], $offset);
        $this->db->order_by('id', 'DESC');
        $data['news'] = $this->db->get('news')->result();

        // Pass links and offset details to view
        $data['pagination'] = $this->pagination->create_links();
        $data['start_index'] = $offset + 1;

        $path = 'admin/news_notice/newz_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -----------------------update news--------------

    public function update_news()
    {
        $this->check_access('News Management');
        $id = $this->input->post('news_id');
        $news = $this->db->get_where('news', ['id' => $id])->row();

        $update_data = [

            'headline' => $this->input->post('headline'),
            'details' => $this->input->post('details'),
        ];

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

        $update_data['image'] = update_file(
            'image',
            './assets/uploads/project/news_image/',
            $news->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('news', $update_data);

        redirect(base_url('news_list'));
    }

  
    // --------------------change active status-------------------

    public function news_active_status($id)
    {
        $this->check_access('News Management');
        $news = $this->db->get_where('news', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('news', $update_data);

        redirect(base_url('news_list'));
    }


    // ---------------------delete news-----------------

    public function delete_news($id)
    {
        $this->check_access('News Management');
        $this->Common->delete_data('news', 'id', $id);
        redirect('news_list');
    }










    // ---------------------notice method----------------------
    public function create_notice()
    {
        $headline = $this->input->post('headline');
        $details = $this->input->post('details');

        $image = $this->upload_file('image', './assets/uploads/project/notice_image/');

        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;


        $data = array(
            'headline' => $headline,
            'details' => $details,
            'posted_by' => $posted_by,
            'image' => $image,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('noticeS', $data);

        $this->session->set_flashdata('success', 'Notice created successfully!');
        redirect("notice_list");
    }


    // -----------------------all notice---------------


    public function notice_list()
    {
        $data = $this->engine->store_nav('notices', 'notices', 'নোটিশ');

        $where_data = array();

        $id = $this->input->get('id');
        $headline = $this->input->get('headline');
        $details = $this->input->get('details');
        $image = $this->input->get('image');
        $status = $this->input->get('status');
        $created_at = $this->input->get('created_at');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $posted_by = $this->input->get('posted_by');



        if (!empty($id)) {
            $where_data['id'] = $id;
        }
        if (!empty($image)) {
            $where_data['image'] = $image;
        }

        if (!empty($headline)) {
            $where_data['headline'] = $headline;
        }

        if (!empty($details)) {
            $where_data['details'] = $details;
        }

        if ($status !== '' && $status !== null) {
            $where_data['status'] = $status;
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

        if (!empty($posted_by)) {
            $where_data['posted_by'] = $posted_by;
        }

        $data['notices'] = $this->db->get('notices')->result();

        $path = 'admin/news_notice/notice_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -----------------------update notice--------------

    public function update_notice()
    {
        $id = $this->input->post('notice_id');
        $notice = $this->db->get_where('notices', ['id' => $id])->row();

        $update_data = [
            'headline' => $this->input->post('headline'),
            'details' => $this->input->post('details'),
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

        $update_data['image'] = update_file(
            'image',
            './assets/uploads/project/notice_image/',
            $notice->image,
            'jpg|jpeg|png'
        );



        $this->db->where('id', $id);
        $this->db->update('notices', $update_data);

        redirect(base_url('notice_list'));
    }

    // ------------single notice----------



    public function single_notice($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('notice_list'));
        }

        $data = $this->engine->store_nav('notices', 'notices', 'সংবাদ');

        // Fetch the specific news
        $data['single_notice'] = $this->Common->get_data_single_conditional('notices', 'id', $id)->row();

        // Check if news exists
        if (!$data['single_notice']) {
            show_404();
        }

        $path = 'admin/news_notice/notice_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    // --------------------change active status-------------------

    public function notice_active_status($id)
    {
        $news = $this->db->get_where('notices', ['id' => $id])->row();

        $update_data = [

            'status' => $this->input->post('status'),
        ];


        $this->db->where('id', $id);
        $this->db->update('notices', $update_data);

        redirect(base_url('notice_list'));
    }


    // ---------------------delete news-----------------

    public function delete_notice($id)
    {
        $this->Common->delete_data('notices', 'id', $id);
        redirect('notice_list');
    }



}
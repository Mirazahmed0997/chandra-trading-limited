<?php
defined('BASEPATH') or exit('No direct script access allowed');

class news_notice_management extends CI_Controller
{

    private $main_layout = 'admin/master_layout';
    private $side_menu = 'admin/side_menu';
    private $serverDateTime = '';
    // public function __construct()
    // {
    //     parent::__construct();
    //     $date = new DateTime();
    //     $this->serverDateTime = $date->format('Y-m-d H:i') . "\n";
    //     // Check if user is logged in
    //     $user = $this->session->userdata('login_user_info_all');
    //     if (!$user) {
    //         $this->session->set_flashdata('login_failed', 'Please login first');
    //         redirect('admin');
    //         return;
    //     }

    //     // Check role
    //     if (!in_array($user->role, ['admin', 'super_admin'])) {
    //         $this->session->set_flashdata('error', 'আপনার এই পৃষ্ঠাটি অ্যাক্সেস করার অনুমতি নেই। অনুগ্রহ করে আপনার অ্যাডমিন ক্রেডেনশিয়াল দিয়ে লগইন করুন।');
    //         redirect('admin');
    //         return;
    //     }

    // }



    //   ---------------------------- function for file/image uploads------------------



        public function __construct()
    {
        parent::__construct();

        $date = new DateTime();
        $this->serverDateTime = $date->format('Y-m-d H:i');

        // Check login
        $user = $this->session->userdata('login_user_info_all');

        if (!$user) {
            $this->session->set_flashdata('login_failed', 'Please login first');
            redirect('admin');
            exit;
        }

      
        // Check permission
        $hasAccess = $this->db
            ->where('user_id', $user->id)
            ->where('menu_key', 'হোমপেজ ব্যবস্থাপনা') // Your menu key
            ->count_all_results('user_menu_access');

        if ($hasAccess == 0) {
            $this->session->set_flashdata('error', "You don't have access.");
            redirect('admin/users_list/users_list');
            exit;
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



    // ---------------------news method----------------------
    public function create_news()
    {
        $headline = $this->input->post('headline');
        $details = $this->input->post('details');

        $user = $this->session->userdata('login_user_info_all');
        $posted_by = $user->username;


        $data = array(
            'headline' => $headline,
            'details' => $details,
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
        $data = $this->engine->store_nav('news', 'news', 'সংবাদ');

        $where_data = array();

        $id = $this->input->get('id');
        $headline = $this->input->get('headline');
        $details = $this->input->get('details');
        $status = $this->input->get('status');
        $created_at = $this->input->get('created_at');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $posted_by = $this->input->get('posted_by');



        if (!empty($id)) {
            $where_data['id'] = $id;
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

        $data['news'] = $this->db->get('news')->result();

        $path = 'admin/news_notice/newz_table';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    // -----------------------update news--------------

    public function update_news()
    {
        $id = $this->input->post('news_id');

        $update_data = [

            'headline' => $this->input->post('headline'),
            'details' => $this->input->post('details'),
        ];


        $this->db->where('id', $id);
        $this->db->update('news', $update_data);

        redirect(base_url('news_list'));
    }

    // ------------single news----------
    public function single_news($id = null)
    {
        // Redirect if no ID
        if (empty($id)) {
            redirect(base_url('news_list'));
        }

        $data = $this->engine->store_nav('news', 'news', 'সংবাদ');

        // Fetch the specific news
        $data['single_news'] = $this->Common->get_data_single_conditional('news', 'id', $id)->row();

        // Check if news exists
        if (!$data['single_news']) {
            show_404();
        }

        $path = 'admin/news_notice/newz_table';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    // --------------------change active status-------------------

    public function news_active_status($id)
    {
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
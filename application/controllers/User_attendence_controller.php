<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_attendence_controller extends CI_Controller
{

    private $main_layout = 'user_dashboard/master_layout';
    private $side_menu = 'user_dashboard/side_menu';
    private $serverDateTime = '';




    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login_user_info_all')) {

            $this->session->set_flashdata('login_failed', 'Please login first');

            redirect('user_login_form');
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



    public function user_entry()
    {
        $id = $this->session->userdata("login_user_info_all")->id;


        $today = date('l');
        $date = date('y-m-d');

        $staff_info = $this->db->get_where('staff_login_info', ['id' => $id])->row();

        // echo '<pre>';
        // print_r($staff_movement_info);
        // echo '</pre>';
        // exit;

        $holiday = $this->db->get_where('staff_holidays', ['holiday_date' => $date])->row();

        if ($holiday) {
            $this->session->set_flashdata("attendece_error", "Today is holiday");
            redirect('user_dashboard');
            return;
        }
        if (!$staff_info) {
            $this->session->set_flashdata("attendece_error", "Staff info not found.");
            redirect('user_dashboard');
            return;
        }

        $staff_id = $staff_info->staff_id;
        $attendance_date = $this->input->post('date');
        $entry_time_input = $this->input->post('time');

        $attendence_setting = $this->db->get_where('staff_attendance_settings', ['staff_id' => $staff_id])->row();
        $weekend_day = strtolower($attendence_setting->weekend_day);
        $today = strtolower($today);


        if (!$attendence_setting) {
            $this->session->set_flashdata("attendece_error", "Attendance settings not found for this staff.");
            redirect('user_dashboard');
            return;
        }
        if ($today == $weekend_day) {
            $this->session->set_flashdata("weekend_error", "Today is your Weekend.");
            redirect('user_dashboard');
            return;
        }

        $entry = DateTime::createFromFormat('h:i A', $entry_time_input);

        $deadline = DateTime::createFromFormat('H:i:s', $attendence_setting->office_start);
        if (!$deadline) {
            $deadline = DateTime::createFromFormat('H:i', $attendence_setting->office_start);
        }

        if ($entry && $deadline) {
            $interval = $deadline->diff($entry);

            $total_minutes_diff = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
            $grace_minutes = (int) $attendence_setting->grace_minutes;

            if ($entry > $deadline && $total_minutes_diff > $grace_minutes) {
                $late_minutes = $total_minutes_diff - $grace_minutes;
                $attendance_status = 'Late';
            } else {
                $late_minutes = 0;
                $attendance_status = 'Present';
            }

            $formatted_entry_datetime = $attendance_date . ' ' . $entry->format('H:i:s');

            $data = array(
                'staff_id' => $staff_id,
                'attendance_date' => $attendance_date,
                'entry_time' => $formatted_entry_datetime,
                'late_minutes' => $late_minutes,
                'attendance_status' => $attendance_status
            );

            $this->db->insert("staff_attendance", $data);
            $this->session->set_flashdata("entry_attendece_success", "Successfully Submitted Attendance");

            redirect('user_attendence');
        } else {
            $this->session->set_flashdata("attendece_error", "Invalid time format provided.");
            redirect('user_dashboard');
        }
    }


    public function user_exit()
    {
        $id = $this->session->userdata("login_user_info_all")->id;

        $staff_info = $this->db->get_where('staff_login_info', ['id' => $id])->row();
        $staff_id = $staff_info->staff_id;

        $attendance_date = date('Y-m-d');
        $exit_time_input = $this->input->post('exit_time');

        $exit = DateTime::createFromFormat('h:i A', $exit_time_input);

        $attendence_setting = $this->db->get_where('staff_attendance_settings', ['staff_id' => $staff_id])->row();
        $weekend_day = strtolower($attendence_setting->weekend_day);


        $staff_movement_info = $this->db
            ->where('staff_id', $staff_id)
            ->where('movement_date', $attendance_date)
            ->order_by('id', 'DESC')
            ->limit(1)
            ->get('staff_movements')
            ->row();

        // echo '<pre>';
        // print_r($staff_movement_info->status);
        // echo '</pre>';
        // exit;

        if ($staff_movement_info->status == 'Open') {
            $this->session->set_flashdata("movement_error", "Close your movement first");
            redirect('user_movement_list');
            return;
        }

        if ($exit) {
            $formatted_exit_datetime = $attendance_date . ' ' . $exit->format('h:i:s A');

            $this->db->where('staff_id', $staff_id);
            $this->db->where('attendance_date', $attendance_date);
            $this->db->where('exit_time IS NULL', null, false);
            $attendance = $this->db->get('staff_attendance')->row();



            if ($attendance) {
                $entry_dt = new DateTime($attendance->entry_time);
                $exit_dt = new DateTime($formatted_exit_datetime);

                $interval = $entry_dt->diff($exit_dt);
                $total_working_minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

                $standard_exit = DateTime::createFromFormat(
                    'Y-m-d h:i A',
                    $attendance_date . ' 06:30 PM'
                );

                $early_exit_minutes = 0;
                $overtime_minutes = 0;

                if ($exit_dt < $standard_exit) {
                    $diff_early = $exit_dt->diff($standard_exit);
                    $early_exit_minutes = ($diff_early->days * 24 * 60) + ($diff_early->h * 60) + $diff_early->i;
                } else if ($exit_dt > $standard_exit) {
                    $diff_over = $standard_exit->diff($exit_dt);
                    $overtime_minutes = ($diff_over->days * 24 * 60) + ($diff_over->h * 60) + $diff_over->i;
                }

                $data = array(
                    'exit_time' => $formatted_exit_datetime,
                    'total_working_minutes' => $total_working_minutes,
                    'early_exit_minutes' => $early_exit_minutes,
                    'overtime_minutes' => $overtime_minutes,
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $this->db->where('id', $attendance->id);
                $this->db->update("staff_attendance", $data);

                $this->session->set_flashdata("attendance_success", "Successfully submitted exit time.");
            } else {
                $this->session->set_flashdata("attendance_error", "No active entry record found for today.");
            }

            redirect('user_attendence');
        } else {
            $this->session->set_flashdata("attendance_error", "Invalid exit time format provided.");
            redirect('user_dashboard');
        }
    }

    public function user_attendence()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $staff_id = $this->session->userdata('login_user_info_all')->staff_id;



        $filters = array(
            'search' => trim((string) $this->input->get('search', TRUE)),
            'from_date' => trim((string) $this->input->get('from_date', TRUE)),
            'to_date' => trim((string) $this->input->get('to_date', TRUE))
        );

        $per_page = 100;

        $page = (int) $this->input->get('page');

        if ($page < 0) {
            $page = 0;
        }

        $this->_apply_attendance_filters($filters, $staff_id);

        $total_rows = $this->db->count_all_results('staff_attendance');

        $this->load->library('pagination');

        $config = array(
            'base_url' => base_url('user_attendence'),
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

        $this->_apply_attendance_filters($filters, $staff_id);

        $this->db->order_by('id', 'DESC');
        $this->db->limit($per_page, $page);

        $data['staff_attendance'] = $this->db
            ->get('staff_attendance')
            ->result();

        foreach ($filters as $key => $val) {
            $data[$key] = $val;
        }

        $data['total_rows'] = $total_rows;
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $page;
        $data['per_page'] = $per_page;
        $data['sl_start'] = $page + 1;

        // echo '<pre>';
        // print_r($data['staff_attendance']);
        // echo '</pre>';
        // exit;

        $path = 'user_dashboard/attendence/attendence';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }



    public function add_staff_movement_form()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
        $path = 'user_dashboard/attendence/set_movements';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function add_staff_movement()
    {

        $staff_id = $this->session->userdata('login_user_info_all')->staff_id;

        $departure_time = $this->input->post('departure_time', TRUE);

        $data = array(
            'staff_id' => $staff_id,
            'movement_date' => date('Y-m-d', strtotime($departure_time)),
            'departure_time' => date('Y-m-d H:i:s', strtotime($departure_time)),
            'expected_return_time' => $this->input->post('expected_return_time')
                ? date('Y-m-d H:i:s', strtotime($this->input->post('expected_return_time')))
                : NULL,
            'destination' => $this->input->post('destination', TRUE),
            'purpose' => $this->input->post('purpose', TRUE),
            'movement_type' => $this->input->post('movement_type', TRUE),
            'status' => 'Open',
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('staff_movements', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('movement_success', 'Movement request submitted successfully.');
        } else {
            $this->session->set_flashdata('movement_error', 'Failed to submit movement request.');
        }

        redirect('user_movement_list');
    }


    public function close_staff_movement($id)
    {

        date_default_timezone_set('Asia/Dhaka');

        $time = date('h:i:s A');

        // $time=date('Y-m-d H:i:s', strtotime($date));

        $update_data = [

            'status' => 'Closed',
            'actual_return_time' => $time

        ];


        $this->db->where('id', $id);
        $this->db->update('staff_movements', $update_data);

        redirect(base_url('user_movement_list'));

    }

    public function user_movement_list()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $staff_id = $this->session->userdata('login_user_info_all')->staff_id;
        $date = date('y-m-d');


        $per_page = 100;

        $page = (int) $this->input->get('page');

        if ($page < 0) {
            $page = 0;
        }


        $total_rows = $this->db->count_all_results('staff_movements');

        $this->load->library('pagination');

        $config = array(
            'base_url' => base_url('user_movement_list'),
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

        $data['staff_movements'] = $this->db
            ->get('staff_movements')
            ->result();

        $data['current_staff_movements'] = $this->db
            ->where('movement_date', $date)
            ->get('staff_movements')
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

        $path = 'user_dashboard/attendence/movements_list';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    private function _apply_attendance_filters(array $filters, $staff_id)
    {
        $this->db->where('staff_id', $staff_id);

        if ($filters['search'] !== '') {

            $this->db->group_start();

            $this->db->like('attendance_date', $filters['search']);
            $this->db->or_like('attendance_status', $filters['search']);

            $this->db->group_end();
        }

        if ($filters['from_date'] !== '') {
            $this->db->where(
                'attendance_date >=',
                $filters['from_date']
            );
        }

        if ($filters['to_date'] !== '') {
            $this->db->where(
                'attendance_date <=',
                $filters['to_date']
            );
        }
    }


    public function leave_appication_form()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $path = 'user_dashboard/attendence/leave_appication_form';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

    public function add_leave_appication()
    {

        $staff_id = $this->session->userdata('login_user_info_all')->staff_id;


        $leave_type = $this->input->post('leave_type');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $total_days = $this->input->post('total_days');
        $reason = $this->input->post('reason');
        $attachment = $this->upload_file('attachment', './assets/uploads/leave_attachments/');

        $data = array(
            'staff_id' => $staff_id,
            'leave_type' => $leave_type,
            'from_date' => $from_date,
            'status' => 'Pending',
            'to_date' => $to_date,
            'total_days' => $total_days,
            'reason' => $reason,
            'attachment' => $attachment,
        );

        $this->db->insert('staff_leave_applications', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('leave_applications_success', 'leave_applications request submitted successfully.');
        } else {
            $this->session->set_flashdata('leave_applications_error', 'Failed to submit leave_applications request.');
        }

        redirect('user_movement_list');
    }


    public function leave_application_list()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');

        $staff_id = $this->session->userdata('login_user_info_all')->staff_id;


        $per_page = 10;

        $page = (int) $this->input->get('page');

        if ($page < 0) {
            $page = 0;
        }


        $total_rows = $this->db->where('staff_id', $staff_id)->count_all_results('staff_leave_applications');

        $this->load->library('pagination');

        $config = array(
            'base_url' => base_url('leave_application_list'),
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
            ->where('staff_id', $staff_id)
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

        $path = 'user_dashboard/attendence/leave_application_list';

        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }


    public function leave_application_details($id = NULL)
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



        $path = 'user_dashboard/attendence/leave_application_details';
        $this->engine->render_view($data, $path, $this->side_menu, $this->main_layout);
    }

}










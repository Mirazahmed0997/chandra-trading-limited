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



   


       public function user_entry() {
            $id = $this->session->userdata("login_user_info_all")->id;

            $staff_info = $this->db->get_where('staff_login_info', ['id' => $id])->row();

            $staff_id = $staff_info->staff_id;
            $attendance_date = $this->input->post('date'); 
            $entry_time_input = $this->input->post('time'); 
             
            
            $entry = DateTime::createFromFormat('h:i A', $entry_time_input);
            $deadline = DateTime::createFromFormat('h:i A', '10:30 AM');

            if ($entry && $deadline) {
                $interval = $deadline->diff($entry);
                
                $late_minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

                if ($entry > $deadline) {
                    echo "Late by: {$late_minutes} minutes";
                    $attendance_status = 'Late';
                } else {
                    $late_minutes = 0;
                    $attendance_status = 'Present';
                    echo "On time";
                }

                $formatted_entry_datetime = $attendance_date . ' ' . $entry->format('h:i:s A');

                $data = array(
                    'staff_id' => $staff_id,
                    'attendance_date' => $attendance_date,
                    'entry_time' => $formatted_entry_datetime, 
                    'late_minutes' => $late_minutes,
                    'attendance_status' => $attendance_status
                );

                $this->db->insert("staff_attendance", $data);
                $this->session->set_flashdata("entry_attendece_success", "Successfully Submit Attendence");

                redirect('user_dashboard');
            } else {
                $this->session->set_flashdata("attendece_error", "Invalid time format provided.");
                redirect('user_dashboard');
            }
    }


       public function user_exit() {
                $id = $this->session->userdata("login_user_info_all")->id;

                $staff_info = $this->db->get_where('staff_login_info', ['id' => $id])->row();
                $staff_id = $staff_info->staff_id;

                $attendance_date = date('Y-m-d'); 
                $exit_time_input = $this->input->post('exit_time'); 

                $exit = DateTime::createFromFormat('h:i A', $exit_time_input);

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

                    redirect('user_dashboard');
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
            'search'    => trim((string) $this->input->get('search', TRUE)),
            'from_date' => trim((string) $this->input->get('from_date', TRUE)),
            'to_date'   => trim((string) $this->input->get('to_date', TRUE))
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
            'base_url'             => base_url('user_attendence'),
            'total_rows'           => $total_rows,
            'per_page'             => $per_page,
            'page_query_string'    => TRUE,
            'query_string_segment' => 'page',
            'reuse_query_string'   => TRUE,
            'use_page_numbers'     => FALSE,

            'full_tag_open'  => '<ul class="pagination pagination-sm mb-0">',
            'full_tag_close' => '</ul>',

            'first_link' => 'First',
            'last_link'  => 'Last',

            'first_tag_open'  => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_tag_open'   => '<li class="page-item">',
            'last_tag_close'  => '</li>',

            'next_tag_open'  => '<li class="page-item">',
            'next_tag_close' => '</li>',
            'prev_tag_open'  => '<li class="page-item">',
            'prev_tag_close' => '</li>',

            'num_tag_open'  => '<li class="page-item">',
            'num_tag_close' => '</li>',

            'cur_tag_open'  => '<li class="page-item active"><a class="page-link" href="#">',
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




    }










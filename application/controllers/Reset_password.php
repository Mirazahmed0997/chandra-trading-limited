<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller
{
    private $main_layout = 'site/master_layout';
    private $header = 'site/header';
    private $footer = 'site/footer';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = $this->engine->store_nav('ctl', 'ctl', 'Chandra trading Limited');
        $data['homapage_info'] = $this->Common->get_data('job_homepage')->row();

        $path = 'site/pages/reset_pass_form/reset_pass';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }


    public function send_reset_link()
    {
        $email = $this->input->post('a_email');

        $user = $this->db
            ->where('a_email', $email)
            ->get('members_table')
            ->row();

        if ($user) {

            $token = bin2hex(random_bytes(32));

            $expire = date(
                'Y-m-d H:i:s',
                strtotime('+1 hour')
            );

            $this->db->where('id', $user->id);
            $this->db->update('members_table', [
                'reset_token' => $token,
                'token_expire' => $expire
            ]);

            $reset_link = base_url(
                'reset_password/' . $token
            );

            $this->load->library('email');

            $this->email->from('ahmedmiraz87@gmail.com', 'Chandra Trading Limited');

            $this->email->to($email);

            $this->email->subject(
                'Password Reset Link'
            );

            $this->email->message(
                'Click this link to reset password: '
                . $reset_link
            );

            if ($this->email->send()) {

                $this->session->set_flashdata(
                    'success',
                    'Reset link sent to email'
                );

            } else {

                echo $this->email->print_debugger();
            }

        } else {

            $this->session->set_flashdata(
                'error',
                'Email not found'
            );
        }

        // redirect('member_login');
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function reset_password($token)
    {
        $user = $this->db
            ->where('reset_token', $token)
            ->where('token_expire >', date('Y-m-d H:i:s'))
            ->get('members_table')
            ->row();

        if (!$user) {
            echo "Invalid or expired token";
            return;
        }

        $data['token'] = $token;
        $path = 'site/pages/reset_pass_form/update_pass';


        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }


    public function update_password()
    {
        $token = $this->input->post('token');

        $password = $this->input->post('password');

        $user = $this->db
            ->where('reset_token', $token)
            ->get('members_table')
            ->row();

        if ($user) {

            $this->db->where('id', $user->id);

            $this->db->update('members_table', [

                'password' => $password,

                'reset_token' => NULL,

                'token_expire' => NULL
            ]);

            $this->session->set_flashdata(
                'success',
                'Password updated successfully'
            );

            redirect('admin');

        } else {

            echo "Invalid token";
        }
    }



}
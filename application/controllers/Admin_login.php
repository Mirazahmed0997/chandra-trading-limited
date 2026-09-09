<?php

class Admin_login extends CI_Controller
{


    private $main_layout = 'recruitment/master_layout';
    private $header = 'recruitment/header';
    private $footer = 'recruitment/footer';
    private $serverDateTime = '';
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = $this->engine->store_nav('recruitment', 'Nothing', 'Chandra Trading Limited');
        $data['homapage_info'] = $this->Common->get_data('job_homepage')->row();

        $path = 'login/login';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }

    public function admin_registration()
    {
        $data = $this->engine->store_nav('Nothing', 'Nothing', 'শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি');

        $path = 'admin/registration/registration';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }


    public function login_process()
    {

        $mobile_number = $this->input->post('mobile_number');
        $password = $this->input->post('password');

        $this->db->where('mobile_number', $mobile_number);
        $user = $this->db->get('users')->row();

        if ($user) {

            // if (password_verify($password, $user->password))
            if ($password == $user->password) {

                $this->session->set_userdata('current_type', 2);
                $this->session->set_userdata('login_user_info_all', $user);

                redirect('admin_dashboard');

            } else {

                $this->session->set_flashdata('error', 'ভুল পাসওয়ার্ড');
                redirect('admin');
            }

        } else {

            $this->session->set_flashdata('error', 'Mobile number not found Please Registration First');
            redirect('admin_registration_form');
        }
    }




    public function reset_email_form()
    {
        $data = $this->engine->store_nav('ctl', 'ctl', 'Chandra Trading Limited');
        $data['homapage_info'] = $this->Common->get_data('job_homepage')->row();

        $path = 'admin/reset_pass_form/reset_pass';
        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }

    public function send_reset_link()
    {
        $email = trim($this->input->post('email'));

        // Validate email
        if (empty($email)) {

            $this->session->set_flashdata(
                'error',
                'Please enter your email address.'
            );

            redirect('forget_password');
            return;
        }


        // Find user
        $user = $this->db
            ->where('email', $email)
            ->get('users')
            ->row();


        // Email does not exist
        if (!$user) {

            $this->session->set_flashdata(
                'error',
                'Email not found.'
            );

            redirect('forget_password');
            return;
        }


        $token = bin2hex(random_bytes(32));


        $expire = date(
            'Y-m-d H:i:s',
            strtotime('+1 hour')
        );


        $this->db
            ->where('id', $user->id)
            ->update('users', [

                'reset_token' => $token,

                'token_expire' => $expire

            ]);


        $reset_link = site_url(
            'reset_password/' . $token
        );


        $this->load->library('email');


        $this->email->from(
            'ctl05.2026@gmail.com',
            'Chandra Trading Limited'
        );


        $this->email->to($email);


        $this->email->subject(
            'Password Reset - Chandra Trading Limited'
        );


        $this->email->set_mailtype('html');


        $message = '

        <div style="
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
        ">

            <h2>
                Password Reset
            </h2>

            <p>
                Hello ' . htmlspecialchars($user->first_name ?? '') . ',
            </p>

            <p>
                We received a request to reset your password.
            </p>

            <p>
                Click the button below to create a new password.
            </p>

            <p style="margin:30px 0;">

                <a href="' . $reset_link . '"
                   style="
                       background:#212529;
                       color:#ffffff;
                       padding:12px 25px;
                       text-decoration:none;
                       border-radius:5px;
                       display:inline-block;
                   ">

                    Reset Password

                </a>

            </p>

            <p>
                This link will expire in <strong>1 hour</strong>.
            </p>

            <p>
                If you did not request a password reset,
                you can safely ignore this email.
            </p>

            <hr>

            <p>
                Chandra Trading Limited
            </p>

        </div>

    ';


        $this->email->message($message);


        // Send email
        if ($this->email->send()) {

            $this->session->set_flashdata(
                'success',
                'Password reset link has been sent to your email.'
            );

            redirect('forget_password');

        } else {

            echo '<pre>';

            echo $this->email->print_debugger();

            echo '</pre>';

            exit;
        }
    }

    public function reset_password($token)
    {
        $user = $this->db
            ->where('reset_token', $token)
            ->where('token_expire >', date('Y-m-d H:i:s'))
            ->get('users')
            ->row();

        if (!$user) {
            echo "Invalid or expired token";
            return;
        }

        $data['token'] = $token;
        $path = 'admin/reset_pass_form/update_pass';


        $this->engine->render_front_view($data, $path, $this->header, $this->footer, $this->main_layout);
    }


    public function update_new_password()
    {
        $token = $this->input->post('token');

        $password = $this->input->post('password');

        // echo $password;
        // exit;

        $user = $this->db
            ->where('reset_token', $token)
            ->get('users')
            ->row();

        if ($user) {

            $this->db->where('id', $user->id);

            $this->db->update('users', [

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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
}

?>
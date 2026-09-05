<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $main_layout = 'recruitment/master_layout';
    private $header = 'recruitment/header';
    private $footer = 'recruitment/footer';

    private $client_id;
    private $client_secret;

    public function __construct()
    {
        parent::__construct();

        // Load Google OAuth credentials from environment
        $this->client_id = getenv('GOOGLE_CLIENT_ID');
        $this->client_secret = getenv('GOOGLE_CLIENT_SECRET');
    }

    public function index()
    {
        $data = $this->engine->store_nav(
            'recruitment',
            'Nothing',
        
        );

        $data['homapage_info'] = $this->Common->get_data('job_homepage')->row();

        $redirect_uri = urlencode(
            base_url('auth/google_login_process')
        );

        $data['google_login_url'] =
            'https://accounts.google.com/o/oauth2/v2/auth'
            . '?client_id=' . urlencode($this->client_id)
            . '&redirect_uri=' . $redirect_uri
            . '&response_type=code'
            . '&scope=email%20profile';

        $path = 'login/login';

        $this->engine->render_front_view(
            $data,
            $path,
            $this->header,
            $this->footer,
            $this->main_layout
        );
    }

    public function google_login_process()
    {
        $code = $this->input->get('code');

        if ($code) {

            $token_url = 'https://oauth2.googleapis.com/token';

            $params = [
                'code'          => $code,
                'client_id'     => $this->client_id,
                'client_secret' => $this->client_secret,
                'redirect_uri'  => base_url('auth/google_login_process'),
                'grant_type'    => 'authorization_code'
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $token_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Keep SSL verification enabled
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

            $response = json_decode(curl_exec($ch), true);

            curl_close($ch);

            if (isset($response['access_token'])) {

                $user_info_url =
                    'https://www.googleapis.com/oauth2/v2/userinfo?access_token='
                    . urlencode($response['access_token']);

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $user_info_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Keep SSL verification enabled
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

                $google_user = json_decode(curl_exec($ch));

                curl_close($ch);

                if (isset($google_user->email)) {

                    $email = $google_user->email;
                    $google_id = $google_user->id;

                    // Check existing user
                    $this->db->where('email', $email);
                    $user = $this->db->get('users')->row();

                    if ($user) {

                        if (empty($user->google_id)) {

                            $this->db->where('id', $user->id);

                            $this->db->update(
                                'users',
                                [
                                    'google_id' => $google_id
                                ]
                            );
                        }

                    } else {

                        // Register new user
                        $insert_data = [
                            'first_name'    => $google_user->given_name ?? '',
                            'last_name'     => $google_user->family_name ?? '',
                            'email'         => $email,
                            'username'      => strtolower(
                                $google_user->given_name ?? 'user'
                            ) . rand(100, 999),
                            'google_id'     => $google_id,
                            'mobile_number' => '',
                            'designation'   => 'User',
                            'password'      => ''
                        ];

                        $this->db->insert('users', $insert_data);

                        $this->db->where('email', $email);
                        $user = $this->db->get('users')->row();
                    }

                    // Create session
                    $this->session->set_userdata(
                        'current_type',
                        2
                    );

                    $this->session->set_userdata(
                        'login_user_info_all',
                        $user
                    );

                    redirect('admin_dashboard');
                    return;
                }
            }
        }

        $this->session->set_flashdata(
            'error',
            'Google Login Failed.'
        );

        redirect('admin');
    }
}
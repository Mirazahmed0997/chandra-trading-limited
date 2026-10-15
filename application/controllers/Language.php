<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
    }

    public function set($language = 'english')
    {
        $allowed_languages = ['english', 'bangla'];

        if (!in_array($language, $allowed_languages)) {
            $language = 'english';
        }

        // Save selected language
        $this->session->set_userdata('site_language', $language);

        // Save current time
        $this->session->set_userdata(
            'language_selected_at',
            time()
        );

        // Mark language as selected
        $this->session->set_userdata(
            'language_selected',
            true
        );

        // Redirect back to current page
        $redirect = $this->input->get('redirect');

        if ($redirect) {
            redirect($redirect);
        }

        redirect(base_url());
    }
}
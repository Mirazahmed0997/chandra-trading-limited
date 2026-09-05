<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load required library/helpers
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('language');

        // Get selected language from session
        $language = $this->session->userdata('site_language');

        // If no language is selected, use Bangla as default
        if (!$language || !in_array($language, ['english', 'bangla'], true)) {
            $language = 'bangla';

            // Save default language in session
            $this->session->set_userdata('site_language', $language);
        }

        // Set CodeIgniter language
        $this->config->set_item('language', $language);

        // Load translation file
        $this->lang->load('site', $language);
    }
}
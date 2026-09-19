<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_controller extends MY_Controller
{
    protected $table = 'landowner_leads';

    public function __construct()
    {
        parent::__construct();
    }
    public function landowners_query_create()
    {

        $name = trim($this->input->post('name'));
        $mobile = trim($this->input->post('mobile'));
        $email = trim($this->input->post('email'));
        $location = trim($this->input->post('location'));
        $land_size = trim($this->input->post('land_size'));
        $property_type = trim($this->input->post('property_type'));
        $message = trim($this->input->post('message'));


        // 3. Validation

        if (empty($name)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Name is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($mobile)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Mobile number is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($email)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Email is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Please enter a valid email address.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($location)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Land location is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($land_size)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Land size is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($property_type)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Property type is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        // 4. Prepare data

        $data = array(

            'name' => $name,

            'mobile' => $mobile,

            'email' => $email,

            'location' => $location,

            'land_size' => $land_size,

            'property_type' => $property_type,

            'message' => $message,

            'status' => 'New',

            'created_at' => date('Y-m-d H:i:s')
        );


        // 5. Insert

        $insert = $this->db
            ->insert('landowner_leads', $data);


        // 6. Response

        if ($insert) {

            $this->session->set_flashdata(
                'landowner_success',
                'Your property enquiry has been submitted successfully.'
            );

            redirect($_SERVER['HTTP_REFERER']);

        } else {

            $this->session->set_flashdata(
                'landowner_error',
                'Unable to submit your enquiry. Please try again.'
            );

            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function contact_messages_create()
    {

        $full_name = trim($this->input->post('full_name'));
        $phone = trim($this->input->post('phone'));
        $email = trim($this->input->post('email'));
        $property_type = trim($this->input->post('property_type'));
        $message = trim($this->input->post('message'));
        


        // 3. Validation

        if (empty($full_name)) {

            $this->session->set_flashdata(
                'landowner_error',
                'full_name is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($phone)) {

            $this->session->set_flashdata(
                'landowner_error',
                'phone number is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($email)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Email is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Please enter a valid email address.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        if (empty($property_type)) {

            $this->session->set_flashdata(
                'landowner_error',
                'Property type is required.'
            );

            redirect($_SERVER['HTTP_REFERER']);
            return;
        }


        // 4. Prepare data

        $data = array(

            'full_name' => $full_name,

            'phone' => $phone,

            'email' => $email,

            'property_type' => $property_type,

            'message' => $message,

            'status' => 'New',

            'created_at' => date('Y-m-d H:i:s')
        );


        // 5. Insert

        $insert = $this->db
            ->insert('contact_messages', $data);


        // 6. Response

        if ($insert) {

            $this->session->set_flashdata(
                'landowner_success',
                'Your property enquiry has been submitted successfully.'
            );

            redirect($_SERVER['HTTP_REFERER']);

        } else {

            $this->session->set_flashdata(
                'landowner_error',
                'Unable to submit your enquiry. Please try again.'
            );

            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
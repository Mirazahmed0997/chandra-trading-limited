<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_content_controller extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->database();
    }



    public function properties_details_view($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['property'] = $this->db->where('id', $id)
            ->where('status', 'Published')
            ->get('properties')
            ->row();

        if (!$data['property']) {
            show_404();
        }

        $this->load->view('site/pages/properties/properties_Details', $data);
    }








    public function project_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['current_projects'] = $this->db->where('id', $id)
            ->where('status', 1)
            ->get('current_projects')
            ->row_array();

        if (!$data['current_projects']) {
            show_404();
        }

        $this->load->view('site/pages/notice&current_projects/project_details', $data);
    }



    // -------------------news details------------
    public function news_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['news'] = $this->db->where('id', $id)
            ->where('status', 1)
            ->get('news')
            ->row_array();

        if (!$data['news']) {
            show_404();
        }

        $this->load->view('site/pages/notice&current_projects/news_details', $data);
    }




    // -------------------news details------------
    public function notice_details($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['notices'] = $this->db->where('id', $id)
            ->where('status', 1)
            ->get('notices')
            ->row_array();

        if (!$data['notices']) {
            show_404();
        }

        $this->load->view('site/pages/notice&current_projects/notice_details', $data);
    }



    public function all_managment()
    {
        $this->load->view('site/pages/company_details/all_managment');
    }


    public function get_management_info()
    {
        $data['managment_info'] = $this->db->order_by('created_at', 'DESC')
            ->get('managment_info')
            ->result_array();

        return $data['managment_info'];
    }
    // -------------------mamagement_details---------------------


    public function management_details($id)
    {
        if (!$id) {
            show_404();
        }

        $data['managment_info'] = $this->db->where('id', $id)

            ->get('managment_info')
            ->row_array();

        if (!$data['managment_info']) {
            show_404();
        }

        $this->load->view('site/pages/company_details/managment_details', $data);
    }





    private function generate_appointment_pdf($html, $id)
    {
        $autoloader_path = APPPATH . 'third_party/dompdf/autoload.inc.php';

        if (!file_exists($autoloader_path)) {
            show_error('Dompdf autoloader file not found at: ' . $autoloader_path);
        }

        require_once $autoloader_path;

        if (!class_exists('Dompdf\Dompdf')) {
            show_error('Dompdf class not found. Make sure you downloaded the official Dompdf Release ZIP package.');
        }

        $dompdf = new \Dompdf\Dompdf();

        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'Helvetica');
        $dompdf->setOptions($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        $previous_error_reporting = error_reporting();
        error_reporting($previous_error_reporting & ~E_WARNING & ~E_NOTICE);

        $dompdf->render();

        error_reporting($previous_error_reporting);

        $output = $dompdf->output();

        $upload_dir = FCPATH . 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, TRUE);
        }

        $file_path = $upload_dir . "appointment_letter_$id.pdf";

        file_put_contents($file_path, $output);

        return $file_path;
    }


    // public function send_appointment_letter($id = NULL)
    // {
    //     $loggedUser = $this->session->userdata('login_user_info_all');


    //     $this->db->where('application_id', $id);
    //     $applicant = $this->db->get('job_applications')->row();
    //     $date = date('d-m-Y');


    //     $this->db->where('applicant_id', $id);
    //     $appointment_letters = $this->db->get('appointment_letters')->row();

    //     if ($applicant && !empty($applicant->contact_email)) {
    //         $email = 'ahmedmiraz87@gmail.com';
    //         // $email = $applicant->contact_email;

    //         $data['application'] = $applicant;
    //         $data['appointment_letters'] = $appointment_letters;
    //         $data['loggedUser'] = $loggedUser;

    //         $html_content = $this->load->view('admin/staff_recruitment/appointment_letter_email_pdf', $data, True);
    //         // $html_content = $this->load->view('appointment_letter_email/'. $id);




    //         if (empty($html_content)) {
    //             $this->session->set_flashdata('error', 'Failed to generate HTML content for the PDF.');
    //             redirect($_SERVER['HTTP_REFERER']);
    //             return;
    //         }

    //         $pdf_path = $this->generate_appointment_pdf($html_content, $id);


    //         // echo '<pre>';
    //         // print_r($html_content);
    //         // echo '</pre>';
    //         // exit;

    //         $this->load->library('email');

    //         $config['mailtype'] = 'html';
    //         $this->email->initialize($config);

    //         $this->email->from('ctl05.2026@gmail.com', 'Chandra Trading Limited');
    //         $this->email->to($email);
    //         $this->email->subject('Appointment Letter');

    //         $message = '<p>Dear ' . ($applicant->name ?? 'Applicant') . ',</p>';
    //         $message .= '<p>Please find attached your official appointment letter from Chandra Trading Limited.</p>';
    //         $this->email->message($message);

    //         $this->email->attach($pdf_path);

    //         $update_data = [
    //             'is_sent' => 1
    //         ];

    //         $this->db->where('applicant_id', $id);
    //         $this->db->update('appointment_letters', $update_data);

    //         if ($this->email->send()) {
    //             if (file_exists($pdf_path)) {
    //                 unlink($pdf_path);
    //             }

    //             $this->session->set_flashdata(
    //                 'success',
    //                 'Appointment letter PDF sent successfully!'
    //             );
    //         } else {
    //             echo $this->email->print_debugger();
    //             return;
    //         }

    //     } else {
    //         $this->session->set_flashdata(
    //             'error',
    //             'Email not found or applicant does not exist'
    //         );
    //     }

    //     redirect($_SERVER['HTTP_REFERER']);
    // }





    public function send_appointment_letter($id = NULL)
    {
        $this->db->where('application_id', $id);
        $applicant = $this->db->get('job_applications')->row();

        $this->db->where('applicant_id', $id);
        $appointment_letters = $this->db->get('appointment_letters')->row();



        $date = date('d-m-Y');
        // $letter_number = 'CTL0' . $id . '-' . $date;

        if ($applicant && !empty($applicant->contact_email)) {
            //$email = 'miraz.ahmed.cse@ulab.edu.bd';
            $email = $applicant->contact_email;
            $password = $appointment_letters->password;


            // echo '<pre>';
            // print_r($body);
            // echo '</pre>';
            // exit;

            $this->load->library('email');

            $config['mailtype'] = 'html';
            $this->email->initialize($config);

            $this->email->from('ctl05.2026@gmail.com', 'Chandra Trading Limited');
            $this->email->to($email);
            $this->email->subject('Appointment Letter');

            $data['applicant'] = $applicant;
            $body = '
                <a href="' . base_url('appointment_letter_email/' . $id) . '">
                    View Appointment Letter
                </a>
                <br><br>
                Login with your Email or Mobile
                <br><br>
                Your Login Password is: ' . html_escape($password) . '
                <br><br>
                Login from here:
                <a href="https://chandratradingltd.com/user_login_form">
                    Employee Login
                </a>
            '; // echo '<pre>';
            // print_r($body);
            // echo '</pre>';
            // exit;

            $this->email->message($body);

            $update_data = [

                // 'letter_number ' => $letter_number,
                'is_sent' => 1
            ];


            $this->db->where('applicant_id', $id);
            $this->db->update('appointment_letters', $update_data);

            if ($this->email->send()) {
                $this->session->set_flashdata(
                    'success',
                    'Appointment letter sent successfully!'
                );
            } else {
                echo $this->email->print_debugger();
                return;
            }

        } else {
            $this->session->set_flashdata(
                'error',
                'Email not found or applicant does not exist'
            );
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function appointment_letter_email($id = NULL)
    {
        // $data = $this->engine->store_nav('Nothing', 'Nothing', 'Chandra Trading Limited');
        $loggedUser = $this->session->userdata('login_user_info_all');

        if (empty($id)) {
            show_404();
        }

        $this->db->where('applicant_id', $id);
        $appointment_letters = $this->db->get('appointment_letters')->row();

        $this->db->where('application_id', $id);
        $application = $this->db->get('job_applications')->row();



        if (!$id) {
            show_404();
        }

        // $data = $this->engine->store_nav(
        //     'appointment_letters',
        //     'appointment_letters',
        //     'appointment_letters Details: ' . $appointment_letters->employee_name
        // );



        $data['appointment_letters'] = $appointment_letters;
        $data['application'] = $application;
        $data['loggedUser'] = $loggedUser;



        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        // $path = 'admin/staff_recruitment/appointment_letter_email';
        $this->load->view('admin/staff_recruitment/appointment_letter_email', $data);
        // $this->engine->render_view($data, $path);
    }

    public function rejection_mail($id = NULL)
    {
        $this->db->where('application_id', $id);
        $applicant = $this->db->get('job_applications')->row();

        if (!$applicant || empty($applicant->contact_email)) {
            $this->session->set_flashdata(
                'error',
                'Email not found or applicant does not exist.'
            );

            redirect($_SERVER['HTTP_REFERER'] ?? base_url('admin'));
            return;
        }

        $email = $applicant->contact_email;

        $applicant_name = !empty($applicant->applicant_name)
            ? html_escape($applicant->applicant_name)
            : 'Applicant';
        $applied_position = !empty($applicant->applied_position)
            ? html_escape($applicant->applied_position)
            : 'Applicant';

        $this->load->library('email');

        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->from(
            'ctl05.2026@gmail.com',
            'Chandra Trading Limited'
        );

        $this->email->to($email);

        $this->email->subject('Application Status - Chandra Trading Limited');

        $body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body style="font-family: Arial, sans-serif; color: #333; line-height: 1.7;">

        <div style="max-width: 650px; margin: 20px auto; padding: 25px; border: 1px solid #ddd;">

            <h2 style="color: #145c3a;">
                Chandra Trading Limited
            </h2>

            <p>Dear <strong>' . $applicant_name . '</strong>,</p>

            <p>
                Thank you for your interest in joining
                <strong>Chandra Trading Limited</strong> as <strong>' . $applied_position . '</strong> and for taking
                the time to participate in our recruitment process.
            </p>

            <p>
                After carefully reviewing your application and evaluating
                your qualifications, we regret to inform you that we have
                decided not to proceed with your application at this time.
            </p>

            <p>
                We sincerely appreciate your interest in our organization
                and the effort you invested throughout the recruitment process.
                We encourage you to apply for future opportunities that match
                your qualifications and experience.
            </p>

            <p>
                We wish you every success in your future career.
            </p>

            <br>

            <p>
                Best Regards,<br>
                <strong>Human Resources Department</strong><br>
                Chandra Trading Limited<br>
                Lily Pond Center, Floor-21, Mission Road,<br>
                Motijheel, Dhaka-1203<br>
                Email: ctl05.2026@gmail.com<br>
                Phone: +880 1709-653400
            </p>

        </div>

    </body>
    </html>';

        $this->email->message($body);

        // Send email first
        if ($this->email->send()) {

            // Update applicant status after successful email
            $this->db->where('application_id', $id);
            $this->db->update('job_applications', [
                'application_status' => 'Rejected'
            ]);

            $this->session->set_flashdata(
                'success',
                'Rejection email sent successfully!'
            );

        } else {

            log_message('error', $this->email->print_debugger());

            $this->session->set_flashdata(
                'error',
                'Failed to send rejection email. Please check email configuration.'
            );
        }

        redirect($_SERVER['HTTP_REFERER'] ?? base_url('admin'));
    }


    public function accept_mail($id = NULL)
    {
        $this->db->where('application_id', $id);
        $applicant = $this->db->get('job_applications')->row();

        if (!$applicant) {
            $this->session->set_flashdata(
                'error',
                'Applicant not found.'
            );

            redirect($_SERVER['HTTP_REFERER'] ?? base_url('admin'));
            return;
        }

        if (empty($applicant->contact_email)) {
            $this->session->set_flashdata(
                'error',
                'Applicant email address not found.'
            );

            redirect($_SERVER['HTTP_REFERER'] ?? base_url('admin'));
            return;
        }

        // Update application status
        $this->db->where('application_id', $id);
        $this->db->update('job_applications', [
            'application_status' => 'Accepted'
        ]);

        // Email configuration
        $this->load->library('email');

        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        // Applicant name
        $applicant_name = !empty($applicant->applicant_name)
            ? html_escape($applicant->applicant_name)
            : 'Applicant';

        // Email details
        $this->email->from(
            'ctl05.2026@gmail.com',
            'Chandra Trading Limited'
        );

        $this->email->to($applicant->contact_email);

        $this->email->subject(
            'Congratulations! Your Application Has Been Approved - Chandra Trading Limited'
        );

        $body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
    </head>

    <body style="font-family: Arial, sans-serif; color: #333; line-height: 1.7;">

        <div style="max-width: 650px; margin: 20px auto; padding: 25px; border: 1px solid #ddd;">

            <h2 style="color: #145c3a;">
                Chandra Trading Limited
            </h2>

            <h3 style="color: #145c3a;">
                Congratulations!
            </h3>

            <p>Dear <strong>' . $applicant_name . '</strong>,</p>

            <p>
                We are pleased to inform you that your application
                for the position of <strong>' .
            html_escape($applicant->applied_position ?? 'the advertised position') .
            '</strong> at <strong>Chandra Trading Limited</strong>
                has been approved.
            </p>

            <p>
                After reviewing your qualifications and evaluating
                your application, we are delighted to move forward
                with your candidacy.
            </p>

            <p>
                Our HR Department will contact you regarding the next
                steps, including the appointment letter, joining date,
                and other necessary formalities.
            </p>

            <p>
                We appreciate your interest in joining Chandra Trading
                Limited and look forward to having you as part of our team.
            </p>

            <p>
                Congratulations once again, and best wishes for your
                professional journey with us.
            </p>

            <br>

            <p>
                Best Regards,<br>
                <strong>Human Resources Department</strong><br>
                Chandra Trading Limited<br>
                Lily Pond Center, Floor-21, Mission Road,<br>
                Motijheel, Dhaka-1203<br>
                Email: ctl05.2026@gmail.com<br>
                Phone: +880 1709-653400
            </p>

        </div>

    </body>
    </html>';

        $this->email->message($body);

        // Send email
        if ($this->email->send()) {

            $this->session->set_flashdata(
                'success',
                'Applicant approved and approval email sent successfully!'
            );

        } else {

            log_message('error', $this->email->print_debugger());

            $this->session->set_flashdata(
                'error',
                'Applicant approved, but approval email could not be sent.'
            );
        }

        redirect($_SERVER['HTTP_REFERER'] ?? base_url('admin'));
    }




    // visitors
    public function total_visitors()
    {
        $this->load->database();

        $total = $this->db->count_all('visitors');

        echo "Total Visitors: " . $total;
    }


}


?>
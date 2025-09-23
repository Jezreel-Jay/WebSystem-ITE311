<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @property CI_Session $session
* @property User_model $User_model
* @property Grade_model $Grade_model
* @property Course_model $Course_model
* @property Notification_model $Notification_model
*/
class StudentController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Load necessary models
        $this->load->model('User_model');
        $this->load->model('Course_model'); 
        $this->load->model('Notification_model'); 
        $this->load->model('Grade_model'); 
    }

    // ---------------- DASHBOARD ----------------
    public function dashboard() // <-- created dashboard
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') !== 'student') {
            redirect('auth/login');
        }

        $student_id = $this->session->userdata('user_id');

        // Dashboard data
        $data['title'] = 'Student Dashboard';
        $data['message'] = 'Welcome Student: ' . $this->session->userdata('user_name');
        $data['enrolledCourses'] = $this->Course_model->get_student_courses($student_id);
        $data['upcomingDeadlines'] = $this->Notification_model->get_student_deadlines($student_id);
        $data['recentGrades'] = $this->Grade_model->get_student_grades($student_id);

        $this->load->view('student/dashboard', $data);
    }
}


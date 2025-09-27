<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @property CI_Session $session
* @property User_model $User_model
* @property Course_model $Course_model
* @property Notification_model $Notification_model
*/
class TeacherController extends CI_Controller
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
    }

    // ---------------- DASHBOARD ----------------
    public function dashboard() // <-- created dashboard
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') !== 'teacher') {
            redirect('auth/login');
        }

        $teacher_id = $this->session->userdata('user_id');

        // Dashboard data
        $data['title'] = 'Teacher Dashboard';
        $data['message'] = 'Welcome Teacher: ' . $this->session->userdata('user_name');
        $data['courses'] = $this->Course_model->get_teacher_courses($teacher_id);
        $data['notifications'] = $this->Notification_model->get_for_teacher($teacher_id);

        $this->load->view('teacher/dashboard', $data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @property CI_Session $session
* @property User_model $User_model
* @property Course_model $Course_model
*/
class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Load necessary models
        $this->load->model('User_model');
        $this->load->model('Course_model'); // Must have count_all_courses()
    }

    // ---------------- DASHBOARD ----------------
    public function dashboard() // <-- created dashboard
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') !== 'admin') {
            redirect('auth/login');
        }

        // Dashboard data
        $data['title'] = 'Admin Dashboard';
        $data['message'] = 'Welcome Admin: ' . $this->session->userdata('user_name');
        $data['totalUsers'] = $this->User_model->count_all_users();
        $data['totalCourses'] = $this->Course_model->count_all_courses();
        $data['recentActivity'] = $this->User_model->get_recent_activity();

        $this->load->view('admin/dashboard', $data);
    }
}


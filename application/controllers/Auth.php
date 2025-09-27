<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_DB_query_builder $db
 * @property User_model $User_model
*/

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('User_model'); //  Load the User_model
    }

    // ---------------- REGISTER ----------------
    public function register()
    {
        $this->form_validation->set_message(['is_unique' => 'This email is already registered.']);

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() === TRUE) {
                $data = [
                    'name'       => $this->input->post('name'),
                    'email'      => $this->input->post('email'),
                    'password'   => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'role'       => $this->input->post('role') ?? 'student',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                //  Use User_model instead of $this->db
                if ($this->User_model->insert_user($data)) {
                    $this->session->set_flashdata('success', 'Registration successful. You can now login.');
                    redirect('auth/login');
                } else {
                    $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                    redirect('auth/register');
                }
            }
        }

        $this->load->view('auth/register');
    }

    // ---------------- LOGIN ----------------
    public function login()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === TRUE) {
                $email    = $this->input->post('email');
                $password = $this->input->post('password');

                
                $user = $this->User_model->get_user_by_email($email);

                if ($user && password_verify($password, $user->password)) {
                    $this->session->set_userdata([
                        'user_id'    => $user->id,
                        'user_name'  => $user->name,
                        'user_email' => $user->email,
                        'user_role'  => $user->role,
                        'logged_in'  => TRUE
                    ]);
                   // $this->session->set_flashdata('success', 'Welcome back, ' . $user->name . '!');
                    
                    switch ($user->role) {
                        case 'admin':
                            redirect('admin/dashboard');
                            break;
                        case 'teacher':
                            redirect('teacher/dashboard');
                            break;
                        case 'student':
                            redirect('student/dashboard');
                            break;
                        default:
                            redirect('auth/dashboard'); // fallback
                            break;
                        }
                } else {
                    $this->session->set_flashdata('error', 'Invalid email or password.');
                    redirect('auth/login');
                }
            }
        }

        $this->load->view('auth/login');
    }

    // ---------------- LOGOUT ----------------
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    // ---------------- DASHBOARD ----------------
    public function dashboard()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->view('auth/dashboard');
    }
}


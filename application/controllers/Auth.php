<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    // ---------------- REGISTER ----------------
    public function register()
    {
        $this->form_validation->set_message('is_unique', 'This email is already registered.');

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[new_user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'name'       => $this->input->post('name'),
                    'email'      => $this->input->post('email'),
                    'password'   => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'role'       => 'user',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('new_user', $data);

                if ($this->db->affected_rows() > 0) {
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

            if ($this->form_validation->run() == TRUE) {
                $email    = $this->input->post('email');
                $password = $this->input->post('password');

                $user = $this->db->get_where('new_user', ['email' => $email])->row();

                if ($user && password_verify($password, $user->password)) {
                    $this->session->set_userdata([
                        'user_id'    => $user->id,
                        'user_name'  => $user->name,
                        'user_email' => $user->email,
                        'user_role'  => $user->role,
                        'logged_in'  => TRUE
                    ]);
                    $this->session->set_flashdata('success', 'Welcome back, ' . $user->name . '!');
                    redirect('auth/dashboard');
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



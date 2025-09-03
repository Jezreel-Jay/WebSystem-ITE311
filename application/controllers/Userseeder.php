<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userseeder extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        // Restrict to CLI (so no one hits it from browser)
        if (!$this->input->is_cli_request()) {
            show_error('This script can only be accessed via the command line');
        }
    }

    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_BCRYPT),
                'email'      => 'admin@example.com',
                'name'       => 'Admin User',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'instructor1',
                'password'   => password_hash('teach123', PASSWORD_BCRYPT),
                'email'      => 'instructor1@example.com',
                'name'       => 'Instructor One',
                'role'       => 'instructor',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'student1',
                'password'   => password_hash('stud123', PASSWORD_BCRYPT),
                'email'      => 'student1@example.com',
                'name'       => 'Student One',
                'role'       => 'student',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->insert_batch('users', $data);
        echo "✅ Users seeded successfully." . PHP_EOL;
    }
}

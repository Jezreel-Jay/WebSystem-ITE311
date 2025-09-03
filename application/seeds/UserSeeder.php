<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSeeder extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        // Restrict to CLI only
        if (!$this->input->is_cli_request()) {
            show_error('This script can only be accessed via the command line');
        }
    }

    public function run()
    {
        $data = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin'
            ],
            [
                'name' => 'Instructor One',
                'email' => 'instructor1@example.com',
                'role' => 'instructor'
            ],
            [
                'name' => 'Student One',
                'email' => 'student1@example.com',
                'role' => 'student'
            ]
        ];

        $this->db->insert_batch('users', $data);

        echo "Users seeded successfully!" . PHP_EOL;
    }
}

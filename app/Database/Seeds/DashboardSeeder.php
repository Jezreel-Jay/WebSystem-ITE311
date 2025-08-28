<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DashboardSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1, // First registered user
                'title'   => 'Admin Dashboard',
                'content' => 'Welcome, Admin! You can manage everything here.',
            ]
        ];

        $this->db->table('dashboard')->insertBatch($data);
    }
}

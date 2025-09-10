<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            // Use VARCHAR instead of ENUM (dbforge safer this way)
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'default' => 'user',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users', TRUE);

        // Add UNIQUE constraint safely
       // $this->db->query('ALTER TABLE new_user ADD UNIQUE KEY unique_email (email)');
    }

    public function down() {
        $this->dbforge->drop_table('users', TRUE);
    }
}

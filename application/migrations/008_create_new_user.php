<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_new_user extends CI_Migration {

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
                'unique' => TRUE,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type' => "ENUM('admin','user')",
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
        $this->dbforge->create_table('new_user'); 
    }

    public function down() {
        $this->dbforge->drop_table('new_user'); 
    }
}

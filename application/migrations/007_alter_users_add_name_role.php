<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_users_add_name_role extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('users', [
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'student'
            ],
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_column('users', 'name');
        $this->dbforge->drop_column('users', 'role');
    }
}

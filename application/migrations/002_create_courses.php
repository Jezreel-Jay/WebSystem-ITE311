<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_courses extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'course_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('courses');
    }

    public function down()
    {
        $this->dbforge->drop_table('courses');
    }
}

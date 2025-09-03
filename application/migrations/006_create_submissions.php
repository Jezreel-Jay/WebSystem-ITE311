<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_submissions extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'quiz_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            'answer' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'score' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ),
            'submitted_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('submissions');
    }

    public function down()
    {
        $this->dbforge->drop_table('submissions');
    }
}

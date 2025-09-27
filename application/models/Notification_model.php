<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

    // Placeholder: return empty array
    public function get_for_teacher($teacher_id) {
        return []; // no notifications yet
    }

    public function get_student_deadlines($student_id) {
        return []; // no deadlines yet
    }
}

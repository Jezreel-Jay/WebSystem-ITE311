<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'users';

    // Insert a new user
    public function insert_user($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get user by email
    public function get_user_by_email($email) {
        return $this->db->get_where($this->table, ['email' => $email])->row();
    }

    // Count all users
    public function count_all_users() {
        return $this->db->count_all($this->table);
    }

    // Get recent activity (last N users)
    public function get_recent_activity($limit = 5) {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }

    // Get users by role
    public function get_users_by_role($role) {
        $this->db->where('role', $role);
        return $this->db->get($this->table)->result();
    }
}

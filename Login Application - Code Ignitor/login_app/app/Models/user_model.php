<?php
class user_model extends CI_Model {
    //constructor class (whenever the object is created for this class it will be called automatically)
    public function __construct() {
        parent::__construct();
    }
    //getting the user details based on user name
    public function get_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }
    //validating the user name and password
    public function verify_password($user, $password) {
        return password_verify($password, $user->password);
    }
}
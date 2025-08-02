<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    //login function
    public function login() {
        // Check if user is already logged in
        if($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        //making the username and password field as required field
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //checking that form validation is passed 
        if($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login');
        } else {
            //getting the username and password from the ui
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //calling the function is usermodel and getting the username
            $user = $this->user_model->get_user($username);
            //validtaing the user details
            if($user && $this->user_model->verify_password($user, $password)) {
                // Set session data
                $user_data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'logged_in' => true
                );
                //setting the user data in session
                $this->session->set_userdata($user_data);
            } else {
                //if validation fails it displas error message
                $this->session->set_flashdata('login_failed', 'Invalid username or password');
                //page is redirected to login page itself
                redirect('auth/login');
            }
        }
    }
    //logout functionality
    public function logout() {
        //unsetting all the datas
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        //redirected to login page
        redirect('auth/login');
    }
}
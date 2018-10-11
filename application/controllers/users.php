<?php
  class Users extends CI_Controller{
    // Registration
    public function register(){
      $data['title'] = "Register";

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
      $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');
      } else {
        // Encrypt Password
        $enc_password = md5($this->input->post('password'));
        $this->user_model->register($enc_password);
        // Set Message Success
        $this->session->set_flashdata('user_registered', 'You are now registered, Welcome!');

        redirect('posts');
      }
    }

    // Login
    public function login(){
      $data['title'] = "Login";

      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');
      } else {
        //Get Username
        $username = $this->input->post('username');
        //Get Password
        $password = md5($this->input->post('password'));
        // Login User
        $user_id = $this->user_model->login($username, $password);
        if($user_id){
          $user_data = array(
            'user_id' => $user_id,
            'username' => $username,
            'logged_in' => true
          );
          $this->session->set_userdata($user_data);
          // Set Message Success
          $this->session->set_flashdata('user_login', 'You are now logged in, Welcome!');
          redirect('posts');
        } else {
          // Set Message Error
          $this->session->set_flashdata('login_failed', 'Login is invalid');
          redirect('users/login');
        }
      }
    }

    // Log out functionality
    public function logout(){
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');

      $this->session->set_flashdata('user_logout', 'You are now logged out!');
      redirect('users/login');
    }

    // Check to see if a username is already taken
    function check_username_exists($username){
      $this->form_validation->set_message('check_username_exists', 'That username is already taken.');
      if($this->user_model->check_username_exists($username)){
        return true;
      } else {
        return false;
      }
    }

    // Check to see if email is already taken
    function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists', 'That email is already in use.');
      if($this->user_model->check_email_exists($email)){
        return true;
      } else {
        return false;
      };
    }
  }

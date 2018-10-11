<?php
  class User_model extends CI_Model{
    public function register($enc_password){
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'password' => $enc_password,
      );
      // Insert User
      return $this->db->insert('users', $data);
    }

    // Log User in
    public function login($username, $password){
      $this->db->where('username', $username);
      $this->db->where('password', $password);

      $result = $this->db->get('users');
      if($result->num_rows() === 1){
        return $result->row(0)->id;
      } else {
        return false;
      }
    }

    // If username exists checker
    public function check_username_exists($username){
      $query = $this->db->get_where('users', array('username' => $username));
      if(empty($query->row_array())){
        return true;
      } else {
        return false;
      }
    }

    // Check for Email
    public function check_email_exists($email){
      $query = $this->db->get_where('users', array('email' => $email));
      if(empty($query->row_array())){
        return true;
      } else {
        return false;
      }
    }
  }

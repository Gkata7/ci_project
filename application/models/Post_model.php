<?php
  class Post_model extends CI_Model{
    public function __construct(){
      $this->load->database();
    }

// Receive Posts
    public function get_posts($slug = FALSE){
      if($slug === FALSE){
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result_array();
      }
      $query = $this->db->get_where('posts', array('slug' => $slug));
      return $query->row_array();
    }

// Creating a Post
    public function create_post($post_image){
      $slug = url_title($this->input->post('title'));
      $data = array(
          'title' => $this->input->post('title'),
          'slug' => $slug,
          'body' => $this->input->post('body'),
          'user_id' => $this->session->userdata('user_id'),
          'post_image' => $post_image
      );

      return $this->db->insert('posts', $data);
    }

// Delete Post
    public function delete_post($id){
      $this->db->where('id', $id);
      $this->db->delete('posts');
      return true;
    }

// Update Post
    public function update_post(){
      $slug = url_title($this->input->post('title'));
      $data = array(
          'title' => $this->input->post('title'),
          'slug' => $slug,
          'body' => $this->input->post('body'),
      );
      $this->db->where('id', $this->input->post('id'));
      return $this->db->update('posts', $data);
    }

  }

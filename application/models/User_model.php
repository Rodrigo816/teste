<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

	// Log user in
  public function login($email, $password){
    // Validate
    $this->db->where('email', $email);
    $this->db->where('password', $password);

    $result = $this->db->get('users');
    if($result->num_rows() == 1){
      return $result->row(0)->id;
    } else {
      return false;
    }
  }

}
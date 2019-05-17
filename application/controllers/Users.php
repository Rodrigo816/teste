<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	// Log in user
  public function login(){
    $data['title'] = 'Sign In';
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('users/login', $data);
      $this->load->view('templates/footer');
    } else {
      
  
      //Get username
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      
      $this->load->model('User_model');
      $user_id= $this->User_model->login($email, $password);

      if($user_id){
        //Create session
        $user_data= array(
          'user_id' => $user_id,
          'email' => $email,
          'logged_in' => true,
        );

        $this->session->set_userdata($user_data);
        $this->session->set_flashdata('login_sucess', 'Logged with sucess');
        redirect('news');
        // Login sucess create sessions
      } else {
        //die("error");
        // Login failed set the errors
        $this->session->set_flashdata('login_failed', 'Username or password are not correct.');
        redirect('/users/login');
        
      }
  
        
    }
  }

  // User logout
  public function logout(){

    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('logged_in');

    $this->session->set_flashdata('logged_out', 'Cya next time');
    redirect('/users/login');
    
  }


  
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{

	public function index($offset = 0){	
    // Check login
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }
    $data['title'] = 'List of News';
    $data['news'] = $this->news_model->get_news();
    $this->load->view('templates/header');
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }

  // CREATE
  public function create(){
    // Check login
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }
    $data['title']='Add News';
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('content', 'Content', 'required');
    
    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('news/create', $data);
      $this->load->view('templates/footer');
    } else {
      $this->news_model->create();
      redirect('news');
    }
  }

  // Edit
  public function edit($id){
    // Check login
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }
    $data['news'] = $this->news_model->get_news($id);
    $this->load->view('templates/header');
    $this->load->view('news/edit', $data);
    $this->load->view('templates/footer');

  }
  
  // UPDATE
  public function update(){
    // Check login
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }
    $this->news_model->update();
    // Set message
    $this->session->set_flashdata('post_updated', 'Your post has been updated');
    redirect('news');

  }
  
  // DELETE
  public function delete($id){
    // Check login
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $this->news_model->delete($id);
    redirect('news');
  }
  
}
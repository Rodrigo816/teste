<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{
  public function view($page = 'dashboard'){

    if(!file_exists(APPPATH.'views/'.$page.'.php')){
      show_404();
    }
    $data['title'] = ucfirst($page);
    //$data['news'] = $this->news_model->get_posts();

    if($page = 'dashboard'){
      $this->load->view('templates/header',$data);
      $this->load->view('news/index');
      $this->load->view('templates/footer');
    } 
    else{
      $this->load->view('templates/header',$data);
      $this->load->view('/'.$page, $data);
      $this->load->view('templates/footer');
    }
  }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
  
  public function get_news($id = FALSE){
    if($id === FALSE){
      $query=$this->db->get('news');
      return $query->result();
    }

    //$this->db->order_by('id','DESC');
    $query=$this->db->get('news');
    $query = $this->db->get_where('news', array('idNews' => $id));
    return $query->row_array();
  }

  public function create(){
    $data = array (
      'title' => $this->input->post('title'),
      'content' => $this->input->post('content'),
     // 'datePublication' => ,
      'idState' => $this->input->post('state'),
    //  'idUser' => '',
    );
    return $this->db->insert('news', $data);
  }

  public function update(){
		$data = array(
      'title' => $this->input->post('title'),
      'content' => $this->input->post('content'),
    );
    $this->db->where('idNews', $this->input->post('id'));
    return $this->db->update('news', $data);
  }
  
  public function delete($id){
    $this->db->where(['idNews' => $id]);
    $this->db->delete('news');
    return true;
  }
}
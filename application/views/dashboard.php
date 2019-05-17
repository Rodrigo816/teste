<p>this is home</p>
<?php 
  if($this->session->flashdata('login_sucess')){
    echo '<p class="alert alert-success">'.$this->session->flashdata('login_sucess').'</p>';
  }
?>
<?php
 foreach ($news as $new) {

  echo $new->title;
 }
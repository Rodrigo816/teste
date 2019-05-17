<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php //echo $title ?></title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/app.css" />
</head>

<body>
  <?php if($this->session->userdata('logged_in')): ?>
    <header class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a href="/" class="navbar-brand">Dashboard</a>
        
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>" target="_blank">Site Manager</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
            </li>
          </ul>

        </div>
      </div>
    </header>
  <?php endif ?>
  <div class="container">
<?php   
  if($this->session->flashdata('logged_out')){
    echo '<p class="alert alert-success">'.$this->session->flashdata('logged_out').'</p>';
  }
  ?>


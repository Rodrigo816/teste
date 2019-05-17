<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo form_open('users/login'); ?>
	<div class="row justify-content-md-center">
		<div class="col col-lg-4">
			<h1 class="text-center">Login</h1>
			<?php 
				if($this->session->flashdata('login_failed')){
        	echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';
				}
			?>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Enter Email" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>

<?php echo form_close(); ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Registrasi</title>


    <link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap-theme.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
	<div class="row">
		<div class="col-md-12 ">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="form-signin-heading text-center">
			Registrasi Form
			</h2>
		</div>	
				<div class="col-md-6 col-md-offset-3">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Complete Name</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputEmail3" placeholder="Complete Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputEmail3" placeholder="Username">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-8">
						  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Religion</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputEmail3" placeholder="Religon">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputEmail3" placeholder="Phone">
						</div>
					  </div>
					  
					  
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Social</label>
						<div class="col-sm-4">
							<select class="form-control">
							  <option>Facebook</option>
							  <option>Twitter</option>
							</select>
						</div>
						<div class="col-sm-4">
							<div class="input-group">
							  <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
							  <div class="input-group-addon">+</div>
							</div>
						</div>
						
						
					  </div>
						<button type="button" class="col-md-8 btn btn-primary btn-lg btn-block">Register</button>
					  
					</form>
				</div>

		</div>
	</div>
      

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset_url();?>vendor/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.js"></script>
  </body>
</html>
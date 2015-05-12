<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sign-In</title>


    <link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap-theme.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<form class="col-md-6 col-md-offset-3 form-signin" role="form">
			<h2 class="form-signin-heading text-center">Please sign in</h2>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Username" required autofocus>
			</div>
			<div class="form-group">		
				<input type="password" class="form-control" placeholder="Password" required>
			</div>
			<div class="form-group">	
				<label class="checkbox" style="padding-left:20px;">
				  <input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>	
			
			
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		  </form>
		</div>
	</div>
      

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset_url();?>vendor/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.js"></script>
  </body>
</html>
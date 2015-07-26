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
					<form class="form-horizontal" action="registerAction" method="POST">
					  <div class="form-group">
						<label for="inputcompleteName" class="col-sm-3 control-label">Complete Name</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputcompleteName" placeholder="Complete Name" name="completeName" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputusername" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputusername" placeholder="Username" name="username" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-8">
						  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputRegion" class="col-sm-3 control-label">Region</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="inputRegion" placeholder="Region" name="region" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPhone" class="col-sm-3 control-label">Phone</label>
						<div class="col-sm-8">
						  <input type="tel" class="form-control" id="inputPhone" placeholder="Phone" name="phone" required>
						</div>
					  </div>
					  <div class="form-group socialRow" id="social">
						<div>
							<label for="inputSocial[]" class="col-sm-3 control-label">Social</label>
							<div class="col-sm-4">
								<select class="form-control" name="social[]">
								  <option>Facebook</option>
								  <option>Twitter</option>
								</select>
							</div>
							<div class="col-sm-4">
								<div class="input-group">
								  <input type="text" class="form-control" name="socmed[]" placeholder="value">
								  <a class="input-group-addon" href="#social">+</a>
								</div>
							</div>
						</div>
					  </div>
						<button type="submit" class="col-md-8 btn btn-primary btn-lg btn-block">Register</button>
					</form>
				</div>

		</div>
	</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset_url();?>vendor/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.js"></script>
	<script>
		$(document).ready(
			function()
			{
				$('a.input-group-addon').click(
					function addSocmed()
					{
						var containerDiv 	= $('<div>');
						// filler for container
						var _labelDiv		= $('<label>');
						var _socialTypeDiv	= $('<div>');
						var _socialValDiv	= $('<div>');
						
						_labelDiv = _labelDiv.attr('for','inputSocial[]').addClass('col-sm-3 control-label');
						_socialTypeDiv = _socialTypeDiv.addClass('col-sm-4');
						_socialValDiv = _socialValDiv.addClass('col-sm-4');
						
						// no filler for label
						
						// filler for social type
						var __selectSocmed = $('<select>');
						__selectSocmed = __selectSocmed.addClass('form-control').attr('name','social[]');
						var socmedList = ["Facebook","Twitter"];
						$(socmedList).each(function(index,value)
							{
							  var ___option = $('<option>');
							  ___option.val(index).html(value);
							  __selectSocmed.append(___option);
							}
						)
						_socialTypeDiv.append(__selectSocmed);
						
						// filler for val
						var __inputGroup = $('<div>');
						__inputGroup.addClass('input-group');
						var ___inputSocmed = $('<input>');
						___inputSocmed = ___inputSocmed.attr('type','text').attr('name',"socmed[]").attr('placeholder',"value").addClass("form-control");
						var ___inputAdd = $('<a>');
						___inputAdd = ___inputAdd.attr('href','#social').addClass('input-group-addon').html('+');
						__inputGroup.append(___inputSocmed).append(___inputAdd);
						___inputAdd.click(addSocmed);
						_socialValDiv.append(__inputGroup);
						
						containerDiv.append(_labelDiv).append(_socialTypeDiv).append(_socialValDiv);
						$('.socialRow').append(containerDiv);
						
						$(this).remove();
					}
				)
			}
		)
		
	</script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>SHA</title>


    <link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo asset_url();?>vendor/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo asset_url();?>vendor/bootstrap/css/offcanvas.css" rel="stylesheet">

  </head>
  <body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
				
          <button type="button" class=" btn btn-primary btn-block visible-xs" data-toggle="offcanvas">&raquo;</button>
		
			
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
			<div class="navbar-brand hidden-xs " style="padding-top:10px;">
				<input type="text" class="form-control " style="width:400px; margin-left:25%;"placeholder="Search...">
			</div>
			
				
			
        </div>
		
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav" >
			
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown">Login <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li style="margin:5px;">
					<input type="text" class="form-control" placeholder="Username" required autofocus>
				</li> 
                <li style="margin:5px;">
					<input type="text" class="form-control" placeholder="Password" required autofocus>
				</li>
                <li style="padding:5px;">
					<button class="btn btn-info btn-block" >Login</button>
				</li>
              </ul>
            </li>
			<li >
				<a href="registrasi.html" >Sign-in</a>
			</li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	
    <div class="container">

      <div class="row">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			  <div class="list-group">
				<a href="#" class="list-group-item active">My Profile</a>
				<a href="#" class="list-group-item">Post</a>

			  </div>
			</div>
		
			<div class="col-xs-12 col-sm-9">
				<div class="row">
					<div class="col-md-12">
						<label>My Post</label>
						<button class="btn btn-info">Create Post</button>
					</div>
					<div class="col-md-12">
						<div class="row" style="margin-top:1%;">
							<div class="col-md-12" style="background:#f6f6f6;padding:1%;border:1px #e0e0e0 solid;">
								<h3>Title 1</h3>
								<div class="col-md-3">
									<img src="<?php echo asset_url();?>lib/img/download.svg" class="img-responsive img-thumbnail" alt="Responsive image">
								</div>
								
								<div class="col-md-9">
									<button class="btn btn-default">Edit</button>
									<button class="btn btn-danger">Delete</button>
								
								</div>
							</div>
							
							<div class="col-md-12" style="background:#f6f6f6;padding:1%;border:1px #e0e0e0 solid;">
								<h3>Title 1</h3>
								<div class="col-md-3">
									<img src="<?php echo asset_url();?>lib/img/download.svg" class="img-responsive img-thumbnail" alt="Responsive image">
								</div>
								
								<div class="col-md-9">
									<button class="btn btn-default">Edit</button>
									<button class="btn btn-danger">Delete</button>
								
								</div>
							</div>
							
							<div class="col-md-12" style="background:#f6f6f6;padding:1%;border:1px #e0e0e0 solid;">
								<h3>Title 1</h3>
								<div class="col-md-3">
									<img src="<?php echo asset_url();?>lib/img/download.svg" class="img-responsive img-thumbnail" alt="Responsive image">
								</div>
								
								<div class="col-md-9">
									<button class="btn btn-default">Edit</button>
									<button class="btn btn-danger">Delete</button>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Halo :D</p>
      </footer>

    </div><!--/.container-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset_url();?>vendor/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo asset_url();?>vendor/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo asset_url();?>vendor/bootstrap/js/offcanvas.js"></script>
	
	<script>
		$('.dropdown-toggle').dropdown()
	</script>
	
  </body>
</html>
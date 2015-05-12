<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>SHA</title>


    <link href="lib/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="lib/vendor/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="lib/vendor/bootstrap/css/offcanvas.css" rel="stylesheet">

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
		
		
        <div class="col-xs-12 col-sm-12">
			<div class="row">
				<div class="col-md-12">
					<img src="lib/img/download.svg" class="img-responsive img-thumbnail" alt="Responsive image">
				</div>
				<div class="col-md-9">
					<h3>Username (Complete Name)</h3>
					<h4>Region</h4>
					<div class="col-md-6" style="padding:0;margin:0;">
						<form class="form-horizontal">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label" style="text-align:left;">Email</label>
							<div class="col-sm-8 control-label" style="text-align:left;">
							  SomeEmail@blah.com
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label" style="text-align:left;">Phone</label>
							<div class="col-sm-8 control-label" style="text-align:left;">
							  080989999
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label" style="text-align:left;">Find me on:</label>
						  </div>
						  <div class="form-group">
							<a href="" class="col-sm-4 control-label" style="text-align:left;">Facebook</a>
							<a href="" class="col-sm-4 control-label" style="text-align:left;">Twitter</a>
							<a href="" class="col-sm-4 control-label" style="text-align:left;">Instagram</a>
						  </div>
						</form>  
					</div>
					
				</div>
				<div class="col-md-3">
					<h3>Recent Activity</h3>
					<div class="col-md-12">
						<h4>Title <small>on</small> 32-13-9999</h4>
						<h4>Title <small>on</small> 32-13-9999</h4>
						<h4>Title <small>on</small> 32-13-9999</h4>
						<h4>Title <small>on</small> 32-13-9999</h4>
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
    <script src="lib/vendor/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="lib/vendor/bootstrap/js/offcanvas.js"></script>
	
	<script>
		$('.dropdown-toggle').dropdown()
	</script>
	
  </body>
</html>
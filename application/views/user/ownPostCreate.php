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
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			  <div class="list-group">
				<a href="#" class="list-group-item active">My Profile</a>
				<a href="#" class="list-group-item">Post</a>

			  </div>
			</div>
		
			<div class="col-xs-12 col-sm-9">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-12" for="title">Title</label>
							<div class="col-md-12">
								<input type="text" class="form-control" id="title" placeholder="Post Title">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12" for="region">Region</label>
							<div class="col-md-4">
								<select class="form-control" id="region">
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								</select>
							</div>	
						</div><br>

						
					</div>
					<div class="col-md-12" style="margin-top:1%;">
						<div class="form-group">
							<div class="col-md-12">
								<textarea class="form-control tinymce" ></textarea>
							</div>
						</div>
					</div>
					
					<div class="col-md-12" style="margin-top:1%;">
						<div class="form-group">
							<div class="col-md-12">
								<button class="btn btn-info pull-right">Submit</button>
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
		<form id="my_form" action="/upload/" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
			<input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
		</form>
    </div><!--/.container-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="lib/vendor/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="lib/vendor/bootstrap/js/offcanvas.js"></script>
	<script src="lib/vendor/tinymce/js/tinymce/tinymce.min.js"></script>
	<script src="lib/vendor/tinymce/js/tinymce/plugins/image/plugin.min.js"></script>
	<script>
		$('.dropdown-toggle').dropdown();
		tinymce.init({
			selector: ".tinymce",
			plugins: ["image"],
			file_browser_callback: function(field_name, url, type, win) {
				console.log(field_name);
				console.log(url);
				console.log(type);
				console.log(win);
				if(type=='image') $('#my_form input').click();
			}
		 });
	</script>
	
  </body>
</html>
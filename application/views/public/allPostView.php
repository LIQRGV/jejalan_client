<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
      <div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="panel-group">
                <?php
                if (isset($mappedRegionCity)) {
                    foreach ($mappedRegionCity as $region) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                       href="#<?php echo $region->namaRegion; ?>"
                                       aria-expanded="false" class="collapsed"><span
                                            class="glyphicon glyphicon-folder-close">
                    </span>
                                        <?php echo $region->namaRegion; ?>
                                    </a>
                                </h4>

                            </div>
                            <div id="<?php echo $region->namaRegion; ?>" class="panel-collapse collapse"
                                 aria-expanded="false">
                                <ul class="list-group">
                                    <?php
                                    foreach ($region->cities as $city) {
                                        ?>
                                        <li class="list-group-item">
                                            <span class="glyphicon glyphicon-pencil text-primary"></span>
                                            <a href="#<?php echo $city->id;?>"><?php echo $city->cityName;?></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="false" class="collapsed"><span
                                        class="glyphicon glyphicon-folder-close">
                    </span>Region 1</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-pencil text-primary"></span>
                                    <a href="http://fb.com/moinakbarali">City 1</a>
                                </li>
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-pencil text-primary"></span>
                                    <a href="http://fb.com/moinakbarali">City 2</a>
                                </li>
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-pencil text-primary"></span>
                                    <a href="http://fb.com/moinakbarali">City 3</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                   class="collapsed" aria-expanded="false"><span class="glyphicon glyphicon-file">
                    </span>Region 2</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <a href="http://fb.com/moinakbarali">City 1</a>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <a href="http://fb.com/moinakbarali">City 2</a>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <a href="http://fb.com/moinakbarali">City 3</a>
                            </li>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                                   class="collapsed" aria-expanded="false"><span class="glyphicon glyphicon-heart">
                    </span>Region 3</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false"
                             style="height: 0px;">
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <a href="http://fb.com/moinakbarali">City 1</a>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <a href="http://fb.com/moinakbarali">City 2</a>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-pencil text-primary"></span>
                                <a href="http://fb.com/moinakbarali">City 3</a>
                            </li>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
		
        <div class="col-xs-12 col-sm-9">
			<div class="row">
				<div class="col-md-12" style="padding:2%;">
					<div class="col-md-3">
						<img src="<?php echo asset_url();?>img/download.svg" class="img-responsive img-thumbnail center-block" alt="Responsive image">
					</div>
					<div class="col-md-9">
						<h3>Title 1 <small>By Username</small> </h3> 
						<p class="text-justify">
						  Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
						</p>
					</div>
				</div>
				
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					
					<div class="col-md-offset-3 col-md-9">
						<div class="col-md-3">
							<img src="<?php echo asset_url();?>img/download70.svg" class="img-responsive img-thumbnail center-block" alt="Responsive image">
						</div>
						<div class="col-md-9">
							<textarea class="form-control" style="min-height:80px;" placeholder="Post Comment here..."></textarea>
						</div>
						
					</div>
				</div>
				
				<div class="col-md-12" style="background:#F6F6F6;margin-top:2%;padding:2%;">
					
					<div class="col-md-9">
						<div class="col-md-3">
							<img src="<?php echo asset_url();?>img/download70.svg" class="img-responsive img-thumbnail center-block" alt="Responsive image">
						</div>
						<div class="col-md-9">
							<h4>Username</h4> 
							<p>
								<p>Comment user..Comment user..Comment user..</p>
								<p>Comment user..</p>
								Comment user..
								Comment user..
							</p>
						</div>
						
						<div class="col-md-3">
							<img src="<?php echo asset_url();?>img/download70.svg" class="img-responsive img-thumbnail center-block" alt="Responsive image">
						</div>
						<div class="col-md-9">
							<h4>Username</h4> 
							<p>
								Comment user..Comment user..Comment user..
								Comment user..
								Comment user..
								Comment user..
							</p>
						</div>
						
					</div>
				</div>
				
			</div>
			
			
        </div>
		
		<div class="col-md-12">
		<div class="row ">
				
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
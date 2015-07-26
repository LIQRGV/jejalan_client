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
				<form method="POST" action="<?php echo base_url()."login";?>">
					<li style="margin:5px;">
						<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
					</li> 
					<li style="margin:5px;">
						<input type="text" class="form-control" placeholder="Password" name="password" required autofocus>
					</li>
					<li style="padding:5px;">
						<button class="btn btn-info btn-block" >Login</button>
					</li>
				</form>
              </ul>
            </li>
			<li >
				<a href="<?php echo base_url() . "register"; ?>" >Sign-in</a>
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
						<img src="<?php echo asset_url();?>img/<?php echo $fetchInfo->profilePicture;?>" class="img-responsive img-thumbnail center-block" alt="Responsive image">
					</div>
					<div class="col-md-9"> 
						<h3><?php echo $fetchPost[0]->title;?> <small>By <?php echo $fetchInfo->username;?></small> </h3> 
						<p class="text-justify">
						  <?php echo $fetchPost[0]->content;?>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					
					<div class="col-md-offset-3 col-md-9">
						<div class="col-md-3">
							<img src="<?php echo asset_url();?>img/<?php echo $fetchInfo->profilePicture;?>" class="img-responsive img-thumbnail center-block" alt="Responsive image">
						</div>
						<div class="col-md-9">
							<textarea class="form-control commentArea" style="min-height:80px;" placeholder="Post Comment here..."></textarea>
							<button href="#" class="btn btn-info" id="post" value="<?php echo $postID;?>">Post</button>
						</div>
						
					</div>
				</div>
				<?php //var_dump($commentsUser);?>
				<div class="col-md-12" style="background:#F6F6F6;margin-top:2%;padding:2%;">
					<div class="col-md-9" id="commentBlock">
						<?php foreach($comments as $comment){?>
						<div>
							<div class="col-md-3">
								<img src="<?php echo asset_url();?>img/<?php echo $commentsUser[$comment->userID]->profilePicture;?>" class="img-responsive img-thumbnail center-block" alt="Responsive image">
							</div>
							<div class="col-md-9">
								<h4><?php echo $commentsUser[$comment->userID]->username;?></h4> 
								<p>
									<?php echo $comment->content;?>
								</p>
							</div>
						</div>
						<?php } ?>
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
		$('.dropdown-toggle').dropdown();
	</script>
	
	<script>
		$('button#post').click(
			function()
			{
				var comment = $('.commentArea').val();
				
				$.ajax({
					'url' : 'http://localhost/jejalan/Comment/save',
					'data' : "comment="+comment+"&postID="+$(this).val(),
					'type' : "POST"
				}).complete(
					function(data)
					{
						var responseText = data.responseText;
						var result = $.parseJSON(responseText);
						if(result.http_code == 202)
						{
							// block to add comment
							var rowDiv = $('<div>');
							var imgDiv = $('<div>');
							var commentDiv = $('<div>');
							
							var temp;
							
							imgDiv.addClass('col-md-3');
							
							temp = $('<img>');
							
							temp.attr('src','none'); // add later
							temp.attr('alt','Responsive image');
							temp.addClass('img-responsive img-thumbnail center-block');
							
							imgDiv.append(temp);
							
							///////////
							
							commentDiv.addClass('col-md-9');
							
							temp = $('<h4>');
							
							temp.html('******');
							
							commentDiv.append(temp);
							
							temp = $('<p>');
							
							temp.html($('.commentArea').val());
							
							commentDiv.append(temp);
							
							rowDiv.append(imgDiv);
							rowDiv.append(commentDiv);
							
							$('#commentBlock').append(rowDiv);
						}
					}
				)
			}
		);
	</script>
	
  </body>
</html>
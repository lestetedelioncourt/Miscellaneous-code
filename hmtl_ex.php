
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="../../bootstrap-3.3.5-dist/css/bootstrap.css">
		<script src="../../js/jquery.js"></script>
		<script src="../../bootstrap-3.3.5-dist/js/bootstrap.js"></script> 
	</head>
	<body>
		<header class="navbar navbar-default navbar-static-top" >
	<div class="container-fluid">
		<a href="index.php" class="navbar navbar-nav nav" style="color:black; margin-left:40px;"><h1>CMS Website</h1></a>
		<ul class="nav navbar-nav navbar-right" style="margin-right:1cm;">
			<li  style="padding-bottom:5px;"><a href="index.php"><h3>Home</h3></a></li>
			<li><a href="#"><h3>Log out</h3></span> </a></li>
		</ul>
	</div>
</header>		<div style="width:50px; height:50px;"></div>
		<div class="col-lg-2">
			<ul class="navbar navbar-default nav" style="height:650px;"><br>
				<li><a href="index.php"><h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3></a></li>
				<li><a href="#new_items" data-toggle="collapse"><h3><i class="glyphicon glyphicon-plus"></i> New Items</h3></a>
					<ul class="collapse" id="new_items" style="list-style-type:none;">
						<li><a href="new_post.php"><h3><i class="glyphicon glyphicon-pencil"></i> New Post</h3></a></li>
						<li><a href="new_category.php"><h3><i class="glyphicon glyphicon-edit"></i> New Category</h3></a></li>
					</ul>
				</li>
				<li><a href="view_posts.php"><h3><i class="glyphicon glyphicon-list"></i>  Posts</h3></a></li>
				<li><a href="category_list.php"><h3><i class="glyphicon glyphicon-tasks"></i> Categories</h3></a></li>
				<li><a href="view_profile.php"><h3><i class="glyphicon glyphicon-user"></i> Profile</h3></a></li>
				<li><a href="view_comments.php"><h3><i class="glyphicon glyphicon-comment"></i> Comments</h3></a></li>
			</ul>
		</div>		<div class="col-lg-10">
			<div class="col-md-3">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="glyphicon glyphicon-signal" style="font-size:3.5cm;"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.0cm;">20</div>
							<div style="font-size:0.5cm; margin-right: 0.4cm;">Posts</div>
						</div>
					</div>
				</div>
				<a href="view_posts.php"><div class="panel-footer">
				<div class="pull-left">View Posts</div>
				<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
				<div class="clearfix"></div> <!--prevents "floating"-->
				</div></a>
				
				</div>
			</div>
			<div class="col-md-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="glyphicon glyphicon-th-list" style="font-size:3.5cm;"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.0cm;">5</div>
							<div style="font-size:0.5cm;">Categories</div>
						</div>
					</div>
				</div>
				<a href="category_list.php"><div class="panel-footer">
				<div class="pull-left">View Categories</div>
				<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
				<div class="clearfix"></div> <!--prevents "floating"-->
				</div></a>
				
				</div>
			</div>
			<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="glyphicon glyphicon-user" style="font-size:3.5cm;"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.0cm;">2</div>
							<div style="font-size:0.5cm;">Users</div>
						</div>
					</div>
				</div>
				<a href="#"><div class="panel-footer">
				<div class="pull-left">View Users</div>
				<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
				<div class="clearfix"></div> <!--prevents "floating"-->
				</div></a>
				
				</div>
			</div>
			<div class="col-md-3">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="glyphicon glyphicon-comment" style="font-size:3.5cm;"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.0cm;">2</div>
							<div style="font-size:0.5cm;">Comments</div>
						</div>
					</div>
				</div>
				<a href="view_comments.php"><div class="panel-footer">
				<div class="pull-left">View Comments</div>
				<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
				<div class="clearfix"></div> <!--prevents "floating"-->
				</div></a>
				
				</div>
			</div>
			<!------------ Top Block Ends--------------->
			<!------------ Post list Starts--------------->
			<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>New User List</h3></div>
				<div class="panel-body">
					<table class="table"> <!--"table" class formats view-->
						<thead>
						<tr>
							<th>S. No</th>
							<th>Name</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						 <td>1</td>
						 <td>Lonny G</td>
						 </tr>
						 <tr>
						 <td>2</td>
						 <td>JC Moneypenny</td>
						 </tr>
						 <tr>
						 <td>3</td>
						 <td>Dennis K</td>
						 </tr>
						 <tr>
						 <td>4</td>
						 <td>Lars Ulsson</td>
						 </tr>
						  <tr>
						 <td>5</td>
						 <td>Ted Danza</td>
						 </tr>
						  <tr>
						 <td>6</td>
						 <td>Marcos Reuch</td>
						 </tr>
						</tbody>
					</table>
				</div>
			</div>	
			</div>
			<div class="col-lg-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
				<div class="col-md-7">
				<div class="page-header" style="margin-top:2cm;"><h3>Leslie Tetteh</h3></div>
				</div>
				<div class="col-md8">
					<img src="../images/me.jpg" width="30%" class="img-circle">
				</div>
					<div class="panel-body">
					<table class="table" style="color:white;"> <!--"table" class formats view-->
						<tbody>
						<tr>
						 <th>Job</th>
						 <td>Developer</td>
						 </tr>
						<tr>
						 <th>Role</th>
						 <td>Admin</td>
						 </tr>
						 <tr>
						 <th>Email</th>
						 <td>leslie.tetteh@gmail.com</td>
						 </tr>
						  <tr>
						 <th>Contact No</th>
						 <td>02085138008</td>
						 </tr>
						</tbody>
					</table>
				</div>
			</div>	
			</div>
			</div>
			<div class="clearfix"></div> 
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Latest Posts</h3></div>
				<div class="panel-body">
					<table class="table"> <!--"table" class formats view-->
						<thead>
						<tr>
							<th>S. No</th>
							<th>Date</th>
							<th>Image</th>
							<th>Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Author</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						 <td>1</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book34.jpg" width="100px;"></td>
						 <td>Fantasie Tableaux</td>
						 <td>A single, silken golden strand wafts carelessly in..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>2</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book21.jpg" width="100px;"></td>
						 <td>Fantasie</td>
						 <td>The speaker’s face seems to rust before turning a..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>3</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book34.jpg" width="100px;"></td>
						 <td>Fantasie Tableaux</td>
						 <td>A single, silken golden strand wafts carelessly in..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>4</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book21.jpg" width="100px;"></td>
						 <td>Fantasie</td>
						 <td>The speaker’s face seems to rust before turning a..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>5</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book34.jpg" width="100px;"></td>
						 <td>Fantasie Tableaux</td>
						 <td>A single, silken golden strand wafts carelessly in..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>6</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book21.jpg" width="100px;"></td>
						 <td>Fantasie</td>
						 <td>The speaker’s face seems to rust before turning a..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>7</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book34.jpg" width="100px;"></td>
						 <td>Fantasie Tableaux</td>
						 <td>A single, silken golden strand wafts carelessly in..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 <tr>
						 <td>8</td>
						 <td>2018-04-12</td>
						 <td><img src="../images/book21.jpg" width="100px;"></td>
						 <td>Fantasie</td>
						 <td>The speaker’s face seems to rust before turning a..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Latest Comments</h3></div>
				<div class="panel-body">
					<table class="table"> <!--"table" class formats view-->
						<thead>
						<tr>
							<th>S. No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Comment</th>
							<th>Date</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						 <td>1</td>
						 <td>Lonny G</td>
						 <td>g@gmail.com</td>
						 <td>vhviv</td>
						 <td>.p[kmkmpm</td>
						 <td>2018-04-13</td>
						 </tr>
						 <tr>
						 <td>2</td>
						 <td>2018-04-12</td>
						 <td>Fantasie</td>
						 <td>The speaker’s face seems to rust before turning a..</td>
						 <td>Fiction</td>
						 <td>Leslie Tetteh</td>
						 </tr>
						 
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<footer></footer>
	</body>
</html>
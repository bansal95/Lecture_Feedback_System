<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<?php include'header.php'; ?>
	
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<br><br><bR><br>
		<ul class="nav menu">
			
			<li class="active"><a href="faculty_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li><a href="faculty_courses.php"><i class="fa fa-cloud" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Courses</a></li>
			<li><a href="faculty_polling.php"><i class="fa fa-calendar-check-o" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Create Polling</a></li>
			<li><a href="faculty_activities.php"><i class="fa fa-group" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Activities</a></li>
			
			<li role="presentation" class="divider"></li>
		</ul>

	</div><!--/.sidebar-->
	</div><!--/.sidebar-->
		<?php
		
		?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="faculty_dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span class="glyphicons glyphicons-book-open"></span>
							<i class="fa fa-folder-open" aria-hidden="true" style="font-size:48px;color:white"></i>
							<!--<svg class="glyph stroked book-open"><use xlink:href="#stroked-bag"></use></svg>-->
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							
	<?php		
	$db = $_SESSION['db'];
	$user=$_SESSION['uname'];
	$collection = $db->User;
	$cursor = $collection->findOne(array("uname" => new MongoRegex("/$user/i")));
	echo count($cursor['courses']); 
	
	
	 ?>					
							
							</div>
							<div class="text-muted">Courses</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
										<i class="fa fa-calendar" aria-hidden="true" style="font-size:48px;color:white"></i>
							<!--<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
				-->		</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php						
	 ?>5</div>
							<div class="text-muted">Lectures/Week</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-book" aria-hidden="true" style="font-size:48px;color:white"></i>
							<!--<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						--></div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><!--<?php						
	 ?>-->ODD</div>
							<div class="text-muted">Semester</div>
						</div>
					</div>
				</div>
			</div>
	
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>

</html>

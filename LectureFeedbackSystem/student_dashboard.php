<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<title>Student_Dashboard</title>

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

<br><br><br><br>		
		<ul class="nav menu">
			<li class="active"><a href="student_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li><a href="student_courses.php"><i class="fa fa-cloud" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Courses</a></li>
			
			
			<li><a href="student_activities.php"><i class="fa fa-group" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Activities</a></li>
		
			<!--<li role="presentation" class="divider"></li>
			<li><a href="Welcome1.php"><i class="fa fa-user" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> Login Page</a></li></ul>
-->
	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="student_dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<!--<li class="active">Icons</li>-->
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
						<i class="fa fa-folder-open-o" style="font-size:48px;color:white"></i>						
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							
	<?php						
	$db = $_SESSION['db'];
	$user=$_SESSION['uname'];
	$collection = $db->User;
	$cursor = $collection->findOne(array("uname" => new MongoRegex("/$user/i")));
	echo count($cursor['courses']); ?>					
							
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
							<i class="fa fa-money" style="font-size:48px;color:white"></i>
							<!--<svg class="glyph stroked empty-message"><use xlink:href="#stroked"></use></svg>-->
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php	
$collection = $db->Course;
$count=0;
foreach ($cursor["courses"] as $document) {
	$cursor_1 = $collection->findOne(array("name" => new MongoRegex("/$document/i")));
	$count+=$cursor_1["credits"];
	}
	echo $count;
	?></div>
							<div class="text-muted">Credits</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-tasks" style="font-size:48px;color:white"></i>
<!--							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
	-->					</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><!--<?php						
 ?>-->ODD</div>
							<div class="text-muted">Semester</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row
		<!--
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Site Traffic Overview</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
		</div><!--/.row-->
	</div>	<!--/.main-->

	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<!--<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>-->	
</body>

</html>
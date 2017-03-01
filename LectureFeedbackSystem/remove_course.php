<?php include'header.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<title>Your Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<br><br><br><br>
		<ul class="nav menu">
			<li><a href="admin_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li><a href="add_userdetails.php"><i class="fa fa-user-plus" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Add User</a></li>
			<li><a href="remove_userdetails.php"><i class="fa fa-user-times" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Remove User</a></li>
	    	<li><a href="add_course.php"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Add Course</a></li>
			<li class="active"><a href="remove_course.php"><i class="fa fa-wrench" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp; Remove Course</a></li>
			
			<li><a href="view_details.php"><i class="fa fa-fax" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; View Details</a></li>
			<li role="presentation" class="divider"></li>
			<!--  
			<li><a href="logout.php"><i class="fa fa-user" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;Login Page</a></li> -->
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin_dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<!--<li class="active">Icons</li>-->
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">REMOVE COURSE</h1>
			</div>
		</div><!--/.row-->
									
		
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default" style="
				position:absolute;
				width:700px;
				right:0px;
				">
					<div class="panel-heading"> <i class="fa fa-user-plus" aria-hidden="true" style="font-size:20px;color:black; "></i> Enter Course-name</div>
					<div class="panel-body">
						<form class="form-horizontal" action="remove_course.php" method="post">
							<fieldset>
								<!-- UserName-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Course-name</label>
									<div class="col-md-9">
									<input id="name" name="cname" type="text" placeholder="Course-name" required autofocus class="form-control">
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" name="Remove" class="btn btn-default btn-md pull-right">Remove</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<?php
						function removeCourse($cname) {
						    	$db = $_SESSION['db'];
								$collection = $db->Course;
								$cursor = $collection->findOne(array("name" => new MongoRegex("/$cname/i")));
								if($cursor!=NULL){
									$collection->remove(array("name"=> $cname));
									echo "<script>alert('Course deleted Successfully')</script>";
								}
								else
									echo "<script>alert('Course Not Found')</script>";		
						}
						if(isset($_POST['Remove']))
						{
						 	removeCourse($_POST["cname"]);
						}
		            ?>
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
	</script>
-->	
</body>

</html>

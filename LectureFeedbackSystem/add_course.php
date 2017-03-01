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
			<li class="active"><a href="add_course.php"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp; Add Course</a></li>
			<li><a href="remove_course.php"><i class="fa fa-wrench" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Remove Course</a></li>
			
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
				<h1 class="page-header">ADD COURSE</h1>
			</div>
		</div><!--/.row-->
									
		
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default" style="
				position:absolute;
				width:700px;
				right:0px;
				">
					<div class="panel-heading"> <i class="fa fa-user-plus" aria-hidden="true" style="font-size:20px;color:black; "></i> Enter Course Details</div>
					<div class="panel-body">
						<form class="form-horizontal" action="add_course.php" method="post">
							<fieldset>
								<!-- UserName-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Course-name</label>
									<div class="col-md-9">
									<input id="name" name="uname" type="text" placeholder="Course-Name" required autofocus class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Credits</label>
									<div class="col-md-9">
									<input id="name" name="credits" type="text" placeholder="Credits" required autofocus class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Course-year</label>
									<div class="col-md-9">
									<input type="radio" name="year" value="1st year" required autofocus>1st year<br>
									<input type="radio" name="year" value="2nd year" required autofocus>2nd year<br>
									<input type="radio" name="year" value="3rd year" required autofocus>3rd year<br>
									<input type="radio" name="year" value="4th year" required autofocus>4th year<br>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Course-dept</label>
									<div class="col-md-9">
									<input type="checkbox" name="dept[]" value="CSE" >CSE<br>
									<input type="checkbox" name="dept[]" value="CCE" >CCE<br>
									<input type="checkbox" name="dept[]" value="ECE" >ECE<br>
									<input type="checkbox" name="dept[]" value="MME" >MME<br>
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" name="Add" class="btn btn-default btn-md pull-right">Add</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<?php
						function addCourse($course,$credits,$year,&$dept) {
						    	$db = $_SESSION['db'];
								$collection = $db->Course;
								$cursor = $collection->findOne(array("course_name" => new MongoRegex("/$course/i")));
								if($cursor!=NULL){
									echo "<script>alert('Course already added')</script>";
								}
								else{
									$document = array(
											"name" => $course,
											"credits" => (int)($credits),
											"year" => $year,
											"department" => $dept
									);
									
									$collection->insert($document);
									echo "<script>alert('Course added successfully')</script>";
								}
						}
						
						if(isset($_POST['Add']))
						{
						 	addCourse($_POST["uname"],$_POST["credits"],$_POST["year"],$_POST["dept"]);
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

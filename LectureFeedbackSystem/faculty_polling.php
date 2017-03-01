<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Class-Schedule</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>google.charts.load("current", {packages:["corechart"]});</script>
<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php
		include'header.php';
		
	?>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>-->
		<br><br><br><br>
		<ul class="nav menu" >
			<li ><a href="faculty_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li ><a href="faculty_courses.php"><i class="fa fa-cloud" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Courses</a></li>
			<li class="active"><a href="faculty_polling.php"><i class="fa fa-calendar-check-o" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp;Create Polling</a></li>
			<li><a href="faculty_activities.php"><i class="fa fa-group" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Activities</a></li>
			</ul>
			
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="faculty_dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
			<br><br><br><br>
				<!--<h1 class="page-header">VIEW DETAILS</h1>
				-->
			</div>
		</div><!--/.row-->
		
		
		
		
	<div class="row">
		
		<div class="panel-body" style="background:white;position:absolute;width:500px;left:50px;border-radius:4px;">
						<form class="form-horizontal" action="faculty_polling.php" method="post">
							<fieldset>
							<div class="form-group">
								&nbsp;&nbsp;&nbsp;&nbsp;<strong>SELECT COURSE</strong> &nbsp;&nbsp; <select name="c_name">
								<?php 
										$db = $_SESSION['db'];
										$user=$_SESSION['uname'];
										$collection = $db->User;
										$cursor = $collection->findOne(array("uname" => new MongoRegex("/$user/i")));
										$ascii=65; 
										$collection = $db->Course;
										foreach ($cursor["courses"] as $document) {
		
								?>
	
			<option  value='<?php echo $document; ?>'> <?php echo $document;?> </option><?php } ?>
		</select>
							</div>
	
	
							<div class="form-group">
							<label class="col-md-3 control-label" for="name">Lecture-Title</label>
									<div class="col-md-9">
									<input id="name" name="title" type="text" placeholder="Lecture-Title" required autofocus class="form-control">
									</div>
									</div>
							
								<div class="form-group">
								<label class="col-md-3 control-label" for="name">DUE</label>
							
									<div class="col-md-9">
									<input type="radio" name="time" value="today" required-autofocus>today
									<input type="radio" name="time" value="tomorrow" required-autofocus>tomorrow
									<input type="radio" name="time" value="week" required-autofocus>week									
									</div>
									</div>
									<div class="col-md-3"></div><div class="col-md-3"></div>
									<div class="form-group col-md-3">
									<button type="submit" name="Create" class="btn btn-default">Create Poll</button>
									</div>
								</div>
							</fieldset>	
						</form>
						
	</div></div>
<?php
	
if(isset($_POST["Create"])){
	createPoll($_POST['c_name'],$_POST['title'],$_POST['time']);
}
function createPoll($cname,$title,$due)
{
	$db = $_SESSION['db'];
	$collection = $db->Activity;
	$t=time();
	$document = array(
			"type" => "poll",
			"title" => $title,
			"c_name" => $cname,
			"due"  => $due,
			"add_time" => date("Y-m-d",$t)
	);
	$cursor = $collection->findOne(array("title" => new MongoRegex("/$title/i")));
	/*if($cursor["uname"] == 'admin'){
	 $collection->update(array("uname" => $user),array(
	 "uname" => $user,
	 "pass" => $pass,
	 "who"  => "admin")
	 ,array("upsert" => true));
	 echo "<script>alert('You have changed your password :')</script>".$pass;
	 }
	 else{*/
	$collection->update(array("title" => $title),$document,array("upsert" => true));
	if($cursor!=NULL)
		echo "<script>alert('Lecture title found,Updated successfully')</script>";
		else
			echo "<script>alert('Polling successfully created')</script>";

	
}
?>
<script>
$(document).ready(function(){

$('.b111').click(function() { 
	var course_name=$(this).attr("value")
	
	$(".b111").css("display","block");
	
});
});

</script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<!--<script src="js/chart-explode.js"></script>-->
	<!--<script src="js/easypiechart.js"></script>
	
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>-->
	<script>
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
</body>
<style>
body{
	/*background-image:url("Sea.jpg");
	*/
}
.a {
	posiiton:absolute;
	padding-left:450px;
	color:#5f6468;
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 500;
	letter-spacing: 2px;
}

</style>
</html>
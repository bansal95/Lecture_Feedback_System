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
		<ul class="nav menu">
			<li ><a href="faculty_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li ><a href="faculty_courses.php"><i class="fa fa-cloud" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Courses</a></li>
			<li class="active"><a href="faculty_polling1.php"><i class="fa fa-calendar-check-o" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp;Create Polling</a></li>
			<li><a href="faculty_activities.php"><i class="fa fa-group" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Activities</a></li>
			</ul>
			
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index_db.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
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
		
		<div class="panel-body" style="position:absolute;background:transparent; width:500px;left:50px;">
						<form class="form-horizontal" action="faculty_polling1.php" method="post">
							<fieldset>
							<div class="form-group">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT COURSE  <select name="dd">
								<?php 
		$db = $_SESSION['db'];
	$user=$_SESSION['uname'];
	$collection = $db->User;
	$cursor = $collection->findOne(array("uname" => new MongoRegex("/$user/i")));
	$ascii=65; 
	$collection = $db->Course;
	foreach ($cursor["courses"] as $document) {
		
	?>
	
	<option  value='<?php echo $document; ?>'> <?php echo $document; ?></option><?php } ?>
	<!--							<option value="saab">Saab</option>
								<option value="opel">Opel</option>
								<option value="audi">Audi</option>
		-->
		</select>
							</div>
	
	
							<div class="form-group">
									&nbsp;&nbsp;&nbsp;&nbsp;Lecture Title:&nbsp;<input type="text" name="title" placeholder="Lecture-Title"><br>
							</div>
							
								<div class="form-group">
									Available for&nbsp; <input type="radio" name="time" value="1day" required-autofocus>1DAY&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="time" value="2day" required-autofocus>2DAYS&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="time" value="7day" required-autofocus>7DAYS&nbsp;&nbsp;&nbsp;		
								</div>	<br>
									<div class="form-group col-md-9">
									
							&nbsp;&nbsp;&nbsp;&nbsp;	<!--	<input type="radio" name="qtype" value="easy" >EASY&nbsp;&nbsp;	
									<input type="radio" name="qtype" value="medium" >MEDIUM&nbsp;&nbsp;
									<input type="radio" name="qtype" value="diff" >DIFFICULT<br>
									</div><div class="col-md-3"></div><div class="col-md-3"></div>-->
									<div class="form-group col-md-3"></div><div class="form-group col-md-3">
									&nbsp;<button type="submit" name="Create" class="btn btn-default">Create Poll</button>
									</div>
								</div>
							</fieldset>	
						</form>
						
	</div></div>
</div>	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
	
if(isset($_POST["Create"])){
	echo $_POST["title"]."\n";
	echo $_POST["time"]."\n";
	echo $_POST["dd"];
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
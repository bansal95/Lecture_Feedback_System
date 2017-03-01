
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
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>-->
		</form>
		<br><br><bR><br>
		<ul class="nav menu">
			
			<li ><a href="student_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li class="active"><a href="student_courses.php"><i class="fa fa-cloud" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp;Courses</a></li>
			<li><a href="student_activities.php"><i class="fa fa-group" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Activities</a></li>
			
			<li role="presentation" class="divider"></li>
		</ul>

	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="student_dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Courses</h1>
			</div>
		</div><!--/.row-->
		<?php 
		$db = $_SESSION['db'];
	$user=$_SESSION['uname'];
	$collection = $db->User;
	$cursor = $collection->findOne(array("uname" => new MongoRegex("/$user/i")));
	$ascii=65;
	foreach ($cursor["courses"] as $document) {
		$collection = $db->Course;
	?>
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span class="glyphicons glyphicons-book-open"></span>
							<i class="fa fa-cloud" aria-hidden="true" style="font-size:48px;color:white"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							
	<?php						
	echo $document;
	$cursor_1 = $collection->findOne(array("name" => new MongoRegex("/$document/i"))); 
	echo "(".$cursor_1["credits"].")";
	?>					
							
							</div>
							<div class="text-muted">Subject <?php echo chr($ascii);$ascii++;?></div>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
	

	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
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
</body>

</html>
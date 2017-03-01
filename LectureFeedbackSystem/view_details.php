
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
			<li><a href="admin_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li><a href="add_userdetails.php"><i class="fa fa-user-plus" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Add User</a></li>
			<li><a href="remove_userdetails.php"><i class="fa fa-user-times" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Remove User</a></li>
	    	<li><a href="add_course.php"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Add Course</a></li>
			<li><a href="remove_course.php"><i class="fa fa-wrench" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Remove Course</a></li>
			
			<li class="active"><a href="view_details.php"><i class="fa fa-fax" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp; View Details</a></li>
			<li class="divider"></li>
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
				<h1 class="page-header">VIEW DETAILS</h1>
				
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default" style="
				position:absolute;
				width:600px;
				right:10px;
				">
				<div class="btn-default btn-md-pull-right">
					<!--	<button id="b11">Faculty</button>
                    <button  id="b22" >Student</button>
                   -->
					</div>
					<!--  <div class="panel-heading"><i class="fa fa-fax" aria-hidden="true" style="font-size:20px;color:black"></i>&nbsp;Faculty details</div>-->
					<div class="panel-body">
						
					</div>
						
							<TABLE class="xyz"    WIDTH="90%"   CELLPADDING="4" CELLSPACING="3">
  							 <TR>
  						    <TH COLSPAN="3"><center><strong><H3>FACULTY</H3></strong></center>
  						    </TH>
 							  </TR>
  							
							<TR><TH>UserID</TH>
   						   <TH>Password</TH>
   						   <TH>Courses</TH></TR>
  							 <?php $db = $_SESSION['db'];
									$collection = $db->User;
									$cursor = $collection->find(array("who" => new MongoRegex("/faculty/i")));
									foreach ($cursor as $document){ ?>
   						   
  							 
 						  <TR ALIGN="CENTER">
 						  <TD><?php echo $document["uname"];?></TD>
    					  <TD><?php echo $document["pass"];?></TD>
    					  <TD><?php echo implode(",",$document["courses"]);}?></TD>
  						 </TR>
					</TABLE>
					<br><br><br><br><br>
					<TABLE class="xyz"   WIDTH="90%"   CELLPADDING="4" CELLSPACING="3">
  							 <TR>
  						    <TH COLSPAN="3"><center><strong><H3>STUDENT</H3></strong></center>
  						    </TH>
 							  </TR>
							  <TR>
							  <TH>UserID</TH>
   						   <TH>Password</TH>
   						   <TH>Courses</TH>
							  </TR>
  							 
  							 <?php $db = $_SESSION['db'];
									$collection = $db->User;
									$cursor = $collection->find(array("who" => new MongoRegex("/student/i")));
									foreach ($cursor as $document){ ?>
   						   
  							 
 						  <TR ALIGN="CENTER">
 						  <TD><?php echo $document["uname"];?></TD>
    					  <TD><?php echo $document["pass"];?></TD>
    					  <TD><?php echo implode(",",$document["courses"]);}?></TD>
  						 </TR>
					</TABLE>
								
								
								
				</div>
							
		</div>
	</div>
			

		
		
		
		
					
	
	  

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
.xyz table{

width:100%;

}
.xyz tr:nth-child(odd) {
   background: #e9e9e9;
}
.xyz tr strong{
color:#A52A2A;
}
.xyz td, .xyz th {
   
	border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

.xyz th{
color:#8B0000;
}

</style>
</html>

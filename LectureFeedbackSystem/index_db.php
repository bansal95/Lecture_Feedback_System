<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
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
	<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Your <span>Dashboard</span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
						User
							<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Home</a></li>
							
							<li><a href="profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="Welcome.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
						
		</div><!-- /.container-fluid -->
	<?php include'header.php'; ?>
	
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

<br><br><br><br>		
		<ul class="nav menu">
			<li class="active"><a href="index_db.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp; Dashboard</a></li>
			<li><a href="add.php"><i class="fa fa-user-plus" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Add Details</a></li>
			<li><a href="remove.php"><i class="fa fa-user-times" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Remove Details</a></li>
			
			
			<li><a href="view_details.php"><i class="fa fa-fax" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; View Details</a></li>
		<!--<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Modify Details</a></li>
			<!--<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>-->
			<!--<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>-->
			<li role="presentation" class="divider"></li>
			<li><a href="Welcome1.php"><i class="fa fa-user" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->
		<?php
		include "orders.php";
		{
		?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index_db.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
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
						<i class="fa fa-child" style="font-size:48px;color:white"></i>						
						<!--<span class="glyphicons glyphicons-book-open"></span>-->
							<!--<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					-->	</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							
	<?php						
	echo $o; ?>					
							
							</div>
							<div class="text-muted">Students</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-user" style="font-size:48px;color:white"></i>
							<!--<svg class="glyph stroked empty-message"><use xlink:href="#stroked"></use></svg>-->
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php						
	echo $c; ?></div>
							<div class="text-muted">Faculty</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
								<i class="fa fa-tasks" style="font-size:48px;color:white"></i>
							<!--<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
					-->	</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php						
		echo $p;
		}
		?></div>
							<div class="text-muted">Courses</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-book" style="font-size:48px;color:white"></i>
<!--							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
	-->					</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><!--<?php						
	echo $n; ?>-->ODD</div>
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
		<?php
		include 'percntge.php';
		{
		?>
	<!--	<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Orders</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?Php
						echo $o."%";
						?>" ><span class="percent"><?Php
						echo $o."%";
						?>
						</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Comments</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php
						echo $c.'%';
						?>" ><span class="percent"><?php
						echo $c.'%';
						?>
						</span>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Users</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php
						echo $n.'%';
						?>" ><span class="percent"><?php
						echo $n.'%';
						?>
						</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Visitors</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php
						echo $p.'%';
			
						?>" ><span class="percent"><?php
						echo $p.'%';
		}	
						?>
						</span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
	<!-- TO Do List Started..-->
			<div class="col-md-4" style="
			position:absolute;
			top:300px;
			right:10px;
			
			">
			
				<div class="panel panel-blue">
				
					<div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>To-do List</div>
					<div class="panel-body"><form method="POST">
					<?php
					//include 'connection.php';
					$u=$_SESSION['userName'];
			$sql_q="Select task,id from todo where uname='".$u."'";
			$rs=mysql_query($sql_q);
			$tsk="";
			
				while($row = mysql_fetch_array($rs))
				{
				
				$tsk = $row["task"];
		?>
						<ul class="todo-list">
						<li class="todo-list-item">
								<div class="checkbox">
									<input type="checkbox" id="checkbox" />
				<label for="checkbox"><?php echo $tsk;?></label>
								</div>
								<div class="pull-right action-buttons">
									<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
									<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>
								<a href="delete.php?id=<?php echo $row['id']; ?>"  class="trash"><svg name="trash" class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>
								
								
								</div>
				
							</li>
							
							
						</ul>
						<?php
					
				$tsk="";
			}
			
			
						?>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" name="todo" type="text" class="form-control input-md" placeholder="Add new task" />
							<span class="input-group-btn">
								<button name="add" class="btn btn-primary btn-md" id="btn-todo">Add</button>
							<?php
//include "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$x1="";
$uname=$_SESSION['userName'];
$x1=$_POST['todo'];

if($x1==="")
{
	echo " Empty";
}else{
$sql="insert into todo(task,uname) values('$x1','$uname')";

if(mysql_query($sql,$conn)){
		echo"Ur task addded";
	
	}
	else
	{
	echo"Their was some pblm";
	}

$x1="";
}

}					?>
							
							</span>
						</div>
					</div>
					</form>

				</div>
								
			</div><!--/.col-->
			<!-- TO Do List finished-->
			
		</div><!--/.row-->
	</div>	<!--/.main-->

	
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

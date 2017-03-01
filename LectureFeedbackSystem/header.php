<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>
</head>
<body>
<embed src="music.mp3" autostart="true" name="Mymusic" loop="true" hidden="true" >
</embed>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>FEEDBACK</span> PORTAL</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-secret" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp; 
						<?php echo $_SESSION['uname'];?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
						<?php $x=$_SESSION['who']."_dashboard.php" ;?>
							<li><a href="<?php echo $x; ?>"><i class="fa fa-home" aria-hidden="true" style="font-size:16px;color:black"></i> &nbsp;Home</a></li>
							
							<li onClick="return theFun()" id="myBtn"><a href="#"><i class="fa fa-cog" aria-hidden="true" style="font-size:16px;color:black"></i>&nbsp;Reset Password</a></li>
							<li><a href="logout.php"><i class="fa fa-user" aria-hidden="true" style="font-size:16px;color:black"></i>&nbsp;Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--<button id="myBtn" style="background:transparent ;color:#006633; text-decoration:none;">Forgot your password</button></center>
		-->
		<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
	<form  action="" method="post">
<center>	<p style="text-transform: uppercase;
	font-weight: 500;padding:2px;
	letter-spacing: 2px;background:white;" ><span style="color: #30a5ff;font-size:20px;">Reset</span> <span style="color:green;font-size:20px;">Password</span></p><br><br>
	</center>	<center><input class="form-control" name="old-pass" type="text" required autofocus placeholder="Old Password"><br></center><br>
	    <center><input id="ll" class="form-control" name="new-pass" type="text" required autofocus placeholder="New Password"><br></center>
		<button class="btn btn-default btn-md pull-left" name="reset" type="submit">Reset</button><br><br>
		<!--<button id="close" class="btn btn-default btn-md pull-right" name="close" type="submit">Close</button><br><br>
		-->
	</form>
  </div>

</div>
						
		</div>
	</nav>
</body>
<style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 500px; /* Location of the box */
    left: 30%;
    top: 0%;
    width: 100%; /* Full width */
    height: 16%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
   // background-color: rgb(0,0,0); /* Fallback color */
   //background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	opacity:1;
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
	position:absolute;
	top:35%;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
	height:280px;
}

/* The Close Button */
.close {
	//position:absolute;
	//top:10%;
	
    color:black;
    float: right;
    font-size: 28px;
    font-weight: bold;
    padding-top:8px;
	padding-left:3px;
}

.close:hover,
.close:focus{transition:0.1s;
    //background-color:white;
    
    color:black;
    text-decoration: none;
    cursor: pointer;
}
.form-control {
	border: 1px solid #eee;
	box-shadow: none;
}

.form-control:focus {
	border: 1px solid #30a5ff;
	outline: 0;
	box-shadow: inset 0px 0px 0px 1px #30a5ff;
}

input[type=text],select {
    width: 60%;
    padding: 12px 20px;
	background-color:white;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color:black;
}

input[type=text] {
    width: 60%;
    padding: 12px 20px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color:#30a5ff;
	background-color:white;
}

</style>

<script>
// Get the modal
function theFun(){
//	alert("Hello");
	var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
	//alert("Hello");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
	//alert("Hello");

// When the user clicks the button, open the modal
/*btn.onclick = function() {*/
    modal.style.display = "block";
	//alert("Hello");

	/*}*/

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
	//alert("Hello");

	}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
	//		alert("Hello");

    }
}
}
</script>

</html>

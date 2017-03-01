<?php
session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 


?>

<!DOCTYPE html>
<html>
<body>
<head>
<title>
SIGN-IN PAGE
</title>
<link rel="stylesheet" href="css3/animate.css" type="text/css">
<link rel="stylesheet" href="css3/style1.css" type="text/css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>

<div class="window">
	<div class="form">
		<form class="login-form" action="validate.php" method="post">
		<p>You Logged Out :(</p>
		
		<center><i class="fa fa-user" style="font-size:64px; color:grey;"></i></center>
		<p class="message">Want to SIGN-IN again </p><br><br>
		
		<center><input name="username" type="text" required autofocus placeholder="Username/Email"><br><br></center>
		<center><input name="pass" type="password" required autofocus placeholder="Password"><br><br></center>
		<button name="Submit" type="submit">Login</button><br><br>
		</center><a href="#" style="color:#006633; text-decoration:none;">Forgot your password</a></center>
		<!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
		</form>
	</div>
</div>



</body>
</html>
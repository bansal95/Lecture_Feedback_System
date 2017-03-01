<?php 
include 'connection.php';


function validate($user,$pass)
{
	    $db = $_SESSION['db'];
	    $collection = $db->User;
	    $userQuery = array('uname' => new MongoRegex("/$user/i"),'pass' => $pass);
	    $cursor = $collection->findOne($userQuery);
	    if($cursor!=NULL){
	    	$_SESSION['uname']=$user;
	    	$_SESSION['user_id']=$cursor['_id'];
			$_SESSION['who']=$cursor['who'];
	    	if($cursor['who'] == 'admin')
	    		header("Location: admin_dashboard.php");
	    	
	    	elseif ($cursor['who'] == 'student')
	    		header("Location: student_dashboard.php");
	    	
	    	else 
	    		header("Location: faculty_dashboard.php");
	    }
	    else {
	    	echo "<script>alert('incorrect username or password')</script>";
	    	echo "<script>window.open('index.php','_self')</script>";
	    }
}
if(isset($_POST['Submit']))
{
	validate($_POST["username"],$_POST["pass"]);
}
?>
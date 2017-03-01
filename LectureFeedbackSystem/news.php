<?php
include'connection.php';

if($_SERVER["request_method"]=="POST")
{
	$title=$_POST[Title];
	$descp=$_POST[Descpription];
	$date=$_POST[date];
	if(isset($_POST['Submit']){
	
	$n1="insert into events(title,date,descp) values('$title','$date','$descp')";
	$r=mysql_query($n1);
	if(!$r){
		die('sorry');
	}
	
		
			echo"Their is a pblm";
		
	}
}
else{

echo"Problem";
}

?>

?>
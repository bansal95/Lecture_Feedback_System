<?php 
//session_start();
include 'connection.php';



$user=$_POST[username];
$pass=$_POST[pass];


//echo"<br>Talking...<br>";

//echo "Inside";
		/*$user=$_POST[username];
		$pass=$_POST[pass];
*/
function SignIn()
{

	//	session_start();
		if(!empty($_POST[username]) AND !empty($_POST[pass])){
		$sql_query="Select * from admin where uname='$_POST[username]'and pass='$_POST[pass]' ";
		//echo $sql_query;
			$stmt=mysql_query($sql_query);
				$row=mysql_fetch_array($stmt);
				if(!empty($row['uname']) AND !empty($row['pass']))
	{
		$_SESSION['userName'] = $row['uname'];
		include"index_db.php";

	}else
	{
		include "invalid.php";
		
		
		
		
	}
}
}

if(isset($_POST['Submit']))
{
	SignIn();
}
else
{
	include 'index.php';
}
/*				
				if($row==1)
					echo"Successfully Logged In";
				else
					echo "Invalid PASSWORD or USERNAME";
				
				
*/

?>
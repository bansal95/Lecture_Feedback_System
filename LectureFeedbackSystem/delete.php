
<?php
if(isset($_GET['id'])){

	$mysql=" delete task from todo where id="	.$_GET['id']." and uname='".$_SESSION['userName']."'" ;
	mysql_query($mysql);
	echo"<a href='index_db.php'>";
}

?>
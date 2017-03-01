<?php

 
  
  $uname=$_SESSION['userName'];
		$sql2="select orders,comments,new_users,views from dboard_top where uname='$uname'";
		$stmt2=mysql_query($sql2);
			
		while($row = mysql_fetch_array($stmt2)){
			$o=$row["orders"];
			$c=$row["comments"];
			$n=$row["new_users"];
			$p=$row['views'];
			
		}
		
	

//echo $x;
?>
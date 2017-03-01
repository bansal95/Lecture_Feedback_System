<html>
  <head>
  <?php
  
 
 //echo"ddd <br>";
 //echo $_SESSION['userName'];
 $sqll="select n1,a1,n2,a2,n3,a3,n4,a4 from piechart where uname='".$_SESSION['userName']."'";
  //echo $sqll;
  $s=mysql_query($sqll);
 $row=mysql_fetch_array($s);
	//echo "<pre>";
	//print_r($row);
	 // echo $row["n1"];
  ?>
    <script type="text/javascript">
     google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		  
        var data = google.visualization.arrayToDataTable([
          ['Lecture', 'Mode'],
	  ['<?php  echo $row["n1"];?>',<?php  echo $row["a1"];?>],
          ['<?php  echo $row["n2"];?>',  <?php  echo $row["a2"];?>],
          ['<?php  echo $row["n3"];?> ', <?php  echo $row["a3"];?>],
	  ['<?php  echo $row["n4"];?> ', <?php  echo $row["a4"];?>]
          
        ]);
	  
        var options = {
          
          is3D: true,
		  slices:{
			  1:{offset:0.1},
			  2:{offset:0.3},
			  3:{offset:0.2},
		  },
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body><div class="panel panel-default">
  <div class="panel-heading">Pie-Chart <span class="da1"><a href="Edit.php">EDIT</a>
				</span></div>
    <div id="piechart_3d" style="width: 800px; height: 500px;"></div>
	
  </body>
  <style>
	.da1 {
	position:absolute;
	
	padding-left:820px;
	color:#5f6468;
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 500;
	letter-spacing: 2px;
}

</style>
</html>
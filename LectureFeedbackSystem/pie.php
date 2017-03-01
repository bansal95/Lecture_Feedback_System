<?php
include 'connection.php';
$course=$_SESSION['lund'];
$title=$_POST["lecturetitle"];
try{$db= $_SESSION['db'];
}catch ( Exception $e ) {
	die('Error: ' . $e->getMessage());
}
$collection_1 = $db->Activity;
$cursor_1     = $collection_1->find(array(
		"cname" => $course,
		"type" => "poll",
		"title" => $title
));
$easy = 0;
$medium = 0;
$difficult =0;
echo "<script>alert('incorrect username or password')</script>";
foreach ($cursor_1 as $document) {
	if($document["what"]=="easy")
		$easy++;
	else if($document["what"]=="medium")
		$medium++;
	else 
		$difficult++;
}


?>
	<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.load("visualization", "1", {"packages": ["corechart"], "callback": drawFlyAtlasChart});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Poll', 'Answer'],
          ['Easy',     <?php echo $easy;?>],
          ['Medium',    <?php echo $medium;?>],
          ['Difficult', <?php echo $difficult;?>],
           ]);

        var options = {
          title: <?php echo $title; ?>,
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
     <div id="piechart" style="width: 900px; height: 500px;"></div>  
     <p>fgrg</p>
  </body>
</html>
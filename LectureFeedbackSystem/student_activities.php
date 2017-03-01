 <?php
include 'header.php';

?><!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Students Activities</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select.selo").change(function(){
        var selectedCountry = $(".selo option:selected").val();
        $.ajax({
            type: "POST",
            url: "process_request.php",
            data: { country : selectedCountry }
        }).done(function(data){
            $("#response5").html(data);
        });
    });
    $("select.selo").change(function(){
        var selectedCountry = $(".selo option:selected").val();
        $.ajax({
            type: "POST",
            url: "index2.php",
            data: { countr : selectedCountry }
        }).done(function(data){
            $("#response1").html(data);
        });
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<body>

       
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <br><br><br><br>
        <ul class="nav menu">
            <li ><a href="student_dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp; Dashboard</a></li>
            <li ><a href="student_courses.php"><i class="fa fa-cloud" aria-hidden="true" style="font-size:16px;color:#30a5ff"></i> &nbsp;&nbsp;Courses</a></li>
            <li class="active"><a href="student_activities.php"><i class="fa fa-group" aria-hidden="true" style="font-size:16px;color:white"></i> &nbsp;&nbsp;Activities</a></li>
        </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">            
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="student_dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            </ol>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div>
        <?php
$db         = $_SESSION['db'];
$user       = $_SESSION['uname'];
$collection = $db->User;
$cursor     = $collection->findOne(array(
    "uname" => new MongoRegex("/$user/i")
));
$ascii      = 65;
$i          = 0;
foreach ($cursor["courses"] as $document) {
    $collection = $db->Course;
?>

        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <span class="glyphicons glyphicons-book-open"></span>
                            <i class="fa fa-cloud" aria-hidden="true" style="font-size:48px;color:white"></i>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">
                            
    <?php
    echo $document;
    $collection_1 = $db->Activity;
    $cursor_1     = $collection_1->find(array(
        "c_name" => new MongoRegex("/$document/i"),
        'type' => "poll"
    ));
    echo "(Polls:" . $cursor_1->count() . ")";
    $cursor_12 = $collection_1->findOne(array(
        "c_name" => new MongoRegex("/$document/i"),
        'type' => "poll"
    ));
    if ($cursor_12 != NULL) {
        $arr[$i] = $cursor_12['c_name'];
        $i++;
    }
    
?>                    
                            
                            </div>
                            <div class="text-muted">Subject <?php
    echo chr($ascii);
    $ascii++;
?></div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
?>
   
<br><br><br><br>
</div>
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default" style="
                position:absolute;
                width:600px;
				//height:250px;
                right:10px;
                border-radius:4px;
                ">
                <!--    <div class="panel-heading">-->
					<div class="row">
					<div class="col-xs-12 col-md-6"> 
                	<br><br>
                &nbsp;&nbsp;    <strong>Select Course&nbsp;</strong><select class="selo" id="sel11" name="stdnt_course">
                                    <option value="select-course">Select Course</option>
                                <?php

foreach ($arr as $document) {
    
?>
   <option value='<?php
    echo $document;
?>'><?php
    echo $document;
?></option>
    <?php
}
?>
                               </select>
                               
				</div>			   </div>
                             <div class="row"><div class="col-xs-6 col-md-5"></div><div class="col-xs- 3 col-md-4"><button type="button" class="btn btn-default btn-md pull" id="kdkd" >Click</button>
                                </div></div>
                                    <script>
                                    $(document).ready(function(){
                                        
                                        $("#kdkd").click(function(){
                                             
                                                if(($("#sel11").val())=="select-course")
                                                    alert("Please Select Course");
                                                else
                                                {        
                                            //    alert("Inside");
                                                $("#sectionk").show();
                                        }
                                        });
                                    });
                                    </script>
									<div class="row">
									<div class="col-xs-12 col-md-12">
                    <div id="sectionk" class="btn-default btn-md-pull-right" style="padding:10px;background:white;display:none;">
           &nbsp;&nbsp; <button id="b2" type="button" class="btn btn-default btn-md pull-left" style="border-color:#30a5ff;">Polling</button> 
                        <button  id="b1" type="button" class="btn btn-default btn-md pull-left" style="border-color:#30a5ff;">Posts</button>
                        <button id="b3" type="button"  class="btn btn-default btn-md pull-left" style="border-color:#30a5ff;">Assignments</button>
                        </div>
						</div>
						</div>
              <script>
    
    $(document).ready(function(){
        
        
    $("#b1").click(function(){
        
//        alert("a");
        $(".b1").css({display:'block'});
        $(".b233").css({display:'none'});
        $(".b3").css({display:'none'});
        
        
    });
    
    
        $("#b2").click(function(){
      //   alert("R");
            $(".b1").css({display:'none'});
            $(".b3").css({display:'none'});
            $(".b233").css('display','block');
        //   alert("fff"); 
        });
         
        
        $("#b3").click(function(){
            $(".b1").css({display:'none'});
            $(".b233").css({display:'none'});
            $(".b3").css({display:'block'});
            
        });
        
    });
    </script>
     <div class="panel-body">
                        
                       
                               
                                <div class="b233 form-group" style="display: none;" >
<form>
    <table>
        <tr>
            <td id="response5">
                <!--Response will be inserted here-->
            </td>
        </tr>
                <tr>
            <td id="response">
                <!--Response will be inserted here-->
            </td>
        </tr>
    </table>
</form>
</div>
 <div class="b1 form-group"  style="display: none;">
<form>
    <table>
        <tr>
            <td id="response1">
                <!--Response will be inserted here-->
            </td>
        </tr>
    </table>
</form>
</div>
</body> 
</html>                                		
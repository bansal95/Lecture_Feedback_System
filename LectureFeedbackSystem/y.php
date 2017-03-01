<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".lt").change(function(){
        var title = $(".lt option:selected").val();
        
        if(title =="select-course"){
            
            	alert("Please select lecture title");
            
        }
            else{
                   
        
        $.ajax({
            type: "POST",
            url: "pie.php",
            data: { lecturetitle : title }
        }).done(function(data){
            $("#piechart").html(data);
        });
    }
    });
});
</script>
<?php
include 'connection.php';
//if(isset($_POST["country"])){
    // Capture selected country
	$course       = $_POST["country"];
	$_SESSION['lund']=$course;
	try{$db= $_SESSION['db'];
	}catch ( Exception $e ) {
    die('Error: ' . $e->getMessage());
  }
	$collection_1 = $db->Activity;
	$cursor_1     = $collection_1->find(array(
			"c_name" => $course,
			"type" => "poll"
	));
  ?>
  
    <strong>Select Lecture Title:&nbsp;</strong>
	
    <select  name="lect_title" class="lt" >
     <option value="select-course">Select Lecture Title</option>
    <?php
  
    foreach ($cursor_1 as $document) {
    	?>
                                       
                                                <option  value="<?php
            echo $document['title'];
    ?>"><?php
            echo $document["title"];
    ?></option>
                                       
                                        <?php
        }
    ?>
                                       </select>
                                       
                                    
               
                                    
										
                          
                                                      
    
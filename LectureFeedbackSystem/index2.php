<?php


/*Code written by Ashish Trivedi*/

//including session_variables file for initializing User ID, Name, etc.
//including common mongo connection file
include('connection.php');
?>

<!--Referencing common Javascript and CSS files-->
<link rel="stylesheet" href="style.css"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="script.js"></script>

<html>
<body>
<div id="div_main">
    <!--div_new_post for section to create new post -->
	<div id="div_new_post">
		<div id="div_post_content">
			<textarea id="post_textarea" placeholder="Write Something...">
			</textarea>
		</div>
		<div class="div_post_submit">
			<input type="button" value="Create New Post" id="btn_new_post" onClick="new_post('<?php echo $_SESSION['user_id']; ?>')" class="button_style"/>
		</div>
	</div>
    <!--div_new_post ends-->
    
    <!--post_stream for displaying the post stream -->
    <div id="post_stream">
    <?php
    //Selecting the posts_collection
    $database=$_SESSION['db'];
    $course = $_SESSION["lund"];
    $collection = $database->selectCollection('posts_collection');
    //Retreiving all the posts in the collection
    //If you want to retreive specific posts based on useer, relations, etc. put filter condition in find 
    $posts_cursor=$collection->find(array("course_name" => new MongoRegex("/$course/i")))->sort(array('_id'=>-1)); 

    //Iterating over all the retreived posts
    foreach($posts_cursor as $post)
    {
        //Post ID
        $post_id=$post['_id'];
        //Post text
        $post_text=$post['post_text'];
        //Number of likes
        $post_like_count=$post['total_likes'];
        //Number of comments
        $post_comment_count=$post['total_comments'];
        //Post timestamp
        $post_timestamp=$post['timestamp'];
        //User ID of the post author
        $post_author_id=$post['post_author_id'];
        
        
        //Retreiving name of the author from the users collection based on the $post_author_id
        $collection = $database->selectCollection('User');
        $post_author_details = $collection->findOne(array('_id' =>$post_author_id));
        //Name of post author
        $post_author = $post_author_details['uname'];
        //Profile picture of post author 
      //  $post_author_profile_pic = $post_author_details['profile_pic'];

        
        //ID of span displaying Like/Unlike option
        $post_like_unlike_id=$post_id.'_like_unlike';
        //ID of span displaying number of likes
        $post_like_count_id=$post_id.'_like_count';
        //ID of span displaying number of comments
        $post_comment_count_id = $post_id.'_comment_count';
        //In the comments box list, the last comment box is empty so that the user can comment there
        //ID for that last self comment box
        $post_self_comment_id=$post_id.'_self_comment';
        //ID of textbox in the last comment box
        $post_comment_text_box_id=$post_id.'_comment_text_box';
        
        
        //If the user has previously liked the post the option of 'Unlike' should be shown.
        //For this we check if the user's user id is present in likes_user_ids array which stores user ids of all those who have liked 
        //Else the default Like option should be shown 
        if(in_array($_SESSION['user_id'],$post['likes_user_ids']))
        	{
        	    //User had already liked the post
        		$like_or_unlike='Unlike';
        	}
        else
        	{
        	    //User has not liked the post 
        		$like_or_unlike='Like';
        	}
    ?>

      <!-- div to display all the post content - to be repeated for each post -->
      <div class="post_wrap" id="<?php echo $post['_id'];?>">
                <!-- div to display post author's profile picture -->
				<div class="post_wrap_author_profile_picture">
					   <img src="images/<?php //echo $post_author_profile_pic;
    ?>" />
				</div>  
				<div class="post_details">  
                    <!-- div to display post author's name -->
                    <div class="post_author">
					 <?php echo $post_author ?> 
				    </div>
                    <!-- div to display post's text-->
					<div class="post_text">
						<?php echo $post_text; ?>
				    </div>
			    </div>   
                <!-- div to display all the comments related to post -->
                <div class="comments_wrap">
        					<span>
                                <span><img src="images/like.png" /></span>
                                <!-- span to display Like/Unlike option -->
        						<span class="post_feedback_like_unlike" id="<?php echo $post_like_unlike_id;?>"  
								      onclick="post_like_unlike(this,'<?php echo $_SESSION['user_id']; ?>')"><?php echo $like_or_unlike; ?></span>
								<!-- span to display number of likes -->
                                <span class="post_feedback_count" id="<?php echo $post_like_count_id; ?>"><?php echo $post_like_count;?></span>
        					</span>
        					<span>
                                <span class="post_feedback_comment"> <img src="images/comment.png" /> Comment</span>
                                <!-- span to display number of comments -->
                                <span class="post_feedback_count" id="<?php echo $post_comment_count_id; ?>"><?php echo $post_comment_count;?></span>
                            </span>
                            <!-- span to display post timestamp -->
      						<span class="post_timestamp">
      								<?php echo $post_timestamp; ?>
      						</span>                   
                              
                           <?php
                           //iterating over all the comments
                           for($i=0;$i<$post_comment_count;$i++)
                            {
                                //comment id
                                $comment_id=$post['comments'][$i]['comment_id'];
                                //comment text
	                            $comment_text=$post['comments'][$i]['comment_text'];
                                //comment author user id  
                                $comment_author_id=$post['comments'][$i]['comment_user_id'];
                                //retreiving comment author's details fromm the users collection
                                $collection = $database->selectCollection('User');
	                            $comment_author_details = $collection->findOne(array('_id' => new MongoId($comment_author_id)));
                                //comment author name
                               	$comment_author = $comment_author_details['uname'];
                                //comment author profile picture name
                              //  $comment_author_profile_pic = $comment_author_details['profile_pic'];
                           ?>                
                           <!-- div for displaying each comment - to be repeated for each comment -->
                           <div class="comment" id="<?php echo $comment_id; ?>">
                               <!-- div to display comment author profile picture -->
        						<div class="comment_author_profile_picture">
        							<img src="images/<?php // echo $comment_author_profile_pic;
                           ?>"/>
        						</div>
			            		<div class="comment_details">
                                    <!-- div to display comment author's name -->
                                	<div class="comment_author" >
			                    		<?php echo $comment_author; ?>
			                    	</div>
                                    <!-- div to display comment text -->
			                    	<div class="comment_text" >
			                    		<?php echo $comment_text; ?>
			                    	</div>
			           			</div>
      			 		   </div>
                            <?php
                              }
                            ?>   
                          <!-- div to display a default empty comment box at the end for the current user to comment-->
                           <div class="comment" id="<?php echo $post_self_comment_id; ?>">
                				<div class="comment_author_profile_picture">
        							<img src="images/<?php echo $_SESSION['user_profile_pic']; ?>" />
        						</div>
        						<div class="comment_text">
    	            				<textarea placeholder="Write a comment..." id="<?php echo $post_comment_text_box_id; ?>" onKeyPress="return new_comment(this,event,'<?php echo $_SESSION['user_id']; ?>')" ></textarea>
       		   					</div>
            				</div>
                 </div> 
       </div> 
       <hr class="soften special">
    <?php
    }
    ?>
    
    </div>
</div>
</body>
<style>
/*css for div_main*/
#div_main{
 width: 160%;
 margin-top: 50px;
 margin-left: 28%;
}	

/*css for the post textarea on the top*/
#post_textarea{
	width:45%;
	height:60px;
    border-width: 1px;
	border-radius:5px;
    font-size: 20px;
}

/*css for 'Create New Post' button*/
.button_style {
	background:#30a5ff; 
	color:#FFF;
	cursor:pointer;
	padding:5px;
    font-weight: bold;
}

/*css for the main post stream*/
#post_stream {
    width: 50%;
    font: bold;
}
.post_wrap {
	margin:25px 0 5px 0;
	clear:both;
	overflow:auto;
}

/*css for post author profile picture displayed near every post*/
.post_wrap_author_profile_picture {
	float:left;
	width:10%;
	
}

/*css for post content*/
.post_details {
    width:80%;
}

/*css for displaying post author name*/
.post_author {
	padding:5px;
	font-size: 16px;
    font-weight:bold;
	color:#5b74a8;
}

/*css for displaying post text*/
.post_text {
	
	margin:7px 0;
	font-size:15px;
	line-height:1.5em
}

/*css for Like, Unlike and Comment details */
.post_feedback {
	clear:both;
	padding:2px 10px 2px 10px;
	font-size:12px;
	border:solid 1px #F2F2F2;
    width:80%;
	margin-left:9%;
}
.post_feedback_like_img {
    width:19px;
    height:16px;
}
.post_feedback_like_unlike {
	cursor:pointer;
    padding-left:10px;
	padding-right:5px;
    color:#5b74a8;
    font-weight:bold;
}
.post_feedback_comment {
	cursor:pointer;
	padding-left:20px;
	padding-right:10px;
    color:#5b74a8;
    font-weight:bold;
}
.post_feedback_count {
	color:#999;
	font-size:12px;
	padding-right:20px;
	border-right:solid 1px #d5d5d5
}

/*css for post timestamp */
.post_timestamp {
	color:#999;
	font-size:12px;
	padding-right:20px;
    float: right;
}

/*css for comments */ 
.comment {
	background-color:#fafafa;
	border:solid 1px #F2F2F2;
	padding-top:5px;
	margin:2px 0
}
.comment_author_profile_picture {
	margin:0px;
	float:left;
}
.comment_author {
	margin:0px 0px 0px 2px;
	color:#5b74a8;
    padding-left:40px;
    font-size: 14px;
}
.comment_author_profile_picture img {
	width:25px;
	height:25px
}
.comment_text {
	padding-left:40px;
	color:#555;
	font-size:12px
}
.comment_text a {
	color:#099;
	font-weight:100;
    font-size:14px
}
.comment_text textarea {
	width:50%;
	resize:none;
	border:none; 
}

/*css for line seperating two posts */
hr.soften.special {
	margin-top:20px
}
hr.soften {
	height:1px;
	background-image:-webkit-linear-gradient(left, transparent, rgba(0, 0, 0, .1), transparent);
	background-image:-moz-linear-gradient(left, transparent, rgba(0, 0, 0, .1), transparent);
	background-image:-ms-linear-gradient(left, transparent, rgba(0, 0, 0, .1), transparent);
	background-image:-o-linear-gradient(left, transparent, rgba(0, 0, 0, .1), transparent);
	border:0;
	clear:both;
	behavior:url(PIE.php)
}
</style>
</html>
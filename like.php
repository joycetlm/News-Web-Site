<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
//Go to this php when someone click the 'like' bottom
 require 'database.php';
 session_start();
 $sid=$_SESSION['sid'];
 $like=$_SESSION['like'];
 //increase the current like number by 1
 ++$like;

//store the latest like number into the database
 $stmt = $mysqli->prepare("update story set like_num =?  where story_id=?");
 if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
 }
 $stmt->bind_param('ss', $like,$sid); 
 $stmt->execute();
 $stmt->close();

 header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/story.php");   
        exit;

?>
</body>
</html>
<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
require 'database.php';
 session_start();
 $id=$_POST['cid'];
 
//delete comments from database
 $stmt = $mysqli->prepare("delete from comments where comment_id=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}


$stmt->bind_param('s', $id); 
$stmt->execute();
$stmt->close();

 header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/story.php");   
        exit;

?>
</body>
</html>
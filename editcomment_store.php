<!DOCTYPE html>
<html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
require 'database.php';
 session_start();
 $cid=$_SESSION['cid'];
 $newcontent=(string) $_POST['content'];
 
 //store the new edited comment into the database 
 $stmt = $mysqli->prepare("update comments set content =? where comment_id=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('ss', $newcontent,$cid); 
$stmt->execute();
$stmt->close();

header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/story.php");   
        exit;

?>
</body>
</html>
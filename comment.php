<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
 require 'database.php';
 session_start();
 $content= (string) $_POST['comment'];
 $username =  $_SESSION['username'];
 $sid= $_SESSION['sid'];
 $noname=(string) $_POST['noname'];
 $username2 = 'anonymous';
 
 //insert comments into database
 $stmt = $mysqli->prepare("insert into comments (username, content,story_id) values (?,?,?)");
 if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
 }
 if($noname == 'noname'){
     $stmt->bind_param('sss', $username2,$content,$sid);
 }
 else{
     $stmt->bind_param('sss', $username,$content,$sid);
 }
 
 $stmt->execute();
 
 $stmt->close();
 //find the username of the story 
 $stmt = $mysqli->prepare("select username from story where story_id = ?");
 if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
 }
$stmt->bind_param('s', $sid);
$stmt->bind_result($susername);
$stmt->execute();
//$stmt->fetch();
$stmt->close();

 header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/story.php");   
 exit;

?>
</body>
</html>

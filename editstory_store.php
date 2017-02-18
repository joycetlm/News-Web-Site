<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
 require 'database.php';
 session_start();
 $id=$_SESSION['sid'];
 $newcontent=$_POST['content'];
 $newtitle=(string) $_POST['stitle'];
 $newlink=(string) $_POST['slink'];
 
//store the updated story into the database
 $stmt = $mysqli->prepare("update story set content =? ,title=?, link=? where story_id=?");
 if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
 }
 $stmt->bind_param('ssss', $newcontent, $newtitle, $newlink, $id); 
 $stmt->execute();
 $stmt->close();

 header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/story.php");   
 exit;


?>
</body>
</html>
<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
 require 'database.php';
 session_start();
 $username = $_SESSION['username'];
 $email= (string) $_POST['email'];
 
 $stmt = $mysqli->prepare("update user_info set email =? where username=?");
 if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
	}
 
$stmt->bind_param('ss', $email,$username);
 
$stmt->execute();
 
$stmt->close();

header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/news_site.php");   
        exit;
?>
</body>
</html>
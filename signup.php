<!DOCTYPE html>
<head><title>'news site'</title></head>
<body>
<?php
require 'database.php';
session_start();
$username = (string) $_POST['username'];
$password1= (string) $_POST['password1'];
$password2= (string) $_POST['password2'];

//Fetch user information from database 
if($password1 == $password2){ 
   $stmt = $mysqli->prepare("select username, password from user_info order by username");
   if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
   }
 
   $stmt->execute();
   $stmt->bind_result($user, $pass);
 
 //encode the password 
   $password3 = crypt($password1);
   echo crypt("Hello World");
   echo "<ul>\n";
   while($stmt->fetch()){
	   if($username == $user ){
	         echo'Sorry, the username has been registered! Please choose another username!';
             exit;
        }
   }
   $stmt = $mysqli->prepare("insert into user_info (username, password) values (?, ?)");
   if(!$stmt){
	    printf("Query Prep Failed: %s\n", $mysqli->error);
	    exit;
    }
 
    $stmt->bind_param('ss', $username,$password3);
 
    $stmt->execute();
 
    $stmt->close();
    $_SESSION['username']=$username ;
    header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/news_site.php");   
    exit;
}
else{
    echo " Sorry, you entered two different passwords! Please try again!";

}
 
          
?>
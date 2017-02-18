<!DOCTYPE html>
<head><title>'News Web Site'</title></head>
<body>
<?php
require 'database.php';
session_start();
$_SESSION['username'] = (string) $_POST['username'];
$username = $_SESSION['username'];
$password = (string) $_POST['password'];
$stmt = $mysqli->prepare("select password from user_info where username=?");
$stmt->bind_param('s', $username);
// Bind the results
$stmt->bind_result($pwd_hash);
$stmt->execute(); 
$stmt->fetch();

//CSRF token
// Compare the submitted password to the actual password hash
if(crypt($password,$pwd_hash)==$pwd_hash){
    echo"Login succeeded!";
    $_SESSION['username'] = $username;
// Redirect to your target page
    header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/news_site.php");   
exit;
} 
else{
    //Login failed; redirect back to the login screen
	header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/log.html");   
    exit;
}
$stmt->close();
?>
    
</body>
</html>
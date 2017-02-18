<!DOCTYPE html>
<head><title>'news site'</title></head>
<body>
<?php
require 'database.php';
session_start();
$sid= $_SESSION['sid'];

//Fetch username from database according to story_id
$stmt = $mysqli->prepare("select username from story where story_id = ?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('s', $sid);
$stmt->bind_result($susername);
$stmt->execute();
$stmt->fetch();
$stmt->close();

//Fetch email from database according to username
$stmt = $mysqli->prepare("select email from user_info where username=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('s', $susername);
$stmt->bind_result($email);
$stmt->execute();
$stmt->fetch();

if($email == null){
   echo" Sorry, the promulgator choose not to make his/her email address open to the public!";
}
else{
   echo"username: $susername<br>";
   echo"email address: $email<br>";
   echo"Feel free to contact me! :)<br>";

}
   echo"<form action=\"story.php\" method=\"POST\" class=\"form\">
		<input type=\"submit\" value=\"Return Home Page\" /> 
        </form>";

?>
</body>
</html>
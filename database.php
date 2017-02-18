<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php

// Content of database.php
 
$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'news_site');
 
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>

</body>
</html>
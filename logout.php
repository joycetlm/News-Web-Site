<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>

<body>

<h1>
      Latest News <br> 
</h1>   
<?php
  session_start();
  $_SESSION['username'] = '';

  header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/news_site.php");   
  exit;
?>
</body>
</html>
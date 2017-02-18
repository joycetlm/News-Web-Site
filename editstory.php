<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
$content=$_POST['scontent'];
$stitle=$_POST['stitle'];
$slink=$_POST['slink'];

//edit story
echo"<form name=\"input\" action=\"editstory_store.php\" method=\"POST\" class =\"form\">
	  <p> Title: <input type=\"text\" name=\"stitle\" value =\"$stitle\" style=\"width:700px;height:20px\"/> </p>
	
	  <p> Content: <input type=\"text\" name=\"content\" value =\"$content\" style=\"width:700px;height:200px\"/> </p>
	
	  <p>Link: <input type=\"text\" name=\"slink\" value =\"$slink\" style=\"width:700px;height:20px\"/> </p>
	
	  <p><input type=\"submit\" value=\"Submit\" /></p> 
      </form>";
?>

</body>
</html>
<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
session_start();
$_SESSION['cid']=(int)$_POST['cid'];
$cid =$_SESSION['cid'];
$content=$_POST['content'];

//edit comments
echo"<form name=\"input\" action=\"editcomment_store.php\" method=\"POST\" class =\"form\">
	 <p> Content: <input type=\"text\" name=\"content\" value =\"$content\" /> </p>
	 <input type=\"submit\" value=\"Submit\" /> 
     </form>";
?>
</body>
</html>

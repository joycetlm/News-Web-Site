 <!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php
 session_start();
?>
     <form name="input" action="newstory_store.php" method="POST" class ="form">
	 <p> Title: <input type="text" name="title" style="width:700px;height:20px"/> </p>
	 <p> Content: <input type="text" name="content" style="width:700px;height:200px"/> </p>
	 <p> References: <input type="text" name="link" style="width:700px;height:20px"/> </p>
	 <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
	 <p><input type="submit" value="Submit" /></p> 
     </form>

</body>
</html>

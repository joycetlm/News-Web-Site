 <!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>
<body>
<?php

   echo"<h1>Email Notification Setting</h1><br>";
   echo"Notice: You can choose to leave your email here to let other readers contact you!(Of course,  you can choose not to do this.) ";
?>
   <form name="input" action="setting.php" method="POST" class ="form">
	 <p> Email Address: <input type="email" name="email" style="width:600px;height=20px;"/> </p>
	 <p> <input type="submit" value="Submit" /> </p>
   </form>
   <form name="input" action="news_site.php" method="POST" class ="form">
	<p> <input type="submit" value="Give up and Return" /> </p>
   </form>
</body>
</html>
  
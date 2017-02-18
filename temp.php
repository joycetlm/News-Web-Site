 <!DOCTYPE html>
<head><title>'news site'</title></head>
<body>
<?php

   session_start();
   $_SESSION['sid'] = (int) $_POST["sid"];
  
   header("Location:http://ec2-35-164-126-233.us-west-2.compute.amazonaws.com/~luming/News_website/story.php");   
        exit;
?>
</body>
</html>
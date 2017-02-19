<!DOCTYPE html>
<head><title>News Web Site</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>

<body>

<h1>
      Latest News <br> 
</h1>   
<?php
   require 'database.php';
   session_start();
   $username = $_SESSION['username'];
  
   if($username==''){ 
         echo "Welcome, Guest!";
   }
   else{
         echo "Welcome, $username!";
   }
                
  if($username==''){
       echo" <form name=\"input\" action=\"log.html\" method=\"POST\" class =\"form\">
	         <input type=\"submit\" value=\"Log in\" /> 
             </form>";
  }
  else{ 
?>
        <form name="notification" action="notification.php" method="POST" class ="form">
        <input type="submit" value="Edit your contact information" /> 
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        </form>
        
        <div style="width=50%;float:right;" class="div1">
        <form name="input" action="logout.php" method="POST" class ="form">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <input type="submit" value="Log out" /> 
        </form>
        </div>

        <div style="width=50%;float:left;" class="div1">
        <form name="input" action="newstory_add.php" method="POST" class="form">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <input type="submit" value="create new story" /> 
        </form>
        </div>
<?php
  }
  
  //Display the story list
  echo"<br>";
  require 'database.php'; 
  $stmt = $mysqli->prepare("select title, content,link,story_id from story order by story_id");
  if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
  }
 
$stmt->execute();
 
$stmt->bind_result($title, $content, $link,$id);

 
echo "<ul>\n";
while($stmt->fetch()){


echo"<li><h2>$title</a></h2>
     <form action=\"temp.php\" method=\"POST\" class=\"form\">
		<input type=\"submit\" value=\"More Details\" /> 
		<input type=\"hidden\" value=\"$id\" name=\"sid\" />
     </form></li>";
?>
<?php   
    printf("\t<p>%s</p>\n",htmlspecialchars($content));	
  
    echo"<p><a href=$link >$link</a></p>";
	
}
echo "</ul>\n";
 
$stmt->close();


?>
  
</body>
</html>
<!DOCTYPE html>
<head><title>Story Details</title>
<link rel="stylesheet" type="text/css" href="property.css" /></head>

<body>
 
<?php
   require 'database.php';
   session_start();
   $id=$_SESSION['sid'];
   $username = $_SESSION['username'];
   if($username=='') {echo "Welcome, Guest!<br>" ;}
   else {echo "Welcome, $username!<br>" ;}
   if($username==''){
        echo" <form name=\"input\" action=\"log.html\" method=\"POST\" class =\"form\">
	               <input type=\"submit\" value=\"Log in\" /> 
              </form>";
   }
   else{
?>
          <div style="width=50%;float:right;" class="div1">
          <form name="input" action="logout.php" method="POST" class ="form">
	         <input type="submit" value="Log out" /> 
	         <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
          </form>
          </div>
          <div style="width=50%;float:left;" class="div1">
          <form name="input" action="newstory_add.php" method="POST" class="form">
               <input type="submit" value="create new story" /> 
               <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
          </form>
         </div>
         <div style="width=50%;float:left;" class="div1">
          <form name="input" action="user_info.php" method="POST" class="form">
               <input type="submit" value="Contact the promulgator" /> 
          </form>
          </div>
          
         
<?php       
}
    echo "<form action=\"news_site.php\" method=\"POST\" class=\"form\">
		       <input type=\"submit\" value=\"Return Home Page\" /> 
          </form>";
          
//Fetch story information from database accorrding to story_id
$stmt = $mysqli->prepare("select title,content,link,username,like_num from story where story_id=$id");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();
 
$stmt->bind_result($title, $scontent, $link,$susername,$like);

while($stmt->fetch()){
    echo"<h1>$title</h1>";	
    printf("\t<p>%s</p>\n",htmlspecialchars($scontent));	
    echo"<p>Resources from : <a href=$link >$link</a></p>";

}
	
$_SESSION['like']=$like;
 
$stmt->close();

//Fetch story comments from database accorrding to story_id
$stmt = $mysqli->prepare("select username, content, comment_id from comments where story_id=$id");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();
 
$stmt->bind_result($cusername, $ccontent,$cid);

if($username == $susername){ 

        echo"<div style=\"width=50%;float:right;\" class=\"div1\">
             <form name=\"input\" action=\"editstory.php\" method=\"POST\" class=\"form\">
                  <input type=\"hidden\" value=\"$scontent\" name=\"scontent\" />
                  <input type=\"hidden\" value=\"$title\" name=\"stitle\" />
                  <input type=\"hidden\" value=\"$link\" name=\"slink\" />
                  <input type=\"submit\" value=\"Edit story\" />  
             </form>
             </div>
             
             <div style=\"width=50%;float:right;\" class=\"div1\">
             <form name=\"input\" action=\"deletestory.php\" method=\"POST\" class=\"form\">
                  <input type=\"submit\" value=\"Delete story\" /> 
             </form><br> <br>
             </div>";
}

echo"<br>$like people like this story! Do you like it?";
?>
    

    <form action="like.php" method="POST" class="form">
		<input type="submit" value="Like  it !" /> 
		<input type="hidden" value="$cid" name="cid" />
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
     </form>
      
<?php 

//show Comment List
echo"<br><br><p><h2> Comment List</h2></p>"; 

echo "<ul>\n";
while($stmt->fetch()){
     
    printf("\t<li>%s:%s</li>\n",htmlspecialchars($cusername),htmlspecialchars($ccontent));	
    if($username == $cusername ){ 
        echo" <div style=\"width=50%;float:right;\" class=\"div1\"><form action=\"deletecomment.php\" method=\"POST\" class=\"form\">
		            <input type=\"submit\" value=\"Delete\" /> 
		            <input type=\"hidden\" value=\"$cid\" name=\"cid\" />
              </form>
              </div>
  
              <div style=\"width=50%;float:right;\" class=\"div1\"><form action=\"editcomment.php\" method=\"POST\" class=\"form\">
		            <input type=\"submit\" value=\"Edit\" /> 
		            <input type=\"hidden\" value=\"$cid\" name=\"cid\" />
		            <input type=\"hidden\" value=\"$ccontent\" name=\"content\" />
              </form></div>";

    }	
    echo"<br />";
}
echo "</ul>\n";

$stmt->close();
if($username!=''){ 
?>
    <form name="input" action="comment.php" method="POST" class ="form">
	 <label>Make new comment:</label><br /> 
	 <input type="text" name="comment" style="width:500px;height=2000px;"/><br />
	<input type="radio" value="noname" name="noname"/> Anonymous
	<input type="radio" value="name" name="noname" checked/> Unanonymous
	<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
	<input type="submit" value="Submit" /> 
    </form>
<?php
}
?>
     

</body>
</html>
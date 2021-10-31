
<?php echo file_get_contents("./html/common/header.html"); ?>

<!-- Get posts from database -->
<?php
 //----------connect to MySQL system-------------- 
   $dbhost = "localhost:3306";
   $dbuser = "root";
   $dbpass = "";
   $conn = new mysqli($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) 
   {
      die("Could not connect: " . mysql_error());
   }
   else
   {
	   // print("connected <br/>");
   }

   $conn->select_db("blogs");

   //---------Perform a query------------------------ 
   $sql = "SELECT * FROM posts limit 10"; 
   $retval = $conn->query($sql);
   
   if(! $retval ) 
   {
      die("Could not retrieve data : " . mysql_error());
   }   
   else
   {
	//  print("data is retrieved<br/>");  
   }   

   while($row = $retval->fetch_assoc()) 
   {
      echo "Post :{$row['p_ID']}  <br/>".
        "<a href='actions/post.php?postId={$row['p_ID']}' >Link </a><br/>".
        "{$row['text']} <br/>".
         "--------------------------------<br/><br/>";
   } 
   $conn->close();
?>

<?php echo file_get_contents("./html/common/footer.html"); ?>
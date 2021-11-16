 <!-- URL format /post.php?postId=<number> -->
<?php include("./common/header.php") ?>

<!-- Get posts from database -->
<?php
    // Connect to DB
    require __DIR__ . './functions.php';
    $conn = connectToDatabase();
    $conn->select_db("blogs");

   $postId = filter_input(INPUT_GET,'postId',FILTER_VALIDATE_INT);
   if ($postId == NULL || $postId == FALSE) {
       $postId = 1;
   }
   //---------Perform a query------------------------ 
   // Sql injection Fix todo, neeed to allow performQuery to support placeholders
   $sql = "SELECT * FROM posts where p_Id={$postId}"; 
   $retval = performQuery($conn,$sql);
    
   while($row = $retval->fetch_assoc()) 
   {
      echo "{$row['text']} <br/>".
         "--------------------------------<br/><br/>";
   } 
   $conn->close();
?>


<?php echo file_get_contents("./common/footer.html"); ?>
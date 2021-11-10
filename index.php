
<?php echo file_get_contents("./html/common/header.html"); ?>

<!-- Get posts from database -->
<?php
    // Connect to DB
    require __DIR__ . './functions.php';
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    // Perform Query
   $sql = "SELECT * FROM posts limit 10"; 
   $retval = performQuery($conn,$sql);

   $posts = $retval->fetch_all(MYSQLI_ASSOC);


   foreach ($posts as $row) 
   {
      echo "Post :{$row['p_ID']}  <br/>".
        "<a href='actions/post.php?postId={$row['p_ID']}' >Link </a><br/>".
        "{$row['text']} <br/>".
         "--------------------------------<br/><br/>";
   } 
   $conn->close();
?>

<?php echo file_get_contents("./html/common/footer.html"); ?>
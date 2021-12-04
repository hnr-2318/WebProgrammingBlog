<?php
     require('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    $postId = filter_input(INPUT_GET,'postId',FILTER_VALIDATE_INT);
    if ($postId == NULL || $postId == FALSE) {
         header("location: error.php");
    }

   if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "DELETE FROM posts WHERE p_ID='$postId'";
        $result = $conn->query($sql);
        $tagSql = "DELETE FROM posts_tags WHERE p_ID='$postId'";
        $tagRes = $conn->query($tagSql);
		
      if($result == TRUE) {
         header("location: index.php");
      }else {
          echo "Error updating record: " . mysqli_error($conn);
         $error = "Error Creating Post";
         
      }
   }
?>
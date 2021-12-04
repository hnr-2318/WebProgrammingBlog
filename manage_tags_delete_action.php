<?php
     require('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    $tagId = filter_input(INPUT_GET,'tagID',FILTER_SANITIZE_STRING);
    if ($tagId == NULL || $tagId = FALSE) {
         header("location: error.php");
    }

    $sql = "DELETE FROM tags WHERE t_ID={$_GET['tagID']}";
      //$sql = "INSERT INTO `tags` (tag_name) VALUES ('$tagName')";
    $result = $conn->query($sql);
		
      if($result == TRUE) {
         header("location: manage_tags.php");
      }else {
          echo "Error updating record: " . mysqli_error($conn);
         $error = "Error Deleting Post";
         
      }
?>
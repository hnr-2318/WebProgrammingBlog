<?php
 require('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    $postId = filter_input(INPUT_GET,'postId',FILTER_VALIDATE_INT);
    if ($postId == NULL || $postId == FALSE) {
         header("location: error.php");
    }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $title = $conn->real_escape_string($_POST['title']);
      $postDesc = $conn->real_escape_string($_POST['postDesc']);
      $text = $conn->real_escape_string($_POST['text']);
      //$date = date('Y-m-d', strtotime($_POST['date']));
      $imgUrl = $conn->real_escape_string($_POST['imgUrl']);
      
      $sql = "UPDATE `posts` SET title='$title', postDesc='$postDesc' ,text='$text',imgUrl='$imgUrl' WHERE p_id='$postId'";
      $result = $conn->query($sql);
		
      if($result == TRUE) {
         header("location: index.php");
      }else {
          echo "Error updating record: " . mysqli_error($conn);
         $error = "Error Creating Post";
         header("location: error.php");
         
      }
   }

?>
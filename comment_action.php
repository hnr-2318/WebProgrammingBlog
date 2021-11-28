<?php include_once('config.php') ?>
<?php 
   if(!isset($_SESSION['username'])) 
   {
        header('Location: login.php');
   }
?>
<?php
    require('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");
    $postId = filter_input(INPUT_GET,'postId',FILTER_VALIDATE_INT);
    $authorId = $_SESSION['username'];
   if ($postId == NULL || $postId == FALSE) {
       $postId = 1;
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $comment = $conn->real_escape_string($_POST['comment']);
      
      $sql = "INSERT INTO `comments` (u_ID,p_ID,text) VALUES ('$authorId','$postId','$comment')";
      $result = $conn->query($sql);
		
      if($result == TRUE) {
         header("location: ./post.php?postId=$postId");
      }else {
          echo "Error updating record: " . mysqli_error($conn);
         $error = "Error Creating Post";
         //header("location: error.php");
         
      }
   }

?>
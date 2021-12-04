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

   if($_SERVER["REQUEST_METHOD"] == "GET") {
      
      $tagName = $conn->real_escape_string($_GET['tagName']);
      $sql = "INSERT INTO `tags` (tag_name) VALUES ('$tagName')";
      $result = $conn->query($sql);
		
      if($result == TRUE) {
         header("location: manage_tags.php");
      }else {
         $error = "Error Creating Tag";
         header("location: error.php");
         
      }
   }

?>
<?php
 require('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $title = $conn->real_escape_string($_POST['title']);
      $postDesc = $conn->real_escape_string($_POST['postDesc']);
      $text = $conn->real_escape_string($_POST['text']);
      $author_ID = $conn->real_escape_string($_POST['author_ID']);
      $date = $conn->real_escape_string($_POST['date']);
      $imgUrl = $conn->real_escape_string($_POST['imgUrl']);
      
      $sql = "INSERT INTO `posts` (title,postDesc,text,author_ID,date,imgUrl) VALUES ('$title','$postDesc','$text','$author_ID','$date','$imgUrl')";
      $result = $conn->query($sql);
		
      if($result == TRUE) {
         header("location: index.php");
      }else {
         $error = "Error Creating Post";
         header("location: login.php");
         
      }
   }

?>
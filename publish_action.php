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
    if ($postId == NULL || $postId == FALSE) {
        $postId = 1;
    }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $title = $conn->real_escape_string($_POST['title']);
      $postDesc = $conn->real_escape_string($_POST['postDesc']);
      $text = $conn->real_escape_string($_POST['text']);
      $date = $conn->real_escape_string($_POST['date']);
      $imgUrl = $conn->real_escape_string($_POST['imgUrl']);
      $tags = $conn->real_escape_string($_POST['tags']);

      $username = $_SESSION['username'];
      $authorIDQuery = "SELECT (u_ID) FROM `users` where username='$username'";
      $res = $conn->query($authorIDQuery);
      $author_ID = $res->fetch_row()[0];
      echo $author_ID;
      
      $sql = "INSERT INTO `posts` (title,postDesc,text,author_ID,date,imgUrl) VALUES ('$title','$postDesc','$text','$author_ID','$date','$imgUrl')";
      $result = $conn->query($sql);
      $pidQuery = "SELECT `p_ID` FROM posts ORDER BY `p_ID` DESC limit 1;";
      $pidRes = $conn->query($pidQuery);
      $postId = $pidRes->fetch_row()[0];
      $tagQuery = "INSERT INTO `posts_tags` (p_ID, t_ID) VALUES ('$postId','$tags')";
      $tagRes = $conn->query($tagQuery);
		
      if($result == TRUE) {
         header("location: index.php");
      }else {
         $error = "Error Creating Post";
         header("location: login.php");
         
      }
   }

?>
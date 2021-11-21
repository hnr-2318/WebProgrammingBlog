<?php
    require('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");

   if($_SERVER["REQUEST_METHOD"] == "GET") {
      // username and password sent from form 
      
      $myusername = $conn->real_escape_string($_GET['username']);
      $firstname = $conn->real_escape_string($_GET['firstname']);
      $lastname = $conn->real_escape_string($_GET['lastname']);
      $email= $conn->real_escape_string($_GET['email']);
      $mypassword = $conn->real_escape_string($_GET['password']);
      
      $sql = "INSERT INTO `users` (first_name,last_name,email,username,password) VALUES ('$firstname','$lastname','$email','$myusername','$mypassword')";
      $result = $conn->query($sql);

      if($result == 1) {
         $_SESSION['username'] = $myusername;
         header("location: index.php");
      }else {
         $error = "Error Creating Account";
         header("location: login.php");
      }
   }



?>
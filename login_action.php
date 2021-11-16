<?php

    // Connect to DB
    require __DIR__ . './functions.php';
    $conn = connectToDatabase();
    $conn->select_db("blogs");

  
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $conn->real_escape_string($_POST['username']);
      $mypassword = $conn->real_escape_string($_POST['password']);
      
      $sql = "SELECT u_ID FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
      $row = $result->fetch_all(MYSQLI_ASSOC);
      
      $count = $result->num_rows;
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         header("location: login.php");
         
      }
   }

    // Redirect upon success
    //header("location: http://localhost:8000/csci-4300-group-project-18");
    //die();

?>
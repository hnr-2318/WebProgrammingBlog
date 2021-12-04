<?php
     require __DIR__ . './functions.php';
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    // Perform Query
   $sql = "SELECT * FROM tags limit 10"; 
   $retval = performQuery($conn,$sql);

   $tags = $retval->fetch_all(MYSQLI_ASSOC); 
?>
<?php include("./common/header.php"); ?>
<?php echo file_get_contents("./publish.html"); ?>
<?php echo file_get_contents("./common/footer.html"); ?>
<?php include("./common/header.php"); ?>
<?php
   $failure = filter_input(INPUT_GET,'failure',FILTER_VALIDATE_INT);
   if ($failure == 1) {
       echo "<div class='alert alert-primary' role='alert'>".
            "<p>Credentials incorrect. Please try again</p>".
            "</div>";

   }
?>
<?php echo file_get_contents("./login.html"); ?>
<?php echo file_get_contents("./common/footer.html"); ?>
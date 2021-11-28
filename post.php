 <!-- URL format /post.php?postId=<number> -->
<?php include("./common/header.php") ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 text-center mb-5"><br>
            <!-- Get posts from database -->
          <h4>  

 <!-- Get posts from database -->
<?php
    // Connect to DB
    include('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");

   $postId = filter_input(INPUT_GET,'postId',FILTER_VALIDATE_INT);
   if ($postId == NULL || $postId == FALSE) {
       $postId = 1;
   }
   //---------Perform a query------------------------ 
   // Sql injection Fix todo, neeed to allow performQuery to support placeholders
   $sql = "SELECT * FROM posts where p_Id={$postId}"; 
   $retval = performQuery($conn,$sql);
    
   while($row = $retval->fetch_assoc()) 
   {
          echo "<h2>{$row['title']} </h2>";
                echo "{$row['date']} <hr>";
                echo "{$row['text']} <br/>".
                "--------------------------------<br/><br/>";
      
   } 
   $conn->close();
?>
            </h4>
        </div>
    </div>
</div>
<div class="container col-7">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
	          <p class="w-100 text-center">&mdash; Comment Below &mdash;</p><br>
				</div>
			</div>
			<div class="form-wrapper">
				<form action="./comment_action.php" method="post" class="signin-form">
					<div class="form-group">
						<textarea name="comment" type="text" class="form-control" maxlength="180" rows="5" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
					</div>
				</form>
			</div>
		</div>

<?php echo file_get_contents("./common/footer.html"); ?>
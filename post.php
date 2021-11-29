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

   $commentsQuery = "SELECT * from comments where p_Id={$postId}";
   $commentsRet = performQuery($conn,$commentsQuery);
   $comments = $commentsRet->fetch_all(MYSQLI_ASSOC);
    
   while($row = $retval->fetch_assoc()) 
   {
          echo "<h2> {$row['title']} </h2>";
                echo "{$row['date']} <hr>";
                echo "<p style='font-size:120%;'> {$row['text']} </p><br/>".
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
	          <h3 class="w-100 text-center">&mdash; Comment Below &mdash;</h3><br>
				</div>
			</div>
			<div class="form-wrapper">
				<form action="./comment_action.php?postId=<?php echo $postId ?>" method="post" class="signin-form">
					<div class="form-group">
						<textarea name="comment" type="text" class="form-control" maxlength="180" rows="5" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
					</div>
				</form>
			</div>
            <div class="container col-11"><br>
            <?php foreach($comments as $comment) : ?>
                <div class="our_text_box three_box">
                    <p style="font-size:100%;"><?php echo $comment['text'] ?></p><hr>
                    <?php echo $comment['date'] ?>
                </div><br>
            <?php endforeach; ?>
		</div>
        </div>

<?php echo file_get_contents("./common/footer.html"); ?>
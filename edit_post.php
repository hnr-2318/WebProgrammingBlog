
<?php include("./common/header.php"); ?>


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
       $title = $row['title'];
       $date = $row['date'];
       $postDesc = $row['postDesc'];
       $imgUrl = $row['imgUrl'];
       $text = $row['text'];
   } 
   $conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Edit Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/login-style.css">

    </head>
    
    <body class="img js-fullheight" style="background-image: url(images/banner.png);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <h2 class="heading-section">Edit Post</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-wrapper">
                            <form action="./edit_post_action.php?postId=<?php echo $postId ?>" method="post" class="signin-form">
                                <div class="form-group">
                                    <input value="<?php echo $title ?>" name="title" type="text" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="postDesc" type="text" class="form-control" placeholder="Description" required>
                                        <?php echo $postDesc ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $date ?>" type="date" class="form-control" placeholder="Today" required>
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo $imgUrl ?>" name="imgUrl" type="text" class="form-control" placeholder="Image Link">
                                </div>
                                <div class="form-group">
                                    <textarea name="text" type="text" class="form-control" placeholder="Text" rows="8" required>
                                        <?php echo $text ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

<?php echo file_get_contents("./common/footer.html"); ?>
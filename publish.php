<?php include_once("./config.php") ?>
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
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="form-wrapper">
            <form action="./publish_action.php" method="post" class="signin-form">
               <div class="form-group">
                  <input name="title" type="text" class="form-control" placeholder="Title" required>
               </div>
               <div class="form-group">
                  <textarea name="postDesc" type="text" class="form-control" placeholder="Description" required></textarea>
               </div>
               <div class="form-group">
                  <input name="date" type="date" class="form-control" placeholder="Today" required>
               </div>
               <div class="form-group">
                  <input name="imgUrl" type="text" class="form-control" placeholder="Image Link">
               </div>
               <div class="form-group">
                  <textarea name="text" type="text" class="form-control" placeholder="Text" rows="8" required></textarea>
               </div>
               <div class="form-group">
                  <label for="tags">Choose a tag:</label>
                     <select name="tags" id="tags">
                        <?php foreach ($tags as $tag) : ?>
                              <option value="<?php echo $tag['t_ID'] ?>"><?php echo $tag['tag_name'] ?></option>
                        <?php endforeach; ?>
                     </select>
               </div>
               <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary submit px-3">Publish</button>
               </div>
             </form>
         </div>
      </div>
   </div>
</div><br><br><br>
<?php echo file_get_contents("./common/footer.html"); ?>
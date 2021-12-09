<?php 
    include_once("./config.php");
    include ("./common/header.php");  
    include ('./functions.php');
    $conn = connectToDatabase();
    $conn->select_db("blogs");
?>
<style>
h1 {text-align: center;} 
</style>

<h1> Search Results </h1>

<?php
    if (isset($_POST['submit'])) { //if submit button is pressed
    $search = mysqli_real_escape_string($conn, $_POST['Search']);//variable that contains information inside the search form and prevents sql injection from user
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR postDesc LIKE '%$search%' OR 'text' LIKE '%$search%' OR author_ID LIKE '%$search%' OR p_ID LIKE '%$search%'"; //sql statement to find matches between user input and data
    $result = mysqli_query($conn, $sql);//query inside database 
    $queryResult = mysqli_num_rows($result); //check for results 
    
    if ($queryResult == 1) {
    echo "There are ".$queryResult." result. ";
    } else {
        echo "There are ".$queryResult." results. ";
    }

    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           ?> 
            <div class="row justify-content-center" >
                            <div class="col-md-6">
                           <div class="our_img">
                              <figure><img src=<?php echo $row['imgUrl'] ?> alt="#"/></figure>
                           </div>
                           <div class="our_text_box three_box">
                              <div class="post_box d_flex padding_top3">
                                  <h3 class="awesome padding_flot"><?php echo $row['title']; ?></h3>
                                 <h4 class="flot_left1">Post By : <?php echo $row['author_ID']; ?> </h4>
                              </div>
                              <p><?php echo $row['postDesc']; ?></p> <br>
                              <a class="btn btn-primary text-center" href="./post.php?postId=<?php echo $row['p_ID'] ?>">View</a>
                              <a class="btn btn-primary text-center" href="./edit_post.php?postId=<?php echo $row['p_ID'] ?>">Edit</a>
                              <a class="btn btn-primary text-center" href="./delete_post_action.php?postId=<?php echo $row['p_ID'] ?>">Delete</a>
                           </div>
                        </div>
                        
                     </div>
                  
                     
         </div>
      </div> <?php
        }

    } else {
        echo "No results found based on your search.";
    }   
}

?>
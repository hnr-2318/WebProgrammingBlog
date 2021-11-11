
<?php echo file_get_contents("./html/common/header.html"); ?>

<!-- Get posts from database -->
<?php
    // Connect to DB
    require __DIR__ . './functions.php';
    $conn = connectToDatabase();
    $conn->select_db("blogs");

    // Perform Query
   $sql = "SELECT * FROM posts limit 10"; 
   $retval = performQuery($conn,$sql);

   $posts = $retval->fetch_all(MYSQLI_ASSOC);


   //foreach ($posts as $row) 
   //{
    //  echo "Post :{$row['p_ID']}  <br/>".
    //    "<a href='actions/post.php?postId={$row['p_ID']}' >Link </a><br/>".
    //    "{$row['text']} <br/>".
    //     "--------------------------------<br/><br/>";
   //} 
   $conn->close();
?>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
       <header>
        <!-- header inner -->
        <div class="head_top">
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"> Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
                <div class="container">
                    <div class="row d_flex">
                        <div class=" col-xl-8 col-lg-8 col-md-8 col-12-9">
                            <div class="text-bg">
                                <h1>Blog</h1>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                    it has a more-or-less normal distribution of letters,</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12-3">
                            <div class="text-img">
                                <figure><img src="images/box_img.png" alt="#" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
      
      <!-- blog_main -->
      <div class="blog_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Blog</h2>
                  </div>
               </div>
            </div>
            <div class="row">
                        <?php foreach ($posts as $post) : ?>
                            <div class="col-md-6">
                           <div class="our_img">
                              <figure><img src="images/our_img4.jpg" alt="#"/></figure>
                           </div>
                           <div class="our_text_box three_box">
                              <div class="post_box d_flex padding_top3">
                                  <h3 class="awesome padding_flot"><?php echo $post['postDesc']; ?></h3>
                                 <h4 class="flot_left1">Post By : <?php echo $post['author_ID']; ?> </h4>
                              </div>
                              <p><?php echo $post['text']; ?></p>
                           </div>
                        </div>
                        <?php endforeach; ?>
                        
                     </div>
                     
         </div>
      </div>
      <!-- end blog_main -->
    
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

<?php echo file_get_contents("./html/common/footer.html"); ?>
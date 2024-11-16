<?php

// Single post page a header connection
include "header.php";

?>

<section class="section lb m3rem">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                <!--======================================================================== 
                Nirdisto akti post a click kore single post page niye asar jonno php code
                =========================================================================-->
                <?php

                if (isset($_GET['post_id'])) {

                    $post_id = $_GET['post_id'];

                    $query = "SELECT * FROM post WHERE p_id = '$post_id'";
                    $result = mysqli_query($db, $query);

                    $postCount = mysqli_num_rows($result);

                    if ($postCount == 0) {

                        header('Location: error-404.php');

                    } else {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $post_id = $row['p_id'];
                            $post_title = $row['p_title'];
                            $post_desc = $row['p_description'];
                            $post_img = $row['p_img'];
                            $category_id = $row['c_id'];
                            $user_id = $row['u_id'];
                            $post_date = $row['p_date'];
                            $post_status = $row['p_status'];

                            ?>

                            <div class="page-wrapper">
                                <div class="blog-title-area">
                                    <ol class="breadcrumb hidden-xs-down">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active">
                                            <?php echo $post_title; ?>
                                        </li>
                                    </ol>

                                    <span class="color-yellow">
                                        <a href="#" title="">

                                            <?php

                                            // Category Name show koranor jonno query kora hoyese.
                                            $cn_query = "SELECT * FROM category WHERE c_id = '$category_id'";
                                            $cn_result = mysqli_query($db, $cn_query);

                                            while ($row = mysqli_fetch_assoc($cn_result)) {
                                                $category_id = $row['c_id'];
                                                $category_name = $row['c_name'];
                                                $category_desc = $row['c_description'];
                                            }

                                            echo $category_name;

                                            ?>

                                        </a></span>

                                    <h3>
                                        <?php echo $post_title; ?>
                                    </h3>

                                    <div class="blog-meta big-meta">
                                        <small><a href="#" title="">
                                                <?php echo $post_date; ?>
                                            </a></small>
                                        <small><a href="#" title="">by
                                                <?php

                                                // Author Name show koranor jonno query kora hoyese.
                                                $an_query = "SELECT * FROM user WHERE u_id = '$user_id'";
                                                $an_result = mysqli_query($db, $an_query);

                                                while ($row = mysqli_fetch_assoc($an_result)) {
                                                    $u_id = $row['u_id'];
                                                    $author = $row['u_name'];
                                                }

                                                echo $author;

                                                ?>
                                            </a></small>
                                        <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small> -->
                                    </div><!-- end meta -->

                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                                        class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                                        class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- end post-sharing -->
                                </div><!-- end title -->

                                <div class="single-post-media">
                                    <img src="admin/assets/images/posts/<?php echo $post_img; ?>" alt="" class="img-fluid">
                                </div><!-- end media -->

                                <div class="blog-content">
                                    <div class="pp">
                                        <p>
                                            <?php echo $post_desc; ?>
                                        </p>
                                    </div><!-- end pp -->
                                </div><!-- end content -->

                                <div class="blog-title-area">
                                    <div class="tag-cloud-single">
                                        <span>Tags</span>
                                        <small><a href="#" title="">lifestyle</a></small>
                                        <small><a href="#" title="">colorful</a></small>
                                        <small><a href="#" title="">trending</a></small>
                                        <small><a href="#" title="">another tag</a></small>
                                    </div><!-- end meta -->

                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                                        class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                                        class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- end post-sharing -->
                                </div><!-- end title -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="upload/fashion_banner_design.jpg" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <hr class="invis1">

                                <div class="custombox authorbox clearfix">
                                    <h4 class="small-title">About author</h4>
                                    <div class="row">
                                        <?php

                                        // Author Name show koranor jonno query kora hoyese.
                                        $an_query = "SELECT * FROM user WHERE u_id = '$user_id'";
                                        $an_result = mysqli_query($db, $an_query);

                                        while ($row = mysqli_fetch_assoc($an_result)) {
                                            $u_id = $row['u_id'];
                                            $author = $row['u_name'];
                                            $profile = $row['u_img'];
                                            $biodata = $row['u_biodata'];
                                        }

                                        ?>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <img src="admin/assets/images/user/<?php echo $profile; ?>" alt=""
                                                class="img-fluid rounded-circle">
                                        </div><!-- end col -->

                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <h4><a href="#">
                                                    <?php echo $author; ?>
                                                </a></h4>
                                            <p>
                                                <?php echo $biodata; ?>
                                            </p>

                                            <div class="topsocial">
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                                        class="fa fa-facebook"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                                                        class="fa fa-youtube"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                                        class="fa fa-pinterest"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                                        class="fa fa-twitter"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                                        class="fa fa-instagram"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                                                        class="fa fa-link"></i></a>
                                            </div><!-- end social -->

                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div><!-- end author-box -->

                                <hr class="invis1">

                                <!--======================================
                                    Recent Post shhow koranor jonno 
                                =======================================-->
                                <div class="custombox clearfix">
                                    <h4 class="small-title">Recent Post</h4>
                                    <div class="row">
                                        <?php

                                        $query = "SELECT * FROM post ORDER BY p_id DESC LIMIT 2";
                                        $result = mysqli_query($db, $query);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $post_id = $row['p_id'];
                                            $post_title = $row['p_title'];
                                            $post_desc = $row['p_description'];
                                            $post_img = $row['p_img'];
                                            $category_id = $row['c_id'];
                                            $user_id = $row['u_id'];
                                            $post_date = $row['p_date'];
                                            $post_status = $row['p_status'];

                                            ?>

                                            <div class="col-lg-6">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="single_post_page.php?post_id=<?php echo $post_id; ?>" title="">
                                                            <img src="admin/assets/images/posts/<?php echo $post_img; ?>" alt=""
                                                                class="img-fluid">
                                                            <div class="hovereffect">
                                                                <span class=""></span>
                                                            </div><!-- end hover -->
                                                        </a>
                                                    </div><!-- end media -->
                                                    <div class="blog-meta">
                                                        <h4><a href="single_post_page.php?post_id=<?php echo $post_id; ?>" title="">
                                                                <?php echo $post_title; ?>
                                                            </a>
                                                        </h4>
                                                        <small>
                                                            <a href="#" title="">
                                                                <?php

                                                                // Category Name show koranor jonno query kora hoyese.
                                                                $cn_query = "SELECT * FROM category WHERE c_id = '$category_id'";
                                                                $cn_result = mysqli_query($db, $cn_query);

                                                                while ($row = mysqli_fetch_assoc($cn_result)) {
                                                                    $category_id = $row['c_id'];
                                                                    $category_name = $row['c_name'];
                                                                    $category_desc = $row['c_description'];
                                                                }

                                                                echo $category_name;

                                                                ?>
                                                            </a>
                                                        </small>
                                                        <small>
                                                            <a href="#" title="">
                                                                <?php echo $post_date; ?>
                                                            </a>
                                                        </small>
                                                    </div><!-- end meta -->
                                                </div><!-- end blog-box -->
                                            </div><!-- end col -->

                                            <?php
                                        }

                                        ?>

                                    </div><!-- end row -->
                                </div><!-- end custom-box -->
                                <!--======== 
                                    END
                                 ========-->

                                <hr class="invis1">

                                <div class="custombox clearfix">
                                    <h4 class="small-title">3 Comments</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="comments-list">
                                                <div class="media">
                                                    <a class="media-left" href="#">
                                                        <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading user_name">Amanda Martines <small>5 days
                                                                ago</small></h4>
                                                        <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch
                                                            freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit
                                                            kale chips proident chillwave deep v laborum. Aliquip veniam delectus,
                                                            Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone
                                                            Kickstarter, drinking vinegar jean.</p>
                                                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <a class="media-left" href="#">
                                                        <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                                    </a>
                                                    <div class="media-body">

                                                        <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small>
                                                        </h4>

                                                        <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo
                                                            biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko
                                                            tempor duis single-origin coffee. Banksy, elit small.</p>

                                                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                    </div>
                                                </div>
                                                <div class="media last-child">
                                                    <a class="media-left" href="#">
                                                        <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                                    </a>
                                                    <div class="media-body">

                                                        <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small>
                                                        </h4>
                                                        <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan
                                                            sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie
                                                            consequat flexitarian four loko tempor duis single-origin coffee.
                                                            Banksy, elit small.</p>

                                                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div><!-- end custom-box -->

                                <hr class="invis1">

                                <div class="custombox clearfix">
                                    <h4 class="small-title">Leave a Reply</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="form-wrapper">
                                                <input type="text" class="form-control" placeholder="Your name">
                                                <input type="text" class="form-control" placeholder="Email address">
                                                <input type="text" class="form-control" placeholder="Website">
                                                <textarea class="form-control" placeholder="Your comment"></textarea>
                                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end page-wrapper -->

                            <?php
                        }

                    }

                }

                ?>
                <!--======== 
                    END
                ========-->

            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                <?php

                // Single post page a sidebar connection
                include "sidebar.php";

                ?>

                <!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php

// Single post page a Footer connection
include "footer.php";

?>

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
    ================================================== -->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

</body>

</html>
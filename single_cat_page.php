<?php

include "header.php";

?>


<section id="cta" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h2>

                    <!--========================================================
                    Single_cat_Page ar Banner a nirdisto category show koranor code.
                    =========================================================-->
                    <?php

                    if (isset($_GET['cat_id'])) {

                        $category_id = $_GET['cat_id'];

                        $query = "SELECT * FROM category WHERE c_id = '$category_id'";
                        $result = mysqli_query($db, $query);
                        $serial = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $cat_id = $row['c_id'];
                            $cat_name = $row['c_name'];
                            $cat_desc = $row['c_description'];

                            echo $cat_name;
                        }

                    }

                    ?>

                    <!--===============
                            END
                    ================-->

                </h2>
            </div>
        </div>
    </div>
</section>

<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-custom-build">

                        <!--===================================================== 
                        Front-end a Blog Post Show koranor HTML & PHP code strat
                        =====================================================-->
                        <?php

                        if (isset($_GET['cat_id'])) {

                            $category_id = $_GET['cat_id'];

                            $query = "SELECT * FROM post WHERE c_id = '$category_id' ORDER BY p_id DESC";
                            $result = mysqli_query($db, $query);

                            $isPost = mysqli_num_rows($result);

                            if($isPost == 0){

                                header('Location: error-404.php');
                                // echo 'You have no post in this category. Go to the <a href="index.php">Home page</a>';
                            }

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

                                <div class="blog-box wow fadeIn">
                                    <div class="post-media">
                                        <a href="single_post_page.php?post_id=<?php echo $post_id; ?>" title="">
                                            <img src="admin/assets/images/posts/<?php echo $post_img; ?>" alt=""
                                                class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                            <!-- end hover -->
                                        </a>
                                    </div>
                                    <!-- end media -->
                                    <div class="blog-meta big-meta text-center">
                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                                        <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                                        <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i
                                                            class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                        <h4><a href="single_post_page.php?post_id=<?php echo $post_id; ?>" title="">
                                                <?php echo substr($post_title, 0, 80); ?>
                                            </a></h4>
                                        <p>
                                            <?php echo substr($post_desc, 0, 250) . "... "; ?>
                                            <a href="single_post_page.php?post_id=<?php echo $post_id; ?>">Read more</a>
                                        </p>
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
                                        <small><a href="#" title="">
                                                <?php echo $post_date; ?>
                                            </a></small>
                                        <small>
                                            <a href="#" title="">by
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
                                            </a>
                                        </small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <?php

                            }

                        }

                        ?>

                        <!--===============
                                END
                        ================-->
                    </div>
                </div>

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                <?php

                include "sidebar.php";

                ?>

                <!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php

include "footer.php";

?>
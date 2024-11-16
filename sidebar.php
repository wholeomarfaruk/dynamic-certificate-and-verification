<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Recent Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">

                <!--=====================================
                    Recent Post shhow koranor jonno 
                =======================================-->
                <?php

                $query = "SELECT * FROM post ORDER BY p_id DESC LIMIT 4";
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

                    <a href="single_post_page.php?post_id=<?php echo $post_id; ?>"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="admin/assets/images/posts/<?php echo $post_img; ?>" alt="post img"
                                class="img-fluid float-left">
                            <h5 class="mb-1">
                                <?php echo substr($post_title, 0, 20); ?>
                            </h5>
                            <small>
                                <?php echo $post_date; ?>
                            </small>
                        </div>
                    </a>

                    <?php

                }

                ?>

            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Popular Categories</h2>
        <div class="link-widget">
            <ul>

                <!--================================
                    Tategory shhow koranor jonno 
                ==================================-->
                <?php

                $query = "SELECT * FROM category";
                $result = mysqli_query($db, $query);
                $serial = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['c_id'];
                    $cat_name = $row['c_name'];
                    $cat_desc = $row['c_description'];


                    $count_query = "SELECT * FROM post WHERE c_id = '$cat_id'";
                    $coun_result = mysqli_query($db, $count_query);

                    $total_post = mysqli_num_rows($coun_result);

                    ?>

                    <li><a href="single_cat_page.php?cat_id=<?php echo $cat_id; ?>">
                            <?php echo $cat_name; ?><span>(
                                <?php echo $total_post; ?>)
                            </span>
                        </a></li>

                    <?php
                }

                ?>

            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div>
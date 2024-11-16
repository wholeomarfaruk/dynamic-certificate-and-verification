<!--======================== 
    Inner Custome CSS 
=========================-->
<style>
    .btn {
        padding: 8px 25px !important;
        color: #fff !important;
        background-color: #19596E !important;
        border: #19596E !important;
        transition: .5s !important;
    }

    .btn:hover {
        background-color: #2fe5e4 !important;
        border: #2fe5e4 !important;
        color: #fff !important;
        transition: .5s !important;
    }

    .pagination
    .page-item.active 
    .page-link {
        background-color: #19596E !important;
        border-color: #19596E !important;
        box-shadow: 0 2px 5px rgba(67, 94, 190, .3) !important;
    }
</style>


<?php

include "inc/header.php";

if ($_SESSION['$u_role'] == 2 && $_SESSION['$u_role'] == 1) {
    header('Location: dashboard.php');
}

?>

<?php

$do = isset($_GET['do']) ? $_GET['do'] : 'manage';

//All post information
if ($do == 'manage') {

    // Datatable start
    ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Post Table</h3>
                    <p class="text-subtitle text-muted">All Posts</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    All Posts Information
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM post";
                            $result = mysqli_query($db, $query);
                            $serial = 0;

                            while ($row = mysqli_fetch_assoc($result)) {
                                $post_id = $row['p_id'];
                                $post_title = $row['p_title'];
                                $post_desc = $row['p_description'];
                                $post_img = $row['p_img'];
                                $category_id = $row['c_id'];
                                $user_id = $row['u_id'];
                                $post_date = $row['p_date'];
                                $post_status = $row['p_status'];

                                $serial++;

                                ?>

                                <tr>
                                    <td>
                                        <?php echo $serial; ?>
                                    </td>
                                    <td>
                                        <?php echo $post_date; ?>
                                    </td>
                                    <td>
                                        <img src="assets/images/posts/<?php echo $post_img; ?>" alt="" width="50" height="50"
                                            class="rounded">
                                    </td>
                                    <td>
                                        <?php echo $post_title; ?>
                                    </td>
                                    <td>
                                        <?php echo substr($post_desc, 0, 20) . "... Read more"; ?>
                                    </td>
                                    <td>

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

                                    </td>
                                    <td>

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

                                    </td>
                                    <td>

                                        <?php

                                        if ($post_status == 0) {
                                            echo '<span class="badge bg-danger">Inactiv</span>';
                                        }

                                        if ($post_status == 1) {
                                            echo '<span class="badge bg-success">Activ</span>';
                                        }

                                        ?>

                                    </td>
                                    <td>
                                        <!------------------------------------------------
                                             View All Post ar Eye, Edit & Delete Icon 
                                        ------------------------------------------------>
                                        <a href="#" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View Profile"><i class="fa fa-eye"></i></a>

                                        <a href="post.php?do=edit&edit_id=<?php echo $post_id; ?>" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>

                                        <a href="post.php?do=delete&delete_id=<?php echo $post_id; ?>" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>


                                <?php

                            }

                            ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <?php
    // Datatable end


} elseif ($do == 'add') {

    ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Input post data</h3>
                    <p class="text-subtitle text-muted">Give textual form controls like input upgrade with custom styles,
                        sizing, focus states, and more.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- validations start -->
        <!-- <section id="input-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Validation States</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p>You can indicate invalid and valid form fields with
                                        <code>.is-invalid</code> and
                                        <code>.is-valid</code>. Note that <code>.invalid-feedback</code> is also
                                        supported
                                        with these classes.
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="valid-state">Valid State</label>
                                    <input type="text" class="form-control is-valid" id="valid-state" placeholder="Valid"
                                        value="Valid" required>
                                    <div class="valid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is valid state.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="invalid-state">Invalid State</label>
                                    <input type="text" class="form-control is-invalid" id="invalid-state"
                                        placeholder="Invalid" value="Invalid" required>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- validations end -->

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fill up all of your post data</h4>
                </div>

                <!-----------------------------
                        Add New post Form Start
                    ----------------------------->
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ptitle">Post Title</label>
                                <input type="text" id="ptitle" class="form-control" placeholder="Post title here"
                                    name="ptitle">
                                <p><small class="text-muted">Inter your post title</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="pdesc">Post Description</label>
                                <textarea type="text" id="pdesc" class="form-control"
                                    placeholder="Enter your post description" name="pdesc"></textarea>
                                <p><small class="text-muted">Pleace enter your post description</small>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pcat">Post Categoryes</label>
                                <select class="form-select" id="pcat" name="pcat">

                                    <?php

                                    $drop_query = "SELECT * FROM category";
                                    $drop_result = mysqli_query($db, $drop_query);

                                    while ($row = mysqli_fetch_assoc($drop_result)) {
                                        $category_id = $row['c_id'];
                                        $category_name = $row['c_name'];
                                        $category_desc = $row['c_description'];

                                        ?>

                                    <option value="<?php echo $category_id; ?>">
                                        <?php echo $category_name; ?>
                                    </option>

                                    <?php

                                    }

                                    ?>

                                </select>
                                <p><small class="text-muted">Pleace click to select your post categoryes.</small></p>
                            </div>

                            <div class="form-group">
                                <label for="photo">Post feature photo</label>
                                <input type="file" id="photo" class="form-control" placeholder="Upload feature photo"
                                    name="p_image">
                                <p><small class="text-muted">Please upload jpg, jpeg or png image.</small>
                                </p>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="p_submit">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-------------------------
                Add New post Form End
            -------------------------->

                <!----------------------------------------
                    Add New Post Form ar php code Start
                ----------------------------------------->
            <?php

            $current_user = $_SESSION['$u_id'];

            if (isset($_POST['p_submit'])) {

                //Variabals bebohar kore Form ar inpute name deya holo.
                //$_POST & $_FILES  hosse Global Variabals.
                $post_title = $_POST['ptitle'];
                $post_desc = $_POST['pdesc'];
                $post_cat = $_POST['pcat'];
                $post_img = $_FILES['p_image']['name'];
                $tmp_name = $_FILES['p_image']['tmp_name'];


                //image ar seser extention neyar jonno function.
                $imgPart = explode('.', $_FILES['p_image']['name']);
                $extn = strtolower(end($imgPart));

                $imgArray = array('jpg', 'jpeg', 'png');

                //nirdisto kisu extention file/img upload koranor jonno ai condition use kora hoy.
                if (in_array($extn, $imgArray) === false) {
                    echo 'Please uplode a jpg, jpeg or png image';
                } else {

                    //Image upload kora somoy aki name ar duita img hole oi img ar sathe kisu Random number add koranor jonno ai function.
                    $rand = rand();
                    $updateImgName = $rand . $post_img;

                    //Upload kora image ta amar file a niya jaoyar jonno function.
                    move_uploaded_file($tmp_name, 'assets/images/posts/' . $updateImgName);


                    //Form ar data gulo submit kore database a joma korar jonno ai function. 
                    //akhane database ar Structure Name ar sathe Form ar name golo serial vabe miliye rakhte hoy.
                    $postAddQuery = "INSERT INTO post (p_title, p_description, p_img, c_id, u_id, p_date, p_status) VALUES ('$post_title', '$post_desc', '$updateImgName', '$post_cat', '$current_user', NOW(), '1')";

                    $postResult = mysqli_query($db, $postAddQuery);

                    if ($postResult) {

                        //Form submit korar pore page ta reload korar jonno ai function.
                        header('Location: post.php');
                    } else {

                        //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                        die('Data not inserted' . mysqli_error($db));
                    }

                }

            }

            ?>

            <!-----------------------------------------
                Add New Post Form ar php code End
            ----------------------------------------->

        </div>
    </section>
</div>

<?php

} elseif ($do == 'edit') {
    //Post Data edit korar jonno.
    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];

        $editQuery = "SELECT * FROM post WHERE p_id = '$edit_id'";
        $editResult = mysqli_query($db, $editQuery);

        while ($row = mysqli_fetch_assoc($editResult)) {
            $post_id = $row['p_id'];
            $post_title = $row['p_title'];
            $post_desc = $row['p_description'];
            $post_img = $row['p_img'];
            $cat_id = $row['c_id'];
            $user_id = $row['u_id'];
            $post_date = $row['p_date'];
            $post_status = $row['p_status'];

        }

        ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Post Table</h3>
                <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                    custom styles, sizing, focus states, and more.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Post Table</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update all of your post data</h4>
            </div>

            <!-----------------------------
            Update post Data Form Start
            ----------------------------->
            <form method="POST" enctype="multipart/form-data" action="post.php?do=update">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_title">Post Title</label>
                                <input type="text" id="p_title" class="form-control" placeholder="Post Title"
                                    name="p_title" value="<?php echo $post_title; ?>">
                                <p><small class="text-muted">Inter your post title</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="p_desc">Post Description</label>
                                <textarea type="text" id="p_desc" class="form-control"
                                    placeholder="enter your description" name="p_desc"
                                    value="<?php echo $post_desc; ?>"><?php echo $post_desc; ?></textarea>
                                <p><small class="text-muted">Pleace enter your post description</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="p_cat">Post Categoryes</label>
                                <select class="form-select" id="pcat" name="p_cat">

                                    <?php

                                    $drop_query = "SELECT * FROM category";
                                    $drop_result = mysqli_query($db, $drop_query);

                                    while ($row = mysqli_fetch_assoc($drop_result)) {
                                        $category_id = $row['c_id'];
                                        $category_name = $row['c_name'];
                                        $category_desc = $row['c_description'];

                                        ?>

                                    <option value="<?php echo $category_id; ?>" <?php if ($cat_id == $category_id) {
                                           echo "selected";
                                       } ?>>

                                        <?php echo $category_name; ?>

                                    </option>

                                    <?php

                                    }

                                    ?>

                                </select>
                                <p><small class="text-muted">Pleace click to select your Categoryes.</small></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_status">Post Status</label>
                                <select class="form-select" id="p_status" name="p_status">
                                    <option value="0" <?php if ($post_status == 0)
                                        echo 'selected' ?>>Inactive</option>
                                    <option value="1" <?php if ($post_status == 1)
                                        echo 'selected' ?>>Active</option>
                                </select>
                                <p><small class="text-muted">Pleace click to select your status.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <img src="assets/images/posts/<?php echo $post_img; ?>" alt="" width="100" height="100"
                                    style="display: block; margin-bottom: 10px;">
                                <label for="p_image">Post Festyre Image</label>
                                <input type="file" id="p_image" class="form-control" name="p_image">
                                <p><small class="text-muted">Please upload jpg, jpeg or png image.</small>
                                </p>
                            </div>

                            <input type="hidden" class="form-control" name="edit_id" value="<?php echo $post_id ?>">

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="update">Update
                                    Post</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-------------------------
            Update User Data Form End
            -------------------------->

                </div>
            </section>
        </div>

        <?php

    }


} elseif ($do == 'update') {
    //Update ar kaj

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['edit_id'];
        $title = mysqli_real_escape_string($db, $_POST['p_title']);
        $description = mysqli_real_escape_string($db, $_POST['p_desc']);
        $Categoryes = $_POST['p_cat'];
        $status = $_POST['p_status'];
        $image = $_FILES['p_image']['name'];
        $tmp_name = $_FILES['p_image']['tmp_name'];

        //image ar seser extention neyar jonno function.
        $imgPart = explode('.', $_FILES['p_image']['name']);
        $extn = strtolower(end($imgPart));

        $imgArray = array('jpg', 'jpeg', 'png');

        if (!empty($image)) {

            //nirdisto kisu extention file/img upload koranor jonno ai condition use kora hoy.
            if (in_array($extn, $imgArray) === true) {

                //Image upload kora somoy aki name ar duita img hole oi img ar sathe kisu Random number add koranor jonno ai function.
                $random = rand();
                $updateImgName = $random . $image;

                //Upload kora image ta amar file a niya jaoyar jonno function.
                move_uploaded_file($tmp_name, 'assets/images/posts/' . $updateImgName);

                $updateQuery = "UPDATE post SET p_title='$title', p_description='$description', p_img='$updateImgName', c_id='$Categoryes', p_status='$status' WHERE p_id='$id'";

                $up_Result = mysqli_query($db, $updateQuery);

                if ($up_Result) {

                    //Form submit korar pore page ta reload korar jonno ai function.
                    header('Location: post.php');

                } else {

                    //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                    die('Data not inserted (1)' . mysqli_error($db));

                }

            } else {

                echo 'Please uplode a jpg, jpeg or png image';

            }

        }

        if (empty($image)) {

            $updateQuery = "UPDATE post SET p_title='$title', p_description='$description', c_id='$Categoryes', p_status='$status' WHERE p_id='$id'";

            $up_Result = mysqli_query($db, $updateQuery);

            if ($up_Result) {

                //Form submit korar pore page ta reload korar jonno ai function.
                header('Location: post.php');

            } else {

                //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                die('Data not inserted (2)' . mysqli_error($db));

            }

        }

    }






} elseif ($do == 'delete') {

    //Post ar Data delete korar jonno.
    //URL theke data niye kaj korar jonno   if(isset($_GET[' '])){}   ai function.
    if (isset($_GET['delete_id'])) {
        $pd_id = $_GET['delete_id'];

        //Post ar image storage file theke delete korar jonno.
        $postPhotoName = "SELECT p_img FROM post WHERE p_id = '$pd_id'";
        $photoResult = mysqli_query($db, $postPhotoName);

        while ($pic = mysqli_fetch_assoc($photoResult)) {

            $p_image = $pic['p_img'];

        }

        //Storage theke delete korar jonno unlink function.
        unlink('assets/images/posts/' . $p_image);


        //Delete function diye delete kora hoyese,
        //Delete Function ta Function.php page a ase.
        //=============================================
        //table name
        // primary key
        // delete id
        // url 
        // database

        $tbl = 'post';
        $key = 'p_id';
        $d_id = $pd_id;
        $url = 'post.php';

        delete($tbl, $key, $d_id, $url, $db);

    }

}

?>

<?php
include "inc/footer.php";
?>
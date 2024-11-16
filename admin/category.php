<?php
include "inc/header.php";
?>

<!--======================== 
    Inner Custome CSS 
=========================-->
<style>
    .btn{
        padding: 8px 25px !important;
        color: #fff !important;
        background-color: #19596E !important;
        border: #19596E !important;
        transition: .5s !important;
    }
    .btn:hover{ 
        background-color: #2fe5e4  !important;
        border: #2fe5e4  !important;
        color: #fff !important;
        transition: .5s !important;
    }
</style>

<div class="page-heading">
    <h3>Blog Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-4">

                    <!-- ======== Category form Start ========== -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">Add New Category</label>
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" id="first-name-icon"
                                                            name="cat_name" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-icon">Category Description</label>
                                                    <div class="position-relative">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3" name="cat_description"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1"
                                                    name="cat_submit">Add</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <?php

                                //Form ar Data database a pathanor jonno  if(isset($_POST[' '])){}  ai function use kora hoy.
                                if (isset($_POST['cat_submit'])) {
                                    
                                    $cat_name = $_POST['cat_name'];
                                    $cat_des = $_POST['cat_description'];

                                    $query2 = "INSERT INTO category (c_name, c_description)
                                        VALUES ('$cat_name', '$cat_des')";

                                    $result2 = mysqli_query($db, $query2);

                                    if ($result2) {
                                        header('Location: category.php');
                                    } else {
                                        echo 'Opps! Data not inserted';
                                    }

                                }

                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- ======== Category form End ========== -->




                    <!-- ======== Update form for category Start ========== -->

                    <?php

                    //URL theke data niye kaj korar jonno   if(isset($_GET[' '])){}   ai function.
                    if (isset($_GET['edit_id'])) {

                        $edit_id = $_GET['edit_id'];

                        $query4 = "SELECT * FROM category WHERE c_id = '$edit_id'";
                        $result4 = mysqli_query($db, $query4);

                        while ($row = mysqli_fetch_assoc($result4)) {
                            $cat_id = $row['c_id'];
                            $cat_name = $row['c_name'];
                            $cat_desc = $row['c_description'];
                        }

                        ?>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Category</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" method="POST">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Edit Category Name</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" id="first-name-icon"
                                                                name="cat_name" value="<?php echo $cat_name; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Edit Category Description</label>
                                                        <div class="position-relative">

                                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                rows="3"
                                                                name="cat_description"><?php echo $cat_desc; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1"
                                                        name="cat_update">Update</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php

                                    if (isset($_POST['cat_update'])) {

                                        $cat_name = $_POST['cat_name'];
                                        $cat_description = $_POST['cat_description'];

                                        $query5 = "UPDATE category SET c_name = '$cat_name', c_description = '$cat_description' WHERE c_id = '$edit_id'";

                                        $result5 = mysqli_query($db, $query5);

                                        if ($result5) {
                                            header('Location: category.php');
                                        } else {
                                            echo 'Opps! Data not update.';
                                        }

                                    }

                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php

                    }

                    ?>


                    <!-- ======== Update form for category End ========== -->
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Category List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        //stape 01: query
                                        //stape 02: send the code or data to Database
                                        //stape 03: feedback
                                        
                                        $query = "SELECT * FROM category";
                                        $result = mysqli_query($db, $query);
                                        $serial = 0;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cat_id = $row['c_id'];
                                            $cat_name = $row['c_name'];
                                            $cat_desc = $row['c_description'];
                                            $serial++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $serial; ?>
                                                </td>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold ms-3 mb-0" style="margin-left: 0 !important;">
                                                            <?php echo $cat_name; ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">
                                                        <?php echo $cat_desc; ?>
                                                        
                                                    </p>
                                                </td>
                                                <th>
                                                    <a href="#" type="button" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Trash"><i class="fa fa-trash"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#delete<?php echo $cat_id; ?>"></i></a>

                                                    <a href="category.php?edit_id=<?php echo $cat_id; ?>" type="button"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                            class="fa fa-edit" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#edit"></i></a>
                                                </th>
                                            </tr>

                                            <!--=======Delete theme Modal =======-->
                                            <div class="modal fade text-left" id="delete<?php echo $cat_id; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title white" id="myModalLabel120">
                                                                Danger Modal
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to permanently remove this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">No</span>
                                                            </button>
                                                            <a href="category.php?delete_id=<?php echo $cat_id; ?>"
                                                                class="btn btn-danger ml-1">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php

                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/user/<?php echo $_SESSION['$u_img'];?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?php echo $_SESSION['$u_name']; ?></h5>
                            <h6 class="text-muted mb-0"><?php echo $_SESSION['$u_email']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>

    <?php

    //Category ar Data delete korar jonno.
    //URL theke data niye kaj korar jonno   if(isset($_GET[' '])){}   ai function.
    if (isset($_GET['delete_id'])) {

        $delete_id = $_GET['delete_id'];

        //stape 01: query
        //stape 02: send the code or data to Database
        //stape 03: feedback
    
        //Previous code stracture
        //=============================================
    
        //Delete function diye delete kora hoyese,
        //Delete Function ta Function.php page a ase.
        //=============================================
        //table name
        // primary key
        // delete id
        // url 
        // database
    
        $tbl = 'category';
        $key = 'c_id';
        $d_id = $delete_id;
        $url = 'category.php';

        delete($tbl, $key, $d_id, $url, $db);

    }

    ?>


</div>

<?php
include "inc/footer.php";
?>
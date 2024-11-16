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

if ($_SESSION['$u_role'] != 2){
    header('Location: dashboard.php');
}

?>

<?php

$do = isset($_GET['do']) ? $_GET['do'] : 'manage';

//All user information
if ($do == 'manage') {

    // Datatable start
    ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users Table</h3>
                    <p class="text-subtitle text-muted">All users list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View All Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    All User Information
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM user";
                            $result = mysqli_query($db, $query);
                            $serial = 0;

                            while ($row = mysqli_fetch_assoc($result)) {
                                $u_id = $row['u_id'];
                                $u_name = $row['u_name'];
                                $u_img = $row['u_img'];
                                $u_email = $row['u_email'];
                                $u_pass = $row['u_pass'];
                                $u_phone = $row['u_phone'];
                                $u_address = $row['u_address'];
                                $u_gender = $row['u_gender'];
                                $u_dob = $row['u_dob'];
                                $u_biodata = $row['u_biodata'];
                                $u_role = $row['u_role'];
                                $u_status = $row['u_status'];

                                $serial++;

                                ?>

                                <tr>
                                    <td>
                                        <?php echo $serial; ?>
                                    </td>
                                    <td>
                                        <img src="assets/images/user/<?php echo $u_img; ?>" alt="" width="50" height="50"
                                            class="rounded-circle">
                                    </td>
                                    <td>
                                        <?php echo $u_name; ?>
                                    </td>
                                    <td>
                                        <?php echo $u_email; ?>
                                    </td>
                                    <td>
                                        <?php echo $u_phone; ?>
                                    </td>
                                    <td>
                                        <?php

                                        if ($u_role == 0) {
                                            echo '<span class="badge bg-danger">Subscriber</span>';
                                        }

                                        if ($u_role == 1) {
                                            echo '<span class="badge bg-warning">Editor</span>';
                                        }

                                        if ($u_role == 2) {
                                            echo '<span class="badge bg-success">Admin</span>';
                                        }

                                        ?>
                                    </td>
                                    <td>

                                        <?php

                                        if ($u_status == 0) {
                                            echo '<span class="badge bg-danger">Inactiv</span>';
                                        }

                                        if ($u_status == 1) {
                                            echo '<span class="badge bg-success">Activ</span>';
                                        }

                                        ?>

                                    </td>
                                    <td>
                                        <!------------------------------------------------
                                             View All User ar Eye, Edit & Delete Icon 
                                        ------------------------------------------------>
                                        <a href="#" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View Profile"><i class="fa fa-eye"></i></a>

                                        <a href="users.php?do=edit&edit_id=<?php echo $u_id; ?>" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>

                                        <a href="users.php?do=delete&delete_id=<?php echo $u_id; ?>" type="button"
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
                    <h3>Input user data</h3>
                    <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                        custom styles,
                        sizing, focus states, and more.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New User</li>
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
                    <h4 class="card-title">Fill up all of your personal data</h4>
                </div>

                <!-----------------------------
                    Add New User Form Start
                ----------------------------->
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Full Name</label>
                                <input type="text" id="username" class="form-control" placeholder="user name"
                                    name="username">
                                <p><small class="text-muted">Inter your full name</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" id="useremail" class="form-control"
                                    placeholder="example@somthing.com" name="useremail">
                                <p><small class="text-muted">Inter your email</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="user Password"
                                    name="password">
                                <p><small class="text-muted">Make a password with number, special character and capital
                                        letters.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" placeholder="phone number"
                                    name="phone">
                                <p><small class="text-muted">Pleace enter your phone number with cuntry code.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea type="text" id="address" class="form-control" placeholder="enter your address"
                                    name="address"></textarea>
                                <p><small class="text-muted">Pleace enter your present address</small>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="biodata">Bio Data</label>
                                <textarea type="text" id="biodata" class="form-control"
                                    placeholder="enter your bio data" name="biodata"></textarea>
                                <p><small class="text-muted">Pleace enter your bio data</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-select" id="role" name="u_role">
                                    <option value="0" selected>Subscriber</option>
                                    <option value="1">Editor</option>
                                    <option value="2">Admin</option>
                                </select>
                                <p><small class="text-muted">Pleace click to select your gender.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                                <p><small class="text-muted">Pleace click to select your gender.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" class="form-control" name="dob">
                                <p><small class="text-muted">Pleace enter your Date of Birth.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="photo">Profile Image</label>
                                <input type="file" id="photo" class="form-control" name="u_image">
                                <p><small class="text-muted">Please upload jpg, jpeg or png image.</small>
                                </p>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="u_submit">Add
                                    User</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-------------------------
                Add New User Form End
            -------------------------->

                <!----------------------------------------
                    Add New User Form ar php code Start
                ----------------------------------------->
            <?php

            if (isset($_POST['u_submit'])) {

                //Variabals bebohar kore Form ar inpute name deya holo.
                //$_POST & $_FILES hosse Global Variabals.
                $user_name = $_POST['username'];
                $user_email = $_POST['useremail'];
                $user_password = $_POST['password'];
                $user_phone = $_POST['phone'];
                $user_address = $_POST['address'];
                $user_biodata = $_POST['biodata'];
                $user_role = $_POST['u_role'];
                $user_gender = $_POST['gender'];
                $user_dob = $_POST['dob'];
                $userImg = $_FILES['u_image']['name'];
                $tmp_name = $_FILES['u_image']['tmp_name'];


                //image ar seser extention neyar jonno function.
                $imgPart = explode('.', $_FILES['u_image']['name']);
                $extn = strtolower(end($imgPart));

                $imgArray = array('jpg', 'jpeg', 'png');

                //Required ar jonno backend ar function. 
                if (empty($user_name) || empty($user_email) || empty($user_password) || empty($userImg)) {
                    echo '<span class="alert alert-danger">Username, Email, Password are required!</span>';
                } else {

                    //nirdisto kisu extention file/img upload koranor jonno ai condition use kora hoy.
                    if (in_array($extn, $imgArray) === false) {
                        echo 'Please uplode a jpg, jpeg or png image';
                    } else {

                        //password converted korar jonno SHA1 use kora hoy.
                        $updatedPass = sha1($user_password);

                        //Image upload kora somoy aki name ar duita img hole oi img ar sathe kisu Random number add koranor jonno ai function.
                        $rand = rand();
                        $updateImgName = $rand . $userImg;

                        //Upload kora image ta amar file a niya jaoyar jonno function.
                        move_uploaded_file($tmp_name, 'assets/images/user/' . $updateImgName);


                        //Form ar data gulo submit kore database a joma korar jonno ai function. 
                        //akhane database ar Structure Name ar sathe Form ar name golo serial vabe miliye rakhte hoy.
                        $userAddQuery = "INSERT INTO user (u_name, u_img, u_email, u_pass, u_phone, u_address, u_gender, u_dob, u_biodata, u_role, u_status) VALUES ('$user_name', '$updateImgName', '$user_email', '$updatedPass', '$user_phone', '$user_address', '$user_gender', '$user_dob', '$user_biodata', '$user_role', '1')";

                        $userResult = mysqli_query($db, $userAddQuery);

                        if ($userResult) {

                            //Form submit korar pore page ta reload korar jonno ai function.
                            header('Location: users.php');
                        } else {

                            //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                            die('Data not inserted' . mysqli_error($db));
                        }

                    }

                }

            }

            ?>

            <!-----------------------------------------
                Add New User Form ar php code End
            ----------------------------------------->

        </div>
    </section>
</div>

<?php

} elseif ($do == 'edit') {
    //User Data edit korar jonno.
    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];

        $editQuery = "SELECT * FROM user WHERE u_id = '$edit_id'";
        $editResult = mysqli_query($db, $editQuery);

        while ($row = mysqli_fetch_assoc($editResult)) {
            $u_id = $row['u_id'];
            $u_name = $row['u_name'];
            $u_img = $row['u_img'];
            $u_email = $row['u_email'];
            $u_pass = $row['u_pass'];
            $u_phone = $row['u_phone'];
            $u_address = $row['u_address'];
            $u_gender = $row['u_gender'];
            $u_dob = $row['u_dob'];
            $u_biodata = $row['u_biodata'];
            $u_role = $row['u_role'];
            $u_status = $row['u_status'];

        }

        ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update users Table</h3>
                <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                    custom styles, sizing, focus states, and more.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update users Table</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update all of your personal data</h4>
            </div>

            <!-----------------------------
            Update User Data Form Start
            ----------------------------->
            <form method="POST" enctype="multipart/form-data" action="users.php?do=update">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Full Name</label>
                                <input type="text" id="username" class="form-control" placeholder="user name"
                                    name="username" value="<?php echo $u_name; ?>">
                                <p><small class="text-muted">Inter your full name</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" id="useremail" class="form-control"
                                    placeholder="example@somthing.com" name="useremail" value="<?php echo $u_email; ?>">
                                <p><small class="text-muted">Inter your email</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="user Password"
                                    name="password">
                                <p><small class="text-muted">Make a password with number, special character and capital
                                        letters.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" placeholder="phone number"
                                    name="phone" value="<?php echo $u_phone; ?>">
                                <p><small class="text-muted">Pleace enter your phone number with cuntry code.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea type="text" id="address" class="form-control" placeholder="enter your address"
                                    name="address"
                                    value="<?php echo $u_address; ?>"><?php echo $u_address; ?></textarea>
                                <p><small class="text-muted">Pleace enter your present address</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="biodata">Bio Data</label>
                                <textarea type="text" id="biodata" class="form-control"
                                    placeholder="enter your bio data" name="biodata"
                                    value="<?php echo $u_biodata; ?>"><?php echo $u_biodata; ?></textarea>
                                <p><small class="text-muted">Pleace enter your bio data</small>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-select" id="role" name="u_role">
                                    <option value="0" <?php if ($u_role == 0)
                                        echo 'selected' ?>>Subscriber</option>
                                    <option value="1" <?php if ($u_role == 1)
                                        echo 'selected' ?>>Editor</option>
                                    <option value="2" <?php if ($u_role == 2)
                                        echo 'selected' ?>>Admin</option>
                                </select>
                                <p><small class="text-muted">Pleace click to select your gender.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="u_status">User Status</label>
                                <select class="form-select" id="u_status" name="u_status">
                                    <option value="0" <?php if ($u_status == 0)
                                        echo 'selected' ?>>Inactive</option>
                                    <option value="1" <?php if ($u_status == 1)
                                        echo 'selected' ?>>Active</option>
                                </select>
                                <p><small class="text-muted">Pleace click to select your gender.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">Select your gender</option>
                                    <option value="male" <?php if ($u_gender == 'Male')
                                        echo 'selected' ?>>Male</option>
                                    <option value="female" <?php if ($u_gender == 'Female')
                                        echo 'selected' ?>>Female
                                    </option>
                                    <option value="others" <?php if ($u_gender == 'Others')
                                        echo 'selected' ?>>Others
                                    </option>
                                </select>
                                <p><small class="text-muted">Pleace click to select your gender.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" class="form-control" name="dob"
                                    value="<?php echo $u_dob; ?>">
                                <p><small class="text-muted">Pleace enter your Date of Birth.</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <img src="assets/images/user/<?php echo $u_img; ?>" alt="" width="100" height="100"
                                    style="display: block; margin-bottom: 10px;">
                                <label for="photo">Profile Image</label>
                                <input type="file" id="photo" class="form-control" name="u_image">
                                <p><small class="text-muted">Please upload jpg, jpeg or png image.</small>
                                </p>
                            </div>

                            <input type="hidden" class="form-control" name="edit_id" value="<?php echo $u_id ?>">

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="update">Update
                                    User</button>
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

        $u_id = $_POST['edit_id'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $biodata = $_POST['biodata'];
        $u_role = $_POST['u_role'];
        $u_status = $_POST['u_status'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $u_image = $_FILES['u_image']['name'];
        $tmp_name = $_FILES['u_image']['tmp_name'];

        //image ar seser extention neyar jonno function.
        $imgPart = explode('.', $_FILES['u_image']['name']);
        $extn = strtolower(end($imgPart));

        $imgArray = array('jpg', 'jpeg', 'png');

        if (!empty($password) && !empty($u_image)) {

            $hashpass = sha1($password);

            //nirdisto kisu extention file/img upload koranor jonno ai condition use kora hoy.
            if (in_array($extn, $imgArray) === true) {

                //Image upload kora somoy aki name ar duita img hole oi img ar sathe kisu Random number add koranor jonno ai function.
                $rand = rand();
                $updateImgName = $rand . $u_image;

                //Upload kora image ta amar file a niya jaoyar jonno function.
                move_uploaded_file($tmp_name, 'assets/images/user/' . $updateImgName);

                $updateQuery = "UPDATE user SET u_name='$username', u_img='$updateImgName', u_email='$useremail', u_pass='$hashpass', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob', u_biodata='$biodata', u_role='$u_role', u_status='$u_status' WHERE u_id='$u_id'";

                $up_Result = mysqli_query($db, $updateQuery);

                if ($up_Result) {

                    //Form submit korar pore page ta reload korar jonno ai function.
                    header('Location: users.php');

                } else {

                    //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                    die('Data not inserted (1)' . mysqli_error($db));

                }

            } else {

                echo 'Please uplode a jpg, jpeg or png image';

            }

        }
        if (empty($password) && !empty($u_image)){

            //nirdisto kisu extention file/img upload koranor jonno ai condition use kora hoy.
            if (in_array($extn, $imgArray) === true) {

                //Image upload kora somoy aki name ar duita img hole oi img ar sathe kisu Random number add koranor jonno ai function.
                $rand = rand();
                $updateImgName = $rand . $u_image;

                //Upload kora image ta amar file a niya jaoyar jonno function.
                move_uploaded_file($tmp_name, 'assets/images/user/' . $updateImgName);

                $updateQuery = "UPDATE user SET u_name='$username', u_img='$updateImgName', u_email='$useremail', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob', u_biodata='$biodata', u_role='$u_role', u_status='$u_status' WHERE u_id='$u_id'";

                $up_Result = mysqli_query($db, $updateQuery);

                if ($up_Result) {

                    //Form submit korar pore page ta reload korar jonno ai function.
                    header('Location: users.php');

                } else {

                    //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                    die('Data not inserted (2)' . mysqli_error($db));

                }

            } else {

                echo 'Please uplode a jpg, jpeg or png image';

            }

        }
        if (!empty($password) && empty($u_image)){

            $hashpass = sha1($password);

                $updateQuery = "UPDATE user SET u_name='$username', u_email='$useremail', u_pass='$hashpass', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob', u_biodata='$biodata', u_role='$u_role', u_status='$u_status' WHERE u_id='$u_id'";

                $up_Result = mysqli_query($db, $updateQuery);

                if ($up_Result) {

                    //Form submit korar pore page ta reload korar jonno ai function.
                    header('Location: users.php');

                } else {

                    //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                    die('Data not inserted (3)' . mysqli_error($db));

                }

        }
        if (empty($password) && empty($u_image)){

                $updateQuery = "UPDATE user SET u_name='$username', u_email='$useremail', u_phone='$phone', u_address='$address', u_gender='$gender', u_dob='$dob', u_biodata='$biodata', u_role='$u_role', u_status='$u_status' WHERE u_id='$u_id'";

                $up_Result = mysqli_query($db, $updateQuery);

                if ($up_Result) {

                    //Form submit korar pore page ta reload korar jonno ai function.
                    header('Location: users.php');

                } else {

                    //Data insert na hole error massage dekhanor jonno ai function use kora hoy.
                    die('Data not inserted (4)' . mysqli_error($db));

                }

        }

    }






} elseif ($do == 'delete') {

    //User Data delete korar jonno.
    //URL theke data niye kaj korar jonno   if(isset($_GET[' '])){}   ai function.
    if (isset($_GET['delete_id'])) {
        $ud_id = $_GET['delete_id'];

        //user image storage file theke delete korar jonno.
        $userphotoname = "SELECT u_img FROM user WHERE u_id = '$ud_id'";
        $photoResult = mysqli_query($db, $userphotoname);

        while ($pic = mysqli_fetch_assoc($photoResult)) {

            $u_image = $pic['u_img'];

        }

        //Storage theke delete korar jonno unlink function.
        unlink('assets/images/user/' . $u_image);


        //Delete function diye delete kora hoyese,
        //Delete Function ta Function.php page a ase.
        //=============================================
        //table name
        // primary key
        // delete id
        // url 
        // database

        $tbl = 'user';
        $key = 'u_id';
        $d_id = $ud_id;
        $url = 'users.php';

        delete($tbl, $key, $d_id, $url, $db);

    }

}

?>

<?php
include "inc/footer.php";
?>
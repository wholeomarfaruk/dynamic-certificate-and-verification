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

    .pagination .page-item.active .page-link {
        background-color: #19596E !important;
        border-color: #19596E !important;
        box-shadow: 0 2px 5px rgba(67, 94, 190, .3) !important;
    }
</style>

<?php

include "inc/header.php";

if ($_SESSION['$u_role'] != 2) {
    header('Location: dashboard.php');
}

?>

<?php

$do = isset($_GET['do']) ? $_GET['do'] : 'edit';

//All user information
if ($do == 'edit') {
    //User Data edit korar jonno.

    $fetchData = [];
    $editQuery = "SELECT * FROM certificate ";
    $editResult = mysqli_query($db, $editQuery);

    while ($row = mysqli_fetch_assoc($editResult)) {
        $fetchData[$row['name']] = $row['value'];

    }
    ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update certificate Table</h3>
                    <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                        custom styles, sizing, focus states, and more.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update certificate Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update all of student personal data</h4>
                </div>

                <!-----------------------------
            Update Student Data Form Start
            ----------------------------->
            <form method="POST" enctype="multipart/form-data" action="certificate.php?do=update">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Full Name -->
                                <div class="form-group">
                                    <label for="institute_name">Institute Name</label>
                                    <input type="text" id="institute_name" class="form-control" placeholder="Full Name"
                                        name="institute_name" value="<?php echo $fetchData['institute_name']; ?>">
                                </div>
                                <!-- Institute Name -->
                                <div class="form-group">
                                    <label for="institute_code">Institute Code</label>
                                    <input type="text" id="institute_code" class="form-control" placeholder="Institute Code"
                                        name="institute_code" value="<?php echo $fetchData['institute_code']; ?>">
                                </div>
                                <!-- Institute Registration -->
                                <div class="form-group">
                                    <label for="institute_reg_no">Institute Registration</label>
                                    <input type="text" id="institute_reg_no" class="form-control"
                                        placeholder="Institute Registration" name="institute_reg_no"
                                        value="<?php echo $fetchData['institute_reg_no']; ?>">
                                </div>
                                <!-- License Number -->
                                <div class="form-group">
                                    <label for="license_no">License Number</label>
                                    <input type="text" id="license_no" class="form-control"
                                        placeholder="Institute Registration" name="license_no"
                                        value="<?php echo $fetchData['license_no']; ?>">
                                </div>
                                <!-- QR Code Image -->
                                <div class="form-group">
                                    <img src="../upload/certificate/<?php echo (isset($fetchData['qr_code']) ? $fetchData['qr_code'] : ''); ?>"
                                        alt="Student Image" width="100" height="100"
                                        style="display: block; margin-bottom: 10px;">
                                    <label for="qr_code">QR Code</label>
                                    <input type="file" id="qr_code" class="form-control" name="qr_code">
                                </div>
                            </div>

                            <div class="col-md-6">


                                <!-- Chief Sign Image -->
                                <div class="form-group">
                                    <img src="../upload/certificate/<?php echo (isset($fetchData['chief_sign']) ? $fetchData['chief_sign'] : ''); ?>"
                                        alt="Student Image" width="200" height="100"
                                        style="display: block; margin-bottom: 10px;">
                                    <label for="chief_sign">Chief Sign</label>
                                    <input type="file" id="chief_sign" class="form-control" name="chief_sign">
                                </div>

                                <!-- manager sign Image -->
                                <div class="form-group">
                                    <img src="../upload/certificate/<?php echo (isset($fetchData['manager_sign']) ? $fetchData['manager_sign'] : ''); ?>"
                                        alt="Student Image" width="200" height="100"
                                        style="display: block; margin-bottom: 10px;">
                                    <label for="manager_sign">Manager Sign</label>
                                    <input type="file" id="manager_sign" class="form-control" name="manager_sign">
                                </div>


                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Update
                                    Certificate</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-------------------------
            Update student Data Form End
            -------------------------->

            </div>
        </section>
    </div>

    <?php




} elseif ($do == 'update') {
    //Update ar kaj

    // Continue handling the update logic
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        foreach ($_POST as $key => $value) {
            # code...
            $updateQuery = "UPDATE certificate SET 
            value = '$value' WHERE name='$key'";
            // // Execute the update query
            $updateResult = mysqli_query($db, $updateQuery);
            if (!$updateResult) {
                echo "Error: " . mysqli_error($db);
                break;
            }
        }

        foreach ($_FILES as $key => $value) {
            # code...
            if (!empty($_FILES[$key]['name'])) {
                $photo = $_FILES[$key]['name'];
                $tmp_name = $_FILES[$key]['tmp_name'];
    
                // Generate a unique name for the image file
                $imgPart = explode('.', $photo);
                $extn = strtolower(end($imgPart));
                $imgArray = ['jpg', 'jpeg', 'png'];
    
                // Validate the image extension
                if (in_array($extn, $imgArray)) {
                    $photo_name = uniqid() . '.' . $extn;
                    $uploadPath = "../upload/certificate/" . $photo_name;
    
                    // Move the uploaded file to the server directory
                    $imageupload=move_uploaded_file($tmp_name, $uploadPath);
                    if($imageupload){
                        $updateQuery = "UPDATE certificate SET 
                        value = '$photo_name' WHERE name='$key'";
                        // // Execute the update query
                        $updateResult = mysqli_query($db, $updateQuery);
                        if (!$updateResult) {
                            echo "Error: " . mysqli_error($db);
                            break;
                        }
                    }
                    
                } else {
                    // Invalid file extension
                    // echo "Invalid file type. Only JPG, JPEG, PNG files are allowed.";
                    exit;
                }
            } 
        }
        header('Location: certificate.php');
        exit();

    }




    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);




} elseif ($do == 'delete') {

    $resultstore;
    //User Data delete korar jonno.

    // Assuming you have connected to the database already
    if (isset($_GET['delete_id'])) {
        $student_id = $_GET['delete_id'];

        // Fetch the student's image name from the database
        $studentImageQuery = "SELECT photo FROM certificate WHERE id = '$student_id'";
        $photoResult = mysqli_query($db, $studentImageQuery);

        if ($photoResult && mysqli_num_rows($photoResult) > 0) {
            // Fetch the image name
            $student = mysqli_fetch_assoc($photoResult);
            $photoName = $student['photo'];

            // Delete the image from storage
            if (file_exists('../upload/student/' . $photoName)) {
                unlink('../upload/student/' . $photoName); // Delete the image file
            }
        }

        // Now, delete the student's record from the database
        $deleteQuery = "DELETE FROM certificate WHERE id = '$student_id'";
        $deleteResult = mysqli_query($db, $deleteQuery);
        $resultstore = $deleteResult;

    } else {
        // If no student ID was passed, redirect back
        header('Location: certificate.php');
        exit();
    }

    ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>certificate Table</h3>
                    <p class="text-subtitle text-muted">Delete Student</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delete Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <?php
            // Check if the deletion was successful
            if ($resultstore) {
                // Display success message and back button
                echo "<div class='alert alert-success'>Student data has been successfully deleted.</div>";
                echo "<a href='certificate.php' class='btn btn-primary'>Back to certificate List</a>";
            } else {
                // If deletion failed, show error message
                echo "<div class='alert alert-danger'>Error: Unable to delete student data.</div>";
                echo "<a href='certificate.php' class='btn btn-secondary'>Back to certificate List</a>";
            }
            ?>
        </section>
    </div>
    <?php


}

?>

<?php
include "inc/footer.php";
?>
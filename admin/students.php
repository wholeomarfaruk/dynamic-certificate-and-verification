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

$do = isset($_GET['do']) ? $_GET['do'] : 'manage';

//All user information
if ($do == 'manage') {

    // Datatable start
    ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Students Table</h3>
                    <p class="text-subtitle text-muted">All Students list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View All Students</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    All Students Information
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Registration</th>
                                <th>Roll</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM students";
                            $result = mysqli_query($db, $query);
                            $serial = 0;

                            while ($row = mysqli_fetch_assoc($result)) {
                                $student_id = $row['id'];
                                $u_role = $row['role'];
                                $u_status = $row['status'];
                                $full_name = $row['full_name'];
                                $father_name = $row['father_name'];
                                $mother_name = $row['mother_name'];
                                $dob = $row['dob'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $address = $row['address'];
                                $gender = $row['gender'];
                                $grade = $row['grade'];
                                $recommendation = $row['recommendation'];
                                $course_name = $row['course_name'];
                                $institute_name = $row['institute_name'];
                                $institute_code = $row['institute_code'];
                                $session_start = $row['session_start'];
                                $session_end = $row['session_end'];
                                $photo = $row['photo'];
                                $roll_no = $row['roll_no'];
                                $reg_no = $row['reg_no'];

                                $serial++;


                                ?>
                                <tr>
                                    <td>
                                        <?php echo $serial; ?>
                                    </td>
                                    <td>
                                        <img src="../upload/student/<?php echo $photo; ?>" alt="" width="50" height="50"
                                            class="rounded-circle">
                                    </td>
                                    <td>
                                        <?php echo $full_name; ?>
                                    </td>
                                    <td>
                                        <?php echo $phone; ?>
                                    </td>
                                    <td>
                                        <?php echo $reg_no; ?>
                                    </td>
                                    <td>
                                        <?php echo $roll_no; ?>
                                    </td>
                                    <td>

                                        <?php

                                        if ($u_status == 0) {
                                            echo '<span class="badge bg-danger">Inactive</span>';
                                        }

                                        if ($u_status == 1) {
                                            echo '<span class="badge bg-success">Active</span>';
                                        }

                                        ?>

                                    </td>
                                    <td>
                                        <!------------------------------------------------
                                             View All User ar Eye, Edit & Delete Icon 
                                        ------------------------------------------------>
                                        <a class=" btn  mb-2 btn-sm" href="students.php?do=view&view_id=<?php echo $student_id; ?>" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile"><i
                                                class="fa fa-eye"></i></a>

                                        <a class=" btn   mb-2 btn-sm" href="students.php?do=edit&edit_id=<?php echo $student_id; ?>" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>

                                        <a class=" btn   mb-2 btn-sm" href="students.php?do=delete&delete_id=<?php echo $student_id; ?>" type="button"
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


} elseif ($do == 'view') {
    if (isset($_GET['do']) && $_GET['do'] == 'view' && isset($_GET['view_id'])) {
        $student_id = $_GET['view_id'];

        // Fetch student data based on student_id
        $query = "SELECT * FROM students WHERE id = $student_id";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_assoc($result);
        } else {
            echo "Student not found.";
            exit;
        }
    }
    $written = (float) (isset($student['written_mark'])) ? htmlspecialchars($student['written_mark']) : 0;
    $practical = (float) (isset($student['practical_mark'])) ? htmlspecialchars($student['practical_mark']) : 0;
    $viva = (float) (isset($student['viva_mark'])) ? htmlspecialchars($student['viva_mark']) : 0;
    $total_sum = $written + $practical + $viva;
    // Datatable start
    ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Student Table</h3>
                    <p class="text-subtitle text-muted">Student Profile View</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Student Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section ">
            <div class="card">
                <div class="card-header">
                    <h4>Student Profile</h4>
                </div>
                <div class="card-body mt-4">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="../upload/student/<?php echo $student['photo']; ?>" alt="Profile Photo"
                                class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            <h5 class="mt-3"><?php echo $student['full_name']; ?></h5>
                            <p class="text-muted text-uppercase"><?php echo $student['gender']; ?></p>
                        </div>
                        <div class="col-md-8 ">
                            <h5 class="mb-3">Personal Information</h5>
                            <div class="row ">
                                <div class="col-md-6">
                                    <p><strong>Father's Name:</strong> <?php echo $student['father_name']; ?></p>
                                    <p><strong>Mother's Name:</strong> <?php echo $student['mother_name']; ?></p>
                                    <p><strong>Date of Birth:</strong> <?php echo $student['dob']; ?></p>
                                    <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
                                    <p><strong>Phone:</strong> <?php echo $student['phone']; ?></p>
                                    <p><strong>Address:</strong> <?php echo $student['address']; ?></p>
                                    <p><strong>Course:</strong> <?php echo $student['course_name']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Serial No:</strong> <?php echo $student['serial_no']; ?></p>
                                    <p><strong>Roll No:</strong> <?php echo $student['roll_no']; ?></p>
                                    <p><strong>Registration No:</strong> <?php echo $student['reg_no']; ?></p>
                                    <p><strong>Roll No:</strong> <?php echo $student['roll_no']; ?></p>
                                    <p><strong>Institute:</strong> <?php echo $student['institute_name']; ?></p>
                                    <p><strong>Institute Code:</strong> <?php echo $student['institute_code']; ?></p>
                                    <p><strong>Recommendation:</strong> <?php echo $student['recommendation']; ?></p>
                                </div>
                            </div>

                            <h5 class="mt-4 mb-3">Session Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Session Start:</strong> <?php echo $student['session_start']; ?></p>
                                    <p><strong>Session End:</strong> <?php echo $student['session_end']; ?></p>
                                    <p><strong>Test Issue Date:</strong> <?php echo $student['test_issue_date']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Test Date:</strong> <?php echo $student['test_date']; ?></p>
                                    <p><strong>Course Issue Date:</strong> <?php echo $student['course_issue_date']; ?></p>
                                </div>
                            </div>
                            <h5 class="mt-4 mb-3">Marks</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Written:</strong> <?php echo $student['written_mark']; ?></p>
                                    <p><strong>Practical:</strong> <?php echo $student['practical_mark']; ?></p>
                                    <p><strong>Full Mark:</strong> <?php echo $student['total_mark']; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Viva:</strong> <?php echo $student['viva_mark']; ?></p>
                                    <p><strong>Grade:</strong> <?php echo $student['grade']; ?></p>
                                    <p><strong>Total Mark:</strong> <?php echo $total_sum; ?></p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="students.php" class="btn btn-secondary mb-3">Back to Students List</a>
                                <a href="generate_certificate_pdf.php?roll=<?php echo $student['roll_no']; ?>&reg=<?php echo $student['reg_no']; ?>"
                                    class="btn btn-secondary mb-3">Download Certificate</a>
                            </div>
                        </div>
                    </div>
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
                    <h3>Input student data</h3>
                    <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                        custom styles,
                        sizing, focus states, and more.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fill up all of Student personal data</h4>
                </div>

                <!-----------------------------
                    Add New Student Form Start
                ----------------------------->
            <form method="POST" enctype="multipart/form-data" id="add_new_student">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Full Name -->
                                <div class="form-group">
                                    <label for="st_full_name">Full Name</label>
                                    <input required type="text" id="st_full_name" class="form-control"
                                        placeholder="Student name" name="st_full_name">
                                    <p><small class="text-muted">Enter student full name</small></p>
                                </div>

                                <!-- Father's Name -->
                                <div class="form-group">
                                    <label for="st_father_name">Father's Name</label>
                                    <input required type="text" id="st_father_name" class="form-control"
                                        placeholder="Father's name" name="st_father_name">
                                    <p><small class="text-muted">Enter student father's name</small></p>
                                </div>

                                <!-- Mother's Name -->
                                <div class="form-group">
                                    <label for="st_mother_name">Mother's Name</label>
                                    <input required type="text" id="st_mother_name" class="form-control"
                                        placeholder="Mother's name" name="st_mother_name">
                                    <p><small class="text-muted">Enter student mother's name</small></p>
                                </div>

                                <!-- Date of Birth -->
                                <div class="form-group">
                                    <label for="st_dob">Date of Birth</label>
                                    <input type="date" id="st_dob" class="form-control" name="st_dob">
                                    <p><small class="text-muted">Please enter student's date of birth.</small></p>
                                </div>

                                <!-- Student Email -->
                                <div class="form-group">
                                    <label for="st_email">Student Email</label>
                                    <input type="email" id="st_email" class="form-control"
                                        placeholder="example@something.com" name="st_email">
                                    <p><small class="text-muted">Enter student email</small></p>
                                </div>

                                <!-- Student Phone -->
                                <div class="form-group">
                                    <label for="st_phone">Student Phone</label>
                                    <input required type="text" id="st_phone" class="form-control" placeholder="Phone number"
                                        name="st_phone">
                                    <p><small class="text-muted">Please enter student's phone number with country
                                            code.</small></p>
                                </div>

                                <!-- Gender -->
                                <div class="form-group">
                                    <label for="st_gender">Gender</label>
                                    <select class="form-select" id="st_gender" name="st_gender">
                                        <option value="0">Select student gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <p><small class="text-muted">Please select student's gender.</small></p>
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label for="st_address">Address</label>
                                    <textarea type="text" id="st_address" class="form-control"
                                        placeholder="Enter student address" name="st_address"></textarea>
                                    <p><small class="text-muted">Please enter student's present address</small></p>
                                </div>


                                <!-- Institute Name -->
                                <div class="form-group">
                                    <label for="institute_name">Institute Name</label>
                                    <input required type="text" id="institute_name" class="form-control"
                                        placeholder="Institute name" name="institute_name">
                                    <p><small class="text-muted">Enter the institute's name</small></p>
                                </div>

                                <!-- Institute Code -->
                                <div class="form-group">
                                    <label for="institute_code">Institute Code</label>
                                    <input required type="text" id="institute_code" class="form-control"
                                        placeholder="Institute code" name="institute_code">
                                    <p><small class="text-muted">Enter the institute code</small></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Course Name -->
                                <div class="form-group">
                                    <label for="course_name">Course Name</label>
                                    <input  type="text" id="course_name" class="form-control"
                                        placeholder="Course name" name="course_name">
                                    <p><small class="text-muted">Enter the course's name</small></p>
                                </div>

                                <!-- Serial no -->
                                <div class="form-group">
                                    <label for="serial_no">Serial No.</label>
                                    <input required type="text" id="serial_no" class="form-control" placeholder="Serial No"
                                        name="serial_no">
                                    <p><small class="text-muted">Enter the Serial No</small></p>
                                </div>
                                <!-- Roll no -->
                                <div class="form-group">
                                    <label for="roll_no">Roll No.</label>
                                    <input required type="text" id="roll_no" class="form-control" placeholder="Roll No"
                                        name="roll_no">
                                    <p><small class="text-muted">Enter the Roll No</small></p>
                                </div>
                                <!-- Registration no -->
                                <div class="form-group">
                                    <label for="reg_no">Registration No.</label>
                                    <input required type="text" id="reg_no" class="form-control"
                                        placeholder="Registration No" name="reg_no">
                                    <p><small class="text-muted">Enter the registration no</small></p>
                                </div>


                                <!-- Test Issue Date Time -->
                                <div class="form-group">
                                    <label for="test_issue_date">Test Issue Date</label>
                                    <input type="date" id="test_issue_date" class="form-control" name="test_issue_date">
                                    <p><small class="text-muted">Please enter the Test Certificate issue date.</small></p>
                                </div>
                                <!-- Course Issue Date Time -->
                                <div class="form-group">
                                    <label for="course_issue_date">Course Issue Date</label>
                                    <input type="date" id="course_issue_date" class="form-control" name="course_issue_date">
                                    <p><small class="text-muted">Please enter the Course Certificate issue date.</small></p>
                                </div>
                                <!-- Session Start Time -->
                                <div class="form-group">
                                    <label for="session_start_time">Session Start Time</label>
                                    <input type="date" id="session_start_time" class="form-control"
                                        name="session_start_time">
                                    <p><small class="text-muted">Please enter the session start date.</small></p>
                                </div>

                                <!-- Session End Time -->
                                <div class="form-group">
                                    <label for="session_end_time">Session End Time</label>
                                    <input type="date" id="session_end_time" class="form-control" name="session_end_time">
                                    <p><small class="text-muted">Please enter the session end date.</small></p>
                                </div>


                                <!-- Recommendation -->
                                <div class="form-group">
                                    <label for="st_recommendation">Recommendation</label>
                                    <input  type="text" id="st_recommendation" class="form-control"
                                        placeholder="Recommendation" name="st_recommendation">
                                    <p><small class="text-muted">Enter recommendation</small></p>
                                </div>

                                <!-- Profile Image -->
                                <div class="form-group">
                                    <label for="st_photo">Profile Image</label>
                                    <input type="file" id="st_photo" class="form-control" name="st_photo">
                                    <p><small class="text-muted">Please upload a jpg, jpeg, or png image.</small></p>
                                </div>


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Other Academic Information Fields -->

                                <!-- Mark Section -->
                                <div class="form-group mt-4">
                                    <h4 class="text-muted">Marks</h4>
                                </div>
                                <!-- Test Date -->
                                <div class="form-group">
                                    <label for="test_date">Test Date</label>
                                    <input type="date" id="test_date" class="form-control" name="test_date">
                                    <p><small class="text-muted">Please enter the test date.</small></p>
                                </div>
                                <!-- Grade -->
                                <div class="form-group">
                                    <label for="st_grade">Grade</label>
                                    <input  type="text" id="st_grade" class="form-control" placeholder="Grade"
                                        name="st_grade">
                                    <p><small class="text-muted">Enter the student's grade</small></p>
                                </div>


                                <!-- Written Mark -->
                                <div class="form-group">
                                    <label for="written_mark">Written Mark</label>
                                    <input type="text" id="written_mark" class="form-control"
                                        placeholder="Written mark" name="written_mark">
                                    <p><small class="text-muted">Enter the written mark</small></p>
                                </div>

                                <!-- Practical Mark -->
                                <div class="form-group">
                                    <label for="practical_mark">Practical Mark</label>
                                    <input type="text" id="practical_mark" class="form-control"
                                        placeholder="Practical mark" name="practical_mark">
                                    <p><small class="text-muted">Enter the practical mark</small></p>
                                </div>

                                <!-- Viva Mark -->
                                <div class="form-group">
                                    <label for="viva_mark">Viva Mark</label>
                                    <input type="text" id="viva_mark" class="form-control" placeholder="Viva mark"
                                        name="viva_mark">
                                    <p><small class="text-muted">Enter the viva mark</small></p>
                                </div>

                                <!-- Total Mark -->
                                <div class="form-group">
                                    <label for="total_mark">Full Mark</label>
                                    <input type="text" id="total_mark" class="form-control"
                                        placeholder="Full mark" name="total_mark">
                                    <p><small class="text-muted">Enter the Full mark</small></p>
                                </div>
                                <div class="mb-3">
                                <div class="alert alert-warning text-dark" role="alert">
                                <strong>Note:</strong> The total marks are automatically calculated.</div>
                                </div>


                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" name="st_submit">Add
                                Student</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>


                <!-------------------------
                Add New student Form End
            -------------------------->

                <!----------------------------------------
                    Add New student Form ar php code Start
                ----------------------------------------->
            <?php
            if (isset($_POST['st_submit'])) {
                $full_name = $_POST['st_full_name'];
                $father_name = $_POST['st_father_name'];
                $mother_name = $_POST['st_mother_name'];
                $dob = $_POST['st_dob'];
                $email = $_POST['st_email'];
                $phone = $_POST['st_phone'];
                $gender = $_POST['st_gender'];
                $address = $_POST['st_address'];
                $course_name = $_POST['course_name'];
                $institute_name = $_POST['institute_name'];
                $institute_code = $_POST['institute_code'];
                $session_start = $_POST['session_start_time'];
                $session_end = $_POST['session_end_time'];
                $grade = $_POST['st_grade'];
                $recommendation = $_POST['st_recommendation'];
                $serial_no = $_POST['serial_no'];
                $roll_no = $_POST['roll_no'];
                $reg_no = $_POST['reg_no'];
                $test_issue_date = $_POST['test_issue_date'];
                $course_issue_date = $_POST['course_issue_date'];
                $written_mark = $_POST['written_mark'];
                $practical_mark = $_POST['practical_mark'];
                $viva_mark = $_POST['viva_mark'];
                $total_mark = $_POST['total_mark'];
                $test_date = $_POST['test_date'];
                $photo = $_FILES['st_photo']['name'];
                $tmp_name = $_FILES['st_photo']['tmp_name'];

                $img_ext = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
                $valid_exts = ['jpg', 'jpeg', 'png'];
                $errors = [];

                if (empty($full_name) || empty($email) || empty($course_name) || empty($institute_name)) {
                    $errors[] = 'Required fields are missing!';
                }

                if (!in_array($img_ext, $valid_exts)) {
                    $errors[] = 'Please upload a jpg, jpeg, or png image.';
                }

                if (empty($errors)) {
                    $random_num = rand();
                    $photo_name = $random_num . "_" . $photo;
                    move_uploaded_file($tmp_name, '../upload/student/' . $photo_name);

                    $query = "INSERT INTO students 
            (full_name, father_name, mother_name, dob, email, phone, gender, address, course_name, institute_name, institute_code, session_start, session_end, grade, recommendation, serial_no, roll_no, reg_no, test_issue_date, written_mark, practical_mark, viva_mark, total_mark, photo,test_date,course_issue_date) 
            VALUES 
            ('$full_name', '$father_name', '$mother_name', '$dob', '$email', '$phone', '$gender', '$address', '$course_name', '$institute_name', '$institute_code', '$session_start', '$session_end', '$grade', '$recommendation', '$serial_no', '$roll_no', '$reg_no', '$test_issue_date', '$written_mark', '$practical_mark', '$viva_mark', '$total_mark', '$photo_name','$test_date','$course_issue_date')";

                    $result = mysqli_query($db, $query);

                    if ($result) {
                        header('Location: students.php');
                    } else {
                        echo '<span class="alert alert-danger">Data not inserted: ' . mysqli_error($db) . '</span>';
                    }
                } else {
                    foreach ($errors as $error) {
                        echo '<span class="alert alert-danger">' . $error . '</span><br>';
                    }
                }
            }

            ?>


            <!-----------------------------------------
                Add New student Form ar php code End
            ----------------------------------------->

        </div>
    </section>
</div>

<?php

} elseif ($do == 'edit') {
    //User Data edit korar jonno.
    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];

        $editQuery = "SELECT * FROM students WHERE id = '$edit_id'";
        $editResult = mysqli_query($db, $editQuery);

        while ($row = mysqli_fetch_assoc($editResult)) {
            $student_id = $row['id'];
            $u_role = $row['role'];
            $u_status = $row['status'];
            $full_name = $row['full_name'];
            $father_name = $row['father_name'];
            $mother_name = $row['mother_name'];
            $dob = $row['dob'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
            $gender = $row['gender'];
            $grade = $row['grade'];
            $recommendation = $row['recommendation'];
            $course_name = $row['course_name'];
            $institute_name = $row['institute_name'];
            $institute_code = $row['institute_code'];
            $session_start = $row['session_start'];
            $session_end = $row['session_end'];
            $photo = $row['photo'];
            $serial_no = $row['serial_no'];
            $roll_no = $row['roll_no'];
            $reg_no = $row['reg_no'];
            $test_issue_date = $row['test_issue_date'];
            $course_issue_date = $row['course_issue_date'];
            $written_mark = $row['written_mark'];
            $practical_mark = $row['practical_mark'];
            $viva_mark = $row['viva_mark'];
            $total_mark = $row['total_mark'];
            $test_date = $row['test_date'];
        }
        ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Students Table</h3>
                <p class="text-subtitle text-muted">Give textual form controls like input upgrade with
                    custom styles, sizing, focus states, and more.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Students Table</li>
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
            <form method="POST" enctype="multipart/form-data" action="students.php?do=update">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Full Name -->
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" id="full_name" class="form-control" placeholder="Full Name"
                                            name="full_name" value="<?php echo $full_name; ?>">
                                    </div>
                                    <!-- Father's Name -->
                                    <div class="form-group">
                                        <label for="father_name">Father's Name</label>
                                        <input type="text" id="father_name" class="form-control" placeholder="Father's Name"
                                            name="father_name" value="<?php echo $father_name; ?>">
                                    </div>
                                    <!-- Mother's Name -->
                                    <div class="form-group">
                                        <label for="mother_name">Mother's Name</label>
                                        <input type="text" id="mother_name" class="form-control" placeholder="Mother's Name"
                                            name="mother_name" value="<?php echo $mother_name; ?>">
                                    </div>
                                    <!-- Date of Birth -->
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" id="dob" class="form-control" name="dob" value="<?php echo $dob; ?>">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="example@example.com"
                                            name="email" value="<?php echo $email; ?>">
                                    </div>
                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" class="form-control" placeholder="Phone Number"
                                            name="phone" value="<?php echo $phone; ?>">
                                    </div>
                                    <!-- Address -->
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" class="form-control" placeholder="Address"
                                            name="address"><?php echo $address; ?></textarea>
                                    </div>
                                    <!-- Course Name -->
                                    <div class="form-group">
                                        <label for="course_name">Course Name</label>
                                        <input type="text" id="course_name" class="form-control" placeholder="Course Name"
                                            name="course_name" value="<?php echo $course_name; ?>">
                                    </div>
                                    <!-- Gender -->
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="Male" <?php if ($gender == 'Male')
                                                echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if ($gender == 'Female')
                                                echo 'selected'; ?>>Female
                                            </option>
                                            <option value="Others" <?php if ($gender == 'Others')
                                                echo 'selected'; ?>>Others
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Institute Name -->
                                    <div class="form-group">
                                        <label for="institute_name">Institute Name</label>
                                        <input type="text" id="institute_name" class="form-control" placeholder="Institute Name"
                                            name="institute_name" value="<?php echo $institute_name; ?>">
                                    </div>
                                    <!-- Institute Code -->
                                    <div class="form-group">
                                        <label for="institute_code">Institute Code</label>
                                        <input type="text" id="institute_code" class="form-control" placeholder="Institute Code"
                                            name="institute_code" value="<?php echo $institute_code; ?>">
                                    </div>

                                    <!-- Institute Code -->
                                    <div class="form-group">
                                        <label for="recommendation">Recommendation</label>
                                        <input type="text" id="recommendation" class="form-control" placeholder="Recommendation"
                                            name="recommendation" value="<?php echo $recommendation; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <!-- Serial no -->
                                    <div class="form-group">
                                        <label for="serial_no">Serial No.</label>
                                        <input required type="text" id="serial_no" class="form-control" placeholder="Serial No"
                                            name="serial_no" value="<?php echo $serial_no; ?>">
                                        <p><small class="text-muted">Enter the Serial No</small></p>
                                    </div>
                                    <!-- Roll no -->
                                    <div class="form-group">
                                        <label for="roll_no">Roll No.</label>
                                        <input required type="text" id="roll_no" class="form-control" placeholder="Roll No"
                                            name="roll_no" value="<?php echo $roll_no; ?>">
                                        <p><small class="text-muted">Enter the Roll No</small></p>
                                    </div>
                                    <!-- Registration no -->
                                    <div class="form-group">
                                        <label for="reg_no">Registration No.</label>
                                        <input required type="text" id="reg_no" class="form-control"
                                            placeholder="Registration No" name="reg_no" value="<?php echo $reg_no; ?>">
                                        <p><small class="text-muted">Enter the registration no</small></p>
                                    </div>


                                    <!-- Test Issue Date Time -->
                                    <div class="form-group">
                                        <label for="test_issue_date">Test Issue Date</label>
                                        <input type="date" id="test_issue_date" class="form-control" name="test_issue_date"
                                            value="<?php echo $test_issue_date; ?>">
                                        <p><small class="text-muted">Please enter the certificate issue date.</small></p>
                                    </div>
                                    <!-- Course Issue Date Time -->
                                    <div class="form-group">
                                        <label for="course_issue_date">Course Issue Date</label>
                                        <input type="date" id="course_issue_date" class="form-control" name="course_issue_date"
                                            value="<?php echo $course_issue_date; ?>">
                                        <p><small class="text-muted">Please enter the certificate issue date.</small></p>
                                    </div>


                                    <!-- Session Start -->
                                    <div class="form-group">
                                        <label for="session_start">Session Start</label>
                                        <input type="date" id="session_start" class="form-control" name="session_start"
                                            value="<?php echo $session_start; ?>">
                                    </div>
                                    <!-- Session End -->
                                    <div class="form-group">
                                        <label for="session_end">Session End</label>
                                        <input type="date" id="session_end" class="form-control" name="session_end"
                                            value="<?php echo $session_end; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="st_status">Student Status</label>
                                        <select class="form-select" id="st_status" name="st_status">
                                            <option value="0" <?php if ($u_status == 0)
                                                echo 'selected' ?>>Inactive</option>
                                                <option value="1" <?php if ($u_status == 1)
                                                echo 'selected' ?>>Active</option>
                                            </select>
                                            <p><small class="text-muted">Pleace click to select your gender.</small></p>
                                        </div>

                                        <!-- Profile Image -->
                                        <div class="form-group">
                                            <img src="../upload/student/<?php echo $photo; ?>" alt="Student Image" width="100"
                                            height="100" style="display: block; margin-bottom: 10px;">
                                        <label for="photo">Profile Image</label>
                                        <input type="file" id="photo" class="form-control" name="photo">
                                        <input type="hidden" id="photo" class="form-control" name="current_photo"
                                            value="<?php echo $photo; ?>">
                                    </div>

                                    <input type="hidden" name="edit_id" value="<?php echo $student_id; ?>">


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Other Academic Information Fields -->

                                    <!-- Mark Section -->
                                    <div class="form-group mt-4">
                                        <h4 class="text-muted">Marks</h4>
                                    </div>
                                    <!-- Test Date -->
                                    <div class="form-group">
                                        <label for="test_date">Test Date</label>
                                        <input value="<?php echo $test_date; ?>" type="date" id="test_date" class="form-control"
                                            name="test_date">
                                        <p><small class="text-muted">Please enter the test date.</small></p>
                                    </div>
                                    <!-- Grade -->
                                    <div class="form-group">
                                        <label for="grade">Grade</label>
                                        <input value="<?php echo $grade; ?>"  type="text" id="grade"
                                            class="form-control" placeholder="Grade" name="grade">
                                        <p><small class="text-muted">Enter the student's grade</small></p>
                                    </div>


                                    <!-- Written Mark -->
                                    <div class="form-group">
                                        <label for="written_mark">Written Mark</label>
                                        <input value="<?php echo $written_mark; ?>"  type="text" id="written_mark"
                                            class="form-control" placeholder="Written mark" name="written_mark">
                                        <p><small class="text-muted">Enter the written mark</small></p>
                                    </div>

                                    <!-- Practical Mark -->
                                    <div class="form-group">
                                        <label for="practical_mark">Practical Mark</label>
                                        <input value="<?php echo $practical_mark; ?>"  type="text" id="practical_mark"
                                            class="form-control" placeholder="Practical mark" name="practical_mark">
                                        <p><small class="text-muted">Enter the practical mark</small></p>
                                    </div>

                                    <!-- Viva Mark -->
                                    <div class="form-group">
                                        <label for="viva_mark">Viva Mark</label>
                                        <input value="<?php echo $viva_mark; ?>"  type="text" id="viva_mark"
                                            class="form-control" placeholder="Viva mark" name="viva_mark">
                                        <p><small class="text-muted">Enter the viva mark</small></p>
                                    </div>

                                    <!-- Total Mark -->
                                    <div class="form-group">
                                        <label for="total_mark">Full Mark</label>
                                        <input value="<?php echo $total_mark; ?>"  type="text" id="total_mark"
                                            class="form-control" placeholder="Total mark" name="total_mark">
                                        <p><small class="text-muted">Enter the total mark</small></p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" name="update">Update
                                Student</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </form>
                    <!-------------------------
                                        Update student Data Form End
                                        -------------------------->



                </div>
            </section>
        </div>
        <?php

    }


} elseif ($do == 'update') {
    //Update ar kaj

    // Continue handling the update logic
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_id = $_POST['edit_id'];
        $full_name = $_POST['full_name'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $grade = $_POST['grade'];
        $course_name = $_POST['course_name'];
        $institute_name = $_POST['institute_name'];
        $institute_code = $_POST['institute_code'];
        $session_start = $_POST['session_start'];
        $session_end = $_POST['session_end'];
        $recommendation = $_POST['recommendation'];
        $serial_no = $_POST['serial_no'];
        $roll_no = $_POST['roll_no'];
        $reg_no = $_POST['reg_no'];
        $test_issue_date = $_POST['issue_date'];
        $course_issue_date = $_POST['issue_date'];
        $st_status = $_POST['st_status'];
        $written_mark = $_POST['written_mark'];
        $practical_mark = $_POST['practical_mark'];
        $viva_mark = $_POST['viva_mark'];
        $total_mark = $_POST['total_mark'];
        $test_date = $_POST['test_date'];


        // Check if a new photo is uploaded
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];
            $tmp_name = $_FILES['photo']['tmp_name'];

            // Generate a unique name for the image file
            $imgPart = explode('.', $photo);
            $extn = strtolower(end($imgPart));
            $imgArray = ['jpg', 'jpeg', 'png'];

            // Validate the image extension
            if (in_array($extn, $imgArray)) {
                $photo_name = uniqid() . '.' . $extn;
                $uploadPath = "../upload/student/" . $photo_name;

                // Move the uploaded file to the server directory
                move_uploaded_file($tmp_name, $uploadPath);
            } else {
                // Invalid file extension
                echo "Invalid file type. Only JPG, JPEG, PNG files are allowed.";
                exit;
            }
        } else {
            // If no new photo, use the current photo
            $photo_name = $_POST['current_photo']; // Retain the previous photo
        }

        // Update query
        $updateQuery = "UPDATE students SET 
        full_name = '$full_name', 
        father_name = '$father_name', 
        mother_name = '$mother_name', 
        dob = '$dob', 
        email = '$email', 
        phone = '$phone', 
        address = '$address', 
        gender = '$gender', 
        grade = '$grade', 
        course_name = '$course_name', 
        institute_name = '$institute_name', 
        institute_code = '$institute_code', 
        session_start = '$session_start', 
        session_end = '$session_end', 
        recommendation = '$recommendation', 
        photo = '$photo_name',
        serial_no = '$serial_no',
        roll_no = '$roll_no',
        reg_no = '$reg_no',
        test_issue_date = '$test_issue_date',
        course_issue_date = '$course_issue_date',
        written_mark= '$written_mark',
        practical_mark= '$practical_mark',
        viva_mark= '$viva_mark',
        total_mark= '$total_mark',
        test_date= '$test_date',
        status = '$st_status'
    WHERE id = '$student_id'";

        // Execute the update query
        $updateResult = mysqli_query($db, $updateQuery);
        if ($updateResult) {
            echo "Student details updated successfully!";
            header("Location: students.php"); // Redirect back to the student list page
            exit;
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }






} elseif ($do == 'delete') {

    $resultstore;
    //User Data delete korar jonno.

    // Assuming you have connected to the database already
    if (isset($_GET['delete_id'])) {
        $student_id = $_GET['delete_id'];

        // Fetch the student's image name from the database
        $studentImageQuery = "SELECT photo FROM students WHERE id = '$student_id'";
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
        $deleteQuery = "DELETE FROM students WHERE id = '$student_id'";
        $deleteResult = mysqli_query($db, $deleteQuery);
        $resultstore = $deleteResult;

    } else {
        // If no student ID was passed, redirect back
        header('Location: students.php');
        exit();
    }

    ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Students Table</h3>
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
                echo "<a href='students.php' class='btn btn-primary'>Back to Students List</a>";
            } else {
                // If deletion failed, show error message
                echo "<div class='alert alert-danger'>Error: Unable to delete student data.</div>";
                echo "<a href='students.php' class='btn btn-secondary'>Back to Students List</a>";
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
<script>
    function downloadCertificate($roll, $reg) {

        // AJAX request to update the status in the database
        $.ajax({
            url: "generate_certificate_pdf.php", // Create this PHP script for updating the status
            type: "POST",
            dataType: "json",
            data: {
                roll: $roll,
                reg: $reg,
            },
            success: function () {

            },
            error: function (error) {
                console.log(error);
            },
        });
    }</script>
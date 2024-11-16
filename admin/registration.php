<?php

include "inc/connection.php";
ob_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">

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
    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="../index.php?no_page=1"><img src="assets/images/logo/bloglogo.png" style="height: 75px;" alt="Registration Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <!--========================
                      Registration Form Start
                    =========================-->
                    <form method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email" name="u_email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="pass">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Confirm Password"
                                name="cpass">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Sign Up"
                            name="signup">
                    </form>

                    <!--==================================== 
                    Registration data insert php code start
                    =====================================-->
                    <?php

                    //Form ar Data database a pathanor jonno  if(isset($_POST[' '])){}  ai function use kora hoy.
                    if (isset($_POST['signup'])) {

                        //akhane  mysqli_real_escape_string($db, $_POST[' ']);  ai function ta use kore sohoje HACK hoy na.
                        $u_name = mysqli_real_escape_string($db, $_POST['username']);
                        $u_email = mysqli_real_escape_string($db, $_POST['u_email']);
                        $u_pass = mysqli_real_escape_string($db, $_POST['pass']);
                        $u_cpass = mysqli_real_escape_string($db, $_POST['cpass']);

                        $updatedPass = sha1($u_pass);

                        //Required ar jonno backend ar function. 
                        if (empty($u_name) || empty($u_email) || empty($u_pass)) {
                            echo '<span style="color: red;">Username, Email, Password are required!</span>';
                        } else {

                            if ($u_pass == $u_cpass) {
                                $regQuery = "INSERT INTO user (u_name, u_email, u_pass) VALUE ('$u_name', '$u_email', '$updatedPass')";

                                $regResult = mysqli_query($db, $regQuery);

                                if ($regResult) {
                                    header('Location: index.php');
                                } else {
                                    echo 'Opps! Data not inserted, Please try again.';
                                }
                            } else {
                                echo '<span style="color: red;">password does not match with confirm password.</span>';
                            }

                        }

                    }

                    ?>

                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="index.php"
                                class="font-bold">Login</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img style="width:100%; height:100%;" src="assets/images/bg/reg.jpg">
                </div>
            </div>
        </div>

    </div>

    <?php ob_end_flush(); ?>
</body>

</html>
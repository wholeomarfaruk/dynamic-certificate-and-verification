<?php

include "inc/connection.php";
ob_start();
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
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
                        <a href="../index.php?no_page=1"><img src="assets/images/logo/bloglogo.png" style="height: 75px;" alt="Login Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Enter Email"
                                name="u_email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Sign In"
                            name="signin">
                    </form>

                    <!--=================
                    Login php code start
                    ==================-->

                    <?php

                    //Form ar Data database a pathanor jonno  if(isset($_POST[' '])){}  ai function use kora hoy.
                    if (isset($_POST['signin'])) {

                        $email = $_POST['u_email'];
                        $password = $_POST['password'];

                        //Required korar jonno   empty( ){ }   Function.
                        if (empty($email)) {

                            echo '<span style="color: red;">Email is Required.</span>';

                        } elseif (empty($password)) {

                            echo '<span style="color: red;">Password is Required.</span>';

                        } elseif (!empty($email) && !empty($password)) {

                            //password convert korar jonno  SHA1();  Function.
                            $hasPass = sha1($password);

                            $loginQuery = "SELECT * FROM user WHERE u_email = '$email'";
                            $loginResult = mysqli_query($db, $loginQuery);

                            while ($row = mysqli_fetch_assoc($loginResult)) {
                                $_SESSION['$u_id'] = $row['u_id'];
                                $_SESSION['$u_name'] = $row['u_name'];
                                $_SESSION['$u_img'] = $row['u_img'];
                                $_SESSION['$u_email'] = $row['u_email'];
                                $u_pass = $row['u_pass'];
                                $_SESSION['$u_phone'] = $row['u_phone'];
                                $_SESSION['$u_address'] = $row['u_address'];
                                $_SESSION['$u_gender'] = $row['u_gender'];
                                $_SESSION['$u_dob'] = $row['u_dob'];
                                $_SESSION['$u_biodata'] = $row['u_biodata'];
                                $_SESSION['$u_role'] = $row['u_role'];
                                $_SESSION['$u_status'] = $row['u_status'];

                                if ($email == $_SESSION['$u_email'] && $hasPass == $u_pass) {

                                    header('Location: dashboard.php');

                                } else {

                                    header('Location: index.php');

                                }

                            }

                        }

                    }

                    ?>

                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="registration.php"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="#">Forgot password?</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img style="width:100%; height:100%;" src="assets/images/bg/log.jpg">
                </div>
            </div>
        </div>

    </div>

    <?php ob_end_flush(); ?>

</body>

</html>
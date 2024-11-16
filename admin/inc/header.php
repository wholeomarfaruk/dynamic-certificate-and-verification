<?php

//Page Linkup
include "connection.php";
include "function.php";

//page relode deya jonno.
ob_start();

session_start();

if (empty($_SESSION['$u_email'])) {
    header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Site name -->
    <title>Dashboard - Sunsea Overseas Training Centre</title>

    <!-- Fave Icons -->
    <link rel="shortcut icon" href="/admin/assets/images/logo/faveicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/admin/assets/images/logo/faveicon.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <!--===== Datatable CSS Linkup =====-->
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <!--===== Profile.php CSS Linkup =====-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/profile.css">

    <!--===== font-awesome ======-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="../index.php?no_page=1"><img src="assets/images/logo/bloglogo.png"
                                    style="height: 75px;" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <!--================== 
                            For Student
                        ===================-->

                        <?php

                        if ($_SESSION['$u_role'] == 2) {

                            ?>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person"></i>
                                    <span>Student</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="students.php?do=add">Add Student</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="students.php?do=manage">View All Student</a>
                                    </li>
                                </ul>
                            </li>

                            <?php

                        }

                        ?>

                        <!--================== 
                            For User
                        ===================-->

                        <?php

                        if ($_SESSION['$u_role'] == 2) {

                            ?>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person"></i>
                                    <span>User</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="users.php?do=add">Add New User</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="users.php?do=manage">View All Users</a>
                                    </li>
                                </ul>
                            </li>

                            <?php

                        }

                        ?>



                        <!--================== 
                            For Certificate
                        ===================-->

                        <?php

                        if ($_SESSION['$u_role'] == 2) {

                            ?>

                            <li class="sidebar-item">
                                <a href="certificate.php" class='sidebar-link'>
                                    <i class="fa fa-certificate"></i>
                                    <span>Certificate</span>
                                </a>
                            </li>

                            <?php

                        }

                        ?>

                        <!--================== 
                            For Profile
                        ===================-->

                        <li class="sidebar-item  ">
                            <a href="profile.php" class='sidebar-link'>
                                <i class="fa fa-user-circle"></i>
                                <span>Profile</span>
                            </a>
                        </li>


                        <!--================== 
                            For Logout
                        ===================-->

                        <li class="sidebar-item  ">
                            <a href="inc/logout.php" class='sidebar-link'>
                                <i class="fa fa-sign-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
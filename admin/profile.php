<?php
    include "inc/header.php";


    $logged_in_id = $_SESSION['$u_id'];

    $profileQuery = "SELECT * FROM user WHERE u_id = '$logged_in_id'";

    $profileResult = mysqli_query($db, $profileQuery);

    while ($row = mysqli_fetch_assoc($profileResult)) {
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
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

            <div class="container emp-profile">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="assets/images/user/<?php echo $u_img;?>"
                                    alt="" style="height: 200px;"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                <h5>
                                    <?php echo $u_name;?>
                                </h5>
                                <h6>
                                    Web Developer and Designer
                                </h6>
                                <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary  profile-edit-btn" href="users.php?do=edit&edit_id=<?php echo $u_id;?>">Edit Profile</a>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                                <p>WORK LINK</p>
                                <a href="">Website Link</a><br />
                                <a href="">Bootsnipp Profile</a><br />
                                <a href="">Bootply Profile</a>
                                <p>SKILLS</p>
                                <a href="">Web Designer</a><br />
                                <a href="">Web Developer</a><br />
                                <a href="">WordPress</a><br />
                                <a href="">WooCommerce</a><br />
                                <a href="">PHP, .Net</a><br />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_name;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_email;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_phone;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_address;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_gender;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Date of Birth</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_dob;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Biodata</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $u_biodata;?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Experience</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Expert</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Hourly Rate</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>10$/hr</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Total Projects</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>230</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>English Level</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Expert</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Availability</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>6 months</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Your Bio</label><br />
                                            <p>Your detail description</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>

<?php
include "inc/footer.php";
?>
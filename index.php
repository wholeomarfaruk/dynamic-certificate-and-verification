<?php

include "header.php";

?>
<style>
    
#banner{
    background: url(images/banner-1.jpg) no-repeat 0 0;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    padding: 5rem 0;
}
/* @media screen and (min-width: 768px) {
    #banner{
    background-position: top center;
    }
} */
.banner-titel h1{
    background: rgba(240, 243, 243, 0.6);
    padding: 10px;
    display: inline-block;
    margin: auto;
    
}
.logo{
    width: 130px;
    max-width: 250px;
    display: block;
    margin: auto;
}
.text{
    font-weight: 400;
}
.verify{

    display: block;
    margin: auto;
     cursor: pointer;
}
.verify-box{
    width: 40%;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
    padding: 20px;
    margin: auto;
}
@media screen and (max-width: 768px) {
    .verify-box{
        width: 95%;
    }
}
</style>

<div id="banner" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 ">
                <div class="banner-titel">
                    <h1 class="titel py-5 px-3">SUNSEA OVERSEAS TRAINING CENTRE</h1>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top End -->
<div class="mt-3 logo-box">
    <img class="logo" src="images/logo.jpg" alt="">
</div>
<div class="container mt-3 mb-5 verify-box rounded">
    <h2 class="mb-3 text-center text-primary text">Verify Your Certificate</h2>
    <form class="verify-form" action="verify.php" method="GET">
        <div class="mb-3">
            <!-- <label for="" class="form-label">Roll Number</label> -->
            <input name="reg" type="text" placeholder="Registation Number" class="form-control roll" id="verifing"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <!-- <label for="" class="form-label reg">Registation Number</label> -->
            <input name="roll" type="text" placeholder="Roll Number" class="form-control" id="verifing">
        </div>
        <button type="submit" class=" rounded btn btn-primary verify">Verify</button>
    </form>
</div>


<?php

include "footer.php";

?>
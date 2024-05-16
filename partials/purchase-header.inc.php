<?php include "Database/config.inc.php"; 
if(isset($_GET['bname'])){
    $title="Showroom || ". $_GET['bname'];
}else{
    $title=explode(".", basename($_SERVER['PHP_SELF']))[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-capitalize">MR CAR || <?php echo $title; ?></title>
    <!-- owl carousel css -->
    <!--  <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="position-relative">
    <!-- Scrolltop button starts -->
    <div id="scroll-top">
        <div class="scroll-top-img position-relative">
            <div class="headlight"></div>
            <img class="car-wheel-2" src="images/transparent-wheel.png" alt="">
            <img class="car-body" src="images/transparent-car-btn.png" alt="">
            <img class="car-wheel-1" src="images/transparent-wheel.png" alt="">
        </div>
    </div>
    <!-- Scrolltop button ends -->

    <!-- header section starts -->
    <section id="" class="purchase-header header">
    <?php include 'partials/navbar.inc.php'; ?>

        <?php
        if (basename($_SERVER['PHP_SELF']) == 'edit-user-profile.php') {
            ?>
            <div class="model-text" id="profile__text" style="width:auto">
                <h1>MRCAR</h1>
                <h5>UPDATE YOUR CREDENTIALS</h5>
            </div>
            <?php
        } else if (basename($_SERVER['PHP_SELF']) == 'showroom.php') {
            ?>
                <video loop autoplay muted class="bg-video">
                    <source src="videos/19supra.mp4" type="video/mp4">
                </video>
                <div class="model-text" id="profile__text" style="width:auto">
                    <h1>MRCAR</h1>
                    <h5>View Our All Showrooms</h5>
                </div>
            <?php
        } else if (basename($_SERVER['PHP_SELF']) == 'single-showroom.php') {
            ?>
                    <video loop autoplay muted class="bg-video">
                        <source src="videos/video1.mp4" type="video/mp4">
                    </video>
                    <div class="model-text" id="profile__text" style="width:auto">
                        <h1 class="text-uppercase">WELCOME TO <?php echo $bname; ?></h1>
                    </div>
            <?php
        } else if (basename($_SERVER['PHP_SELF']) == 'contact.php') {
            ?>
                        <div class="profile text-dark" style="width:auto">
                            <div class="card" style="width: 25rem;">
                                <div class="card-header">
                                    <h5 class="card-title">MRCAR CONTACT FORM</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" id="contact_form">
                                        <div class="form-group mb-2 ">
                                            <input type="text" name="contact_name" class="mt-3 mb-2 form-control" placeholder="Enter name">
                                            <input type="email" name="contact_email" class=" mb-2 form-control" placeholder="Enter E-mail">
                                            <textarea style="resize:none" name="contact_msg" id="" class="form-control" placeholder="Place your message"></textarea>
                                        </div>
                                        <button class="btn btn-sm btn-primary" type="submit">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
            <?php
        } else {
            ?>
                        <div class="model-text" id="profile__text" style="width:auto">
                            <h1>MRCAR</h1>
                            <h5>Purchase your dream car</h5>
                        </div>
            <?php
        }
        ?>

    </section>
    <!-- header section ends -->
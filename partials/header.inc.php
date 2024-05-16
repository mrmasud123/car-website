<?php include 'Database/config.inc.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-capitalize">MR CAR || <?php echo $title; ?></title>

    <!--  <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
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
    <section class="header" id="header">
        <?php include 'partials/navbar.inc.php'; ?>
        <div class="header-moto">
                <h2 class="text-light">Powerfull,Fun and</h2>
                <h1 class="text-light">Fierce To</h1>
                <h1 class="fs-1" style="color:red">Drive</h1>
                <span class="text-light">Real Poise, Real Power, Real Performance</span><br>
                <a href="purchase.php" class="btn btn-primary bordered testBtn">Book a Test Drive? <i class="fa fa-car"></i></a>


            </div>

    </section>
    <!-- header section ends -->

    
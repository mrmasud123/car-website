<?php include 'Database/config.inc.php'; 
    $title= explode(".", basename($_SERVER['PHP_SELF']))[0];
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

<body>
    
    <!-- header section starts -->
    <section id="" class="model-header header">
        <!-- Scrolltop button starts -->
    <div id="scroll-top" >
        <div class="scroll-top-img position-relative">
            <div class="headlight"></div>
            <img class="car-wheel-2" src="images/transparent-wheel.png" alt="">
            <img class="car-body" src="images/transparent-car-btn.png" alt="">
            <img class="car-wheel-1" src="images/transparent-wheel.png" alt="">
        </div>
    </div>
    <!-- Scrolltop button ends -->
        <video loop autoplay muted class="bg-video">
            <source src="videos/19supra.mp4" type="video/mp4">
        </video>
        <div class="model-text">
            <h1>MRCAR</h1>
            <h3>WELCOME TO INVENTORY</h3>
        </div>
        <!---->
        <?php include 'partials/navbar.inc.php'; ?>
        
    </section>
    <!-- header section ends -->
<?php
include 'Database/config.inc.php';

    $DB->sql("SELECT * from sub_model JOIN image_tbl on sub_model.sub_model_id=image_tbl.sub_model_car_id
                                        JOIN sub_model_specs on sub_model.sub_model_id=sub_model_specs.sub_model_car_id JOIN sub_model_title on sub_model.sub_model_id=sub_model_title.sub_model_car_id WHERE image_tbl.sub_model_car_id=$mid AND sub_model_specs.sub_model_car_id=$mid AND sub_model_title.sub_model_car_id=$mid");
    
    $car_data = $DB->getResult();
    $title= $car_data[0][0]['sub_model_name'];
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
    <section class="model-header header">

        <video muted autoplay loop class="bg-video">
        <?php 
        foreach ($car_data as $c_info) {
        foreach ($c_info as $dt) {
            echo '<source src="videos/'.$dt['video'].'" type="video/mp4">';
            }
        }
    ?>
        </video>
        <div class="model-text">
            <h1>MRCAR</h1>
            <h3>EXPLORE THE NEW ERA OF MRCAR</h3>
        </div>
        <!---->
        <?php include 'partials/navbar.inc.php'; ?>

    </section>
<!-- header section ends -->
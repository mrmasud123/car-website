<?php
$title= explode(".", basename($_SERVER['PHP_SELF']))[0];
include 'partials/header.inc.php';
?>

<!-- Latest car section starts -->
<section id="latest_car" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 latest-car-head d-flex align-items-center justify-content-md-between">

                <div class="latest-car-head-left col-5">
                    <div class="latest-car-head-moto mb-3">
                        <h1 class="ms-3 mb-4">Take a journey</h1>
                        <h2 class="ms-3">Feel the best</h2>
                    </div>
                    <div class="latest-car-head-about">
                        <?php
                        $DB->select('sub_model', "*", null, null, "sub_model_id DESC");
                        $car_data = $DB->getResult();
                        $latest_car_id = $car_data[0]['sub_model_id'];
                        $DB->sql("SELECT sub_model.*,sub_model_specs.*,image_tbl.car_img from sub_model JOIN sub_model_specs ON sub_model.sub_model_id=sub_model_specs.sub_model_car_id JOIN image_tbl ON sub_model.sub_model_id=image_tbl.sub_model_car_id WHERE sub_model.sub_model_id=$latest_car_id");
                        $latest_car_data = $DB->getResult();
                        ?>
                        <span>
                            <?php echo $latest_car_data[0][0]['description']; ?>
                        </span>
                    </div>
                </div>
                <div class="latest-car-head-right col-5">
                    <img src="images/car_img/<?php echo $latest_car_data[0][0]['car_img'] ?>" alt="">
                </div>
            </div>
            <div class="col-12">
                <div
                    class="latest-car-configur d-flex align-items-center justify-content justify-content-between mt-5 mb-5">
                    <div class="agility configur d-flex align-items-center justify-content-md-between">
                        <h1>R8</h1>
                        <div>
                            <h4>Agility</h4>
                            <span>Built for speed with 5.2 liter V10 engine</span>
                        </div>
                    </div>
                    <div class="performance configur d-flex align-items-center justify-content-md-between">
                        <i class="fa fa-dashboard"></i>
                        <div>
                            <h4>Performance</h4>
                            <span>Acclerating from 0 to 60 mph within 3.2s</span>
                        </div>
                    </div>
                    <div class="edge configur d-flex align-items-center justify-content-md-between">
                        <i class="fa fa-pied-piper"></i>
                        <div>
                            <h4>Cutting Edge</h4>
                            <span>Sharing half of its parts with the R8 LMS race car</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest car seciton ends -->

<!-- Tech specs section starts -->
<section id="specs" class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="text-light mb-5 specs-head d-flex align-items-center justify-content-between">
                    <h3 class="ms-3">Tech specs</h3>
                    <h5>Engine</h5>
                </div>
                <div class="table-container">
                    <table class="table text-light">
                        <tr>
                            <td>Engine</td>
                            <td><?php echo $latest_car_data[0][0]['engine']; ?></td>
                        </tr>
                        <tr>
                            <td>Maximum Power</td>
                            <td><?php echo $latest_car_data[0][0]['max_power']; ?></td>
                        </tr>
                        <tr>
                            <td>Maximum Torque</td>
                            <td><?php echo $latest_car_data[0][0]['max_torque']; ?></td>
                        </tr>
                        <tr>
                            <td>Turning Radius</td>
                            <td><?php echo $latest_car_data[0][0]['turning_radius']; ?>m</td>
                        </tr>
                        <tr>
                            <td>Number of Cylinders</td>
                            <td><?php echo $latest_car_data[0][0]['no_of_cylinder']; ?></td>
                        </tr>
                        <tr>
                            <td>Drive Type</td>
                            <td><?php echo $latest_car_data[0][0]['drive_type']; ?></td>
                        </tr>
                        <tr>
                            <td>Turbo Charger</td>
                            <td><?php echo $latest_car_data[0][0]['turbo_charger']; ?></td>
                        </tr>
                        <tr>
                            <td>Fuel Type</td>
                            <td><?php echo $latest_car_data[0][0]['fuel_type']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tech specs section ends -->

<!-- car details starts -->
<section id="car-details" class="mt-5 mb-5">
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-6 d-flex align-items-center justify-content-between">
                    <div class="qty position-relative text-center">
                        <h2><?php echo $latest_car_data[0][0]['top_speed']; ?></h2>
                        <span>Top Speed</span>
                    </div>
                    <div class="qty position-relative text-center">
                        <h2><?php echo $latest_car_data[0][0]['gear']; ?></h2>
                        <span>Gear Box</span>
                    </div>
                    <div class="qty position-relative text-center">
                        <h2><?php echo $latest_car_data[0][0]['hp']; ?></h2>
                        <span>Horse Power</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- car details ends -->

<!-- most viewed cars starts -->
<section class="mt-5 mb-5" id="most-viewed">
    <h1 class="text-center mb-5">Most Viewed Cars</h1>
    <!-- <div class="most-viewed-car-container"> -->
    <?php
    $DB->sql("SELECT sub_model.*,image_tbl.car_img from sub_model JOIN image_tbl ON sub_model.sub_model_id=image_tbl.sub_model_car_id WHERE total_view>0 ORDER BY total_view DESC limit 4 ");
    $mv_cars = $DB->getResult();
    if (count($mv_cars[0]) > 0) {
        echo '<div class="most-viewed-car-container">';
        foreach ($mv_cars as $mv_car) {
            foreach ($mv_car as $car) {
                // $cd = $car['sub_model_id'];
                ?>
                <a href="single-car.php?mid=<?php echo $car['sub_model_id']; ?>" data-view-cid=<?php echo $car['sub_model_id'] ?> class="view__btn nav-link text-light">
                    <div class="mv__car__1 position-relative">
                        <img src="images/car_img/<?php echo $car['car_img']; ?>" alt="">
                        <div class="mv-details d-flex flex-column align-items-center justify-content-around">
                            <h3 class="text-capitalize"><?php echo $car['sub_model_name'] ?></h3>
                            <div class="w-100 d-flex align-items-center justify-content-around">
                                <div class="mv__box__1">
                                    <h4>Engine</h4>
                                    <span class="text-capitalize"><?php echo $car['engine'] ?></span>
                                </div>
                                <div class="mv__box__2">
                                    <h4>Milege</h4>
                                    <span><?php echo $car['milege'] ?>Km</span>
                                </div>
                                <div class="mv__box__3">
                                    <h4>Gear Type</h4>
                                    <span class="text-capitalize"><?php echo $car['gear_type'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        echo "</div>";
    } else {
        echo "<div class='w-100 text-center'><span class='badge bg-danger'>No car Found</span></div>";
    }
    ?>
    </div>
</section>
<!-- most viewed cars ends -->

<!-- featured car section starts -->
<section id="featured_car" class="mt-5 mb-5">
    <h1 class="text-center mb-5">Featured Cars</h1>
    <div class="container feature-container swiper">
        <div class="swiper-wrapper">
            <?php
            $DB->select("sub_model", "sub_model.*,image_tbl.car_img", "image_tbl on sub_model.sub_model_id=image_tbl.sub_model_car_id");
            $all_cars_details = $DB->getResult();
            if (count($all_cars_details) >= 1) {
                foreach ($all_cars_details as $single_car) {
                    ?>
                    <article class="swiper-slide">
                        <span class="badge bg-warning text-dark text-capitalize mb-4"><?php echo $single_car['sub_model_name'] ?></span>
                        <img src="images/car_img/<?php echo $single_car['car_img'] ?>" alt="" />
                        <div class="popular-details">
                            <div class="d1 det">
                                <i class="fa fa-clock-o"></i>
                                <span><?php echo $single_car['engine'] ?></span>
                            </div>
                            <div class="d2 det">
                                <i class="fa fa-pied-piper"></i>
                                <span><?php echo $single_car['milege'] ?></span>
                            </div>
                            <div class="d3 det">
                                <i class="fa fa-gears"></i>
                                <span class="text-capitalize"><?php echo $single_car['gear_type'] ?></span>
                            </div>
                        </div>
                        <div class="popular-container-footer d-flex align-items-center justify-content-between">
                            <span id="price"><?php echo $single_car['price']; ?></span>
                            <a href="single-car.php?mid=<?php echo $single_car['sub_model_id']; ?>"
                            data-view-cid=<?php echo $single_car['sub_model_id'] ?> class="view__btn btn btn-sm btn-info">Explore now?</a>
                        </div>
                    </article>
                    <?php
                }
            } else {
                echo "No car found";
            }
            ?>
        </div>
    </div>
</section>
<!-- featured car section ends -->

<!-- Offer section starts -->
<section id="offer" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-5">
                    <h3 class="mb-2">Do you want to receive special car offers?</h3>
                    <span>Be the first one to receive all the information about our products and new cars so that
                        you can grab our special offers. Stay tuned by subscribing</span><br>
                    <button class="btn btn-info mt-5">Subscribe?</button>
                </div>
                <div class="col-7">
                    <img class="offer__img" src="images/offer.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Offer section ends -->

<!-- partner section starts -->
<section id="partner" class="mt-5 mb-5">
    <h1 class="text-center mb-5">Associative Partners</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 partner_container swiper">
                <div class="swiper-wrapper">
                    <div class="partner__img swiper-slide">
                        <img src="images/logo1.png" alt="">
                    </div>
                    <div class="partner__img swiper-slide">
                        <img src="images/logo2.png" alt="">
                    </div>
                    <div class="partner__img swiper-slide">
                        <img src="images/logo3.png" alt="">
                    </div>
                    <div class="partner__img swiper-slide">
                        <img src="images/logo4.png" alt="">
                    </div>
                    <div class="partner__img swiper-slide">
                        <img src="images/logo5.png" alt="">
                    </div>
                    <div class="partner__img swiper-slide">
                        <img src="images/logo6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- partner section ends -->


<?php include 'partials/footer.inc.php'; ?>
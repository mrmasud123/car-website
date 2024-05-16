<?php
$mid = $_GET['mid'];
include 'partials/single-car-header.inc.php';

foreach ($car_data as $car_info) {
    foreach ($car_info as $data) {
        ?>
        <!-- innovation section starts -->
        <section class="mt-5 mb-5 text-center" id="innovation">
            <h1 class="w-100 text-center mb-3">An image of innovation.</h1>
            <span class="w-75 text-center fs-4">MRCAR is a distinctly crafted sedan unlike anything you've seen
                before.</span>
            <div class="container-fluid mt-3">
                <div class="row">
                    <?php
                    $disp_imgs = explode(",", $data['disp_img']);
                    $disp_imgs = array_filter($disp_imgs);
                    $index = count($disp_imgs);
                    ?>
                    <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                        <div class="selected__img mb-3">
                            <img src="images/<?php echo $disp_imgs[$index - 1]; ?>" alt="">
                        </div>

                        <div class="images-group d-flex align-items-center justify-content-center flex-wrap">
                            <?php
                            foreach ($disp_imgs as $d_img) {
                                ?>
                                <div class="image">
                                    <img src="images/display_img/<?php echo $d_img; ?>" alt="">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- innovation section ends -->

        <!-- Interrior and exterrior starts -->
        <section id="inex" class="mt-5 mb-5 ">
            <div class="container">
                <div class="w-100 text-center mb-5">
                    <div class="btn-group">
                        <button class="btn btn-primary btn-sm" id="interrior_btn">Interrior</button>
                        <button class="btn btn-danger btn-sm" id="exterrior_btn">Exterrior</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">

                        <div class="inex__details">
                            <div id="interrior" class="d-flex align-items-center flex-column">
                                <?php
                                $int_imgs = explode(",", $data['interrior_img']);
                                $int_imgs = array_filter($int_imgs);
                                ?>
                                <div class="interrior__selected__image">
                                    <img class="w-100" src="images/interrior_img/<?php echo $int_imgs[$index - 1] ?>" alt="">
                                </div>
                                <div class="interrior__images d-flex align-items-center flex-wrap justify-content-center">
                                    <?php
                                    foreach ($int_imgs as $i_img) {
                                        ?>
                                        <div class="single_image m-2">
                                            <img class="w-100" src="images/interrior_img/<?php echo $i_img; ?>" alt="">
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div id="exterrior">
                                <?php
                                $ext_imgs = explode(",", $data['exterrior_img']);
                                $ext_imgs = array_filter($ext_imgs);
                                ?>
                                <div class="exterrior__selected__image">
                                    <img class="w-100" src="images/exterrior_img/<?php echo $ext_imgs[$index - 1] ?>" alt="">
                                </div>
                                <div class="exterrior__images d-flex align-items-center flex-wrap justify-content-center">
                                    <?php
                                    foreach ($ext_imgs as $e_img) {
                                        ?>
                                        <div class="single_image m-2">
                                            <img src="images/exterrior_img/<?php echo $e_img; ?>" alt="">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Interrior and exterrior ends -->

        <!-- specs section starts -->
        <section id="single-specs" class="mt-5 mb-5 py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <div class="col-3 p-3">
                            <h1>MRCAR</h1>
                            <h1>Crown</h1>
                            <h1 class="mb-3">specs</h1>
                            <a href="car-specs.php?id=<?php echo $mid; ?>" class="btn btn-info text-light">View all specs?</a>
                        </div>
                        <div class="col-9">
                            <div class="all__specifications">
                                <div class="specs__col">
                                    <div class="specs__col__head">
                                        <h4 class="text-uppercase mb-2"><?php echo $data['t_1'] ?></h4>
                                        <span class="text-bold"><?php echo $data['spec_1'] ?></span>
                                    </div>
                                    <div class="specs__col__bottom">
                                        <h4 class="text-uppercase mb-2"><?php echo $data['t_2'] ?></h4>
                                        <span class="text-bold"><?php echo $data['spec_2'] ?></span>
                                    </div>
                                </div>
                                <div class="specs__col">
                                    <div class="specs__col__head">
                                        <h4 class="text-uppercase mb-2"><?php echo $data['t_3'] ?></h4>
                                        <span class="text-bold"><?php echo $data['spec_3'] ?></span>
                                    </div>
                                    <div class="specs__col__bottom">
                                        <h4 class="text-uppercase mb-2"><?php echo $data['t_4'] ?></h4>
                                        <span class="text-bold"><?php echo $data['spec_4'] ?></span>
                                    </div>
                                </div>
                                <div class="specs__col">
                                    <div class="specs__col__head">
                                        <h4 class="text-uppercase mb-2"><?php echo $data['t_5'] ?></h4>
                                        <span class="text-bold"><?php echo $data['spec_5'] ?></span>
                                    </div>
                                    <div class="specs__col__bottom">
                                        <h4 class="text-uppercase mb-2"><?php echo $data['t_6'] ?></h4>
                                        <span class="text-bold"><?php echo $data['spec_6'] ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- specs section ends -->

        <!-- featured video starts -->
        <section id="f_video" class="mt-5 mb-5">

            <div class="container">
                <h1 class="text-center mt-5 mb-3">Distinctly crafted.</h1>
                <h5 class="text-center mt-5 mb-5">Discover what makes Toyota Crown stand out.</h5>
                <div class="row">
                    <div class="col-12">
                        <video muted autoplay loop class="w-100 rounded" controls>
                            <?php
                            foreach ($car_data as $c_info) {
                                foreach ($c_info as $dt) {
                                    echo '<source src="videos/' . $dt['video'] . '" type="video/mp4">';
                                }
                            }
                            ?>
                        </video>
                        <div class="f_video_content">
                            <h1 class="mb-4 mt-5">Turbocharged and electrified.</h1>
                            <span>Go quickly and go efficiently. Toyota Crown's available Hybrid MAX powertrain pumps out up
                                to 340 combined net horsepower and takes you from 0 to 60 in 5.7 seconds. * For XLE and
                                Limited grades, the efficient hybrid system has up to an EPA-estimated 41 mpg combined
                                rating. *</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured video ends -->

        <!-- test drive starts -->
        <section id="test-drive" class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="test__drive__content">
                        <div class="test-drive-image">
                            <img src="images/prius/hero-bg-prius.jpg" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- test drive ends -->
    <?php }
} ?>



<?php include 'partials/footer.inc.php'; ?>
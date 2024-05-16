<?php
$mid = $_GET['id'];
include 'partials/single-car-header.inc.php';

foreach ($car_data as $car_details) {
    foreach ($car_details as $car_info) {

        ?>

        <!-- detailed specs section starts -->
        <section id="d_specs" class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <div class="specs__container">
                            <div class="specs__content mb-5">
                                <div class="specs__content__header d-flex align-items-center justify-content-between">
                                    <h1>MRP/Price</h1>
                                    <div class="icon-box position-relative">
                                        <i class="expand_btn fa fa-plus fs-1"></i>
                                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                    </div>
                                </div>
                                <div class="specs__content__details rounded">
                                    <div class="p-3">
                                        <?php echo "<span>" . $car_info['price'] . " + <span>%tax</span></span>"; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="specs__content mb-5">
                                <div class="specs__content__header d-flex align-items-center justify-content-between">
                                    <h1>Exterrior</h1>
                                    <div class="icon-box position-relative">
                                        <i class="expand_btn fa fa-plus fs-1"></i>
                                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                    </div>
                                </div>
                                <div class="specs__content__details rounded">
                                    <div class="p-3">
                                        <table class="table table-bordered table-striped table-hover">
                                            <?php
                                            $exterrior = explode(".", $car_info["exterrior"]);
                                            $exterrior = array_filter($exterrior);
                                            foreach ($exterrior as $ext) {
                                                echo "<tr><td>" . $ext . "</td></tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="specs__content mb-5">
                                <div class="specs__content__header d-flex align-items-center justify-content-between">
                                    <h1>Interrior</h1>
                                    <div class="icon-box position-relative">
                                        <i class="expand_btn fa fa-plus fs-1"></i>
                                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                    </div>
                                </div>
                                <div class="specs__content__details rounded">
                                    <div class="p-3">
                                        <table class="table table-bordered table-striped table-hover">
                                            <?php
                                            $interrior = explode(".", $car_info["interrior"]);
                                            $interrior = array_filter($interrior);
                                            foreach ($interrior as $int) {
                                                echo "<tr><td>" . $int . "</td></tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="specs__content mb-5">
                                <div class="specs__content__header d-flex align-items-center justify-content-between">
                                    <h1>Audio/Multimedia</h1>
                                    <div class="icon-box position-relative">
                                        <i class="expand_btn fa fa-plus fs-1"></i>
                                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                    </div>
                                </div>
                                <div class="specs__content__details rounded">
                                    <div class="p-3">
                                        <table class="table table-bordered table-striped table-hover">
                                            <?php
                                            $aud_mlt = explode(".", $car_info["audio_multimedia"]);
                                            $aud_mlt = array_filter($aud_mlt);
                                            foreach ($aud_mlt as $am) {
                                                echo "<tr><td>" . $am . "</td></tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="specs__content mb-5">
                                <div class="specs__content__header d-flex align-items-center justify-content-between">
                                    <h1>Safety/Convenience</h1>
                                    <div class="icon-box position-relative">
                                        <i class="expand_btn fa fa-plus fs-1"></i>
                                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                    </div>
                                </div>
                                <div class="specs__content__details rounded">
                                    <div class="p-3">
                                        <table class="table table-bordered table-striped table-hover">
                                            <?php
                                            $safety_conv = explode(".", $car_info["safety_conv"]);
                                            $safety_conv = array_filter($safety_conv);
                                            foreach ($safety_conv as $sc) {
                                                echo "<tr><td>" . $sc . "</td></tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="specs__content mb-5">
                                <div class="specs__content__header d-flex align-items-center justify-content-between">
                                    <h1>Others</h1>
                                    <div class="icon-box position-relative">
                                        <i class="expand_btn fa fa-plus fs-1"></i>
                                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                    </div>
                                </div>
                                <div class="specs__content__details rounded">
                                    <div class="p-3">
                                        <table class="table table-bordered table-striped table-hover">
                                            <tr>
                                                <td class="fw-bold">Fuel Type</td>
                                                <td class="text-capitalize"><span
                                                        class="badge bg-primary"><?php echo $car_info['fuel_type']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Tire</td>
                                                <td class="text-capitalize"><span
                                                        class="badge bg-primary"><?php echo $car_info['tire']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Gear Type</td>
                                                <td class="text-capitalize"><span
                                                        class="badge bg-primary"><?php echo $car_info['gear_type']; ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Milege</td>
                                                <td class="text-capitalize"><span
                                                        class="badge bg-primary"><?php echo $car_info['milege']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Engine</td>
                                                <td class="text-capitalize"><span
                                                        class="badge bg-primary"><?php echo $car_info['engine']; ?></span></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
} ?>
<!-- detailed specs section ends -->


<?php include 'partials/footer.inc.php'; ?>
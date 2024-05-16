<?php
include 'partials/header.inc.php';
$cid = $_GET['cid'];
$cname = strtoupper($_GET['cname']);
$DB->sql("SELECT * from sub_model JOIN sub_model_title ON sub_model.sub_model_id=sub_model_title.sub_model_car_id JOIN sub_model_specs on sub_model.sub_model_id=sub_model_specs.sub_model_car_id JOIN image_tbl ON sub_model.sub_model_id=image_tbl.sub_model_car_id  WHERE sub_model_id=$cid");
$cars = $DB->getResult();
?>

<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1>Edit
            <?php echo $cname; ?> Details
        </h1>
        <a href="models.php" class="btn btn-primary">View all models?</a>
    </div>
    <div
        class="dashboard-container dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
        <!--  -->
        <div class="form-container w-100">
            <form action="" enctype="multipart/form-data" id="update_specs_form">
                <?php

                foreach ($cars as $car_data) {
                    foreach ($car_data as $car) {
                        ?>

                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="warning-box"></div>
                            <img src="../images/car-logo.png" alt="" class="car__image mb-3">
                        </div>
                        <div class="form-group mb-3">
                            <select name="car_type" id="" class="form-control">
                                <?php
                                $DB->select("model", "*");
                                $all_models = $DB->getResult();
                                foreach ($all_models as $s_model) {
                                    if ($s_model['model_id'] == $car['model_id']) {
                                        echo '<option selected class="text-capitalize" value="' . $s_model['model_id'] . '" >' . $s_model["model_name"] . '</option>';
                                    } else {
                                        echo '<option class="text-capitalize" value="' . $s_model['model_id'] . '" >' . $s_model["model_name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <h2 class="mb-3">Car Specifications</h2>
                        <input value="<?php echo $car['sub_model_name']; ?>" type="text" name="car_name"
                            placeholder="Enter car name" class="mb-3 form-control">
                        <input type="text" name='cid' hidden value="<?php echo $cid; ?>" class="form-control">
                        <input type="number" value="<?php echo $car['price']; ?>" name="car_price" placeholder="Enter car price"
                            class="mb-3 form-control">
                        <div class="form-content">
                            <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                <input value="<?php echo $car['t_1']; ?>" type="text" name="t_1"
                                    placeholder="Specifications title 1" class="form-control mb-2">
                                <textarea class="form-control" placeholder="Enter Specifications Description" name="d_1" id=""
                                    cols="50" rows="3" wrap="soft"
                                    style="resize: none;"><?php echo $car['spec_1']; ?></textarea>
                            </div>

                            <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                <input value="<?php echo $car['t_2']; ?>" type="text" name="t_2"
                                    placeholder="Specifications title 2" class="form-control mb-2">
                                <textarea class="form-control" placeholder="Enter Specifications Description" name="d_2" id=""
                                    cols="50" rows="3" wrap="soft"
                                    style="resize: none;"><?php echo $car['spec_2']; ?></textarea>
                            </div>

                            <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                <input value="<?php echo $car['t_3']; ?>" type="text" name="t_3"
                                    placeholder="Specifications title 3" class="form-control mb-2">
                                <textarea class="form-control" placeholder="Enter Specifications Description" name="d_3" id=""
                                    cols="50" rows="3" wrap="soft"
                                    style="resize: none;"><?php echo $car['spec_3']; ?></textarea>
                            </div>

                            <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                <input value="<?php echo $car['t_4']; ?>" type="text" name="t_4"
                                    placeholder="Specifications title 4" class="form-control mb-2">
                                <textarea class="form-control" placeholder="Enter Specifications Description" name="d_4" id=""
                                    cols="50" rows="3" wrap="soft"
                                    style="resize: none;"><?php echo $car['spec_4']; ?></textarea>
                            </div>

                            <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                <input value="<?php echo $car['t_5']; ?>" type="text" name="t_5"
                                    placeholder="Specifications title 5" class="form-control mb-2">
                                <textarea class="form-control" placeholder="Enter Specifications Description" name="d_5" id=""
                                    cols="50" rows="3" wrap="soft"
                                    style="resize: none;"><?php echo $car['spec_5']; ?></textarea>
                            </div>

                            <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                <input value="<?php echo $car['t_6']; ?>" type="text" name="t_6"
                                    placeholder="Specifications title 6" class="form-control mb-2">
                                <textarea class="form-control" placeholder="Enter Specifications Description" name="d_6" id=""
                                    cols="50" rows="3" wrap="soft"
                                    style="resize: none;"><?php echo $car['spec_6']; ?></textarea>
                            </div>
                        </div>

                        <h3>Exterrior Details</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="exterrior_d" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box mt-2 mb-3">
                                <?php
                                $exterrior_data = explode(".", $car['exterrior']);
                                foreach ($exterrior_data as $key => $ext) {
                                    echo "<input type='text' name='exterrior_d_" . ($key + 999) . "' value='" . $ext . "'
                                    class='mb-2 form-control exterrior_d'>";
                                }
                                ?>
                            </div>
                        </div>
                        <h3>Interrior Details</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="interrior_d" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box mt-2 mb-3">
                                <?php
                                $interrior_data = explode(".", $car['interrior']);
                                foreach ($interrior_data as $key => $int) {
                                    echo "<input type='text' name='interrior_d_" . ($key + 999) . "' value='" . $int . "'
                                        class='mb-2 form-control interrior_d'>";
                                }
                                ?>
                            </div>
                        </div>
                        <h3>Audio/Multimedia Details</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="audio_mult" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box mt-2 mb-3">
                                <?php
                                $audio_mult_data = explode(".", $car['audio_multimedia']);
                                foreach ($audio_mult_data as $key => $audio_mult) {
                                    echo "<input type='text' name='audio_mult_" . ($key + 999) . "' value='" . $audio_mult . "' class='mb-2 form-control audio_mult'>";
                                }
                                ?>
                            </div>
                        </div>
                        <h3>Safety and Convenience</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="safety" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box mt-2 mb-3">
                                <?php
                                $safety_data = explode(".", $car['safety_conv']);
                                foreach ($safety_data as $key => $safety) {
                                    echo "<input type='text' name='safety_" . ($key + 999) . "' value='" . $safety . "' class='mb-2 form-control safety'>";
                                }
                                ?>
                            </div>
                        </div>
                        <input type="text" name="tire" value="<?php echo $car['tire']; ?>" class="mb-3 form-control">
                        <input type="text" name="fuel" value="<?php echo $car['fuel_type']; ?>" class="mb-3 form-control">
                        <input type="number" name="car_qty" value="<?php echo $car['qty']; ?>" class="mb-3 form-control">
                        <input type="date" name="mfg_date" value="<?php echo $car['mfg_date']; ?>" class="mb-3 form-control">

                        <!--  -->
                        <label for="" class="mb-2">Enter a short description</label>
                        <textarea name="car_desc" rows="5" style="resize:none" class="form-control mb-3" id=""><?php echo $car['description']; ?></textarea>
                        <label for="" class="mb-2">Max Power (560 bhp @ 6500rpm)</label>
                        <input name="max_power" type="text" value="<?php echo $car['max_power']; ?>"   class="form-control mb-3">
                        <label for="" class="mb-2">Max Torque (560 bhp @ 6500rpm)</label>
                        <input name="max_torque" type="text" value="<?php echo $car['max_torque']; ?> "  class="form-control mb-3">
                        <label for="" class="mb-2">Turning Radius</label>
                        <input name="turning_radius" type="text" value="<?php echo $car['turning_radius']; ?>"   class="form-control mb-3">
                        <label for="" class="mb-2">No Of Cylinder</label>
                        <input name="cylinder_qty" type="number" value="<?php echo $car['no_of_cylinder']; ?>" class="form-control mb-3">
                        <label for="" class="mb-2">Drive Type (automatic,manual)</label>
                        <input name="drive_type" type="text" value="<?php echo $car['drive_type']; ?>"  class="form-control mb-3">
                        <label for="" class="mb-2">Turbo charger</label>
                        <input name="turbo_charger" type="text" value="<?php echo $car['turbo_charger']; ?>"  class="form-control mb-3">
                        <label for="" class="mb-2">Car's Top Speed</label>
                        <input name="top_speed" type="text" value="<?php echo $car['top_speed']; ?> "  class="form-control mb-3">
                        <label for="" class="mb-2">No of Gear</label>
                        <input name="gear" type="number" value="<?php echo $car['gear']; ?>"   class="form-control mb-3">
                        <label for="" class="mb-2">Car's Max Horse Power</label>
                        <input name="horse_power" type="text" value="<?php echo $car['hp']; ?> "  class="form-control mb-3">
                        <label for="" class="mb-2">Max top speed gain time</label>
                        <input name="tp_time" type="text" value="<?php echo $car['tp_time']; ?>"  class="form-control mb-3">
                        <label for="" class="mb-2">Engine type</label>
                        <input name="engine" type="text" value="<?php echo $car['engine']; ?> "  class="form-control mb-3">
                        <label for="" class="mb-2">Car milege</label>
                        <input name="milege" type="number" value="<?php echo $car['milege']; ?>"   class="form-control mb-3">
                        <label for="" class="mb-2">Car's gear type</label>
                        <input name="gear_type" type="text" value="<?php echo $car['gear_type']; ?>"  class="form-control mb-3">
                        <!--  -->

                        <div class="form-group mt-3">
                            <h3 class="mb-1">Choose car image</h3>
                            <input type="file" name="car_img" class="mb-2 form-control">
                            <input name="car_old_img" hidden type="text" readonly value="<?php echo $car['car_img']; ?>"
                                class="form-control">
                            <img class="car_old_img" src="../images/car_img/<?php echo $car['car_img']; ?>" alt="">
                        </div>
                        <h3>Upload display images</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="disp_img" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box display mt-2 mb-3">
                                <input type="file" name="disp_img" class="mb-2 form-control">
                                <div class="car-group mb-3">
                                    <?php
                                    $display_images = explode(",", $car['disp_img']);
                                    $display_images = array_filter($display_images);
                                    // unset($display_images[array_search([""], $display_images)]);
                                    foreach ($display_images as $key => $disp_img) {
                                        if (!empty($disp_img)) {
                                            echo "<div class='imgbox d-flex align-items-center flex-column'><img data-src='" . $disp_img . "' name='disp_img_" . ($key + 999) . "' src='../images/display_img/" . $disp_img . "' >";
                                            echo "<button data-img-field='disp_img' data-img-name='" . $disp_img . "' data-img-id ='" . $cars[0][0]['img_id'] . "'class='remove__img btn btn-primary btn-sm mt-3'>Remove?</button> </div>";

                                        } else {
                                            echo "<span class='badge bg-danger'>No image found " . $disp_img . "</span>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <h3>Upload Exterrior images</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="exterrior_img" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box exterrior mt-2 mb-3">
                                <input type="file" name="exterrior_img" class="mb-2 form-control">
                                <div class="car-group mb-3">
                                    <?php
                                    $exterrior_images = explode(",", $car['exterrior_img']);
                                    $exterrior_images = array_filter($exterrior_images);
                                    // unset($exterrior_images[array_search([""], $exterrior_images)]);
                                    foreach ($exterrior_images as $key => $ext_img) {
                                        if (!empty($ext_img)) {
                                            echo "<div class='imgbox d-flex align-items-center flex-column'><img data-src='" . $ext_img . "' name='exterrior_img_" . ($key + 999) . "' src='../images/exterrior_img/" . $ext_img . "' >";
                                            echo "<button data-img-field='exterrior_img' data-img-name='" . $ext_img . "' data-img-id ='" . $cars[0][0]['img_id'] . "'class='remove__img btn btn-primary btn-sm mt-3'>Remove?</button> </div>";
                                        } else {
                                            echo "<span class='badge bg-danger'>No image found</span>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <h3>Upload Interrior images</h3>
                        <div class="form-group mb-3 d-flex flex-column">
                            <button data-name="interrior_img" class="btn btn-sm btn-primary add_box">Add <i
                                    class="fa fa-plus"></i></button>
                            <div class="input-box interrior mt-2 mb-3">
                                <input type="file" name="interrior_img" class="mb-2 form-control">
                                <div class="car-group mb-3">
                                    <?php
                                    $interrior_img = explode(",", $car['interrior_img']);
                                    $interrior_img = array_filter($interrior_img);
                                    foreach ($interrior_img as $key => $int_img) {
                                        if (!empty($int_img)) {
                                            echo "<div class='imgbox d-flex align-items-center flex-column'><img data-src='" . $int_img . "' name='interrior_img_" . ($key + 999) . "' src='../images/interrior_img/" . $int_img . "' >";
                                            echo "<button data-img-field='interrior_img' data-img-name='" . $int_img . "' data-img-id ='" . $cars[0][0]['img_id'] . "'class='remove__img btn btn-primary btn-sm mt-3'>Remove?</button> </div>";
                                        } else {
                                            echo "<span class='badge bg-danger'>No image found</span>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-100 text-center">
                            <button type="submit" class="btn btn-info">Submit?</button>
                        </div>

                        <?php
                    }
                }

                ?>
            </form>
        </div>
        <!--  -->
    </div>
</div>
</div>
</div>
</section>

<script src="../js/jquery.min.js"></script>
<script src="../js/admin.js"></script>

</body>

</html>
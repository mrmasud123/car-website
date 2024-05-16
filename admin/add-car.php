<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2 d-flex align-items-center justify-content-center flex-column">
                    <!-- <h1 class="mb-3">Add Car</h1> -->
                    <div class="dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        
                        <div class="form-container w-100">
                            <form action="" enctype="multipart/form-data" id="specs_form">
                            <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="warning-box"></div>
                            <img src="../images/car-logo.png" alt="" class="car__image mb-3">
                            </div>
                            <div class="form-group mb-3">
                                    <select name="car_type" id="" class="form-control">
                                        <option value="" selected disabled>Choose car model</option>
                                        <?php  
                                            $DB->select("model","*");
                                            $all_models=$DB->getResult();
                                            foreach($all_models as $s_model){
                                                echo '<option class="text-capitalize" value="'.$s_model['model_id'].'" >'.$s_model["model_name"].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <h2 class="mb-3">Car Specifications</h2>
                                <input type="text" name="car_name" placeholder="Enter car name" class="mb-3 form-control">
                                <input type="number" name="car_price" placeholder="Enter car price" class="mb-3 form-control">
                                <div class="form-content">
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="t_1" placeholder="Specifications title 1" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="d_1" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="t_2" placeholder="Specifications title 2" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="d_2" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="t_3" placeholder="Specifications title 3" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="d_3" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="t_4" placeholder="Specifications title 4" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="d_4" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="t_5" placeholder="Specifications title 5" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="d_5" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="t_6" placeholder="Specifications title 6" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="d_6" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
                                </div>
                               
                                <h3>Exterrior Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="exterrior_d" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="exterrior_d" placeholder="Exterrior features 1" class="mb-2 form-control exterrior_d">
                                    </div>
                                </div>
                                <h3>Interrior Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="interrior_d" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="interrior_d" placeholder="Interrior features 1" class="mb-2 form-control interrior_d">
                                    </div>
                                </div>
                                <h3>Audio/Multimedia Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="audio_mult" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="audio_mult" placeholder="Audio/Multimedia features 1" class="mb-2 form-control audio_mult">
                                    </div>
                                </div>
                                <h3>Safety and Convenience</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="safety" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="safety" placeholder="Safety and Convenience features 1" class="mb-2 form-control safety">
                                    </div>
                                </div>
                                <input type="text" name="tire" placeholder="Enter Tire Specifications" class="mb-3 form-control">
                                <input type="text" name="fuel" placeholder="Enter fuel type" class="mb-3 form-control">
                                <input type="number" name="car_qty" placeholder="Enter car quantity" class="mb-3 form-control">
                                <input type="date" name="mfg_date" placeholder="Enter fuel type" class="mb-3 form-control">
                                <label for="">Enter a short description</label>
                                <textarea name="car_desc" class="form-control mb-3" id=""></textarea>
                                <input name="max_power" type="text" placeholder="Enter the maximum power" class="form-control mb-3">
                                <input name="max_torque" type="text" placeholder="Enter the maximum torque" class="form-control mb-3">
                                <input name="turning_radius" type="text" placeholder="Enter the turning radius" class="form-control mb-3">
                                <input name="cylinder_qty" type="number" placeholder="Enter the cylinder quantity" class="form-control mb-3">
                                <input name="drive_type" type="text" placeholder="Enter the drive type" class="form-control mb-3">
                                <input name="turbo_charger" type="text" placeholder="Enter the turbo charger" class="form-control mb-3">
                                <input name="top_speed" type="text" placeholder="Enter the top speed" class="form-control mb-3">
                                <input name="gear" type="number" placeholder="Enter the gear" class="form-control mb-3">
                                <input name="horse_power" type="text" placeholder="Enter the horse power" class="form-control mb-3">
                                <input name="tp_time" type="text" placeholder="Enter the top speed gain time" class="form-control mb-3">
                                <input name="engine" type="text" placeholder="Enter the engine type" class="form-control mb-3">
                                <input name="milege" type="number" placeholder="Enter the milege" class="form-control mb-3">
                                <input name="gear_type" type="text" placeholder="Enter the gear type" class="form-control mb-3">
                                <div class="form-group mt-3">
                                    <h3 class="mb-1">Choose car image</h3>
                                    <input type="file" name="car_img" class="mb-2 form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <h3 class="mb-1">Upload a car video</h3>
                                    <input accept="video/mp4" type="file" name="car_video" class="mb-2 form-control">
                                </div>
                                <h3>Upload display images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="disp_img" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box display mt-2 mb-3">
                                        <input type="file" name="disp_img" placeholder="Safety and Convenience features 1" class="mb-2 form-control">
                                    </div>
                                </div>

                                <h3>Upload Exterrior images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="exterrior_img" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box exterrior mt-2 mb-3">
                                        <input type="file" name="exterrior_img" class="mb-2 form-control">
                                    </div>
                                </div>

                                <h3>Upload Interrior images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="interrior_img" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box interrior mt-2 mb-3">
                                        <input type="file" name="interrior_img" class="mb-2 form-control">
                                    </div>
                                </div>
                                <div class="form-group w-100 text-center">
                                    <button class="btn btn-info">Submit?</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/admin.js"></script>

</body>

</html>
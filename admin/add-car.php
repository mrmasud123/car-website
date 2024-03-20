<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2 d-flex align-items-center justify-content-center flex-column">
                    <!-- <h1 class="mb-3">Add Car</h1> -->
                    <div class="dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="car__type mb-3 d-flex flex-column">
                            <img src="../images/car-logo.png" alt="" class="car__image mb-3">
                            <form action="">
                                <div class="form-group">
                                    <select name="car-type" id="" class="form-control">
                                        <option value="" selected disabled>Choose car model</option>
                                        <?php  
                                            $DB->select("model","*");
                                            $all_models=$DB->getResult();
                                            foreach($all_models as $s_model){
                                                echo '<option class="text-capitalize" value="'.$s_model.'" >'.$s_model["model_name"].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="form-container w-100">
                            <form action="">
                                
                                <h2 class="mb-3">Car Specifications</h2>
                                <input type="text" placeholder="Enter car name" class="mb-3 form-control">
                                <input type="number" placeholder="Enter car price" class="mb-3 form-control">
                                <div class="form-content">
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="car_name" placeholder="Specifications title 1" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="car_name" placeholder="Specifications title 2" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="car_name" placeholder="Specifications title 3" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="car_name" placeholder="Specifications title 4" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="car_name" placeholder="Specifications title 5" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
    
                                    <div class="form-group mb-2 d-flex align-items-center justify-content-between flex-column w-100">
                                        <input type="text" name="car_name" placeholder="Specifications title 6" class="form-control mb-2">
                                        <textarea class="form-control" placeholder="Enter Specifications Description" name="" id="" cols="50" rows="3" wrap="soft" style="resize: none;"></textarea>
                                    </div>
                                </div>
                               
                                <h3>Exterrior Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_ext_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Exterrior features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <h3>Interrior Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_int_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Interrior features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <h3>Audio/Multimedia Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_am_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Audio/Multimedia features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <h3>Audio/Multimedia Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_safety_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Safety and Convenience features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <input type="text" placeholder="Enter Tire Specifications" class="mb-3 form-control">
                                <h3>Upload display images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_disp_img_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="file" name="car_name" placeholder="Safety and Convenience features 1" class="mb-2 form-control">
                                    </div>
                                </div>

                                <h3>Upload Exterrior images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_ext_img_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="file" name="car_name" class="mb-2 form-control">
                                    </div>
                                </div>

                                <h3>Upload Interrior images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="interrior" class="btn btn-sm btn-primary add_int_img_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="file" name="car_name" class="mb-2 form-control">
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
<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2 d-flex align-items-center justify-content-center flex-column">
                    <!-- <h1 class="mb-3">Add Car</h1> -->
                    <div class="dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="car__type mb-3 d-flex flex-column">
                            <img src="../images/car-logo.png" alt="" class="car__image mb-3">
                            <form action="" >
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
                            <form action="" enctype="multipart/form-data" id="specs_form">
                                
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
                                        <input type="text" name="exterrior_d" placeholder="Exterrior features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <h3>Interrior Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="interrior_d" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="interrior_d" placeholder="Interrior features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <h3>Audio/Multimedia Details</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="audio_mult" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="audio_mult" placeholder="Audio/Multimedia features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <h3>Safety and Convenience</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="safety" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="safety" placeholder="Safety and Convenience features 1" class="mb-2 form-control">
                                    </div>
                                </div>
                                <input type="text" name="tire" placeholder="Enter Tire Specifications" class="mb-3 form-control">
                                <h3>Upload display images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="disp_img" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="file" name="disp_img" placeholder="Safety and Convenience features 1" class="mb-2 form-control">
                                    </div>
                                </div>

                                <h3>Upload Exterrior images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="exterrior_img" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="file" name="exterrior_img" class="mb-2 form-control">
                                    </div>
                                </div>

                                <h3>Upload Interrior images</h3>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <button data-name="interrior_img" class="btn btn-sm btn-primary add_box">Add <i class="fa fa-plus"></i></button>
                                    <div class="input-box mt-2 mb-3">
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
<?php
include 'partials/purchase-header.inc.php'; ?>

<section id="user_update">
    <div class="card" style="width: 40rem;">
        <div class="card-body">
            <h5 class="card-title">Update your credentials</h5>
            <?php
            if (!isset($_SESSION['logged_user_id'])) {
                header("location: index.php");
            }
            $uid = $_GET['uid'];
            $DB->select("users", "*", null, "id=$uid");
            $user_data = $DB->getResult();
            foreach ($user_data as $u_data) {
                ?>
                <form action="" id="update_profile" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="" class="mb-2">First Name</label>
                        <input type="text" name="f_name" value="<?php echo $u_data['first_name']; ?>"
                            class="form-control mb-2">
                            <label for="" class="mb-2">Last Name</label>
                        <input type="text" name="l_name" value="<?php echo $u_data['last_name']; ?>"
                            class="form-control mb-2">
                            <label for="" class="mb-2">E-mail</label>
                        <input type="email" name="email" value="<?php echo $u_data['email']; ?>" class="form-control mb-2">
                        
                    </div>
                    <div class="form-group mb-2">
                    <label for="" class="mb-2">Password</label>
                        <input id="password" type="password" name="password" value="<?php echo $u_data['password']; ?>" class="form-control mb-2">
                        <input type="checkbox" id="showPassword" class="toggle-checkbox">
                        <label for="showPassword">Show Password</label>
                    </div>
                    <div class="form-group mb-2">
                        <select id="city" name="city" class="form-control">
                            <option value="<?php echo $u_data['city']; ?>" selected><?php echo $u_data['city']; ?></option>
                            <option value="cumilla">Cumilla</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="chittagong">Chittagong</option>
                            <option value="rajshahi">Rajshahi</option>
                            <option value="barisal">Barisal</option>
                            <option value="khulna">Khulna</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <h2>Your viewed cars</h2><br>
                        <div class="view_car">
                            <?php
                            $viewed_cars_list = $u_data['viewed_cars'];
                            if (empty($viewed_cars_list)) {
                                echo "<span class='badge bg-danger'>No cars viewed.</span>";
                            } else {
                                $DB->sql("SELECT * from image_tbl WHERE sub_model_car_id in($viewed_cars_list)");
                                $viewed_cars = $DB->getResult();
                                foreach ($viewed_cars as $car_info) {
                                    foreach ($car_info as $car) {
                                ?>
                                <div class="viewed__cars">
                                    <div class="v_car" style="width:200px; height:80px">
                                        <img class="w-100" style="height:100%;object-fit:cover" src="images/car_img/<?php echo $car['car_img']; ?>"
                                            alt="">
                                    </div>
                                    <button data-remove-car-id="<?php echo $car['sub_model_car_id'] ?>" class="btn btn-sm btn-danger mt-2 remove_viewed_car"><i class="fa fa-trash"></i></button>
                                </div>
                                <?php
                            }}}
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="specs__content mb-2">
                            <div class="specs__content__header d-flex align-items-center justify-content-between">
                                <h4>Test Drive</h4>
                                <div class="icon-box position-relative">
                                    <i style="font-size:30px" class="expand_btn fa fa-plus fs-1"></i>
                                    <i style="font-size:30px" class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                                </div>
                            </div>
                            <div class="specs__content__details rounded">
                                <div class="p-3 drive_content">
                                    <?php 
                                        $DB->select("test_drive","test_drive.id,test_drive.car_id,test_drive.drive_schedule,test_drive.req_status,image_tbl.sub_model_car_id,image_tbl.car_img,sub_model.sub_model_name","image_tbl on test_drive.car_id=image_tbl.sub_model_car_id join sub_model on test_drive.car_id=sub_model.sub_model_id ","test_drive.requested_user=$uid and test_drive.visibility=1");
                                        $test_drive_info=$DB->getResult();
                                        if(count($test_drive_info)>=1){
                                            foreach($test_drive_info as $test_drive_details){
                                     ?>
                                    <div style="width:200px;height:100px;" class="c__img">
                                        <img class="w-100" style="height:100%;object-fit:cover" src="images/car_img/<?php echo $test_drive_details['car_img']; ?>" alt="">
                                    </div>
                                    <div class="drive__details">
                                        <h5><span class="badge bg-warning text-capitalize"><?php echo $test_drive_details['sub_model_name']; ?></span></h5>
                                        <div class="approve">
                                            <h5><span class="badge bg-warning">Approve Status</span></h5>
                                            <span class="badge bg-secondary">
                                                <?php echo ($test_drive_details['req_status'] ? "Approved" : "Processing");?>
                                            </span>
                                            <button data-test-drive-id="<?php echo $test_drive_details['id'] ?>" class="btn btn-sm bg-danger text-light cancel_test_drive">Cancel?</button>
                                        </div>
                                        <div class="apply_date">
                                            <h5><span class="badge bg-warning">Apply Date</span></h5>
                                            <span class="badge bg-success"><?php echo $test_drive_details['drive_schedule'] ?></span>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    }else{
                                            echo "<span class='badge bg-secondary'>No test drive request found.</span>";
                                        }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="file" name="new_user_img" class="form-control mb-3 ">
                        <input type="text" value="<?php echo $u_data['user_img']; ?>" readonly hidden name="old_user_img" class="form-control">
                        <div class="" style="width:200px; height:100px">
                            <?php 
                                if(empty($u_data)){
                                    echo "<span class='badge bg-danger'>Upload image</span>";
                                }else{
                                ?>
                                <img class="w-100 rounded" style="height:100%;object-fit:cover" src="images/users_img/<?php echo $u_data['user_img']; ?>" alt="">
                                <?php 

                                }
                            ?>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Update?</button>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- header section ends -->
<?php include 'partials/footer.inc.php'; ?>
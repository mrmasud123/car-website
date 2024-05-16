<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <h1 class="mb-3">Test Drive Requests</h1>
                    <div class="dashboard-container">
                        <div class="content">
                            <table class="table table-bordered table-striped text-light">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Car Model</th>
                                        <th>Request Time</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $DB->sql("SELECT test_drive.*,sub_model.sub_model_id,sub_model.sub_model_name from test_drive  join sub_model on test_drive.car_id=sub_model.sub_model_id");
                                        $all_test_drive=$DB->getResult();
                                        $flag="";
                                        foreach($all_test_drive as $test_drive){
                                            foreach($test_drive as $td){
                                                if(!$td['req_status']){
                                                    $flag="bg-danger";
                                                }else{
                                                    $flag="bg-success";
                                                }
                                        ?>
                                    <tr class="text-light <?php echo $flag; ?>">
                                        <td><?php echo $td['id']; ?></td>
                                        <td class="text-capitalize"><?php echo $td['user_name']; ?></td>
                                        <td class="text-lowercase"> <?php echo $td['user_email']; ?></td>
                                        <td class="text-uppercase"> <?php echo $td['sub_model_name']; ?></td>
                                        <td> <?php echo $td['drive_schedule']; ?></td>
                                        <td class="text-capitalize"> <?php echo $td['user_address']; ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <?php  
                                                if(!$td['req_status']){
                                                    echo '<button data-td-id="'.$td['id'].'" data-user-id="'.$td['requested_user'].'" class="test_drive_accept btn btn-sm btn-success">Accept?</button>';
                                                }else{
                                                    echo '<button class="btn btn-sm btn-danger">Delete?</button>';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                        <?php 
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
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
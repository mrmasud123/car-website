<?php 

include 'partials/profile-header.inc.php'; ?>

<section id="user__section">
   <?php
      $viewed_cars_list = $user_data[0]['viewed_cars'];
      if (!empty($viewed_cars_list)) {
        $DB->sql("SELECT * from sub_model JOIN image_tbl on sub_model.sub_model_id=image_tbl.sub_model_car_id WHERE sub_model_id in($viewed_cars_list)");
        $viewed_cars = $DB->getResult();
        
        echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">';
        foreach($viewed_cars as $key=>$vs){
          foreach($vs as $k=>$v_car){
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$k.'"></li>';
          }
        }
        ?>

    </ol> 
    <div class="carousel-inner">
     <?php
        $flag=1;
        foreach ($viewed_cars as $car_info) {
          foreach ($car_info as $car) {
            ?>
            <div class="carousel-item <?php if($flag){
              echo "active";
              $flag=0;
            }else{
              echo "";
            } ?>">
              <div class="u__img">
                <img class="d-block w-100" src="images/car_img/<?php echo $car['car_img']; ?>" alt="First slide">
              </div>
              <div class="carousel-caption d-none d-md-block">
                <h5><span class="badge bg-success"><?php echo $car['sub_model_name']; ?></span></h5><br>
                <a href="single-car.php?mid=<?php echo $car['sub_model_id'] ?>" class="btn btn-sm btn-warning">View?</a>
              </div>
            </div>
            <?php
          }
        }
    
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php  
    }else {
        echo "<h4><span class='badge mt-3 bg-danger'>No car has been viewed.</span></h4>";
      }
      ?>
</section>

<section id="test-drive" class="d-flex align-items-center justify-content-center">

  <div class="specs__content mb-2 w-50" >
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
                                        <div class="approve d-flex align-items-center">
                                            <h5><span class="badge bg-warning">Approve Status</span></h5>
                                            <span class="badge bg-secondary">
                                                <?php if($test_drive_details['req_status']){
                                                  echo "Approved";
                                                }else{
                                                  echo "Processing";}?>
                                            </span>
                                            <button data-test-drive-id="<?php echo $test_drive_details['id'] ?>" class="btn btn-sm bg-danger text-light cancel_test_drive">Cancel?</button>
                                        </div>
                                        <div class="apply_date d-flex align-items-center">
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

</section>

<?php include 'partials/footer.inc.php'; ?>
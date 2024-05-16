<?php
$req_branch_id = $_GET['branch_id'];

$bname = urldecode($_GET['bname']);

include 'partials/purchase-header.inc.php';

?>

<div class="dashboard-content mt-5 px-2">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-3">Showroom || <span class="badge bg-dark text-capitalize"><?php echo $bname; ?> </span><i class="fa fa-location-arrow"></i></h1>
        
    </div>
    <div class="dashboard-container">
        <div class="showroom-details w-100">
            <div class="manager">
                <table class="table table-bordered car-table text-light">
                    <?php
                    $DB->select("employee", "*", "branches on branches.branch_id=employee.assigned_branch_id", "branch_id=$req_branch_id");
                    $employee_branch_data = $DB->getResult();
                    ?>
                    <tr>
                        <td width="200px"><b>Available Cars</b></td>
                        <td align="left">
                            <div class="available-cars">
                                <?php
                                if (!empty($employee_branch_data[0]['cars'])) {
                                    $arr_car = $employee_branch_data[0]['cars'];
                                    $car_arr = explode(",", $employee_branch_data[0]['cars']);
                                    $distinct_cars=array_count_values($car_arr);
                                    $DB->sql("SELECT * from sub_model where sub_model_id in ($arr_car)");
                                    $branch_cars=$DB->getResult();
                                    foreach ($branch_cars as $branch_car) {
                                        foreach($branch_car as $bc){
                                            $sub_model_id=$bc['sub_model_id'];
                                            $DB->select("image_tbl","car_img",null,"sub_model_car_id=$sub_model_id");
                                            $car_img=$DB->getResult();
                                        ?>
                                        <div class="car">
                                            <div class="car_img">
                                                <img src="images/car_img/<?php echo $car_img[0]['car_img']; ?>" alt="">
                                            </div>
                                            <div class="availiability">
                                                <h5><span class="badge bg-success text-capitalize"><?php echo $bc['sub_model_name'] ?></span></h5>
                                                <span class="badge bg-success">Available</span>
                                                <span class="badge bg-warning">
                                                    <?php echo ($distinct_cars[$sub_model_id]>=1)? "In Stock": "Out of Stock"; ?>
                                                </span><br>
                                                <a data-view-cid="<?php echo $sub_model_id; ?>" href="single-car.php?mid=<?php echo $sub_model_id; ?>" class="btn btn-sm btn-primary view__btn">View?</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                } else {
                                    echo "No car found";
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    
                </table>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php   include 'partials/footer.inc.php'; ?>
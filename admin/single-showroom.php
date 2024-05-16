<?php
include 'partials/header.inc.php';
$req_branch_id = $_GET['branch_id'];
$bname = urldecode($_GET['bname']);
?>

<div class="dashboard-content mt-5 px-2">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-3">Showroom || <span class="badge bg-dark text-capitalize"><?php echo $bname; ?> </span><i class="fa fa-location-arrow"></i></h1>
        <a href="edit-showroom.php?sid=<?php echo $req_branch_id; ?>" class="btn btn-primary">Edit Showroom Details?</a>
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
                        <td><b>Manager</b></td>
                        <td align="left">
                            <p class="text-capitalize">
                                <?php echo $employee_branch_data[0]['name']; ?>
                            </p>
                            <span class="badge bg-info">E-mail</span>
                            <span>
                                <?php echo $employee_branch_data[0]['email']; ?>
                            </span><br>
                            <span class="badge bg-info">Salary</span>
                            <?php
                            if ($employee_branch_data[0]['salary_status']) {
                                echo "<span class='badge bg-success'>Paid</span>";
                            } else {
                                echo "<span class='badge bg-danger'>Pending</span>";
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Available Cars</b></td>
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
                                                <img src="../images/car_img/<?php echo $car_img[0]['car_img']; ?>" alt="">
                                            </div>
                                            <div class="views">
                                                <h4 class="text-capitalize fw-bold">
                                                    <?php echo $bc['sub_model_name'] ?>
                                                </h4>
                                                <span class="badge bg-success">Views : </span>
                                                <span class="badge bg-warning">
                                                    <?php echo $bc['total_view'] ?>
                                                </span>
                                            </div>
                                            <div class="availiability">
                                                <span class="badge bg-success">Available</span>
                                                <span class="badge bg-warning">
                                                    <?php echo $distinct_cars[$sub_model_id] ?>
                                                </span>
                                            </div>
                                            <div class="sold">
                                                <span class="badge bg-success">Total Sold</span>
                                                <span class="badge bg-warning">20</span>
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
                    <tr>
                        <td><b>Location</b></td>
                        <td align="left" class="text-capitalize">
                            <?php echo $bname; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Employees</b></td>
                        <td align="left">

                            <div class="employee_details">
                                <?php
                                $DB->select('employee', "*", null, "assigned_branch_id=$req_branch_id");
                                $employees_data = $DB->getResult();
                                foreach ($employees_data as $emp_d) {

                                    ?>
                                    <div class="employee">
                                        <div class="emp_img">
                                            <img src="../images/employee_img/<?php echo $emp_d['img'] ?>" alt="">
                                        </div>
                                        <div class="emp_about">
                                            <span class="badge bg-success">Name : </span>
                                            <span class="badge bg-warning text-capitalize"><?php echo $emp_d['name'] ?></span>
                                        </div>
                                        <div class="contact">
                                            <span class="badge bg-success">E-mail</span>
                                            <span class="badge bg-warning text-lowercase"><?php echo $emp_d['email'] ?></span>
                                        </div>
                                        <div class="join">
                                            <span class="badge bg-success">Join Date</span>
                                            <span class="badge bg-warning"><?php echo $emp_d['join_date'] ?></span>
                                        </div>
                                        <div class="designation">
                                            <span class="badge bg-success">Designation</span>
                                            <span class="badge bg-warning"><?php echo $emp_d['designation'] ?></span>
                                        </div>
                                        <div class="salary_stats">
                                            <span class="badge bg-success">Salary</span>
                                            <?php 
                                                if($emp_d['salary_status']){
                                                    echo '<span class="badge bg-success">Paid</span>';
                                                }else{
                                                    echo '<span class="badge bg-warning">Pending</span>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
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

<script src="../js/jquery.min.js"></script>
<script src="../js/admin.js"></script>

</body>

</html>
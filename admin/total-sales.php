<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="employee__container">



        <div class="specs__container">
            <div class="text-end w-100 d-flex justify-content-end mb-2">
                <button class="btn-sm btn btn-warning form-group position-relative mt-3 total_bill_calc view_sec">
                    <a href="add-sale.php" class="">Add Sale?</a>
                </button>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Branch</th>
                        <th>Manager Name</th>
                        <th>Qunatity</th>
                        <th>Total Amount</th>
                        <th>Available cars</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $DB->select("branches", "*","employee on branches.branch_id=employee.assigned_branch_id","designation='manager'");
                    $all_branches = $DB->getResult();
                
                    foreach ($all_branches as $single_branch) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $single_branch['branch_id'] ?>
                            </td>
                            <td class="text-capitalize">
                                <?php echo $single_branch['branch_name'] ?>
                            </td>
                            <td class="text-capitalize">
                                <?php echo $single_branch['name'] ?>
                            </td>
                            <td>
                                <?php echo $single_branch['car_qty'] ?>
                            </td>
                            <td class="text-uppercase">
                                <?php echo $single_branch['amount'] ?>
                            </td>
                            <td>
                                <ul class="list-group">
                                    <?php
                                    if ($single_branch['cars'] != null) {
                                        $DB->select("sub_model", "*", null, "sub_model_id in(" . $single_branch['cars'] . ")");
                                        $car_names = $DB->getResult();
                                        if (count($car_names) > 0) {
                                            $cars = explode(",", $single_branch['cars']);
                                            $car_cnt = array_count_values($cars);                                
                                            foreach ($car_names as $car) {

                                                echo "<li class='list-group-item'>" . $car['sub_model_name'] . "(" . $car_cnt[$car['sub_model_id']] . ")</li>";
                                            }
                                        } else {
                                            echo "<span class='badge bg-alert'>No car found</span>";
                                        }
                                    }else{
                                        echo "No car found";
                                    }
                                    ?>
                                </ul>
                            </td>
                            <td><button type="button" data-branchId=<?php echo $single_branch['branch_id'] ?>
                                    class="btn btn-sm btn-primary view_sold_car">View sold cars?</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- employee section ends -->
    </div>
</div>
</div>
</div>
</section>


<!-- test drive form starts-->
<section id="test-drive-form">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">

                <div class="drive-form-container p-3 w-75">
                    <div class="form-header d-flex align-items-center justify-content-between mb-5">
                        <h3 class="text-light">Sold Cars Details</h3>
                        <i class="fa fa-times fs-1 text-light" id="form-close"></i>
                    </div>
                    <div class="drive-form">
                        <table class="table table-bordered table-striped text-light">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Manager Name</th>
                                    <th>Branch</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Car Model</th>
                                    <th>Payment Type</th>
                                </tr>
                            </thead>
                            <tbody id="sales_data">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- test drive form ends -->

<script src="../js/jquery.min.js"></script>
<script src="../js/admin.js"></script>

</body>

</html>
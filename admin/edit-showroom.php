<?php
include 'partials/header.inc.php';
$b_id = $_GET['sid'];
$DB->select("branches", "*", "employee on branches.branch_id=employee.assigned_branch_id", "branch_id=$b_id");
$branch_data = $DB->getResult();
$b_name = explode(",", $branch_data[0]['branch_name']);


// echo "<pre>";
// print_r($branch_data);
// echo "</pre>";
?>
<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1>Edit Showroom || <span
                class="badge bg-secondary text-capitalize"><?php echo $branch_data[0]['branch_name'] ?></span></h1>

        <a href="showroom.php" class="btn btn-primary">View Showrooms?</a>
    </div>
    <div class="dashboard-container showroom-item-container">

        <div class="showroom-form w-100">
            <form action="" id="update_showroom_form" enctype="multipart/form-data">
                <input type="text" readonly hidden name="branch_id" value="<?php echo $b_id; ?>" class="form-control">
                <div class="form-group mt-2 mb-2">
                    <input type="text" value="<?php echo $branch_data[0]['branch_name'] ?>" name="branch_location"
                        placeholder="Enter Location" class="form-control">
                    <label for="" class="text-light mt-3">Present Manager</label>
                    <input type="text" value="<?php echo $branch_data[0]['name'] ?>" readonly class="mt-1 form-control">
                    <input type="text" hidden value="<?php echo $branch_data[0]['id'] ?>" name="old_manager_id" readonly
                        class="mt-1 form-control">
                    <select name="new_manager_id" id="" class="form-control mt-3">
                        <option value="" selected disabled>Choose Manager</option>
                        <?php
                        $DB->select("employee", "*", null, "designation='manager' AND branch_assigned=0");
                        $available_manager = $DB->getResult();
                        foreach ($available_manager as $manager) {
                            echo "<option name='manager_id' class='text-capitalize' value=" . $manager['id'] . ">" . $manager['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="" class="text-light mt-3">Present Accountant</label>
                    <?php
                    foreach ($branch_data as $bd) {
                        if ($bd['designation'] == 'accountant') {
                            ?>
                            <input type="text" value="<?php echo $bd['name']; ?>" readonly class="mt-1 form-control">
                            <?php
                        }
                    }
                    ?>
                    <input name="old_accountant_id" type="text" value="<?php if (empty($branch_data[1]['accountant'])) {
                        echo "No accountant found";
                    } else {
                        echo $branch_data[1]['id'];
                    } ?>" readonly hidden class="mt-1 form-control">
                    <select name="new_accountant_id" id="" class="form-control mt-3">
                        <option value="" selected disabled>Choose Accountant</option>
                        <?php
                        $DB->select("employee", "*", null, "designation='accountant' AND branch_assigned=0");
                        $available_accountant = $DB->getResult();
                        foreach ($available_accountant as $accountant) {
                            echo "<option class='text-capitalize' value=" . $accountant['id'] . ">" . $accountant['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-2 d-flex flex-column">
                    <h5>Assign Salesman</h5>
                    <div class="salesman_container mt-2">
                        <ul>
                            <?php
                            $sales = $branch_data[0]['salesmans'];
                            if (!empty($sales)) {
                                $sales_man_ids = explode(",", $sales);
                                $DB->sql("SELECT * from employee where branch_assigned=0 and designation ='salesman' or id in($sales)");
                                $available_emps = $DB->getResult();
                                foreach ($available_emps as $emp) {
                                    foreach ($emp as $em) {
                                        if (in_array($em['id'], $sales_man_ids)) {
                                            echo "<li class='list-item'>
                                        <label class='text-capitalize' for='salesman_box" . $em['id'] . "'>" . $em['name'] . "</label>
                                        <input checked type='checkbox' class='salesman_ids' value=" . $em['id'] . " id='salesman_box" . $em['id'] . "' name='salesman_box'>
                                       </li>";
                                        } else {
                                            echo "<li class='list-item'>
                                            <label class='text-capitalize' for='salesman_box" . $em['id'] . "'>" . $em['name'] . "</label>
                                            <input type='checkbox' class='salesman_ids' value=" . $em['id'] . " id='salesman_box" . $em['id'] . "' name='salesman_box'>
                                           </li>";
                                        }
                                    }
                                }
                            } else {
                                $DB->sql("SELECT * from employee where branch_assigned=0 and designation ='salesman'");
                                $salesm = $DB->getResult();
                                foreach ($salesm as $sal) {
                                    foreach ($sal as $s) {
                                        echo "<li class='list-item'>
                                                <label class='text-capitalize' for='mechanic_box" . $s['id'] . "'>" . $s['name'] . "</label>
                                                <input type='checkbox' class='mechanic_ids' value=" . $s['id'] . " id='mechanic_box" . $s['id'] . "' name='mechanic_box'>
                                               </li>";
                                    }
                                }
                            }
                            ?>


                        </ul>
                    </div>
                </div>
                <div class="form-group mb-2 d-flex flex-column">
                    <h5>Assign Mechanic</h5>
                    <div class="salesman_container mt-2">
                        <ul>
                            <?php
                            $mecha = $branch_data[0]['mechanics'];
                            if (!empty($mecha)) {
                                $mechanic_ids = explode(",", $mecha);
                                $DB->sql("SELECT * from employee where branch_assigned=0 and designation ='mechanic' or id in($mecha)");
                                $available_emps = $DB->getResult();
                                foreach ($available_emps as $emp) {
                                    foreach ($emp as $em) {
                                        if (in_array($em['id'], $mechanic_ids)) {
                                            echo "<li class='list-item'>
                                            <label class='text-capitalize' for='mechanic_box" . $em['id'] . "'>" . $em['name'] . "</label>
                                            <input checked type='checkbox' class='mechanic_ids' value=" . $em['id'] . " id='mechanic_box" . $em['id'] . "' name='mechanic_box'>
                                           </li>";
                                        } else {
                                            echo "<li class='list-item'>
                                                <label class='text-capitalize' for='mechanic_box" . $em['id'] . "'>" . $em['name'] . "</label>
                                                <input type='checkbox' class='mechanic_ids' value=" . $em['id'] . " id='mechanic_box" . $em['id'] . "' name='mechanic_box'>
                                               </li>";
                                        }

                                    }
                                }
                            } else {
                                $DB->sql("SELECT * from employee where branch_assigned=0 and designation ='mechanic'");
                                $mech = $DB->getResult();
                                foreach ($mech as $mecha) {
                                    foreach ($mecha as $m) {
                                        echo "<li class='list-item'>
                                                <label class='text-capitalize' for='mechanic_box" . $m['id'] . "'>" . $m['name'] . "</label>
                                                <input type='checkbox' class='mechanic_ids' value=" . $m['id'] . " id='mechanic_box" . $m['id'] . "' name='mechanic_box'>
                                               </li>";
                                    }
                                }
                            }
                            ?>


                        </ul>
                    </div>
                </div>
                <div class="form-group mb-2 d-flex flex-column">
                    <h5>Instock Cars</h5>
                    <div class="instock_car_container mt-2">
                        <?php
                        $arr_car = $branch_data[0]['cars'];
                        if (!empty($arr_car)) {
                            $car_arr = explode(",", $branch_data[0]['cars']);
                            $distinct_cars = array_count_values($car_arr);
                            $DB->sql("SELECT * from sub_model where sub_model_id in ($arr_car)");
                            $sub_model_data = $DB->getResult();
                            foreach ($sub_model_data as $sub_model) {
                                foreach ($sub_model as $sm) {
                                    $sub_model_id = $sm['sub_model_id'];
                                    $DB->select("image_tbl", "car_img", null, "sub_model_car_id=$sub_model_id");
                                    $car_img = $DB->getResult();
                                    ?>
                                    <div class="instock-car">
                                        <div class="instock-car-img car_img mb-2">
                                            <img src="../images/car_img/<?php echo $car_img[0]['car_img'] ?>" class="w-100" alt="">
                                        </div>
                                        <input type="text" value="<?php echo $sm['sub_model_name'] ?>"
                                            class="instock_car_name form-control text-capitalize">
                                        <input name="instock<?php echo $sm['sub_model_id'] ?>" type="number"
                                            value="<?php echo $distinct_cars[$sub_model_id] ?>"
                                            class="instock__car__qty form-control" data-cid="<?php echo $sm['sub_model_id'] ?>"
                                            data-qty="<?php echo $distinct_cars[$sub_model_id] ?>">
                                        <p class='mt-1 amsg badge bg-danger'></p>
                                    </div>
                                    <?php
                                }
                            }
                        } else {
                            echo "No car found";
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group mb-2 d-flex flex-column">
                    <div class="available-car-list">
                        <h5 class="mb-2">Available Cars</h5>
                        <ul>
                            <?php
                            $DB->select('sub_model', "*", null, "qty>=1");
                            $available_cars = $DB->getResult();
                            foreach ($available_cars as $car) {
                                echo "<li class='list-item text-capitalize mb-2'><p>" . $car['sub_model_name'] . "</p><span class='reflect" . $car['sub_model_id'] . " badge bg-info me-2 reflect'>" . $car['qty'] . "</span>
                                <div> 
                                <input data-cid=" . $car['sub_model_id'] . " type='number' name='car" . $car['sub_model_id'] . "' placeholder='Enter Quantity' class='carqty form-control'/>
                                <p class='mt-1 amsg badge bg-danger'></p>
                                </div>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="form-group mb-2 banner">
                    <label for="" class="mb-2">Choose Showroom Cover Photo</label>
                    <input name="new_branch_img" type="file" class="form-control">
                    <input name="old_branch_img" hidden value="<?php echo $branch_data[0]['thumb_img'] ?>" type="text"
                        class="form-control">
                    <img src="../images/branch_banners/<?php echo $branch_data[0]['thumb_img'] ?>" alt="">

                </div>

                <button class="mt-3 btn btn-dark text-capitalize" id='add_showroom_btn'>Update
                    <?php echo $b_name[0]; ?>?
                </button>
            </form>
        </div>
        <div class="available-cars text-end">
            <div class="available-emp-list">
                <h5 class="mb-2">Employees Category</h5>
                <ul>
                    <?php
                    $DB->sql("SELECT designation,count(designation) as total  from employee where branch_assigned='0' GROUP BY designation ");
                    $available_emps = $DB->getResult();
                    foreach ($available_emps as $emp) {
                        foreach ($emp as $em) {
                            echo "<li class='list-item text-capitalize'>" . $em['designation'] . "<span class='badge bg-info'>" . $em['total'] . "</span></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="available-emp-list">
                <h5 class="mb-2">Employees Names</h5>
                <ul>
                    <?php
                    $DB->sql("SELECT designation,name from employee where branch_assigned=0 and designation !='manager'");
                    $available_emps = $DB->getResult();
                    foreach ($available_emps as $emp) {
                        foreach ($emp as $em) {
                            echo "<li class='mb-1 list-item text-capitalize'>" . $em['name'] . "<span class='badge bg-info'>" . $em['designation'] . "</span></li>";
                        }
                    }
                    ?>
                </ul>
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
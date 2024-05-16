<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1>Add Showrooms</h1>
        <a href="showroom.php" class="btn btn-primary">View Showrooms?</a>
    </div>
    <div class="dashboard-container showroom-item-container">

        <div class="showroom-form w-100">
            <form action="" id="add_showroom_form" enctype="multipart/form-data">

                <div class="form-group mt-2 mb-2">
                    <input type="text" name="branch_location" placeholder="Enter Location" class="form-control">
                    <select name="manager_id" id="" class="form-control mt-3">
                        <option value="" selected disabled>Choose Manager</option>
                        <?php
                            $DB->select("employee", "*", null, "designation='manager' AND branch_assigned=0");
                            $available_manager = $DB->getResult();
                            foreach ($available_manager as $manager) {
                                echo "<option name='manager_id' class='text-capitalize' value=" . $manager['id'] . ">" . $manager['name'] . "</option>";
                            }
                        ?>
                    </select>
                    <select name="accountant_id" id="" class="form-control mt-3">
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
                            $DB->sql("SELECT * from employee where branch_assigned=0 and designation ='salesman'");
                            $available_emps = $DB->getResult();
                            foreach ($available_emps as $emp) {
                                foreach ($emp as $em) {
                                    echo "<li class='list-item'>
                                            <label class='text-capitalize' for='salesman_box".$em['id']."'>".$em['name']."</label>
                                            <input type='checkbox' class='salesman_ids' value=".$em['id']." id='salesman_box".$em['id']."' name='salesman_box'>
                                           </li>";
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
                            $DB->sql("SELECT * from employee where branch_assigned=0 and designation ='mechanic'");
                            $available_emps = $DB->getResult();
                            foreach ($available_emps as $emp) {
                                foreach ($emp as $em) {
                                    echo "<li class='list-item'>
                                            <label class='text-capitalize' for='mechanic_box".$em['id']."'>".$em['name']."</label>
                                            <input type='checkbox' class='mechanic_ids' value=".$em['id']." id='mechanic_box".$em['id']."' name='mechanic_box'>
                                           </li>";
                                }
                            }
                            ?>


                        </ul>
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
                                echo "<li class='list-item text-capitalize mb-2'><p>" . $car['sub_model_name'] . "</p><span class='badge bg-info me-2'>" . $car['qty'] . "</span>
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

                <div class="form-group mb-2">
                    <select name="estd" id="estd" class="form-control">
                        <option value="" selected disabled>Choose branch estd year</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="" class="mb-2">Choose Showroom Cover Photo</label>
                    <input name="branch_img" type="file" class="form-control">
                </div>

                <button class="mt-3 btn btn-dark" id="add_showroom_btn">Add Post?</button>
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
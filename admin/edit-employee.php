<?php
include 'partials/header.inc.php';
$eid = $_GET['eid'];
$DB->select('employee', "*", null, "id=$eid");
$emp_info = $DB->getResult();
?>
<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1 class='text-capitalize'>Edit <?php echo $emp_info[0]['name']; ?>'s Details</h1>
        <a href="employee.php" class="btn btn-primary">View all employee?</a>
    </div>
    <div
        class="dashboard-container dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
        <div class="form-container w-100">
            <form action="" id="employee-update" class='text-light'>
                <?php
                foreach ($emp_info as $e_info) {
                    ?>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee Name </label>
                        <input value="<?php echo $e_info['name']; ?>" type="text" name="emp_name" class="form-control mb-2">
                        <input type="text" name='e_id' hidden class="form-control" value="<?php echo $e_info['id']; ?>">
                    </div>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee E-mail </label>
                        <input value="<?php echo $e_info['email']; ?>" type="text" name="emp_email"
                            class="form-control mb-2">
                    </div>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee Contact </label>
                        <input value="<?php echo $e_info['phone'] ?>" type="text" name="emp_contact"
                            class="form-control mb-2">
                        <input hidden readonly type="text" name="prev_branch" value="<?php
                        if (!empty($e_info['assigned_branch_id'])) {
                            echo $e_info['assigned_branch_id'];
                        } else {
                            echo 0;
                        }
                        ?>" class="form-control">
                        <input hidden readonly type="text" name="prev_designation"
                            value="<?php echo $e_info['designation']; ?>" class="form-control">
                    </div>
                    <div class="form-group mb-2 w-100">

                        <label for="" class="mb-2">Employee Branch </label>

                        <?php
                        if (!empty($e_info['assigned_branch_id'])) {
                            $id = $e_info['assigned_branch_id'];
                            $DB->select("branches", "branch_name", null, "branch_id=$id");
                            $branch = $DB->getResult();
                            echo "<input readonly class='form-control' value='" . $branch[0]['branch_name'] . "'>";
                        } else {
                            echo "<input readonly value='No branch assigned' class='form-control'>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee Designation </label>

                        <?php
                            echo "<input readonly class='form-control' value='" . $e_info['designation'] . "'>";
                        ?>

                        </select>
                    </div>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee Salary Status </label>
                        <select name="emp_salary" id="" class="form-control">
                            <?php
                            if ($e_info['salary_status']) {
                                echo "<option selected value='" . $e_info['salary_status'] . "'>Paid</option>";
                            } else {
                                echo "<option selected value='" . $e_info['salary_status'] . "'>Pending</option>";
                            }
                            echo "<option  value='1'>Paid</option>";
                            ?>

                        </select>
                    </div>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee Join Date </label>
                        <input value="<?php echo $e_info['join_date'] ?>" type="date" name="emp_join_date"
                            class="form-control mb-2">
                    </div>
                    <div class="form-group mb-2 w-100">
                        <label for="" class="mb-2">Employee Photo </label>
                        <input type="file" name="new_emp_img" class="form-control mb-2">
                        <input type="text" name="old_emp_img" hidden readonly value="<?php echo $e_info['img']; ?>"
                            class="form-control">
                        <div class="prev-photo">
                            <img src="../images/employee_img/<?php echo $e_info['img'] ?>" alt="">
                        </div>
                    </div>
                    <button class="btn-sm btn btn-primary">Update?</button>
                    <?php
                }
                ?>
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
<?php
include 'partials/header.inc.php';
$DB->sql("SELECT * from employee");
$data = $DB->getResult();

function filterByDesignation($data, $designation)
{
    $filteredArray = [];
    foreach ($data as $item) {
        if ($item['designation'] === $designation) {
            $filteredArray[] = $item;
        }
    }
    return $filteredArray;
}

// Filtered arrays for each designation
$managers = filterByDesignation($data[0], 'manager');
$accountants = filterByDesignation($data[0], 'accountant');
$salesmen = filterByDesignation($data[0], 'salesman');
$mechanics = filterByDesignation($data[0], 'mechanic');

function printTableRow($data)
{
    foreach ($data as $dt) {
        if (!empty($dt['assigned_branch_id'])) {
            $con = mysqli_connect("localhost", "root", "", "cardb");
            $bid = $dt['assigned_branch_id'];

            $run_sql = mysqli_query($con, "SELECT branch_name from branches where branch_id=$bid");
            $bdata = mysqli_fetch_assoc($run_sql);
            $br_name = $bdata['branch_name'];
            $flag="";
        } else {
            $flag="bg-danger";
            $br_name = "<span class='badge bg-warning'>Not Assigned</span>";
        }
        echo "<tr class='$flag'>";
        echo "<td>" . $dt['id'] . "</td>";
        echo "<td class='text-capitalize'>" . $dt['name'] . "</td>";
        echo "<td class='text-lowercase'>" . $dt['email'] . "</td>";
        echo "<td>" . $dt['phone'] . "</td>";
        echo "<td>".$br_name."</td>";
        echo "<td>" . $dt['join_date'] . "</td>";
        echo "<td>";
        if ($dt['salary_status']) {
            echo '<span class="badge bg-success">Paid</span>';
        } else {
            echo '<span class="badge bg-primary">Pending</span>';
        }
        echo "</td>";
        echo "<td>";
        if (empty($dt['img'])) {
            echo "Not found";
        } else {
            echo "<img src='../images/employee_img/" . $dt['img'] . "'>";
        }
        echo "</td>";
        echo "<td class='d-flex align-items-center justify-content-center'>";
        echo "<a href='edit-employee.php?eid=" . $dt['id'] . "' class='btn btn-primary bg-success btn-sm'>Edit?</a>";
        echo "||";
        echo "<button data-eid='" . $dt['id'] . "' class='btn btn-primary bg-danger btn-sm'>Delete?</button>";
        echo "</td>";
        echo "</tr>";
    }
}


?>

<div class="dashboard-content mt-5 px-2">
    <div class="employee__container">

        <a href="add-employee.php" class="btn btn-primary btn-sm">Add Employee?</a>

        <div class="specs__container">
            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Manager</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded mt-2">
                    <div class="p-3">
                        <div class="assigned_manager">
                            <table class="table table-bordered table-striped border-dark table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    <?php 
                                        printTableRow($managers);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Accountant -->
            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Accountant</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded mt-2">
                    <div class="p-3">
                        <div class="assigned_manager">
                        <table class="table table-bordered table-striped border-dark table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    <?php 
                                        printTableRow($accountants);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Salesman -->
            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Salesman</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded mt-2">
                    <div class="p-3">
                        <div class="assigned_manager">
                        <table class="table table-bordered table-striped border-dark table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    <?php 
                                        printTableRow($salesmen);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Mechanic -->
            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Mechanic</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded mt-2">
                    <div class="p-3">
                        <div class="assigned_manager">
                        <table class="table table-bordered table-striped border-dark table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    <?php 
                                        printTableRow($mechanics);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- employee section ends -->
    </div>
</div>
</div>
</div>
</section>




<script src="../js/jquery.min.js"></script>
<script src="../js/admin.js"></script>

</body>

</html>
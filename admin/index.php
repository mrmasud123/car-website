<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <h1 class="mb-3">Dashboard</h1>
                    <div class="dashboard-container">
                        <div class="content bg-warning">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                    <?php 
                                        $DB->select("sub_model","COUNT(*) as cnt");
                                        $car_cnt=$DB->getResult();
                                        foreach($car_cnt as $cnt){
                                            echo "<h2>".$cnt['cnt']."</h2>";
                                        }
                                    ?>
                                    
                                    <span>Total Car</span>
                                </div>
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="donor.php" class="nav-item" style="visibility: hidden;">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("employee","COUNT(*) as emp");
                                        $emp_cnt=$DB->getResult();
                                        foreach($emp_cnt as $cnt){
                                            echo "<h2>".$cnt['emp']."</h2>";
                                        }
                                    ?>
                                    <span>Total Employee</span>
                                </div>
                                <i class="fa fa-medkit"></i>
                            </div>
                            <a href="employee.php" class="nav-item">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("model","COUNT(*) as md");
                                        $model_cnt=$DB->getResult();
                                        foreach($model_cnt as $modcnt){
                                            echo "<h2>".$modcnt['md']."</h2>";
                                        }
                                    ?>
                                    <span>Car Models</span>
                                </div>
                                <i class="fa fa-building"></i>
                            </div>
                            <a href="models.php" class="nav-item">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("model","COUNT(*) as md");
                                        $model_cnt=$DB->getResult();
                                        foreach($model_cnt as $modcnt){
                                            echo "<h2>".$modcnt['md']."</h2>";
                                        }
                                    ?>
                                    <span>Total Users</span>
                                </div>
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="users.php" class="nav-item">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("test_drive","COUNT(*) as mtdrive");
                                        $testdrive_cnt=$DB->getResult();
                                        foreach($testdrive_cnt as $td){
                                            echo "<h2>".$td['mtdrive']."</h2>";
                                        }
                                    ?>
                                    <span>Test Drive Request</span>
                                </div>
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="test-drive-request.php" class="nav-item">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("sales_tbl","COUNT(*) as sale");
                                        $sale_cnt=$DB->getResult();
                                        foreach($sale_cnt as $salecnt){
                                            echo "<h2>".$salecnt['sale']."</h2>";
                                        }
                                    ?>
                                    <span>Total Sales</span>
                                </div>
                                <i class="fa fa-medkit"></i>
                            </div>
                            <a href="total-sales.php" class="nav-item">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("branches","COUNT(*) as branch");
                                        $branch_cnt=$DB->getResult();
                                        foreach($branch_cnt as $branchcnt){
                                            echo "<h2>".$branchcnt['branch']."</h2>";
                                        }
                                    ?>
                                    <span>Showrooms</span>
                                </div>
                                <i class="fa fa-medkit"></i>
                            </div>
                            <a href="showroom.php" class="nav-item">Read More? <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <div class="content bg-secondary">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="content-left ms-2">
                                <?php 
                                        $DB->select("admin_tbl","COUNT(*) as admin");
                                        $admin_cnt=$DB->getResult();
                                        foreach($admin_cnt as $admincnt){
                                            echo "<h2>".$admincnt['admin']."</h2>";
                                        }
                                    ?>
                                   
                                    <span>Admin</span>
                                </div>
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="admin.php" class="nav-item">Add Admin? <i class="fa fa-arrow-right"></i></a>
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
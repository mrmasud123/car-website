<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="employee__container">
        <div class="car-list-header w-25 text-center mb-5 d-flex align-items-center flex-column">
            <img src="../images/car-logo.png" alt="" class="car__image mb-3 w-50">
            <form action="">
                <div class="form-group">
                    <select name="" id="" class="form-control">
                        <option value="">Choose Showroom</option>
                        <option value="">Model A</option>
                        <option value="">Model B</option>
                    </select>
                </div>
            </form>
        </div>
        <!-- employee section starts -->

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
                <div class="specs__content__details rounded">
                    <div class="p-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Designation</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DB->select("employee", "*", null, "designation='manager'");
                                $manager_data = $DB->getResult();
                                if(count($manager_data)>0){

                                    foreach ($manager_data as $m_data) {
                                
                                    ?>
                                    <tr>
                                        <td><?php echo $m_data['id'] ?></td>
                                        <td class="text-capitalize"><?php echo $m_data['name'] ?></td>
                                        <td class="text-lowercase"><?php echo $m_data['email'] ?></td>
                                        <td><?php echo $m_data['phone'] ?></td>
                                        <td><?php echo $m_data['branch'] ?></td>
                                        <td><?php echo $m_data['designation'] ?></td>
                                        <td><?php echo $m_data['join_date'] ?></td>
                                        <td>
                                            <?php  
                                                if($m_data['salary_status']){
                                                    echo '<span class="badge bg-success">Paid</span>';
                                                }else{
                                                    echo '<span class="badge bg-danger">Pending</span>';
                                                }
                                            ?>
                                            
                                        </th>
                                        <td><?php echo $m_data['img'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="edit-employee.php?eid=<?php echo $m_data['id'] ?>" class="btn btn-primary bg-success btn-sm">Edit?</a>
                                            ||
                                            <button data-eid="<?php echo $m_data['id'] ?>" class="btn btn-primary bg-danger btn-sm">Delete?</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo "<tr ><td colspan='10' align='center' >No data found</td></tr>";
                            }
                        
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Accountant</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded">
                    <div class="p-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Designation</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DB->select("employee", "*", null, "designation='accountant'");
                                $accountant_data = $DB->getResult();
                                if(count($accountant_data)>0){

                                    foreach ($accountant_data as $acc_data) {
                                
                                    ?>
                                    <tr>
                                        <td><?php echo $acc_data['id'] ?></td>
                                        <td class="text-capitalize"><?php echo $acc_data['name'] ?></td>
                                        <td class="text-lowercase"><?php echo $acc_data['email'] ?></td>
                                        <td><?php echo $acc_data['phone'] ?></td>
                                        <td><?php echo $acc_data['branch'] ?></td>
                                        <td><?php echo $acc_data['designation'] ?></td>
                                        <td><?php echo $acc_data['join_date'] ?></td>
                                        <td>
                                            <?php  
                                                if($acc_data['salary_status']){
                                                    echo '<span class="badge bg-success">Paid</span>';
                                                }else{
                                                    echo '<span class="badge bg-danger">Pending</span>';
                                                }
                                            ?>
                                            
                                        </th>
                                        <td><?php echo $acc_data['img'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="edit-employee.php?eid=<?php echo $acc_data['id'] ?>" class="btn btn-primary bg-success btn-sm">Edit?</a>
                                            ||
                                            <button data-eid="<?php echo $acc_data['id'] ?>" class="btn btn-primary bg-danger btn-sm">Delete?</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo "<tr ><td colspan='10' align='center' >No data found</td></tr>";
                            }
                        
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Salesman</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded">
                    <div class="p-3">
                    <table class="table table-bordered">
                            <thead>
                            <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Designation</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DB->select("employee", "*", null, "designation='salesman'");
                                $salesman_data = $DB->getResult();
                                if(count($salesman_data)>0){

                                    foreach ($salesman_data as $s_data) {
                                
                                    ?>
                                    <tr>
                                        <td><?php echo $s_data['id'] ?></td>
                                        <td class="text-capitalize"><?php echo $s_data['name'] ?></td>
                                        <td class="text-lowercase"><?php echo $s_data['email'] ?></td>
                                        <td><?php echo $s_data['phone'] ?></td>
                                        <td><?php echo $s_data['branch'] ?></td>
                                        <td><?php echo $s_data['designation'] ?></td>
                                        <td><?php echo $s_data['join_date'] ?></td>
                                        <td>
                                            <?php  
                                                if($s_data['salary_status']){
                                                    echo '<span class="badge bg-success">Paid</span>';
                                                }else{
                                                    echo '<span class="badge bg-danger">Pending</span>';
                                                }
                                            ?>
                                            
                                        </th>
                                        <td><?php echo $s_data['img'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="edit-employee.php?eid=<?php echo $s_data['id'] ?>" class="btn btn-primary bg-success btn-sm">Edit?</a>
                                            ||
                                            <button data-eid="<?php echo $s_data['id'] ?>" class="btn btn-primary bg-danger btn-sm">Delete?</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo "<tr ><td colspan='10' align='center' >No data found</td></tr>";
                            }
                        
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="specs__content mb-5">
                <div class="specs__content__header d-flex align-items-center justify-content-between">
                    <h1>Mechanic</h1>
                    <div class="icon-box position-relative">
                        <i class="expand_btn fa fa-plus fs-1"></i>
                        <i class="collapse_btn fa fa-minus fs-1 position-absolute"></i>
                    </div>
                </div>
                <div class="specs__content__details rounded">
                    <div class="p-3">
                    <table class="table table-bordered">
                            <thead>
                            <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Branch</th>
                                    <th>Designation</th>
                                    <th>Join Date</th>
                                    <th>Salary status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $DB->select("employee", "*", null, "designation='mechanic'");
                                $mechanic_d = $DB->getResult();
                                if(count($mechanic_d)>0){

                                    foreach ($mechanic_d as $mechanic_data) {
                                
                                    ?>
                                    <tr>
                                        <td><?php echo $mechanic_data['id'] ?></td>
                                        <td class="text-capitalize"><?php echo $mechanic_data['name'] ?></td>
                                        <td class="text-lowercase"><?php echo $mechanic_data['email'] ?></td>
                                        <td><?php echo $mechanic_data['phone'] ?></td>
                                        <td><?php echo $mechanic_data['branch'] ?></td>
                                        <td><?php echo $mechanic_data['designation'] ?></td>
                                        <td><?php echo $mechanic_data['join_date'] ?></td>
                                        <td>
                                            <?php  
                                                if($mechanic_data['salary_status']){
                                                    echo '<span class="badge bg-success">Paid</span>';
                                                }else{
                                                    echo '<span class="badge bg-danger">Pending</span>';
                                                }
                                            ?>
                                            
                                        </th>
                                        <td><?php echo $mechanic_data['img'] ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="edit-employee.php?eid=<?php echo $mechanic_data['id'] ?>" class="btn btn-primary bg-success btn-sm">Edit?</a>
                                            ||
                                            <button type="button" data-eid="<?php echo $mechanic_data['id'] ?>" class="btn btn-primary bg-danger btn-sm">Delete?</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo "<tr ><td colspan='10' align='center' >No data found</td></tr>";
                            }
                        
                                ?>


                            </tbody>
                        </table>
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
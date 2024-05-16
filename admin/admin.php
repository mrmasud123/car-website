<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1>Admin Section</h1>
        <a href="add-admin.php" class="btn btn-primary">Add Admin?</a>
    </div>

    <div class="dashboard-container">
        <table class="table table-bordered table-hover table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Total Posts</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $DB->select("admin_tbl", "*");
                $all_admin = $DB->getResult();
                if (count($all_admin) >= 1) {
                    foreach ($all_admin as $admin) {
                        ?>
                        <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td class="text-capitalize"><?php echo $admin['admin_name']; ?></td>
                            <td><?php echo $admin['admin_email']; ?></td>
                            <td><?php echo md5($admin['admin_password']); ?></td>
                            <td><?php echo $admin['total_post']; ?></td>
                            <td>
                            <?php  
                                if($admin['account_status']){
                                    echo '<input type="checkbox" data-admin-id='.$admin["id"].' class="toggle-checkbox admin__check" checked />';
                                }else{
                                    echo '<input type="checkbox" data-admin-id='.$admin["id"].' class="toggle-checkbox admin__check" />';
                                }
                            ?>
                            </td>
                            <td class="d-flex align-items-center justify-content-around">
                                <a href="edit-admin.php?aid=<?php echo $admin['id']; ?> " data-admin-id=<?php echo $admin['id']; ?> class="btn btn-primary bg-success btn-sm edit_admin">Edit?</a>
                                <button data-admin-id=<?php echo $admin['id']; ?> class="btn btn-primary bg-danger btn-sm delete_admin">Delete?</button>
                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>



            </tbody>
        </table>
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

                <div class="drive-form-container p-3 w-50">
                    <div class="form-header d-flex align-items-center justify-content-between mb-5">
                        <h3 class="text-light">Edit Masud Info</h3>
                        <i class="fa fa-times fs-1 text-light" id="form-close"></i>
                    </div>
                    <div class="drive-form">
                        <form action="">
                            <div class="form-group mb-2 w-100">

                                <input type="text" name="car_name" placeholder="Enter Admin Name"
                                    class="form-control mb-2">
                            </div>
                            <div class="form-group mb-2 w-100">

                                <input type="text" name="car_name" placeholder="Enter Admin E-mail"
                                    class="form-control mb-2">
                            </div>
                            <div class="form-group mb-2 w-100">

                                <input type="text" placeholder="Enter Admin Password" name="car_name"
                                    class="form-control mb-2">
                            </div>

                            <div class="form-group mb-2 w-100">
                                <label for="" class="mb-2 text-light">Admin Account Status</label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose status</option>
                                    <option value="">Active</option>
                                    <option value="">Deactivate</option>
                                </select>
                            </div>

                            <button class="btn btn-primary">Update?</button>
                        </form>

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
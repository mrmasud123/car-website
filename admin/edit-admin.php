<?php include 'partials/header.inc.php';
$aid = $_GET['aid'];
$DB->select("admin_tbl", "*", null, "id=$aid");
$admin_details = $DB->getResult();
?>

<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1>Admin Section</h1>
        <a href="add-admin.php" class="btn btn-primary">Add Admin?</a>
    </div>

    <div class="mt-5 dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
        <div class="form-container w-100">
            <?php
            foreach ($admin_details as $admin) {
                ?>
                <form action="" id="update_admin_form">
                    <div class="form-group mb-2 w-100">
                        <input type="text" value="<?php echo $aid; ?>" name="aid" class="mt-2 form-control">
                        <input type="text" name="admin_name" value="<?php echo $admin['admin_name'] ?>" class="form-control mb-2 mt-2">
                    </div>
                    <div class="form-group mb-2 w-100">

                        <input type="email" name="admin_email" value="<?php echo $admin['admin_email'] ?>" class="form-control mb-2">
                    </div>
                    <div class="form-group mb-2 w-100">

                        <input type="password" value="<?php echo $admin['admin_password'] ?>" id="password" name="admin_password"
                            class="form-control mb-2">
                        <input type="checkbox" id="showPassword" class="toggle-checkbox">
                        <label class="text-light" for="showPassword">Show Password</label>
                    </div>
                    <label for="" class="text-light mb-2 mt-2">Number of posts</label>
                    <input name='num_of_posts' type="number" value="<?php echo $admin['total_post']; ?>" class="form-control">
                    <div class="form-group mt-2 text-light mb-2 w-100">
                        <label for="">Account Status</label>
                    <?php  
                                if($admin['account_status']){
                                    echo '<input type="checkbox" data-admin-id='.$admin["id"].' class="toggle-checkbox admin__check" checked />';
                                }else{
                                    echo '<input type="checkbox" data-admin-id='.$admin["id"].' class="toggle-checkbox admin__check" />';
                                }
                            ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Update?</button>
                </form>
            <?php
            }
            ?>

        </div>
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
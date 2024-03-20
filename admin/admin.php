<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="text-start d-flex align-items-center justify-content-between mb-4">
                        <h1>Admin Section</h1>
                        <a href="add-admin.php" class="btn btn-primary">Add Admin?</a>
                    </div>
                    
                    <div class="dashboard-container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Password</th>
                                    <!-- <th></th> -->
                                    <th>Assigned Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ADMIN25</td>
                                    <td class="text-uppercase">Masud Rana</td>
                                    <td>masud@gmail.com</td>
                                    <td>masud</td>
                                    <td>01/02/2023</td>
                                    <td><span class="badge bg-success text-light">Active</span></td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        <button class="btn btn-primary bg-success btn-sm edit_admin" data-id="5">Edit?</button>
                                        <button class="btn btn-primary bg-danger btn-sm">Delete?</button> 
                                    </td>
                                </tr>
                                
                                
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
                                
                                    <input type="text" name="car_name" placeholder="Enter Admin Name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    
                                    <input type="text" name="car_name" placeholder="Enter Admin E-mail"  class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                
                                    <input type="text" placeholder="Enter Admin Password"  name="car_name" class="form-control mb-2">
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
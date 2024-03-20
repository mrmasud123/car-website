<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="text-start d-flex align-items-center justify-content-between mb-4">
                        <h1>Add Admin Section</h1>
                        <a href="admin.php" class="btn btn-primary">View All?</a>
                    </div>

                    <div class="mt-5 dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="form-container w-100">
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
                                    <label for="" class="mb-2">Admin Account Status</label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected disabled>Choose status</option>
                                        <option value="">Active</option>
                                        <option value="">Deactivate</option>
                                    </select>
                                </div>
                                
                                <button class="btn btn-primary">Add?</button>
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
<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <div class="text-start d-flex align-items-center justify-content-between mb-4">
                        <h1>Edit Masud's Details</h1>
                        <a href="employee.php" class="btn btn-primary">View all employee?</a>
                    </div>
                    <div class="dashboard-container dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="form-container w-100">
                            <form action="">
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Name </label>
                                    <input type="text" name="car_name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee E-mail </label>
                                    <input type="text" name="car_name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Contact </label>
                                    <input type="text" name="car_name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Branch </label>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled selected>Choose Branch</option>
                                        <option value="">Motijheel</option>
                                        <option value="">Gulshan</option>
                                        <option value="">Bashundhara</option>
                                        <option value="">Mirpur</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Designation </label>
                                    <select name="" id="" class="form-control">
                                        <option value="" disabled selected>Choose Employee Designation</option>
                                        <option value="">Manager</option>
                                        <option value="">Accountant</option>
                                        <option value="">Salesman</option>
                                        <option value="">Mechanic</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Salary Status </label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected disabled>Choose status</option>
                                        <option value="">Paid</option>
                                        <option value="">Pending</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Join Date </label>
                                    <input type="text" name="car_name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Photo </label>
                                    <input type="file" name="car_name" class="form-control mb-2">
                                    <div class="prev-photo">
                                        <img src="../images/about.jpg" alt="">
                                    </div>
                                </div>
                                <button class="btn btn-primary">Update?</button>
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
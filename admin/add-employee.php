<?php include 'partials/header.inc.php'; ?>
            
                <div class="dashboard-content mt-5 px-2">
                    <h1>Add New Employee</h1>
                  
                    <div class="mt-5 dashboard-container dashboard-container d-flex align-items-center justify-content-center flex-column w-75">
                        <div class="form-container w-100">
                            <form action="" id="AddEmpForm" enctype="multipart/form-data">
                                <div class="mt-3 form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Name </label>
                                    <input placeholder="Enter Employee Name" type="text" name="emp_name" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee E-mail </label>
                                    <input placeholder="Enter Employee E-mail" type="email" name="emp_email" class="form-control mb-2">
                                </div>
                                <div class="form-group position-relative mb-2" id="phone">
                                    <input placeholder="Enter your phone" name="emp_contact" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Branch </label>
                                    <select name="emp_branch" id="" class="form-control">
                                        <option value="" disabled selected>Choose Branch</option>
                                        <option value="motijheel">Motijheel</option>
                                        <option value="gulshan">Gulshan</option>
                                        <option value="bashundhara">Bashundhara</option>
                                        <option value="mirpur">Mirpur</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Designation </label>
                                    <select name="emp_designation" id="" class="form-control">
                                        <option value="" disabled selected>Choose Employee Designation</option>
                                        <option value="manager">Manager</option>
                                        <option value="accountant">Accountant</option>
                                        <option value="salesman">Salesman</option>
                                        <option value="mechanic">Mechanic</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Salary Status </label>
                                    <select name="emp_salary" id="" class="form-control">
                                        <option value="" selected disabled>Choose status</option>
                                        <option value="1">Paid</option>
                                        <option value="0">Pending</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Join Date </label>
                                    <input type="date" name="emp_joindate" class="form-control mb-2">
                                </div>
                                <div class="form-group mb-2 w-100">
                                    <label for="" class="mb-2">Employee Photo </label>
                                    <input type="file" name="emp_img" class="form-control mb-2">
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
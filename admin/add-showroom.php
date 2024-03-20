<?php include 'partials/header.inc.php'; ?>
           
                <div class="dashboard-content mt-5 px-2">
                    <div class="text-start d-flex align-items-center justify-content-between mb-4">
                        <h1>Add Showrooms</h1>
                        <a href="showroom.php" class="btn btn-primary">View Showrooms?</a>
                    </div>
                    <div class="dashboard-container showroom-item-container">
                        
                        <div class="showroom-form w-75">
                            <form action="">
                                
                                <div class="form-group mt-2 mb-2">
                                    <input type="text" placeholder="Enter Location" class="form-control">
                                    <input type="text" placeholder="Enter Manager Name" class="form-control mt-2">
                                    <input type="text" placeholder="Enter Accountant Name" class="form-control mt-2">
                                </div>
                                
                                <div class="form-group mb-2 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_car_box">Add Car<i class="fa fa-plus ms-2"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Car name" class="mb-2 form-control carbox">
                                        <input type="number" name="car_name" placeholder="Car Quantity" class="mb-2 form-control carqty">
                                    </div>
                                </div>
                                <div class="form-group mb-2 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_salesman_box">Add Salesman<i class="fa fa-plus ms-2"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Salesman Name" class="mb-2 form-control salesmanbox">
                                    </div>
                                </div>
                                <div class="form-group mb-2 d-flex flex-column">
                                    <button class="btn btn-sm btn-primary add_mechanic_box">Add Mechanic<i class="fa fa-plus ms-2"></i></button>
                                    <div class="input-box mt-2 mb-3">
                                        <input type="text" name="car_name" placeholder="Salesman Name" class="mb-2 form-control mechanicbox">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-2">Choose Showroom Cover Photo</label>
                                    <input type="file" class="form-control">
                                </div>
                                <button class="mt-3 btn btn-dark">Add Post?</button>
                           </form>
                          </div>
                          <div class="available-cars text-end">
                            <div class="available-car-list">
                                <h4>Available Cars</h4>
                            <ul>
                                <li class="list-item text-capitalize">Toyota Supra <span class="badge bg-info">20</span></li>
                                <li class="list-item text-capitalize">MRCAR Corolla <span class="badge bg-info">20</span></li>
                                 <li class="list-item text-capitalize">Toyota Supra <span class="badge bg-info">20</span></li>
                                <li class="list-item text-capitalize">MRCAR Corolla <span class="badge bg-info">20</span></li>
                                 <li class="list-item text-capitalize">Toyota Supra <span class="badge bg-info">20</span></li>
                                <li class="list-item text-capitalize">MRCAR Corolla <span class="badge bg-info">20</span></li>
                            </ul>
                            </div>
                            <div class="available-emp-list">
                                <h4>Available Employees</h4>
                            <ul>
                                <li class="list-item text-capitalize">Toyota Supra <span class="badge bg-info">20</span></li>
                                <li class="list-item text-capitalize">MRCAR Corolla <span class="badge bg-info">20</span></li>
                                 <li class="list-item text-capitalize">Toyota Supra <span class="badge bg-info">20</span></li>
                                <li class="list-item text-capitalize">MRCAR Corolla <span class="badge bg-info">20</span></li>
                                 <li class="list-item text-capitalize">Toyota Supra <span class="badge bg-info">20</span></li>
                                <li class="list-item text-capitalize">MRCAR Corolla <span class="badge bg-info">20</span></li>
                            </ul>
                            </div>
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
<?php
$mid = $_GET['id'];
include 'partials/single-car-header.inc.php';
// session_start();
// if(isset($_SERVER['HTTP_REFERER'])) {
    $previous_page = $_SERVER['HTTP_REFERER'];
// }
if(!isset($_SESSION["logged_user_id"])){    
    header("location:purchase.php");
}
?>

<!-- your car section starts -->
<section id="car-listing" class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="car-list-container d-flex align-items-center flex-column justify-content-center">
                    <div class="car-list-content testd_content mb-5">
                        <div class="car-list testd">
                        <?php
                                    foreach($car_data as $car_info){
                                        foreach($car_info as $car){
                                ?>
                            <div class="car-image">
                                <img id="carImg" src="images/<?php echo $car['car_img']; ?>" alt="">
                                
                            </div>
                            <div class="car-details">
                                <h2 class="text-uppercase"><?php echo $car['sub_model_name'] ?></h2>
                                <hr>
                                
                                 <table>
                                    <tr>
                                        <td><i class="fa fa-cog" aria-hidden="true"></i></td>
                                        <td><?php echo $car['engine']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-calendar" aria-hidden="true"></i></td>
                                        <td><?php echo $car['mfg_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-cog" aria-hidden="true"></i></td>
                                        <td><?php echo $car['fuel_type']; ?></td>
                                    </tr>
                                    <td>
                                        <i class="fa fa-car" aria-hidden="true"></i>
                                    </td>
                                    <td><?php echo $car['milege']; ?></td>
                                    </tr>
                                    <td>
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                    </td>
                                    <td><span class="badge bg-success">EMI available</span></td>
                                    </tr>
                                </table>
                              
                               

                            </div>
                        </div>
                        <?php
                                        }
                                    }
                                ?>
                        <div class="pre-condition">
                            <p>Before submitting the test drive form, please read out the pre-conditions</p>
                            <ul class="list-group">
                                <li class="list-group-item text-danger">Driver's License : Must have a valid License
                                    from BRTA</li>
                                <li class="list-group-item text-danger">Age Requirement : Min 20 Years</li>
                                <li class="list-group-item text-danger">Insurance Coverage : Valid Insurance</li>
                                <li class="list-group-item text-danger">Appointment Scheduling : Choose your preferred
                                    time</li>
                                <li class="list-group-item text-danger">Route Restrictions : Must be aware of route
                                    discipline</li>
                                <li class="list-group-item text-danger">Vehicle Condition : Company will responsible for
                                    any harm or damage done to the car</li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-75 form mt-5 test-drive-form-container">
                        
                        <form action="" id="test_drive_form">
                            <div class="form-group mb-4">
                                <input name='td_name' type="text" placeholder="Enter your name" class="form-control">
                                <input type="text" hidden name="carid" readonly value="<?php echo $car_data[0][0]['sub_model_id'] ?>" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <input readonly name='td_email' type="email" value="<?php echo $_SESSION['logged_user_email'] ?>" placeholder="Enter your e-mail"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <input name='td_address' placeholder="Enter your address" type="text"
                                    class="form-control">
                            </div>
                            <div class="form-group position-relative mb-2" id="phone">
                                <input name='td_phone' placeholder="Enter your phone" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Choose your schedule</label>
                                <input name="td_schedule" type="datetime-local" class="form-control">
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-info">Submit?</button>
                                <button class="btn show-err">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- your car section ends -->
<?php include 'partials/footer.inc.php'; ?>
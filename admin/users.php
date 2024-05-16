<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="users_container">
        <h1>Showing All Users</h1>
        <div class="users-content mt-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>S.NO</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>City</th>
                    <th>Car viewed</th>
                    <th>Drive Requests</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                    <?php
                    $DB->select('users', "*");
                    $all_users = $DB->getResult();
                    if (count($all_users) > 0) {
                        foreach ($all_users as $user) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $user['id']; ?>
                                </td>
                                <td>
                                    <?php echo $user['first_name'] . " " . $user['last_name'] ?>
                                </td>
                                <td class="text-lowercase">
                                    <?php echo $user['email']; ?>
                                </td>
                                <td>
                                    <?php echo $user['password']; ?>
                                </td>
                                <td>
                                    <?php echo $user['city']; ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($user['viewed_cars'])) {
                                        $cars=$user['viewed_cars'];
                                        $DB->sql("SELECT sub_model_name from sub_model where sub_model_id in($cars)");
                                        // echo "<pre>";
                                        // print_r($DB->getResult());
                                        // echo "</pre>";
                                        $car_names=$DB->getResult();
                                        foreach($car_names as $car_name){
                                            foreach($car_name as $cname){
                                        echo "<span class='m-1 badge bg-info'>".$cname['sub_model_name']."</span><br>";
                                            }
                                        }
                                    } else {
                                        echo "<span class='badge bg-danger'>No car viewed</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $user['drive_requests']; ?>
                                </td>
                                <td>
                                    <button type="button" data-eid="<?php echo $user['id'] ?>"
                                        class="btn btn-danger btn-sm">Delete?</button>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>No users found</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
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
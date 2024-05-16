<?php include 'partials/header.inc.php'; ?>


<div class="dashboard-content mt-5 px-2">

    <div class="employee__container">
        <!-- employee section starts -->

        <div class="specs__container">
            <div class="text-start d-flex align-items-center justify-content-between mb-4">
                <h1>Showing All Available Cars</h1>
                <a href="add-car.php" class="btn btn-primary">Add Car?</a>
            </div>
            <?php
            $DB->select("model", "*");
            $all_models = $DB->getResult();
            foreach ($all_models as $s_model) {

                ?>

                <div class="specs__content mb-5">
                    <div class="specs__content__header d-flex align-items-center justify-content-between">
                        <h1 class="text-uppercase">
                            <?php echo $s_model['model_name'];?>
                        </h1>
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
                                        <th>Car Id</th>
                                        <th>Model Name</th>
                                        <th>M.F.G Date</th>
                                        <th>Views</th>
                                        <th>Request</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c_id = $s_model['model_id'];
                                    $DB->select("model","*","sub_model ON sub_model.model_id=model.
                                    model_id","model.model_id=$c_id");
                                    $model_details = $DB->getResult();
                                    if(count($model_details) > 0){
                                        foreach ($model_details as $md) {
                                            ?>
                                            <tr>
                                                <td><?php echo "MRCAR".$md['sub_model_id']; ?></td>
                                                <td class="text-uppercase"><?php echo $md['sub_model_name']; ?></td>
                                                <td><?php echo $md['mfg_date']; ?></td>
                                                <td><?php echo $md['total_view']; ?></td>
                                                <td><?php echo $md['drive_req']; ?></td>
                                                <td><?php echo $md['qty']; ?></td>
                                                <td><?php echo $md['price']; ?></td>
                                                <td>
                                                <a href="edit-model.php?cid=<?php echo $md['sub_model_id'] ?>&cname=<?php echo urlencode($md['sub_model_name']); ?>" class="d-inline btn btn-primary bg-success btn-sm">Edit?</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        echo "<tr><td colspan='9'>No Data Found</td></tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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
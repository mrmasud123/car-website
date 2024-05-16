<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="employee__container">



        <div class="specs__container w-75">
            <div class="text-end w-100 d-flex justify-content-end mb-2">
                <button class="btn-sm btn btn-warning form-group position-relative mt-3 total_bill_calc view_sec">
                    <a href="total-sales.php" class="">View Sale?</a>
                </button>
            </div>
            <div class="add-sale-form-container">
                <form action="" id="add_sale_form">
                    <div class="form-group">
                        <select name="car_name" id="choose_car" class='form-control'>
                            <option value="" disabled selected>Choose car</option>
                            <?php
                                $DB->select("sub_model", "*");
                                $all_models = $DB->getResult();
                                foreach ($all_models as $s_model) {
                                    echo '<option class="text-capitalize" value="' . $s_model['sub_model_id'] . '" >' . $s_model["sub_model_name"] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <input type="text" name='car_price' placeholder="Car Price" readonly class="car_price form-control">
                            <input name="car_id" type="text" placeholder="Car id" readonly class="car_id form-control">
                            <input name="" type="text" placeholder="Available Quantity" readonly class="form-control available_qty">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <select name="branch_id" id="choose_branch" class='form-control'>
                            <option value="" disabled selected>Choose Branch</option>
                            <?php
                            $DB->select("branches", "*");
                            $all_branches = $DB->getResult();
                            foreach ($all_branches as $s_branch) {
                                echo '<option class="text-capitalize" value="' . $s_branch['branch_id'] . '" >' . $s_branch["branch_name"] . '</option>';
                            }
                            ?>
                        </select>
                        <input name="manager_name" type="text" placeholder="Manager Name" readonly
                            class="manager_name form-control mt-1">
                    </div>
                    <div class="form-group mt-3">
                        <input name="cus_name" type="text" placeholder="Enter customer name" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input name="cus_email" type="email" placeholder="Enter customer e-mail" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input name="cus_address" type="address" placeholder="Enter customer address" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input name="car_reg_no" type="text" placeholder="Enter registration no" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input name="car_qty" type="number" placeholder="Enter quantity" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <select name="payment_type" class='form-control'>
                            <option value="" disabled selected>Choose Payment Type</option>
                            <option value="c">Cash</option>
                            <option value="b">Bank</option>
                        </select>
                    </div>
                    <div class="form-group position-relative mt-3 mb-3 total_bill_calc">
                        <input type="submit" class="btn btn-warning" value="Calculate bill?">
                        <div class="messagebox"></div>
                    </div>

                </form>
                <div class="bill-container">
                    <article>
                        <h5 class='w-100 text-center mb-2'>Calculated Total Bill</h5>
                        <table class="table table-bordered">
                            <tbody class="sale_data">

                            </tbody>
                        </table>
                    </article>
                </div>
            </div>
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
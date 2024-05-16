<?php include 'partials/model-header.inc.php'; ?>
<!-- all car list section starts -->
<section id="all_car" class="mt-5 mb-5 text-light">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center flex-column">

                <div class="car__type mt-5 mb-5 d-flex flex-column">
                    <img src="images/car-logo.png" alt="" class="car__image mb-3">
                    <form action="" class='text-dark'>

                        <div class="form-group">
                            <select name="car-type" id="" class="form-control">
                                <option value="" selected disabled>Choose car model</option>
                                <?php
                                $DB->select('model', "*");
                                $models = $DB->getResult();
                                foreach ($models as $model) {
                                    echo "<option class='text-capitalize' value='" . $model['model_id'] . "'>" . $model['model_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="sub_model_list">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- all car list section ends -->

<?php include 'partials/footer.inc.php'; ?>
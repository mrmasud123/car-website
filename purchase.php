<?php include 'partials/purchase-header.inc.php'; ?>


    <!-- car listing section starts -->
    <section id="car-listing" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="car-list-container d-flex align-items-center flex-column justify-content-center">
                        <div class="car-list-header w-25 text-center mb-5 d-flex flex-column">
                            <img src="images/car-logo.png" alt="" class="car__image mb-3 w-50">
                            <form action="">
                                <div class="form-group">
                                    <select name="search_type" id="" class="form-control">
                                        <option selected disabled value="">Choose your filter option</option>
                                        <option value="ASC">Lower to higher price</option>
                                        <option value="DESC">Higher to lower price</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="car-list-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- car listing seciton ends -->

    <?php include 'partials/footer.inc.php'; ?>
<?php include 'partials/header.inc.php'; ?>

<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-between mb-4">
        <h1>Showrooms</h1>
        <a href="add-showroom.php" class="btn btn-primary">Add Showroom?</a>
    </div>
    <div class="dashboard-container">
        <div class="showroom-container w-100">
            <?php
            $DB->select('branches', "*", null);
            $branches = $DB->getResult();
            foreach ($branches as $branch) {
                ?>

                <!-- <a href="single-showroom.php?branch_id=<?php echo $branch['branch_id'] ?>" class="mb-3"> -->
                <a href="single-showroom.php?branch_id=<?php echo $branch['branch_id']; ?>&bname=<?php echo urlencode($branch['branch_name']); ?>" class="mb-3">

                    <div class="showroom-content">
                        <img src="../images/branch_banners/<?php echo $branch['thumb_img'] ?>" alt="">
                        <div class="about-showroom p-3">
                            <h5 class="text-capitalize"><?php echo $branch['branch_name'] ?></h5>
                            <span class="badge bg-info mt-1 mb-2">Since, <?php echo $branch['estd'] ?></span>
                        </div>
                    </div>
                </a>

                <?php
            }
            ?>
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
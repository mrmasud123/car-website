<?php
include 'partials/purchase-header.inc.php';
$DB->select('branches', "*", null);
$branches = $DB->getResult();
?>
<div class="dashboard-content mt-5 px-2">
    <div class="text-start d-flex align-items-center justify-content-center mb-4">
        <h1>All Showrooms</h1>
    </div>
    <div class="dashboard-container">
        <div class="showroom-container w-100">
            <?php 
            foreach ($branches as $branch) {
                ?>

                <!-- <a href="single-showroom.php?branch_id=<?php echo $branch['branch_id'] ?>" class="mb-3"> -->
                <a href="single-showroom.php?branch_id=<?php echo $branch['branch_id']; ?>&bname=<?php echo urlencode($branch['branch_name']); ?>" class="mb-3">

                    <div class="showroom-content">
                        <img src="images/branch_banners/<?php echo $branch['thumb_img'] ?>" alt="">
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
<?php include 'partials/footer.inc.php'; ?>
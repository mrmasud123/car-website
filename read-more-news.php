<?php

include 'Database/config.inc.php';
$pid = $_GET['pid'];
$DB->select("post_category", "*", "news on post_category.id=news.post_type", "news.id=$pid");
$car_news = $DB->getResult();
echo explode(".", basename($_SERVER['PHP_SELF']))[0] ." | ". $car_news[0]['cat_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR car</title>
    <!-- owl carousel css -->
    <!--  <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="position-relative">
    <!-- Scrolltop button starts -->
    <div id="scroll-top">
        <div class="scroll-top-img position-relative">
            <div class="headlight"></div>
            <img class="car-wheel-2" src="images/transparent-wheel.png" alt="">
            <img class="car-body" src="images/transparent-car-btn.png" alt="">
            <img class="car-wheel-1" src="images/transparent-wheel.png" alt="">
        </div>
    </div>
    <!-- Scrolltop button ends -->

    <!-- header section starts -->
    <section id="" class="news-header header read-more-news-header">
        <?php include 'partials/navbar.inc.php'; ?>
    </section>
    <!-- header section ends -->

    <!-- news section starts -->
    <section id="news" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 bg-light">
                    <?php
                    foreach ($car_news as $news) {
                        ?>
                        <div class="read-more-news-container">
                            <div class="news-img">
                                <img id="news-img" class="rounded" src="images/post_img/<?php echo $news['post_img'] ?>"
                                    alt="CAR IMAGE">
                            </div>
                            <div class="news-content text-dark">
                                <h4 class='text-capitalize'><?php echo $news['title'] ?></h4>
                                <div class="news w-100">
                                    <p><?php echo $news['post_desc'] ?></p>
                                    <span class="badge bg-success text-capitalize"><?php echo $news['cat_name']; ?></span>

                                    <div class="news-comment mt-3">
                                        <form id="commentForm" action="">
                                            <div class="form-group">
                                                <textarea name="comment_txt" style="resize: none;" name="" id="" cols="10" rows="3"
                                                class="form-control"></textarea>
                                                <label for="" class="text-muted">Leave a comment.....</label>
                                                <input hidden name="post_id" type="text" readonly value="<?php echo $pid; ?>" class="pid form-control">
                                                <input hidden type="text" readonly value="<?php echo basename($_SERVER['PHP_SELF']) ?>" class="page_url form-control">
                                            </div>
                                            <button class="btn btn-sm btn-warning" type="submit">Comment?</button>
                                        </form>
                                        <div class="commentators">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- news section ends -->


    <?php include 'partials/footer.inc.php'; ?>
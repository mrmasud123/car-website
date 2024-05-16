<?php include 'Database/config.inc.php'; $title= explode(".", basename($_SERVER['PHP_SELF']))[0];?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-capitalize">MR CAR || <?php echo $title; ?></title>

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
    <section id="" class="news-header header">
    <?php include 'partials/navbar.inc.php'; ?>
        <div class="position-absolute">

            <h1></h1>
        </div>
    </section>
    <!-- header section ends -->

    <!-- news section starts -->
    <section id="news" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1 class="w-100 text-center mb-5">Read all the featured news of MRCAR</h1>
                    <div class="news-container">
                        <?php
                        $DB->select("post_category", "*", "news on post_category.id=news.post_type","post_status=1");
                        $car_news = $DB->getResult();
                       if(count($car_news)>=1){
                        foreach ($car_news as $news) {
                            ?>
                            <div class="news-content mb-3">
                                <div class="news-thumbnail">
                                    <img src="images/post_img/<?php echo $news['post_img'] ?>" alt="">
                                </div>
                                <div class="news-desc">
                                    <h3 class='text-capitalize'><?php echo $news['title'] ?></h3>
                                    <span><?php echo substr($news['post_desc'], 0,50) ?>.....</span>
                                    <div class="flex-column news-info d-flex w-50 mt-2 mb-2">
                                        <div class="auth-name">
                                            <span class="badge bg-success text-capitalize"><?php echo $news['auth_name']; ?></span>
                                        </div>
                                        <div class="post-date">
                                            <span><?php echo $news['publish_date']; ?></span>
                                        </div>
                                        <div class="post-cat">
                                            <span class="badge bg-success text-capitalize"><?php echo $news['cat_name']; ?></span>
                                        </div>
                                    </div>
                                    <a data-news-id="<?php echo $news['id']; ?>" href="read-more-news.php?pid=<?php echo $news['id']; ?>" class="btn btn-primary btn-sm inc_news">Read more?</a>
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        echo "<span class='badge bg-success'>No news found</span>";
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news section ends -->


    <?php include 'partials/footer.inc.php'; ?>
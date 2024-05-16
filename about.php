<?php include 'Database/config.inc.php';
$title= explode(".", basename($_SERVER['PHP_SELF']))[0]; ?>
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
    <div id="scroll-top" >
        <div class="scroll-top-img position-relative">
            <div class="headlight"></div>
            <img class="car-wheel-2" src="images/transparent-wheel.png" alt="">
            <img class="car-body" src="images/transparent-car-btn.png" alt="">
            <img class="car-wheel-1" src="images/transparent-wheel.png" alt="">
        </div>
    </div>
    <!-- Scrolltop button ends -->

    <!-- header section starts -->
    <section id="" class="about-header header">
        <!---->
        <?php include 'partials/navbar.inc.php'; ?>
        
    </section>
    <!-- header section ends -->

    <!-- inspired section starts -->
    <section id="inspired" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 text-center">
                    <h1 style="font-size: 50px; margin-bottom:20px">Inspired by what's possible</h1>
                    <span class="fs-5">Our passion is about giving people the freedom to explore their world and reach their full potential. Whether physically, through our dependable vehicles and innovative mobility solutions, or emotionally, through inspiring design and intimate experiences—our ever-evolving desire to help will never end.</span>
                </div>
            </div>
        </div>
    </section>
    <!-- inspired seciton ends -->

    <!-- philosophy section starts -->
    <section id="philosophy" class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="philosophy-left">
                        <h1 style="font-size: 40px; margin-bottom:20px">TOYOTA PHILOSOPHY</h1>
                        <table class="">
                            <tr>
                                <td>
                                    <span>You are what drives us</span>
                                    <article>
                                        We create vehicles by listening and responding to you. Why? Because it’s our belief that our cars should do more than help you go places on the road; they should also help you go places in life.
                                    </article>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Built for how you live</span>
                                    <article>
                                        We make vehicles that respond to, and anticipate, your needs for the way you live. Find out more about how our advanced safety technologies and operations are improving the world we live in today, and long into tomorrow.

                                    </article>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Drive change, your way</span>
                                    <article>
                                        Beyond Zero is Toyota’s vision to reach beyond carbon neutrality with our products, services, and operations; and find new ways to make a positive impact on our planet and society. We currently offer more low and zero emissions vehicles combined than any other automaker to give customers the most choices to reduce their carbon footprint. 
                                    </article>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Helping make safe roadways</span>
                                    <article>
                                        Safety may begin with the driver, but it certainly doesn't end there. We're constantly innovating and researching ways to help prevent accidents, as well as helping protect those inside and outside of our vehicles in the event of one. Then we share our research and data with a variety of universities, government institutions and more, to help make the roads safe for everyone.
                                    </article>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="philosophy-right">
                        <img src="images/about-us-side.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- philosophy section ends -->

    <!-- limit section starts -->
    <section id="limit" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 limit_image mb-3">
                        <img src="images/limit7.jpg" alt="">
                    </div>
                    <div class="w-100 limit_desc">
                        <h1 class="mt-3 mb-3">Imagine a world without limits.</h1>
                        <span>Over 85 years of innovation have brought us our greatest mission yet: giving the freedom of movement to humankind. That's why Toyota is the Worldwide Official Mobility Partner of the International Olympic Committee and the International Paralympic Committee.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- limit section ends -->

    <!-- choice section starts -->
    <section id="choice" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 choice_image mb-4">
                        <div class="img-1">
                            <img src="images/choice-1.jpg" alt="">
                        </div>
                        <div class="img-2">
                            <img src="images/choice-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="w-100 choice_desc">
                        <h1 class="mb-3 mt-5">The Power of Choice Is Yours.</h1>
                        <span>The best way toward a cleaner future is with a diverse lineup of powertrain options. Discover an impressive balance of efficiency and power—whichever powertrain you choose.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choice section ends -->

   <?php include 'partials/footer.inc.php'; ?>
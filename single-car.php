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
    <section class="model-header header">
        
        <video muted class="bg-video">
            <source src="videos/video-2.mp4" type="video/mp4">
        </video>
        <div class="model-text">
            <h1>MRCAR</h1>
            <h3>EXPLORE THE NEW ERA OF MRCAR</h3>
        </div>
        <!---->
        <div class="container-fluid">
            <div class="header-top d-flex align-items-center flex-md-row justify-content-center position-relative">

                <div class="header-nav-bar header-left">
                    <nav class="navbar">
                        <ul class="d-flex align-items-center justify-content-md-between">
                            <li class="nav-item"><a href="index.php" class="nav-link text-light">Home</a></li>
                            <li class="nav-item"><a href="models.php" class="nav-link text-light">Models</a></li>
                            <li class="nav-item"><a href="news.php" class="nav-link text-light">News</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="header-logo">
                    <a href="#"><img src="images/car-logo.png" alt="LOGO"></a>
                </div>
                <div class="header-nav-bar">
                    <nav class="navbar">
                        <ul class="d-flex align-items-center justify-content-md-between">
                            <li class="nav-item"><a href="purchase.php" class="nav-link text-light">Purchase</a></li>
                            <li class="nav-item"><a href="about.php" class="nav-link text-light">About</a></li>
                            <li class="nav-item ">
                                <button class="btn btn-sm btn-warning" id="user_btn"><i class="fa fa-user"></i></button>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="user-options">
                    <h3 class="mt-2 mb-4">My Mrcar</h3>
                    <div class="user-details">
                        <span class="mt-2 mb-4">Welcome. Here you'll have access to all your Mrcar vehicles or view your future saved vehicles.</span>
                        <div class="btn-group" class="mt-4">
                            <a href="login.php" class="btn btn-sm btn-secondary me-2">Login?</a>
                            <a href="login.php" class="btn btn-sm btn-info">Create account?</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- header section ends -->

    <!-- innovation section starts -->
    <section class="mt-5 mb-5 text-center" id="innovation">
        <h1 class="w-100 text-center mb-3">An image of innovation.</h1>
        <span class="w-75 text-center fs-4">MRCAR is a distinctly crafted sedan unlike anything you've seen before.</span>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                    <div class="selected__img mb-3">
                        <img src="images/prius/1.png" alt="">
                    </div>
                    <div class="images-group d-flex align-items-center justify-content-center flex-wrap">
                        <div class="image">
                            <img src="images/prius/hero-bg-prius.jpg" alt="">
                        </div>
                        <div class="image">
                            <img src="images/prius/exterior-prius-1.jpg" alt="">
                        </div>
                        <div class="image">
                            <img src="images/prius/exterior-prius-2.jpg" alt="">
                        </div>
                        <div class="image">
                            <img src="images/car1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- innovation section ends -->

    <!-- Interrior and exterrior starts -->
    <section id="inex" class="mt-5 mb-5 ">
        <div class="container">
            <div class="w-100 text-center mb-5">
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm" id="interrior_btn">Interrior</button>
                    <button class="btn btn-danger btn-sm" id="exterrior_btn">Exterrior</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    
                    <div class="inex__details">
                        <div id="interrior" class="d-flex align-items-center flex-column">
                            <div class="interrior__selected__image">
                                <img class="w-100" src="images/prius/interior-prius-.jpg" alt="">
                            </div>
                            <div class="interrior__images d-flex align-items-center flex-wrap justify-content-center">
                                <div class="single_image m-2">
                                    <img class="w-100" src="images/prius/interior-prius-2.jpg" alt="">
                                </div>
                                <div class="single_image m-2">
                                    <img class="w-100" src="images/prius/interior-prius-3.jpg" alt="">
                                </div>
                                <div class="single_image m-2">
                                    <img class="w-100" src="images/prius/interior-prius-.jpg" alt="">
                                </div>
                                
                            </div>
                        </div>
                        <div id="exterrior">
                            <div class="exterrior__selected__image">
                                <img class="w-100" src="images/prius/exterior-prius-1.jpg" alt="">
                            </div>
                            <div class="exterrior__images d-flex align-items-center flex-wrap justify-content-center">
                                <div class="single_image m-2">
                                    <img src="images/prius/exterior-prius-2.jpg" alt="">
                                </div>
                                <div class="single_image m-2">
                                    <img src="images/prius/exterior-prius-1.jpg" alt="">
                                </div>
                                
                            
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Interrior and exterrior ends -->

    <!-- specs section starts -->
    <section id="single-specs" class="mt-5 mb-5 py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="col-3 p-3">
                        <h1>MRCAR</h1><h1>Crown</h1> <h1 class="mb-3">specs</h1>
                        <a href="car-specs.php" class="btn btn-info text-light">View all specs?</a>
                    </div>
                    <div class="col-9">
                        <div class="all__specifications">
                            <div class="specs__col">
                                <div class="specs__col__head">
                                    <h4 class="text-uppercase mb-2">Horsepower</h4>
                                    <span class="text-bold">Up to 340</span>
                                </div>
                                <div class="specs__col__bottom">
                                    <h4 class="text-uppercase mb-2">TRANSMISSION</h4>
                                    <span class="text-bold">Electronically controlled Continuously Variable Transmission (ECVT) or Direct Shift-6AT 6-Speed Automatic Transmission</span>
                                </div>
                            </div>
                            <div class="specs__col">
                                <div class="specs__col__head">
                                    <h4 class="text-uppercase mb-2">MPG</h4>
                                    <span class="text-bold">Up to an EPA-Estimated 41 MPG Combined Rating *</span>
                                </div>
                                <div class="specs__col__bottom">
                                    <h4 class="text-uppercase mb-2">POWERTRAIN</h4>
                                    <span class="text-bold">Standard All-Wheel Drive</span>
                                </div>
                            </div>
                            <div class="specs__col">
                                <div class="specs__col__head">
                                    <h4 class="text-uppercase mb-2">ENGINE</h4>
                                    <span class="text-bold">2.5L Inline 4-Cylinder Hybrid or Hybrid MAX 2.4-Liter Inline 4-Cylinder Turbocharged Hybrid</span>
                                </div>
                                <div class="specs__col__bottom">
                                    <h4 class="text-uppercase mb-2">TRAFFIC JAM ASSIST</h4>
                                    <span class="text-bold">Available Hands-Free Control at Speeds Under 25 MPH Under Certain Conditions, Only on Controlled-Access Highways; * Drive Connect * Subscription Required</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- specs section ends -->

    <!-- featured video starts -->
    <section id="f_video" class="mt-5 mb-5">

        <div class="container">
            <h1 class="text-center mt-5 mb-3">Distinctly crafted.</h1>
            <h5 class="text-center mt-5 mb-5">Discover what makes Toyota Crown stand out.</h5>
            <div class="row">
                <div class="col-12">
                    <video autoplay loop muted class="w-100 rounded">
                        <source src="videos/video-2.mp4" type="video/mp4">
                    </video>
                    <div class="f_video_content">
                        <h1 class="mb-4 mt-5">Turbocharged and electrified.</h1>
                        <span>Go quickly and go efficiently. Toyota Crown's available Hybrid MAX powertrain pumps out up to 340 combined net horsepower and takes you from 0 to 60 in 5.7 seconds. * For XLE and Limited grades, the efficient hybrid system has up to an EPA-estimated 41 mpg combined rating. *</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured video ends -->

    <!-- test drive starts -->
    <section id="test-drive" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="test__drive__content">
                    <div class="test-drive-image">
                        <img src="images/prius/hero-bg-prius.jpg" alt="">
                    </div>
                    <div class="test-drive-form p-3 d-flex flex flex-column align-items-center justify-content-center">
                        <div class="header-logo mb-2">
                            <a href="#"><img src="images/car-logo.png" alt="LOGO"></a>
                        </div>
                        <form action="" class="w-100 flex-column d-flex align-items-center justify-content-center">
                            <div class="form-group mb-2 w-100">
                                <label for="" class="mb-2">Enter your name</label>
                                <input type="text" class="form-control">
                                
                            </div>
                            <div class="form-group mb-2 w-100">
                                <label for="" class="mb-2">Enter your e-mail</label>
                                <input type="email" required class="form-control">
                                
                            </div>
                            <div class="form-group mb-2 w-100">
                                <label for="" class="mb-2">Enter your location</label>
                                <input type="text" required class="form-control">
                            </div>
                            <button class="btn btn-primary">Request drive?</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- test drive ends -->

   

    <!-- Footer section starts -->
    <section id="footer" class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-3">
                        <div class="logo mb-3">
                            <img class="w-100" src="images/car-logo.png" alt="">
                        </div>
                        <span>We are determined to cherish your dream car.</span>
                    </div>
                    <div class="col-3">
                        <h3>Company</h3>
                        <nav class="nav">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Cars</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Showrooms</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-3">
                        <h3>Information</h3>
                        <nav class="nav">
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="#">Request a test drive?</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-3">
                        <h3>Follow us</h3>
                        <div class="w-50 social__links d-flex align-items-center justify-content-between">
                            <a href="#" class="nav-link"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="nav-link"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="nav-link"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer section ends -->

    <!-- JS files -->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/owl.carousel.min.js"></script> -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/actions.js"></script>
</body>

</html>
</html>
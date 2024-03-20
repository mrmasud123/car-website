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

<body>
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
    <section id="" class="model-header header">
        
        <video loop autoplay muted class="bg-video">
            <source src="videos/video1.mp4" type="video/mp4">
        </video>
        <div class="model-text">
            <h1>MRCAR</h1>
            <h3>WELCOME TO INVENTORY</h3>
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

    <!-- all car list section starts -->
    <section id="all_car" class="mt-5 mb-5 text-light">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center flex-column">

                    <div class="car__type mt-5 mb-5 d-flex flex-column">
                        <img src="images/car-logo.png" alt="" class="car__image mb-3">
                        <form action="">
                            <div class="form-group">
                                <select name="car-type" id="" class="form-control">
                                    <option value="" selected disabled>Choose car type</option>
                                    <option value="model-a">Model A</option>
                                    <option value="model-b">Model B</option>
                                    <option value="model-c">Model C</option>
                                    <option value="model-d">Model D</option>
                                    <option value="model-e">Model E</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="car w-100 d-flex justify-content-between mt-5  mb-3">
                        <div class="col-5 car__img">
                            <img src="images/car-4.jpg" alt="" >
                        </div>
                        <div class="col-6">
                            <div class="car__description">
                                <table>
                                    <tr>
                                        <td>Model : </td>
                                        <td>Mr-car-xpro2023</td>
                                    </tr>
                                    <tr>
                                        <td>Engine : </td>
                                        <td>2ZR-FXE I4 (ZVW60/65)</td>
                                    </tr>
                                    <tr>
                                        <td>Mileage : </td>
                                        <td>40.4 miles</td>
                                    </tr>
                                    <tr>
                                        <td>Gear Type : </td>
                                        <td>Automatic (CVT)</td>
                                    </tr>
                                    <tr  class="text-center">
                                        <td colspan="2"><a href="single-car.php" class="btn btn-primary">View?</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="car w-100 d-flex justify-content-between mb-3">
                        <div class="col-5 car__img">
                            <img src="images/car-4.jpg" alt="" >
                        </div>
                        <div class="col-6">
                            <div class="car__description">
                                <table>
                                    <tr>
                                        <td>Model : </td>
                                        <td>Mr-car-xpro2023</td>
                                    </tr>
                                    <tr>
                                        <td>Engine : </td>
                                        <td>2ZR-FXE I4 (ZVW60/65)</td>
                                    </tr>
                                    <tr>
                                        <td>Mileage : </td>
                                        <td>40.4 miles</td>
                                    </tr>
                                    <tr>
                                        <td>Gear Type : </td>
                                        <td>Automatic (CVT)</td>
                                    </tr>
                                    <tr  class="text-center">
                                        <td colspan="2"><a href="single-car.php" class="btn btn-primary">View?</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="car w-100 d-flex justify-content-between mb-3">
                        <div class="col-5 car__img">
                            <img src="images/car-4.jpg" alt="" >
                        </div>
                        <div class="col-6">
                            <div class="car__description">
                                <table>
                                    <tr>
                                        <td>Model : </td>
                                        <td>Mr-car-xpro2023</td>
                                    </tr>
                                    <tr>
                                        <td>Engine : </td>
                                        <td>2ZR-FXE I4 (ZVW60/65)</td>
                                    </tr>
                                    <tr>
                                        <td>Mileage : </td>
                                        <td>40.4 miles</td>
                                    </tr>
                                    <tr>
                                        <td>Gear Type : </td>
                                        <td>Automatic (CVT)</td>
                                    </tr>
                                    <tr  class="text-center">
                                        <td colspan="2"><a href="single-car.php" class="btn btn-primary">View?</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="car w-100 d-flex justify-content-between mb-3">
                        <div class="col-5 car__img">
                            <img src="images/car-4.jpg" alt="" >
                        </div>
                        <div class="col-6">
                            <div class="car__description">
                                <table>
                                    <tr>
                                        <td>Model : </td>
                                        <td>Mr-car-xpro2023</td>
                                    </tr>
                                    <tr>
                                        <td>Engine : </td>
                                        <td>2ZR-FXE I4 (ZVW60/65)</td>
                                    </tr>
                                    <tr>
                                        <td>Mileage : </td>
                                        <td>40.4 miles</td>
                                    </tr>
                                    <tr>
                                        <td>Gear Type : </td>
                                        <td>Automatic (CVT)</td>
                                    </tr>
                                    <tr  class="text-center">
                                        <td colspan="2"><a href="single-car.php" class="btn btn-primary">View?</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- all car list section ends -->
    

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
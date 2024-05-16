<?php 
    include '../Database/config.inc.php';
    // session_start();
    if(!isset($_SESSION['logged_admin_id'])){
        header("location:admin-login.php");
    }
    $url=explode(".", basename($_SERVER['PHP_SELF']));
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MrCar - index</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section id="wrapper">
        <div class="container-fluid p-0 d-flex">
            <div class="left-container">
                <div class="logo w-100 text-center">
                    <img src="../images/car-logo.png" alt="">
                </div>
                <hr class="mt-2 mb-2">
                <h6 class="text-capitalize ms-2">masud</h6>
                <hr class="mt-2 mb-2">
                <nav class="nav">
                    <ul>
                        <li <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'class="active"' ?>>
                            <a href="index.php" class="text-light nav-link">
                                <i class="me-2 fa fa-tachometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li <?php if((basename($_SERVER['PHP_SELF'])=='models.php') || basename($_SERVER['PHP_SELF'])=='add-car.php') echo 'class="active"' ?>>
                            <a href="models.php" class="text-light nav-link"><i class="me-2 fa fa-users"></i>
                                <p>Car Models</p>
                            </a>
                        </li>
                        <li <?php if(basename($_SERVER['PHP_SELF'])=='test-drive-request.php') echo 'class="active"' ?>><a href="test-drive-request.php" class="text-light nav-link"><i class="me-2 fa fa-medkit"></i>
                                <p>Test Drive Request</p>
                            </a></li>
                        <li <?php if((basename($_SERVER['PHP_SELF'])=='total-sales.php') || basename($_SERVER['PHP_SELF'])=='add-sale.php') echo 'class="active"' ?>>
                            <a href="total-sales.php" class="text-light nav-link"><i class="me-2 fa fa-building"></i>
                                <p>Sales</p>
                            </a>
                        </li>
                        <li <?php if((basename($_SERVER['PHP_SELF'])=='showroom.php') || (basename($_SERVER['PHP_SELF'])=='add-showroom.php') || (basename($_SERVER['PHP_SELF'])=='single-showroom.php') || (basename($_SERVER['PHP_SELF'])=='edit-showroom.php')) echo 'class="active"' ?>>
                            <a href="showroom.php" class="text-light nav-link"><i class="me-2 fa fa-user"></i>
                                <p>Showrooms</p>
                            </a>
                        </li>
                        <li <?php if(basename($_SERVER['PHP_SELF'])=='users.php') echo 'class="active"' ?>>
                            <a href="users.php" class="text-light nav-link"><i class="me-2 fa fa-bank"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li <?php if((basename($_SERVER['PHP_SELF'])=='employee.php') || (basename($_SERVER['PHP_SELF'])=='add-employee.php') || (basename($_SERVER['PHP_SELF'])=='edit-employee.php')) echo 'class="active"' ?>>
                            <a href="employee.php" class="text-light nav-link"><i class="me-2 fa fa-users"></i>
                                <p>Employees</p>
                            </a>
                        </li>
                        <li <?php if(basename($_SERVER['PHP_SELF'])=='news.php') echo 'class="active"' ?>>
                            <a href="news.php" class="text-light nav-link"><i class="me-2 fa fa-newspaper-o"></i>
                                <p>News/Blog</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="right-container">
                <div class="admin-header d-flex align-items-center justify-content-between p-2 border-bottom">
                    <div class="admin-btn-container">
                        <button class="btn btn-warning text-capitalize" id="adminBtn"><?php echo $_SESSION['logged_admin_name'] ?></button>
                        <div class="btn-group">
                            <a href="admin-profile.php" class="btn btn-success btn-sm me-2">Profile</a>
                            <button class="btn btn-danger btn-sm adminlogoutBtn">Logout?</button>
                        </div>
                    </div>
                    <div class="nav-icon">
                        <i class="fa fa-navicon fs-4" id="sidebarIcon"></i>
                    </div>
                </div>
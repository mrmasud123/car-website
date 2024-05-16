<div class="container-fluid">
            <div class="header-top d-flex align-items-center flex-md-row justify-content-center position-relative">
                <div class="header-nav-bar header-left">
                    <nav class="navbar">
                        <ul class="d-flex align-items-center justify-content-md-between">
                            <li class="nav-item"><a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="index.php")? "link__active" : ""?> nav-link text-light">Home</a></li>
                            <li class="nav-item"><a href="models.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="models.php" || basename($_SERVER['PHP_SELF'])=="single-car.php" || basename($_SERVER['PHP_SELF'])=="car-specs.php")? "link__active" : ""?> nav-link text-light">Models</a></li>
                            <li class="nav-item"><a href="news.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="news.php" || basename($_SERVER['PHP_SELF'])=="read-more-news.php")? "link__active" : ""?> nav-link text-light">News</a></li>
                            <li class="nav-item"><a href="showroom.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="showroom.php" || basename($_SERVER['PHP_SELF'])=="single-showroom.php")? "link__active" : ""?> nav-link text-light">Showrooms</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-logo" style="z-index:1">
                    <a href="#"><img src="images/car-logo.png" alt="LOGO"></a>
                </div>
                
                <div class="header-nav-bar">
                    <nav class="navbar">

                        <ul class="d-flex align-items-center justify-content-md-between">
                        <li class="nav-item"><a href="about.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="about.php")? "link__active" : ""?> nav-link text-light">About</a></li>
                            <li class="nav-item"><a href="purchase.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="purchase.php" || basename($_SERVER['PHP_SELF'])=="test-drive.php")? "link__active" : ""?> nav-link text-light">Purchase</a></li>
                            <li class="nav-item"><a href="contact.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="contact.php")? "link__active" : ""?> nav-link text-light">Contact</a></li>
                            <li class="nav-item ">
                                <?php 
                                    $flag="";
                                    if(isset($_SESSION['logged_user_id'])){
                                        $flag="bg-success";
                                    }else{
                                        $flag="bg-danger";
                                    }
                                ?>
                                <button class="btn btn-sm <?php echo $flag; ?>" id="user_btn"><i class="fa fa-user"></i></button>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="user-options">
                    <h3 class="mt-2 mb-4">My Mrcar</h3>
                    <?php 
                        if(isset($_SESSION['logged_user_id'])){
                            
                            echo '<span class="mb-1 text-capitalize badge bg-success active__user">Hello '.$_SESSION['logged_user_name'].'</span> <br>';
                            $current_user=$_SESSION['logged_user_id'];
                                    $DB->select("test_drive","req_status",null,"requested_user=$current_user and req_status=1 and visibility=1");
                                    $drive_status=$DB->getResult();
                                    if(count($drive_status)>=1){
                                        setcookie('test_drive_accepted', 'Car request accepted');
                                        if(isset($_COOKIE['test_drive_accepted'])){
                                            echo '<div class="mb-2">
                                            <span class="badge bg-success">'.$_COOKIE['test_drive_accepted'].'</span>
                                            <i class="fa fa-trash p-1 rounded bg-danger delete_cookie"></i>
                                            <a href="user_profile.php?uid='.$current_user.'"><i class="fa fa-eye p-1 rounded bg-success"></i></a>
                                            </div>';
                                        }
                                    }
                        }else{
                            setcookie('test_drive_accepted','');
                        }
                    ?>
                    <div class="user-details">
                        <span class="mt-2 mb-4">Welcome. Here you'll have access to all your Mrcar vehicles or view your future saved vehicles.</span>
                        <div class="btn-group" class="mt-4">
                            <?php 
                                if(isset($_SESSION['logged_user_id'])){
                                    
                                    echo '<a id="logout" href="javascript:void(0)" class="btn btn-sm btn-danger me-2">Logout?</a> <a href="user_profile.php?uid='.$_SESSION['logged_user_id'].'" class="btn btn-sm rounded btn-warning me-2">View profile?</a> <input readonly hidden type="text" value="'.$_SESSION['logged_user_id'].'" class="active_id form-control">';
                                }else{
                                    echo '<a href="login.php" class="btn btn-sm btn-success me-2">Login?</a><input readonly hidden type="text" value="0" class="active_id form-control">';
                                }
                            ?>
                        </div>
                    </div>
            </div>
        </div>
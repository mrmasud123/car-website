<?php 
$title= explode(".", basename($_SERVER['PHP_SELF']))[0];
include 'Database/config.inc.php';
if(!isset($_SESSION['logged_user_id'])){
    header("location: index.php");
  }
    $uid=$_GET['uid'];
    $DB->select("users","*",null,"id=$uid");
    $user_data=$DB->getResult();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-capitalize">MR CAR || <?php echo $title; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!--  <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- font awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
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
    <section class="profile__header" id="header">
        <?php include 'partials/navbar.inc.php'; ?>

        <div class="profile text-dark">
            <div class="card" style="width: 18rem;">
            <?php 
                foreach($user_data as $user){  
            ?>
                  <img style="width:100px;height:100px" class="m-2 card-img-top rounded-circle" src="images/users_img/<?php echo $user['user_img']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Name : <span class="badge bg-success text-capitalize text-light"><?php echo $user['first_name']." ".$user['last_name']; ?></span></h5>
                    <p class="card-text">Email <span class="badge bg-success text-light"><?php echo $user['email']; ?></span></p>
                    <p class="card-text">City <span class="badge bg-success text-light text-capitalize"><?php echo $user['city']; ?></span></p>
                    <a href="edit-user-profile.php?uid=<?php echo $user['id']; ?>" class="btn-sm btn btn-primary">Profile update?</a>
                </div>
                <?php      }            
            ?>
            </div>
        </div>
    </section>
    <!-- header section ends -->

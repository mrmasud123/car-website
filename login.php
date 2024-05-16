<?php 
  session_start();
  if(isset($_SESSION['logged_user_id'])){
    header("location: index.php");
  }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
      body{
        overflow:hidden;
        background: linear-gradient(11deg,rgb(0 0 0), rgb(0 0 0 / 10%)), url(images/car3.png);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
      }
      div#r-form{
        position: absolute;
        scrollbar-width: none;
        right: -100%;
        top:1%;
        transition:0.5s;
        overflow-y: scroll !important;
    height: 100vh;
      }
      #l-form{
        position: absolute;
        
        top: 15%;
        right:2%;
        transition:0.5s;
      }
      .sh{
        right:-50%;
      }
      div#l-form,div#r-form {
        border: 1px solid;
        padding: 20px;
        background: white;
        border-radius: 25px;
        box-sizing: border-box;
       box-shadow: -8px 6px 50px -11px rgba(23,23,23,0.76) ;
      }
      .left h1 {
    text-transform: uppercase;
}
.left h1 {
    color: white;
    font-size: 75px;
    font-family: math;
    transform: rotate(354deg);
    text-shadow: 2px 16px 11px black;
    animation: animate 2s ease-in infinite forwards;
}
@keyframes animate {
0%{
  color: rgb(36, 17, 17);
}  
50%{
  color: rgb(196, 9, 34);
}
100%{
  color: rgb(66, 51, 51);
}
}
    </style>
</head>
<body>
    
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-between align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 left">
              <h1 class="display-4 fw-bold text-center">Drive Your <br> Dream Car</h1>
              <input readonly hidden type="text" value="0" class="active_id form-control">
            </div>
             <!-- login start -->
             <div id="l-form" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form id="loginform" class="text-dark">
                <!-- Email input -->
                <div class="form-outline mb-4">
                <?php
                  if(isset($_SERVER['HTTP_REFERER'])) {
                      $previous_page = $_SERVER['HTTP_REFERER'];
                      echo "<a style='display:none' class='redirected_page' href='$previous_page'>$previous_page</a>";
                  }
                ?>
                  <h1 class="display-4 text-bold">Users Login</h1>
                  <input id="email" name="email" type="email" id="form3Example3" class="form-control  "
                    placeholder="Enter a valid email address" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input id="password" name="password" type="password" id="form3Example4" class="form-control  "
                    placeholder="Enter password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  <a href="#!" class="text-body">Forgot password?</a>
                </div>
      
                <div class="text-center mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-sm">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? </p>
                </div>
      
              </form>
              <button id="reg-button" class="btn btn-sm btn-danger">Register?</button>
            </div>
            <!-- login end -->
            <!-- registration start -->
            <div id="r-form" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form id="regForm">
      
                <!-- Name input -->
                <div class="form-outline mb-2">
                  <h1 class="display-6 text-bold">Users Registration</h1>
                  <input name="fname" type="text" id="form3Example3" class="form-control  "
                    placeholder="Enter first name" />
                  <label class="form-label" for="form3Example3">First Name</label>
                </div>
                <div class="form-outline mb-2">
                  <input name="lname" type="text" id="form3Example3" class="form-control  "
                  placeholder="Enter last name" />
                  <label class="form-label" for="form3Example3">Last Name</label>
                </div>
      
                <!-- email input -->
                <div class="form-outline mb-2">
                  <input id="remail" name="remail" type="email"  class="form-control  "
                    placeholder="Enter email" />
                  <label class="form-label" for="form3Example4">E-mail</label>
                </div>
                <!-- password input -->
                <div class="form-outline mb-2">
                    <input name="rpassword" type="password" class="form-control  " placeholder="Enter password" />
                    <label class="form-label" for="form3Example4">Password</label>
                </div>
                <!-- city input -->
                <div class="form-outline mb-2">
                    <select id="rcity" name="city" class="form-control">
                      <option value="" selected disabled>Choose your city</option>
                      <option value="cumilla">Cumilla</option>
                      <option value="dhaka">Dhaka</option>
                      <option value="chittagong">Chittagong</option>
                      <option value="rajshahi">Rajshahi</option>
                      <option value="barisal">Barisal</option>
                      <option value="khulna">Khulna</option>
                    </select>
                    <label class="form-label" >Your city</label>
                </div>
                <div class="text-center mt-4 pt-2">
                  <button name="reg" type="submit" class="btn btn-primary btn-sm"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Registration</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? </p>
                </div>
      
              </form>
              <button  id="log-button" class="btn btn-sm btn-danger">Login?</button>
            </div>
            <!-- registration ends -->
          
          </div>
        </div>
        
      </section>
<div class="message">
  <strong id="msg">Login failed</strong>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/okzoom.min.js"></script>
    <script src="js/actions.js"></script>
</body>
</html>
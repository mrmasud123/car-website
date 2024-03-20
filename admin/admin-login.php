<?php 

    session_start();
    if(isset($_SESSION['logged_admin_id'])){
        header("location: index.php");
    }

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .input-group-text {
            background: white;
            border-left: 0;
            padding: 10px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        input.form-control.email,
        input.form-control.password {
            border-right: 0;
        }

        body.d-flex.align-items-center.justify-content-center {
            background: linear-gradient(76deg, #00000070, #dc3545);
        }

        .form-container {
            box-shadow: 0px 0px 18px -1px #212529;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="col-3">
        <h3 class="text-center mb-3"
            style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">MRCAR Admin Login
        </h3>
        <div class="form-container">
            <div class="card">
                <div class="card-body login-card-body">
                    <form id="adminLoginForm" action="" method="POST" autocomplete="off">
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control email" name="email" placeholder="E-mail" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control password" name="password" placeholder="Password"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-8 col-4 text-end">
                                <input type="submit" class="btn btn-primary float-right" name="login" value="Login">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>
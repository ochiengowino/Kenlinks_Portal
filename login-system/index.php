<?php 
session_start();
if(isset($_SESSION['user'])){
    header('location:../index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kenlinks - Admin</title>

    <!-- Favicons -->
    <link href="../img/favicon.png" rel="icon">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link href="../css/style.css" rel="stylesheet">

</head>
<body class="bg-secondary">
    
<div class="container">
    
      <!-- Login Form Start -->
    <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
                    <hr class="my-3" />
                    <form action="#" method="post" class="px-3" id="login-form">
                        <div id="loginAlert"></div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                            </div>
                            <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="E-Mail" required
                             value='<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>'  />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" 
                            value='<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>' required autocomplete="off" />
                        </div>
                        <div class="form-group clearfix">
                            <div class="custom-control custom-checkbox float-left">
                                <input type="checkbox" class="custom-control-input" id="customCheck" name="rem"
                                 <?php if(isset($_COOKIE['email'])){ ?>checked <?php } ?>/>
                                <label class="custom-control-label" for="customCheck">Remember me</label>
                            </div>
                            <div class="forgot float-right">
                                <a href="#" id="forgot-link">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="login-btn" value="Sign In" class="btn btn-primary btn-lg btn-block myBtn" />
                            <!-- myBtn -->
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                    <!-- <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1> -->
                    <img src="../img/logo2.png" alt="">
                    <hr class="my-3 bg-light myHr" />
                    <p class="text-center font-weight-bolder text-light lead">Register if you don't have an account</p>
                    <button  class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->

    <!-- Registration Form Start -->
    <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                    <!-- <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1> -->
                    <img src="../img/logo2.png" alt="">
                    <hr class="my-4 bg-light myHr" />
                    <p class="text-center font-weight-bolder text-light lead">Please login with your personal info.</p>
                    <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</button>
                </div>
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
                    <hr class="my-3" />
                    <form action="#" method="post" class="px-3" id="register-form">
                        <div id="regAlert"></div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                            </div>
                            <input type="text" id="name" name="name" class="form-control rounded-0" placeholder="Full Name" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                            </div>
                            <input type="email" id="remail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
                        </div>
                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bolder"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="register-btn" value="Sign Up" class="btn btn-primary btn-lg btn-block myBtn" />
                            <!-- myBtn -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Form End -->

    <!-- Forgot Password Form Start -->
    <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
                    <hr class="my-3" />
                    <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
                    <form action="#" method="post" class="px-3" id="forgot-form">
                        <div id="forgotAlert"></div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
                            </div>
                            <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
                    <hr class="my-4 bg-light myHr" />
                    <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password Form End -->
</div>




    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
  
    <script src="../js/login.js"></script>
</body>
</html>
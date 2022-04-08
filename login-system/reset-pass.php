<?php 

require_once "auth.php";

$user = new Auth();

$msg = '';

if(isset($_GET['email']) && isset($_GET['token'])){
    
    $email = $user->test_input($_GET['email']);
    $token = $user->test_input($_GET['token']);

    $auth_user = $user->reset_pass_auth($email, $token);

    if($auth_user !=null){
        if(isset($_POST['submit'])){
            $newpass = $_POST['pass'];
            $cnewpass = $_POST['cpass'];

            $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);

            if($newpass == $cnewpass){
                $user->update_new_pass($hnewpass, $email);

                $msg = 'Password changed successfully! <br>
                        <a href=index.php>Go back to LogIn</a>';
            }else{
                $msg = 'Passwords did not match!';
            }
        }
    }else{
        header('location:index.php');
        exit();
    }
}else{
    header('location:index.php');
    exit();
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
    <div class="row justify-content-center wrapper">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
                    <hr class="my-3" />
                    <form action="#" method="post" class="px-3" id="reset-form">
                        <div class="text-center lead my-2"><?php echo $msg; ?></div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" name="pass" class="form-control rounded-0" minlength="5" placeholder="New Password" 
                            required autocomplete="off" />
                        </div>

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" name="cpass" class="form-control rounded-0" minlength="5" placeholder="Confirm New Password" 
                            required autocomplete="off" />
                        </div>
                 
                        <div class="form-group">
                            <input type="submit" name="submit" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                            <!-- myBtn -->
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                    <!-- <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1> -->
                    <img src="../img/logo2.png" alt="">
                    <hr class="my-3 bg-light myHr" />
                    <p class="text-center font-weight-bolder text-light lead">Reset your password</p>
                    <button  class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Login Form End -->
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
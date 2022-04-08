<?php 
session_start();
    if(isset($_SESSION['username'])){
        header('location: admin-dashboard.php');
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

    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | Kenlinks - Admin</title>

    <!-- Favicons -->
    <link href="../../img/favicon.png" rel="icon">
    
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <style>
        html,body{
            height: 100%;
        }
    </style>
</head>

<body class="bg-dark">

<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
        <div class="col-lg-5">
            <div class="card border-danger shadow-lg">
                <div class="card-header bg-danger">
                    <h3 class="m-0 text-white"><i class="fas fa-user-cog">&nbsp;</i>Admin Panel Login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="px-3" id="admin-login-form">
                        <div id="adminLoginAlert"></div>
                        <div class="form-group">
                            <input type="text" name="username" id="" class="form-control form-control-lg rounded-0" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="" class="form-control form-control-lg rounded-0" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="admin-login" id="adminLoginBtn" class="btn btn-danger btn-block btn-lg rounded-0" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>











    
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="admin-panel.js"></script>
    <script src="../../js/admin.js"></script>
    
</body>

</html>
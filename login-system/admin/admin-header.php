<?php 
//   session_start();
//     if(!isset($_SESSION['username'])){
//         header('location: index.php');
//         exit();
//     }
    require_once "admin-session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<?php 
$title = basename($_SERVER['PHP_SELF'], '.php');
$title = explode('-', $title);
$title = ucfirst($title[1]);
// print_r( $title);

?>
    <title><?= $title; ?> | Kenlinks - Admin</title>

    <!-- Favicons -->
    <link href="../../img/favicon.png" rel="icon">
    
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <style>
        html,body{
            height: 100%;
        }
    </style>
</head>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->

                    <img id="side-logo" src="../../img/favicon.png" alt="">

                </div>
                <div class="sidebar-brand-text mx-3">Kenlinks Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  active">
                <a class="nav-link" href="admin-dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-users.php">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-added-requests.php">
                    <i class="fas fa-sticky-note"></i>
                    <span>Added Requests</span>
                </a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-feedback.php">
                    <i class="fas fa-comment"></i>
                    <span>Feedback</span>
                </a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-notifications.php">
                    <i class="fas fa-bell"></i>
                    <span>Notifications &nbsp;&nbsp;<span class="checkNotifications"></span></span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-deleted-users.php">
                    <i class="fas fa-user-slash"></i>
                    <span>Deleted Users</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-create-admins.php">
                    <i class="fas fa-user"></i>
                    <span>Create Admin</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin-action.php?export=excel">
                    <i class="fas fa-table"></i>
                    <span>Export Users</span>
                </a>
            </li>

         

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-1">
                            <a class="nav-link <?php (basename($_SERVER['PHP_SELF'], '.php') == 'home.php') ? 'active' : '';  ?> 
                             text-gray-600" href="index.php" id="messagesDropdown" role="button">
                                Home    &nbsp;
                            <i class="fas fa-home fa-fw"></i>
                            </a>             
                        </li>

                        <li class="nav-item mx-1">
                            <a class="nav-link <?php (basename($_SERVER['PHP_SELF'], '.php') == 'admin-feedback.php') ? 'active' : '';  ?>
                              text-gray-600" href="admin-feedback.php" id="messagesDropdown" role="button">
                              Feedback      &nbsp;
                              <i class="fas fa-comment-dots fa-fw"></i>
                            </a>                    
                        </li>
     
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item no-arrow mx-1">
                            <a class="nav-link <?php (basename($_SERVER['PHP_SELF'], '.php') == 'admin-notifications.php') ? 'active' : '';  ?>
                              text-gray-600" href="admin-notifications.php" id="alertsDropdown" role="button">
                                Notifications &nbsp;
                            <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="checkNotifications"></span>
                                <!-- <span id="checkNotifications" class="badge badge-danger badge-counter">3+</span> -->
                            </a>
                        </li>

                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="profile.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 big">Hi, <?=  $admin_username ?></span>
                                   
                                <?php if(!$admin_photo): ?>
                                        <img src="../../img/favicon.png" class="img-profile rounded-circle">
                                    <?php else:?>
                                        <img src="<?= ''.$admin_photo;?>" class="img-profile rounded-circle">
                                    <?php endif; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin-profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="admin-logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <?php //basename($_SERVER['PHP_SELF']); ?>
                <!-- End of Topbar -->
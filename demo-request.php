<?php require_once "login-system/session.php"; ?>
<?php 

    if(!isset($_SESSION['user'])){
        header('location: login-system/index.php');
        exit();
    }


    include_once "login-system/config.php";

    $db = new Database();

    $sql = "UPDATE ken_web.counter SET hits = hits+1 WHERE id = 1";

    $stmt = $db->conn->prepare($sql);

    $stmt->execute();

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
    <link href="img/favicon.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->

                    <img id="side-logo" src="img/favicon.png" alt="">

                </div>
                <div class="sidebar-brand-text mx-3">Kenlinks User</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="demo-request.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Demo Request</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="contact-request.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Contact Request</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <li class="nav-item active">
                <a class="nav-link" href="africities.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>AfriCities</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="added_data.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Your Added Data</span></a>
            </li>

         

            <!-- Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>CRM</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tables:</h6>
                        <a class="collapse-item" href="demo-request.php">Demo Request</a>
                        
                        <a class="collapse-item" href="contact-request.php">Contact Request</a>
                    
                        <a class="collapse-item" href="added_data.php">Your added data</a>
                    </div>
                </div>
            </li> -->

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
                            <a class="nav-link <?php (basename($_SERVER['PHP_SELF'], '.php') == 'index.php') ? 'active' : '';  ?> 
                            text-gray-600" href="index.php" id="messagesDropdown" role="button">
                                Home    &nbsp;
                            <i class="fas fa-home fa-fw"></i>

                            </a>

                        </li>

                        <li class="nav-item mx-1">
                            <a class="nav-link <?php (basename($_SERVER['PHP_SELF'], '.php') == 'feedback.php') ? 'active' : '';  ?>
                            text-gray-600" href="feedback.php" id="messagesDropdown" role="button">
                            Feedback      &nbsp;
                            <i class="fas fa-comment-dots fa-fw"></i>
                            </a>

                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item no-arrow mx-1">
                            <a class="nav-link <?php (basename($_SERVER['PHP_SELF'], '.php') == 'notifications.php') ? 'active' : '';  ?>
                            text-gray-600" href="notifications.php" id="alertsDropdown" role="button">
                                Notifications &nbsp;
                            <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span id="checkNotifications"></span>
                                <!-- <span class="badge badge-danger badge-counter">3+</span> -->
                            </a>
                        </li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="profile.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 big">Hi, <?php echo $fname; ?></span>
                                <?php if(!$cphoto): ?>
                                        <img src="img/favicon.png" class="img-profile rounded-circle">
                                    <?php else:?>
                                        <img src="<?= ''.$cphoto;?>" class="img-profile rounded-circle">
                                    <?php endif; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login-system/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                    <?php // basename($_SERVER['PHP_SELF']); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                   
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Demo Request Table</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
                            <!-- <p class="text-cemter lead mt-5">Please wait...</p> -->
                        </div>
                        <div class="card-body">
                            <button type="button" id="addBtn" class="btn btn-secondary" data-toggle="modal" data-target="#addModal">
                                ADD DATA
                            </button>
                            <br> <br>
                         
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reference Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Demo Date</th>
                                            <th>Message</th>
                                            <th>Sent On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Reference Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No.</th>
                                            <th>Demo Date</th>
                                            <th>Message</th>
                                            <th>Sent On</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                            include "login-system/db_conn.php"; 
                                            $records = mysqli_query($conn, "select * from demo_form"); // fetch data from database

                                            while($data = mysqli_fetch_array($records)){                                                
                                        ?>
                                    
                                        <tr>
                                            <td><?php echo $data['id']; ?></td>
                                            <td><?php echo $data['uniqueID']; ?></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['phone_number']; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                            <td><?php echo substr($data['message'], 0, 75); ?></td>
                                            <td><?php echo $data['sent_date']; ?></td>
                                            <td>            
                                                <button view_id="<?php echo $data['id']; ?>" type="button" class="btn btn-outline-primary viewbutton" data-toggle="modal" data-target="#view_modal">
                                                    View
                                                </button>                                    
                                               <br><br>
                                                <button edit_id="<?php echo $data['id']; ?>" type="button" class="btn btn-outline-success waves-effect editbtn1" data-toggle="modal" data-target="#editmodal">
                                                    Edit
                                                </button>   
                                                <br><br>                                         
                                                <button delete_id="<?php echo $data['id']; ?>" type="button" class="btn btn-outline-danger waves-effect deletebtn1">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>                              
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                
                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Client Data </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="add-form" method="POST">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label> Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label> Phone Number </label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
                                    </div>

                                    <div class="form-group">
                                        <label> Date </label>
                                        <input type="date" name="date" class="form-control" placeholder="Enter Date">
                                    </div>

                                    <div class="form-group">
                                        <label> Message </label>
                                        <textarea type="text" name="message" rows="5" class="form-control" placeholder="Message"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="uniqueID" id="uniqueID">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="saveBtn" type="submit" name="insertdata" class="btn btn-primary">Save </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- View Modal -->
                <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Client Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <div id="view_modal_body" class="modal-body">
                            
                        </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                              
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Edit Client Data </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div id="edit_body" class="modal-body">
                                <form id = "update-form" action="" method="POST" >
                                    <div class="form-group">
                                        <label> Reference Number </label>
                                        <input id="reference" name="reference"  class="form-control" placeholder="Edit Reference Number">
                                    </div>

                                    <div class="form-group">
                                        <label> Name </label>
                                        <input id="name" type="text" id="name" name="name"  class="form-control" placeholder="Edit Name">
                                    </div>

                                    <div class="form-group">
                                        <label> Email </label>
                                        <input id="email" type="text" id="email" name="email"  class="form-control" placeholder="Edit Email">
                                    </div>

                                    <div class="form-group">
                                        <label> Phone Number </label>
                                        <input id="phone" name="phone"   class="form-control" placeholder="Edit Phone Number">
                                    </div>

                                    <div class="form-group">
                                        <label> Date </label>
                                        <input id="date" name="date" type="date"  class="form-control datepicker" placeholder="Edit Date">
                                    </div>
                                    <input id="id" name="id"  class="form-control" hidden>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary updatebtn">Update Data</button>
                                    </div>
                                </form>
                            </div>                                 

                        </div>
                    </div>
                </div>
 
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kenlinks Solutions - 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
         <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
         <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" id="delete_body">
                        <!-- Are you sure you want to delete this data? -->
                    </div>
                   
                </div>
            </div>
        </div>

    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/admin.js"></script>

</body>

</html>
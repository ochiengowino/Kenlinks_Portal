<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kenlinks-Admin</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    ADD DATA
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reference Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No.</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Sent Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Reference Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No.</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Sent Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                                include "db_conn.php"; 
                                $records = mysqli_query($conn, "select * from demo_form"); // fetch data from database

                                while($data = mysqli_fetch_array($records)){
                                    // foreach($records as $data){
                            ?>
                        
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['uniqueID']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['phone_number']; ?></td>
                                <td><?php echo $data['date']; ?></td>
                                <td><?php echo $data['message']; ?></td>
                                <td><?php echo $data['sent_date']; ?></td>
                                <td>
                                    <a view_id='<?php echo $data['uniqueID']; ?>' href="example2.html" type="button" class="btn btn-outline-primary waves-effect viewbtn" data-toggle="modal" data-target="#viewmodal">View</a>
                                    <button type="button" class="btn btn-outline-success waves-effect editbtn" data-toggle="modal" data-target="#editmodal">Edit</button>                                            
                                    <button type="button" class="btn btn-outline-danger waves-effect deletebtn" data-toggle="modal" data-target="#deletemodal">Delete</button>
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


<!-- VIEW POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Client Details </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                                     
                                <div id="view_body" class="modal-body"> </div>                                     
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>                                   
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/admin.js"></script>
 
</body>
</html>
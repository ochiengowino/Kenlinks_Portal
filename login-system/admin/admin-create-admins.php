<?php require_once "admin-header.php";?>





            <!-- Begin Page Content -->
            <div class="container-fluid">
                   
                   <!-- Page Heading -->
                   <h1 class="h3 mb-2 text-gray-800 text-center">Create Admin</h1>
                 
                   <!-- DataTales Example -->
                <div class="row h-100 align-items-center justify-content-center">
                   <div class="card shadow mb-4 col-lg-5 align-self-center">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Create an Admin</h6>                           
                       </div>
                       <div class="card-body">  
                            <form action="" method="post" id="create-admin-form" class="px-3 mt-2" enctype="multipart/form-data">
                                <div id="createAdminAlert"></div>
                                <div class="form-group m-0">
                                    <label for="username" class="m-1"><b>Username :</b></label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                                </div>
                                    <br>
                                <div class="form-group m-0">
                                    <label for="password" class="m-1"><b>Password :</b></label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group mt-2">
                                    <input type="submit" name="create_admin" class="btn btn-danger btn-block" id="create_adminBtn" value="Create">
                                </div>
                            </form>
                       </div>
                   </div>
                </div>
            </div>
               <!-- /.container-fluid -->










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
 
    <script src="../../js/demo/datatables-demo.js"></script>
    <!-- Page level custom scripts -->
  
    <script src="admin-panel.js"></script>
    <!-- <script src="../../js/admin.js"></script> -->
    
</body>

</html>
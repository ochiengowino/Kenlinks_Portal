<?php require_once "admin-header.php";?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
                   
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Added Requests</h1>
        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Added Requests by All Users</h6>
                
            </div>
            <div class="card-body">

                <div class="table-responsive" id="showAddedRequests">
                <!-- <p class="text-cemter lead mt-5 align-self-center">Please wait...</p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


    <!-- View Modal -->
    <div class="modal fade" id="viewAddedRequests" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" mw-100 w-50>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="getName"></h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                <!-- <div class="card align-self-center" id="getImage"></div> -->
                    <div class="card-deck">
                        <div class="card border-primary">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <th>Username</th>
                                                <td id="getUsername"> </td>
                                            </tr>
                                            <tr>
                                                <th>User Email</th>
                                                <td id="getUserEmail"> </td>
                                            </tr>
                                            <tr>
                                                <th>UniqueID</th>
                                                <td id="getUniqueID"> </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td id="getEmail"> </td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td id="getPhoneNumber"> </td>
                                            </tr>
                                            <tr>
                                                <th>Request Date</th>
                                                <td id="getRequestDate"></td>
                                            </tr>
                                            <tr>
                                                <th>Message</th>
                                                <td id="getMessage"> </td>
                                            </tr>
                                            <tr>
                                                <th>Sent On</th>
                                                <td id="getSentDate"> </td>
                                            </tr>
                                            <tr>
                                                <th>Updated On</th>
                                                <td id="getUpdatedDate"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                              
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
 
    <script src="../../js/demo/datatables-demo.js"></script>
    <!-- Page level custom scripts -->
  
    <script src="admin-panel.js"></script>
    <!-- <script src="../../js/admin.js"></script> -->
    
</body>

</html>
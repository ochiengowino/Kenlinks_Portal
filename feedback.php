<?php require_once "header.php"
?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-3">
                <?php if($verified == 'verified!'): ?>
                    <div class="card border-primary">
                        <div class="card-header lead text-center bg-primary text-white">
                            Send Feedback to the Admins
                        </div>
                        <div class="card-body">
                            <form action="" method="post" class="px-4" id="feedback-form">
                                <div class="form-group">
                                    <input type="text" name="subject" id="" class="form-control form-control-lg rounded-0" placeholder="Write your subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="feedback" id="" cols="30" rows="10" class="form-control form-control-lg rounded-0" placeholder="Write your feedback here..." required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="feedbackBtn" id="feedbackBtn" value="Send Feedback" class="btn btn-primary btn-block rounded-0">
                                </div>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <h1 class="text-center text-secondary mt-5">Verify your email first to send your feedback to the admin!</h1>
                <?php endif; ?>    
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
    <script src="js/login.js"></script>
</body>
</html>
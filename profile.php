<?php require_once "header.php"
?>

        <div class="container-fluid">
                        
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Your Profile</h1>
            <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">View Profile</h6> -->
                    <!-- <p class="text-cemter lead mt-5">Please wait...</p> -->
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#editProfile" class="nav-link font-weight-bold" data-toggle="tab">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#changePass" class="nav-link font-weight-bold" data-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <!-- <p>profile page</p> -->
                    <div class="tab-content">
                        <!-- View Profile -->
                        <div class="tab-pane container active" id="profile">
                            <div id="verifyEmailAlert"></div>
                            <div class="card-deck">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-light text-center lead">
                                        User Id : <?= $cid ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Name : </b><?= $cname ?></p>
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Email : </b><?= $cemail ?></p>
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Phone Number : </b><?= $cphone ?></p>
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Gender : </b><?= $cgender ?></p>
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Date of Birth : </b><?= $cdob ?></p>
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Registered On : </b><?= $reg_on ?></p>
                                        <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Email Verified : </b><?= $verified ?>
                                        <!-- <a href="#" id="verify-email" class="float-right">Verify Now</a> -->
                                            <?php if($verified == 'Not verified!'): ?>
                                                <a href="#" id="verify-email" class="float-right">Verify Now</a>
                                            <?php endif; ?>
                                        </p>
                                        <!-- <div class="clearfix"></div> -->
                                    </div>
                                </div>
                                <div class="card border-primary align-self-center">
                                    <?php if(!$cphoto): ?>
                                        <img src="img/favicon.png" class="img-thumbnail img-fluid" width="540px">
                                    <?php else:?>
                                        <img src="<?= ''.$cphoto;?>" class="img-thumbnail img-fluid" width="540px">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                         <!-- End View Profile -->

                          <!-- Edit Profile -->
                        <div class="tab-pane container fade" id="editProfile">
                            <div class="card-deck">
                                <div class="card border-danger align-self-center">
                                    <?php if(!$cphoto): ?>
                                        <img src="img/favicon.png" class="img-thumbnail img-fluid" width="540px">
                                    <?php else:?>
                                        <img src="<?= ''.$cphoto;?>" class="img-thumbnail img-fluid" width="540px">
                                    <?php endif; ?>
                                </div>
                                <div class="card border-danger">
                                    <div class="card-header bg-primary text-light text-center lead">
                                        User Id : <?= $cid ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" id="profile-update-form" class="px-3 mt-2" enctype="multipart/form-data">
                                            <input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
                                            <div class="form-group m-0">
                                                <label for="profilePhoto" class="m-1">Upload Profile Image</label>
                                                <input type="file" name="image" id="profilePhoto">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="name" class="m-1">Name :</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?= $cname ?>">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="gender" class="m-1">Gender :</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="" disabled <?php if($cgender == null){ echo 'Select Gender';}?>>Select</option>
                                                    <option value="Male" <?php if($cgender == 'Male'){ echo 'selected';}?>>Male</option>
                                                    <option value="Female" <?php if($cgender == 'Female'){ echo 'Selected';}?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="dob" class="m-1">Date of Birth :</label>
                                                <input type="date" name="dob" id="dob" class="form-control" value="<?= $cdob ?>">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="phone" class="m-1">Phone Number :</label>
                                                <input type="tel" name="phone" id="phone" class="form-control" value="<?= $cphone ?>" placeholder="Phone">
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="submit" name="update_profile" class="btn btn-danger btn-block" id="profileUpdateBtn" value="Update Profile">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Edit Profile -->

                        <!-- Change Password -->
                        <!-- Edit Profile -->
                        <div class="tab-pane container fade" id="changePass">
                        <div id="changePassAlert"></div>
                            <div class="card-deck">
                           
                                <div class="card border-success align-self-center">
                                    <div class="card-header bg-success text-light text-center lead">
                                        Change Password
                                    </div>
                                    <form action="" method="post" class="px-3 mt-2" id="change-pass-form">
                                     
                                        <div class="form-group">
                                            <label for="curpass">Enter your current password</label>
                                            <input type="password" name="curpass" id="curpass" class="form-control form-control-lg" placeholder="Current Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newpass">Enter New password</label>
                                            <input type="password" name="newpass" id="newpass" class="form-control form-control-lg" placeholder="New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cnewpass">Confirm New password</label>
                                            <input type="password" name="cnewpass" id="cnewpass" class="form-control form-control-lg" placeholder="Confirm New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <p id="changePassError" class="text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="changepass" id="changePassBtn" class="btn btn-success btn-block btn-lg">
                                        </div>
                                    </form>
                                </div>
                                <div class="card border-success align-self-center">
                               
                                    <img src="img/reset-password.png" class="img-thumbnail img-fluid" width="540px">
                                    
                                </div>
                            </div>
                        </div>
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
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
  
    <script src="js/admin.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
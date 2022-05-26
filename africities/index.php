<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospitality Registration</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                    <div class="container">
                        <div class="float-left" >
                            <img id="logo1" src="img/logo.png" alt="">
                        </div>

                        <div id="logo3">
                            <img id="logo1" src="img/CGK_Website_Logo.png" alt="">
                        </div>

                        <div class="float-right" >
                            <img id="logo2" src="img/afri1.png" alt="">
                        </div>
                        
                    </div>
              
                    <!-- Topbar Navbar -->
                 

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">AfriCities Hospitality Registration</h1>
                    <!-- <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
                        The charts below have been customized - for further customization options, please visit the <a
                            target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
                            documentation</a>.</p> -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">                   
                            <ul class="nav nav-tabs card-header-tabs justify-content-center">
                                <li class="nav-item">
                                    <a href="#hotels" class="nav-link active font-weight-bold" data-toggle="tab">Hotels</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#transport" class="nav-link font-weight-bold" data-toggle="tab">Transport</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#exhibitors" class="nav-link font-weight-bold" data-toggle="tab">Exhibitors</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <!-- <p>profile page</p> -->
                            <div class="tab-content ml-1" >
                                <!-- View Profile -->
                                <div class="tab-pane container active" id="hotels">
                                    <div class="card-body" >
                                        <form action="#" method="POST" id="hotelForm" enctype="multipart/form-data">
                                            <div id="hotelAlert"></div>
                                            <input type="hidden" name="hotelData" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="hotelName">Name of The Hotel</label>
                                                    <input type="text" name="hotelName" class="form-control" id="hotelName" placeholder="Name of The Hotel" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelType">Hotel Type</label>
                                                    <input type="text" name="hotelType" class="form-control" id="hotelType" placeholder="Enter Hotel Type" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelRooms">Number of Rooms</label>
                                                    <input type="text" name="hotelRooms" class="form-control" id="hotelRooms" placeholder="Enter Number of Rooms" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="hotelAddress">Location Address</label>
                                                    <input type="text" name="hotelAddress" class="form-control" id="hotelAddress" placeholder="Enter Location Address" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelTownCity">Town / City</label>
                                                    <input type="text" name="hotelTownCity" class="form-control" id="hotelTownCity" placeholder="Enter Town / City" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelDistance">Distance to Venue</label>
                                                    <input type="number" name="hotelDistance" class="form-control" id="hotelDistance" placeholder="Enter Distance in KMs" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="hotelBusinessPermit">Attach Business Permit</label>
                                                    <input type="file" name="hotelBusinessPermit"  id="hotelBusinessPermit" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelRegistrationCert">Attach Certificate of Registration</label>
                                                    <input type="file" name="hotelRegistrationCert"  id="hotelRegistrationCert" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelKeepersAssocCert">Attach Hotel Keepers Association Certificate</label>
                                                    <input type="file" name="hotelKeepersAssocCert"  id="hotelKeepersAssocCert" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="hotelIdPassport">Attach ID / Passport Copy</label>
                                                    <input type="file" name="hotelIdPassport"  id="hotelIdPassport" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelPhone">Hotel Phone Number</label>
                                                    <input type="tel" name="hotelPhone" class="form-control" id="hotelPhone" placeholder="Enter Phone Number" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="hotelEmail">Hotel Email Address</label>
                                                    <input type="email" name="hotelEmail" class="form-control" id="hotelEmail" placeholder="Enter Email Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="hotelSubmit" id="hotelSubmitBtn" class="btn btn-success btn-block" value="Submit Details">
                                            </div>
                                        </form>
                                        
                                    </div>                        
                                </div>
                                <!-- End View Profile -->

                                <!-- Edit Profile -->
                                <div class="tab-pane container fade" id="transport">
                                    <div class="card-body" >
                                        <form action="#" method="POST" id="transportForm" enctype="multipart/form-data">
                                            <div id="transportAlert"></div>
                                            <input type="hidden" name="transportData" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="transportlFirstName">First Name</label>
                                                    <input type="text" name="transportlFirstName" class="form-control" id="transportlFirstName" placeholder="Enter First Name" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportlSecondName">Second Name</label>
                                                    <input type="text" name="transportlSecondName" class="form-control" id="transportlSecondName" placeholder="Enter Second Name" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportLastName">Last Name</label>
                                                    <input type="text" name="transportLastName" class="form-control" id="transportLastName" placeholder="Enter Last Name" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="transportLicencePlate">Licence Plate Number</label>
                                                    <input type="text" name="transportLicencePlate" class="form-control" id="transportLicencePlate" placeholder="Enter Licence Plate Number" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportIdPassportNo">ID / Passport Number</label>
                                                    <input type="number" name="transportIdPassportNo" class="form-control" id="transportIdPassportNo" placeholder="Enter ID / Passport Number" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportCategory">Select Category</label>
                                                    <select class="form-control" name="transportCategory" id="transportCategory" required>
                                                    <option>Taxi/Cab</option>
                                                    <option>Motorbike</option>
                                                    <option>TukTuk</option>
                                                    <option>Other</option>
                                                    </select>
                                                </div>
                                            
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="transportInsuranceCert">Motor Vehicle Insurance Cerificate</label>
                                                    <input type="file" name="transportInsuranceCert"  id="transportInsuranceCert" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportDriversLicence">Drivers Licence</label>
                                                    <input type="file" name="transportDriversLicence"  id="transportDriversLicence" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportIdPassport">Attach ID / Passport Copy</label>
                                                    <input type="file" name="transportIdPassport"  id="transportIdPassport" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                        
                                                <div class="form-group col-md-4">
                                                    <label for="transportPhone">Phone Number</label>
                                                    <input type="tel" name="transportPhone" class="form-control" id="transportPhone" placeholder="Enter Phone Number" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="transportEmail">Email Address</label>
                                                    <input type="email" name="transportEmail" class="form-control" id="transportEmail" placeholder="Enter Email Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="transportSubmit" id="transportSubmitBtn" class="btn btn-success btn-block" value="Submit Details">
                                            </div>
                                        </form>
                                            
                                    </div>
                                </div>
                                <!-- End of Edit Profile -->

                                <!-- Change Password -->
                                <!-- Edit Profile -->
                                <div class="tab-pane container fade" id="exhibitors">
                                    <div class="card-body" >
                                        <form action="#" method="POST" id="exhibitorForm" enctype="multipart/form-data">
                                            <div id="exhibitorAlert"></div>
                                            <input type="hidden" name="exhibitorData" >
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorFirstName">First Name</label>
                                                    <input type="text" name="exhibitorFirstName" class="form-control" id="exhibitorFirstName" placeholder="Enter First Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorSecondName">Second Name</label>
                                                    <input type="text" name="exhibitorSecondName" class="form-control" id="exhibitorSecondName" placeholder="Enter Second Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorLastName">Last Name</label>
                                                    <input type="text" name="exhibitorLastName" class="form-control" id="exhibitorLastName" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                            
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorCountry">Country</label>
                                                    <input type="text" name="exhibitorCountry" class="form-control" id="exhibitorCountry" placeholder="Enter Your Country">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorFile">Attach Document</label>
                                                    <input type="file" name="exhibitorFile"  id="exhibitorFile">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorCategory">Select Category</label>
                                                    <select class="form-control" name="exhibitorCategory" id="exhibitorCategory">
                                                        <option>Category A</option>
                                                        <option>Category B</option>
                                                        <option>Category C</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorPhone">Phone Number</label>
                                                    <input type="tel" name="exhibitorPhone" class="form-control" id="exhibitorPhone" placeholder="Enter Phone Number">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="exhibitorEmail">Email Address</label>
                                                    <input type="email" name="exhibitorEmail" class="form-control" id="exhibitorEmail" placeholder="Enter Email Address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="exhibitorSubmit" id="exhibitorSubmitBtn" class="btn btn-success btn-block" value="Submit Details">
                                            </div>
                                        </form>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://kenlinksolutions.com/">Kenlinks Solutions LTD</a> | 2022</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html>
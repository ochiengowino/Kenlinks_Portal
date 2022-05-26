<?php
require_once "auth.php";
// require_once "config.php";

 $db = new Auth();
// $db2 = new

if(isset($_POST['hotelData'])){
    // echo "hotel";
    // print_r($_POST);
    $hotelName = $_POST['hotelName'];
    $hotelType = $_POST['hotelType'];
    $hotelRooms = $_POST['hotelRooms'];
    $hotelAddress = $_POST['hotelAddress'];
    $hotelTownCity = $_POST['hotelTownCity']; 
    $hotelDistance = $_POST['hotelDistance'];
    $hotelPhone = $_POST['hotelPhone'];
    $hotelEmail = $_POST['hotelEmail'];
    $folder = '';

    // // print_r($hotelEstablishment);
    //     // print_r($_FILES['hotelFile']['name']);

        if(isset($_FILES['hotelBusinessPermit'])){

            $hotelBusinessPermit_name = $_FILES['hotelBusinessPermit']['name'];
            $hotelBusinessPermit_temp =  $_FILES['hotelBusinessPermit']['tmp_name'];
            $folder = '../../africities/uploads/hotels/business_permit/';
            $businessPermit = $folder.$hotelBusinessPermit_name;
            move_uploaded_file($hotelBusinessPermit_temp, $businessPermit);
        }

        if(isset($_FILES['hotelRegistrationCert'])){

            $hotelRegistrationCert_name = $_FILES['hotelRegistrationCert']['name'];
            $hotelRegistrationCert_temp =  $_FILES['hotelRegistrationCert']['tmp_name'];
            $folder = '../../africities/uploads/hotels/registration_certificate/';
            $registrationCert = $folder.$hotelRegistrationCert_name;
            move_uploaded_file($hotelRegistrationCert_temp, $registrationCert);
        }

        if(isset($_FILES['hotelKeepersAssocCert'])){

            $hotelKeepersAssocCert_name = $_FILES['hotelKeepersAssocCert']['name'];
            $hotelKeepersAssocCert_temp =  $_FILES['hotelKeepersAssocCert']['tmp_name'];
            $folder = '../../africities/uploads/hotels/hotel_keepers_association/';
            $keepersAssoc = $folder.$hotelKeepersAssocCert_name;
            move_uploaded_file($hotelKeepersAssocCert_temp, $keepersAssoc);
        }

        if(isset($_FILES['hotelIdPassport'])){

            $hotelIdPassport_name = $_FILES['hotelIdPassport']['name'];
            $hotelIdPassport_temp =  $_FILES['hotelIdPassport']['tmp_name'];
            $folder = '../../africities/uploads/hotels/id_passport/';
            $idPassport = $folder.$hotelIdPassport_name;
            move_uploaded_file($hotelIdPassport_temp, $idPassport);
        }

        if($db->hotel_register($hotelName, $hotelType, $hotelRooms, $hotelAddress, $hotelTownCity, $hotelDistance, $businessPermit, $registrationCert, $keepersAssoc, $idPassport, $hotelPhone, $hotelEmail)){
            echo $db->showMessage('success', 'Data Submitted Successfully');
        }
        
    
}


if(isset($_POST['transportData'])){
    // print_r($_POST);
    $transportlFirstName = $_POST['transportlFirstName'];
    $transportlSecondName = $_POST['transportlSecondName'];
    $transportLastName = $_POST['transportLastName'];
    $transportLicencePlate = $_POST['transportLicencePlate'];
    $transportIdPassportNo = $_POST['transportIdPassportNo']; 
    $transportCategory = $_POST['transportCategory'];
  
    $transportPhone = $_POST['transportPhone'];
    $transportEmail = $_POST['transportEmail'];
    $folder = '';


    if(isset($_FILES['transportInsuranceCert'])){

        $transportInsuranceCert_name = $_FILES['transportInsuranceCert']['name'];
        $transportInsuranceCert_temp =  $_FILES['transportInsuranceCert']['tmp_name'];
        $folder = '../../africities/uploads/transport/insurance_certificate/';
        $insuranceCert = $folder.$transportInsuranceCert_name;
        move_uploaded_file($transportInsuranceCert_temp, $insuranceCert);
    }

    if(isset($_FILES['transportDriversLicence'])){

        $transportDriversLicence_name = $_FILES['transportDriversLicence']['name'];
        $transportDriversLicence_temp =  $_FILES['transportDriversLicence']['tmp_name'];
        $folder = '../../africities/uploads/transport/drivers_licence/';
        $driversLicence = $folder.$transportDriversLicence_name;
        move_uploaded_file($transportDriversLicence_temp, $driversLicence);
    }

    if(isset($_FILES['transportIdPassport'])){

        $transportIdPassport_name = $_FILES['transportIdPassport']['name'];
        $transportIdPassport_temp =  $_FILES['transportIdPassport']['tmp_name'];
        $folder = '../../africities/uploads/transport/id_passport/';
        $idPassport = $folder.$transportIdPassport_name;
        move_uploaded_file($transportIdPassport_temp, $idPassport);
    }

    if($db->transport_register($transportlFirstName, $transportlSecondName, $transportLastName, $transportLicencePlate, $transportIdPassportNo, $transportCategory, $insuranceCert, $driversLicence, $idPassport, $transportPhone, $transportEmail)){
        echo $db->showMessage('success', 'Data Submitted Successfully');
    }
    

}

if(isset($_POST['exhibitorData'])){
// print_r($_POST);
    $exhibitorFirstName = $_POST['exhibitorFirstName'];
    $exhibitorSecondName = $_POST['exhibitorSecondName'];
    $exhibitorLastName = $_POST['exhibitorLastName'];
    $exhibitorCountry = $_POST['exhibitorCountry'];
    $exhibitorCategory = $_POST['exhibitorCategory'];
    $exhibitorPhone = $_POST['exhibitorPhone'];
    $exhibitorEmail = $_POST['exhibitorEmail'];
    $folder = '';

    
    if(isset($_FILES['exhibitorFile'])){

        $exhibitorFile_name = $_FILES['exhibitorFile']['name'];
        $exhibitorFile_temp =  $_FILES['exhibitorFile']['tmp_name'];
        $folder = '../../africities//uploads/exhibitors/';
        $exhibitorFile = $folder.$exhibitorFile_name;
        move_uploaded_file($exhibitorFile_temp, $exhibitorFile);
    }

    if($db->exhibitor_register($exhibitorFirstName, $exhibitorSecondName, $exhibitorLastName, $exhibitorCountry, $exhibitorFile, $exhibitorCategory, $exhibitorPhone, $exhibitorEmail)){
        echo $db->showMessage('success', 'Data Submitted Successfully');
    }
    

}
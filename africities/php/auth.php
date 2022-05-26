<?php 
    require_once "config.php";

class Auth extends Database{

    //Register new users
    public function hotel_register($hotelName, $hotelType, $hotelRooms, $hotelAddress, $hotelTownCity, $hotelDistance, $hotelBusinessPermit, $hotelRegistrationCert, $hotelKeepersAssocCert, $hotelIdPassport, $hotelPhone, $hotelEmail){

        $sql = "INSERT INTO africities_registration.hotels (hotel_name, hotel_type, rooms, address, town_city, distance_venue, business_permit, registration_certificate, hotel_keepers_certificate, id_passport_copy, phone_number, email) 
                            VALUES (:hotel_name, :hotel_type, :rooms, :address, :town_city, :distance_venue, :business_permit, :registration_certificate, :hotel_keepers_certificate, :id_passport_copy, :phone_number, :email)";

        $stmt = $this->conn->prepare($sql);
        
        if($stmt->execute(['hotel_name'=>$hotelName, 'hotel_type'=>$hotelType, 'rooms'=>$hotelRooms, 'address'=>$hotelAddress, 'town_city'=>$hotelTownCity, 'distance_venue'=>$hotelDistance, 'business_permit'=>$hotelBusinessPermit, 'registration_certificate'=>$hotelRegistrationCert, 'hotel_keepers_certificate'=>$hotelKeepersAssocCert, 'id_passport_copy'=>$hotelIdPassport, 'phone_number'=>$hotelPhone, 'email'=>$hotelEmail])){
            // print($name);
            echo 'data inserted successfully';
        
        }else{
            echo 'there is a problem somewhere';
        };

        return true;
    }


    public function transport_register($first_name, $second_name, $last_name, $licence_plate, $id_passport_no, $category, $motor_vehicle_insurance, $drivers_licence, $id_passport_copy, $phone_number, $email){

        $sql = "INSERT INTO africities_registration.transport (first_name, second_name, last_name, licence_plate, id_passport_no, category, motor_vehicle_insurance, drivers_licence, id_passport_copy, phone_number, email) 
                            VALUES (:first_name, :second_name, :last_name, :licence_plate, :id_passport_no, :category, :motor_vehicle_insurance, :drivers_licence, :id_passport_copy, :phone_number, :email)";

        $stmt = $this->conn->prepare($sql);
        
        if($stmt->execute(['first_name'=>$first_name, 'second_name'=>$second_name, 'last_name'=>$last_name, 'licence_plate'=>$licence_plate, 'id_passport_no'=>$id_passport_no, 'category'=>$category, 'motor_vehicle_insurance'=>$motor_vehicle_insurance, 'drivers_licence'=>$drivers_licence, 'id_passport_copy'=>$id_passport_copy, 'phone_number'=>$phone_number, 'email'=>$email])){
            // print($name);
            echo 'data inserted successfully';
        
        }else{
            echo 'there is a problem somewhere';
        };

        return true;
    }


    public function exhibitor_register($first_name, $second_name, $last_name, $country, $document, $category, $phone, $email){

        $sql = "INSERT INTO africities_registration.exhibitors (first_name, second_name, last_name, country, document, category, phone, email) 
                            VALUES (:first_name, :second_name, :last_name, :country, :document, :category, :phone, :email)";

        $stmt = $this->conn->prepare($sql);
        
        if($stmt->execute(['first_name'=>$first_name, 'second_name'=>$second_name, 'last_name'=>$last_name, 'country'=>$country, 'document'=>$document, 'category'=>$category, 'phone'=>$phone, 'email'=>$email])){
            // print($name);
            // echo 'data inserted successfully';
        
        }else{
            echo 'there is a problem somewhere';
        };

        return true;
    }

}
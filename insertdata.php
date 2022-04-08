<?php
include "db_conn.php";
if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $date = $_POST['date'];
    $date = date("Y-m-d", strtotime($_POST['date']));
    $message = $_POST['message'];
    $uniqueID = rand(1000,100000);
    
    $sql_insert = "INSERT INTO demo_form (uniqueID, name, email, phone_number, date, message) 
    VALUES ('$uniqueID','$name', '$email', '$phone','$date', '$message')";


    if(mysqli_query($conn, $sql_insert)){
        header("location:demo-request.php"); // redirects to demo-request page
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql_insert. " . mysqli_error($conn);
    }

}

mysqli_close($conn);


?>
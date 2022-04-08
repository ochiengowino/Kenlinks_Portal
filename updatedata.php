<?php 

if (!empty($_POST)) {
    // echo $_POST['date'];
    echo $_POST['id'];
    // echo $_POST['email'];
    // echo $_POST['phone'];
    // echo $_POST['name'];
    $id = $_POST['id'];
    $reference = $_POST['reference'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $date = $_POST['date'];
    $date = date("Y-m-d", strtotime($_POST['date']));
    // $message = $_POST['message'];
    // $uniqueID = rand(1000,100000);
    include "login-system/db_conn.php";
    $edit = mysqli_query($conn, "UPDATE demo_form SET  name='".$name."', email='".$email."', phone_number='".$phone."', date='".$date."', uniqueID='".$reference."' WHERE id='".$id."'");
    // $updates = mysqli_query($conn,"UPDATE `demo_form` SET `uniqueID` = '$reference', `name` = '$name',`email` = '$email', `phone_number` = '$phone',`date` = '$date' WHERE `demo_form`.`uniqueID` = $reference");
    if($edit){
        header("location:demo-request.php"); // redirects to demo-request page
        echo "Records updated successfully.";
    } else{
        echo "ERROR: Could not able to execute $edit. " . mysqli_error($conn);
    }
    
}
$conn->close();
?>
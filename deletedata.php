<?php 

if (!empty($_POST)) {
    
    // echo $_POST['id'];

    $reference = $_POST['id'];

    include "login-system/db_conn.php";
    $del = mysqli_query($conn, "DELETE FROM demo_form WHERE id='$reference'");
//   $del=  "DELETE FROM `demo_form` WHERE `demo_form`.`id` = $reference";
    if($del){
        header("location:demo-request.php"); // redirects to demo-request page
        echo "Records deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $del. " . mysqli_error($conn);
    }
    
}
$conn->close();
?>
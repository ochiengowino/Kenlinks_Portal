<?php 
require_once "session.php";

if(isset($_GET['email'])){
    $email = $_GET['email'];

    print_r($_GET);

    $cuser->verify_email($email);

    header('location:../profile.php');

    exit();
}else{
    header('location:../index.php');

    exit();
}
?>
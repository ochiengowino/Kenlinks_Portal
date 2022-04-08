<?php 
session_start();

require_once "auth.php";

$cuser = new Auth();

if(!$_SESSION['user']){

    header('location: index.php');
    die;
}

$cemail = $_SESSION['user'];

$data = $cuser->currentUser($cemail);
// print_r($data);
$cid = $data['id'];
$cname = $data['name'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender= $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$created = $data['created_at'];
$verified = $data['verified'];

$reg_on = date('d, M Y', strtotime($created));
$fname = strtok($cname, ' ');

if($verified == 0){
    $verified = 'Not verified!';
}else{
    $verified = 'verified!';
}
?>
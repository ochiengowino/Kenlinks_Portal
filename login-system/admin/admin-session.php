<?php  
session_start();

require_once "admin-db.php";

$admin = new Admin();

// if(!$_SESSION['username']){

//     header('location: index.php');
//     die;
// }

$currentAdmin = $_SESSION['username'];
// echo $currentAdmin;
$data = $admin->currentAdmin($currentAdmin);
// print_r($data);
$admin_id = $data['id'];
$admin_username = $data['username'];
$admin_password = $data['password'];
$admin_photo = $data['photo'];
$admin_gender = $data['gender'];
$created = $data['created_at'];
$deleted = $data['deleted'];

$reg_on = date('d, M Y', strtotime($created));
// $fname = strtok($cname, ' ');

if($deleted == 1){
    $deleted = 'Not Deleted';
}else{
    $deleted = 'deleted';
}

// echo $deleted;

?>
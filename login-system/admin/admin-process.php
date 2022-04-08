<?php 
require_once "admin-session.php";
require_once "admin-db.php";

$admin = new Admin();

// Handle Admin Profile Update
if(isset($_FILES['image'])){
    // print_r($_FILES['image']);
    // print_r($_FILES['image']['name']);
    // print_r($_POST);
    
    $username = $admin->test_input($_POST['username']);
    $gender = $admin->test_input($_POST['gender']);
    $oldimage = $_POST['oldimage'];
    $folder = '../../img/uploads/';
  
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $newimage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newimage);

        if($oldimage != null){
            unlink($oldimage);
        }
    }else{
        $newimage = $oldimage;
    }

    $admin->update_profile($admin_id, $username, $gender ,$newimage);

}

// Handle change admin profile password
if(isset($_POST['action']) && $_POST['action'] == 'change_admin_pass'){
    print_r($_POST);
    $currentPass = $_POST['curpass'];
    $newPass = $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];
    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);
    // $hnewPass = sha1($newPass);
    echo $admin_password;
    // echo "  ";
    // echo $currentPass;
    if($newPass != $cnewPass){
        echo $admin->showMessage('danger', 'Passwords Did not Match!');
    }else{
        if(password_verify($currentPass, $admin_password)){
            $admin->change_password($admin_id, $hnewPass);
            
            echo $admin->showMessage('success', 'Password Changed Successfully!');
        }else{
            echo $admin->showMessage('danger', 'The current password is Incorrect!');
        }
    }
}

?>
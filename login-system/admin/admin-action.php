<?php 
require_once "admin-db.php";

$admin = new Admin();
session_start();
// require_once "admin-session.php";

// Handle Admin Login ajax request
if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){

    // print_r($_POST);
    $username = $admin->test_input($_POST['username']);

    $password = $admin->test_input($_POST['password']);

    $loggedInAdmin = $admin->checkAdminLogin($username);

 
    if($loggedInAdmin != null){
        if(password_verify($password, $loggedInAdmin['password'])){
            echo 'admin_login';

            $_SESSION['username'] = $username;
        }else{
            echo $admin->showMessage('danger', 'Password is incorrect!');
        }
    
    }else{
        echo $admin->showMessage('danger', 'Username not found!');
    }

}


if(isset($_POST['action']) && $_POST['action'] == 'create_admin'){
    // print_r($_POST);
    $username = $admin->test_input($_POST['username']);

    $pass = $admin->test_input($_POST['password']);
    $hpass =  password_hash($pass, PASSWORD_DEFAULT);
    // $hpass = sha1($pass);
    // print($hpass);
   

    if($admin->admin_exist($username)){
        echo $admin->showMessage('warning', 'This username already exists!');
    }else{
         if($admin->create_admin($username, $hpass)){
            echo 'admin_created';
            $admin->showMessage('success', 'Admin Created');
         }
    }
}

// Handle fetch all registered users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
   $output = '';
   $data = $admin->fetchAllUsers(0);
    $path = '../../';
   if($data){
       $output .='
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Gender</th>
                    <th>Verified</th>
                    <th>Registered On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Gender</th>
                    <th>Verified</th>
                    <th>Registered On</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>';
            foreach($data as $row){
                if($row['photo'] != ''){
                    $uphoto = $path.$row['photo'];
                }else{
                    $uphoto = '../../img/favicon.png';
                }
            
                $output .= '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td><img src="'.$uphoto.'" class="rounded-circle" width=40px></td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['verified'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>
                        <a href="#" id="'.$row['id'].'"  type="button" class="btn btn-outline-primary userDetails" title="View Details" data-toggle="modal" data-target="#showUserDetails">
                            <i class="fas fa-info-circle fa-lg"></i>&nbsp;&nbsp;
                        </a>
                        <a href="#" id="'.$row['id'].'" title="Delete User"  type="button" class="btn btn-outline-danger deleteUser">
                            <i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;
                        </a>
                    </td>
                </tr>';
                }
                $output .= '
            </tbody>

        </table>';
        echo $output;
   }else{
       echo '<h3 class="text-center text-secondary">:( No Registered Users Available Yet</h3>';
   }
}

// Handle Display User Details
if(isset($_POST['details_id'])){

    $id = $_POST['details_id'];

    $data = $admin->fetchUserDetails($id);

    echo json_encode($data);
}


// Handle Delete User Ajax request
if(isset($_POST['delete_id'])){

    $id = $_POST['delete_id'];

    $admin->userAction($id, 0);
}


// Handle fetch all Deleted users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchDeletedUsers'){
    $output = '';
    $data = $admin->fetchAllUsers(1);
     $path = '../../';
    if($data){
        $output .='
         <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone No.</th>
                     <th>Gender</th>
                     <th>Verified</th>
                     <th>Registered On</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tfoot>
                 <tr>
                     <th>#</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone No.</th>
                     <th>Gender</th>
                     <th>Verified</th>
                     <th>Registered On</th>
                     <th>Action</th>
                 </tr>
             </tfoot>
             <tbody>';
             foreach($data as $row){
                 if($row['photo'] != ''){
                     $uphoto = $path.$row['photo'];
                 }else{
                     $uphoto = '../../img/favicon.png';
                 }
             
                 $output .= '
                 <tr>
                     <td>'.$row['id'].'</td>
                     <td><img src="'.$uphoto.'" class="rounded-circle" width=40px></td>
                     <td>'.$row['name'].'</td>
                     <td>'.$row['email'].'</td>
                     <td>'.$row['phone'].'</td>
                     <td>'.$row['gender'].'</td>
                     <td>'.$row['verified'].'</td>
                     <td>'.$row['created_at'].'</td>
                     <td>
                         <a href="#" id="'.$row['id'].'" title="Restore User"  type="button" class="btn btn-outline-danger restoreUser">
                             Restore User
                         </a>
                     </td>
                 </tr>';
                 }
                 $output .= '
             </tbody>
 
         </table>';
         echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( No Deleted Users Available Yet</h3>';
    }
 }
 

//  Handle Restore Deleted User Ajax request
if(isset($_POST['restore_id'])){

    $id = $_POST['restore_id'];

    $admin->userAction($id, 1);
}


// Handle fetch all added requests ajax
if(isset($_POST['action']) && $_POST['action'] == 'fetchAddedRequests'){
    $output = '';
    $data = $admin->fetchAddedRequests();
 
    if($data){
        $output .='
         <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
             <thead>
                 <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>uniqueID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Request Date</th>
                    <th>Message</th>
                    <th>Sent On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                 </tr>
             </thead>
             <tfoot>
                 <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>uniqueID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Request Date</th>
                    <th>Message</th>
                    <th>Sent On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                 </tr>
             </tfoot>
             <tbody>';
             foreach($data as $row){
             
                 $output .= '
                 <tr>
                     <td>'.$row['id'].'</td>
                     <td>'.$row['name'].'</td>
                     <td>'.$row['email'].'</td>
                     <td>'.$row['uniqueID'].'</td>
                     <td>'.$row['name'].'</td>
                     <td>'.$row['email'].'</td>
                     <td>'.$row['phone_number'].'</td>
                     <td>'.$row['date'].'</td>
                     <td>'.$row['message'].'</td>
                     <td>'.$row['sent_date'].'</td>
                     <td>'.$row['updated_at'].'</td>
                     <td>
                         <a href="#" id="'.$row['id'].'"  type="button" class="btn btn-outline-primary viewAddedRequests" title="View Details" data-toggle="modal" data-target="#viewAddedRequests">
                             <i class="fas fa-info-circle fa-lg"></i>&nbsp;&nbsp;
                         </a>
                         <br><br>
                         <a href="#" id="'.$row['id'].'" title="Delete"  type="button" class="btn btn-outline-danger deleteAddedRequests">
                             Delete
                         </a>
                     </td>
                 </tr>';
                 }
                 $output .= '
             </tbody>
 
         </table>';
         echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( No Added Requests Available Yet</h3>';
    }
 }


//  Handle Delete Added request of an user by admin
if(isset($_POST['del_req_id'])){
    $id = $_POST['del_req_id'];

    $admin->deleteAddedRequest($id);
}


// Handle View Added requests by admin
if(isset($_POST['add_req_id'])){

    $id = $_POST['add_req_id'];

    $data = $admin->viewAddedRequests($id);

    echo json_encode($data);
}


// Handle Fetch all feedback of users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllFeedbacks'){
    $output = '';
    $data = $admin->fetchFeedback();
 
    if($data){
        $output .='
         <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
             <thead>
                 <tr>
                    <th>#</th>
                    <th>UID</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>Subject</th>
                    <th>Feedback</th>
                    <th>Sent On</th>
                    <th>Action</th>
                 </tr>
             </thead>
             <tfoot>
                 <tr>
                    <th>#</th>
                    <th>UID</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>Subject</th>
                    <th>Feedback</th>
                    <th>Sent On</th>
                    <th>Action</th>
                 </tr>
             </tfoot>
             <tbody>';
             foreach($data as $row){
             
                 $output .= '
                 <tr>
                     <td>'.$row['id'].'</td>
                     <td>'.$row['uid'].'</td>
                     <td>'.$row['name'].'</td>
                     <td>'.$row['email'].'</td>
                     <td>'.$row['subject'].'</td>
                     <td>'.$row['feedback'].'</td>
                     <td>'.$row['created_at'].'</td>
                     <td>
                         <a href="#" fid="'.$row['id'].'" id="'.$row['uid'].'"  type="button" class="btn btn-outline-primary replyFeedback" title="Reply Feedback" data-toggle="modal" data-target="#replyFeedback">
                             <i class="fas fa-reply fa-lg"></i>&nbsp;&nbsp;
                         </a>
                     </td>
                 </tr>';
                 }
                 $output .= '
             </tbody>
 
         </table>';
         echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( No Feedbacks Available Yet</h3>';
    }
 }


//  Handle reply feedback ajax request
if(isset($_POST['message'])){
    // print_r($_POST);

    $uid = $_POST['uid'];
    $message = $admin->test_input($_POST['message']);
    $fid = $_POST['fid'];

    $admin->replyFeedback($uid, $message);
    
    $admin->feedbackReplied($fid);
}


// Handle fetch notifications from users ajax request
if(isset($_POST['action'])  && $_POST['action'] == 'fetchNotifications'){

    $notifications = $admin->fetchNotifications();

    $output = '';

    if($notifications){
        foreach($notifications as $row){
            $output .= '     
            <div class="alert alert-dark" role="alert">
                <button id="'.$row['id'].'" type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">New Notification!</h4>
                <p>'.$row['message'].' by '.$row['name'].'</p>              
                <hr class="my-2">
                <p class="mb-0 float-left"><b>Email :</b> '.$row['email'].' </p>
                <p class="mb-0 float-right">'.$admin->timeInAgo($row['created_at']).'</p>
                <div class="clearfix"></div>
            </div>';
        }
        echo $output;
    }else{
        echo '<h4 class="text-center text-secondary mt-5">No new notifications</h4>';
    }
}


//Handle Check notifications
if(isset($_POST['action'])  && $_POST['action'] == 'checkNotifications'){
    if($admin->fetchNotifications()){
        echo '<i class="fas fa-circle fa-sm text-danger"></i>';
    }else{
        echo '';
    }
}

// Handle remove notifications
if(isset($_POST['notification_id'])){
    $id = $_POST['notification_id'];
    $admin->removeNotifications($id);
}


// Handle Export All Users
if(isset($_GET['export']) && $_GET['export'] == 'excel'){

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=users.xls');
    header('Pragma: no-cache');
    header('Expires: 0');

    $data = $admin->exportUsers();

    echo '<table border="1" align=center>';
        echo '<tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone N0</th>
                    <th>Gender</th>
                    <th>DoB</th>
                    <th>Joined On</th>
                    <th>Verified</th>
                    <th>Deleted</th>
            </tr>';
                    
        foreach ($data as $row) {
        echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['dob'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>'.$row['verified'].'</td>
                    <td>'.$row['deleted'].'</td>
                </tr>';
        }
    echo '</table>';
}









?>
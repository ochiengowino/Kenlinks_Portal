<?php 
require_once "login-system/session.php";
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'login-system/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);



//Handle Add data ajax request
if(isset($_POST['action']) && $_POST['action'] == 'add_data'){
    // print_r($_POST);
    $name = $cuser->test_input($_POST['name']);
    $email = $cuser->test_input($_POST['email']);
    $phone = $cuser->test_input($_POST['phone']);
    $message = $cuser->test_input($_POST['message']);
    $date = $cuser->test_input($_POST['date']);
    $uniqueID = rand(1000,100000);

    $cuser->new_form_data($cid, $uniqueID, $name, $email, $phone, $date, $message);

    $cuser->notifications($cid, 'admin', 'Data added');
        header("location:demo-request.php");
    

}

// Handle display User added data
if(isset($_POST['action']) && $_POST['action'] == 'display_data'){

    $output = '';

    $data = $cuser->get_data($cid);

    // print_r($data);

    if($data){
        $output .= '<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reference Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Date</th>
                <th>Message</th>
                <th>Updated On</th>
              
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Reference Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Date</th>
                <th>Message</th>
                <th>Updated On</th>
            
            </tr>
        </tfoot>
        <tbody>';
        foreach($data as $row){
            $output .= '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['uniqueID'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone_number'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.substr($row['message'], 0, 75).'</td>
            <td>'.$row['sent_date'].'</td>

        </tr>';
        }
        $output .= '</tbody>
        </table>   ';
        echo $output;
    }else{
        echo '<h3 class="text-center text-primary">You have not added any data yet</h3>';
    }
}


// Handle fetch of edit data
if(isset($_POST['edit_data'])){
    // print_r($_POST);
    $id = $_POST['edit_data'];

    $row = $cuser->edit_data($id);

    echo json_encode($row);
}

// Handle update of data
if(isset($_POST['action']) && $_POST['action'] == 'update_data'){
    // print_r($_POST);
    $id = $cuser->test_input($_POST['id']);
    $name = $cuser->test_input($_POST['name']);
    $email = $cuser->test_input($_POST['email']);
    $phone = $cuser->test_input($_POST['phone']);
    $date = $cuser->test_input($_POST['date']);
    $uniqueID = $cuser->test_input($_POST['reference']);
    
    $cuser->update_data($id, $uniqueID, $name, $email, $phone, $date);
    $cuser->notifications($cid, 'admin', 'Data Updated');
}

// Handle Delete Data
if(isset($_POST['del_data'])){
    $id = $_POST['del_data'];
    // print_r($_POST);
    $cuser->delete_data($id);
    $cuser->notifications($cid, 'admin', 'Data Deleted');
}

// Handle Display Data
if(isset($_POST['view_id'])){
    $id = $_POST['view_id'];
    // print_r($_POST);
    $row = $cuser->view_data($id);

    echo json_encode($row);

}


// Handle Profile Update
if(isset($_FILES['image'])){
    // print_r($_FILES['image']);
    // print_r($_FILES['image']['name']);
    // print_r($_POST);
    $name = $cuser->test_input($_POST['name']);
    $gender = $cuser->test_input($_POST['gender']);
    $phone = $cuser->test_input($_POST['phone']);
    $dob = $cuser->test_input($_POST['dob']);
    $oldimage = $_POST['oldimage'];
    $folder = 'img/uploads/';
  
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $newimage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newimage);

        if($oldimage != null){
            unlink($oldimage);
        }
    }else{
        $newimage = $oldimage;
    }

    $cuser->update_profile($cid, $name, $gender, $dob, $phone ,$newimage);
    $cuser->notifications($cid, 'admin', 'Profile Updated');
}

// Handle change profile password
if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
    // print_r($_POST);
    $currentPass = $_POST['curpass'];
    $newPass = $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

    if($newPass != $cnewPass){
        echo $cuser->showMessage('dangeer', 'Passwords Did not Match!');
    }else{
        if(password_verify($currentPass, $cpass)){
            $cuser->change_password($cid, $hnewPass);
            $cuser->notifications($cid, 'admin', 'Password Changed');
            echo $cuser->showMessage('success', 'Password Changed Successfully!');
        }else{
            echo $cuser->showMessage('danger', 'The current password is Incorrect!');
        }
    }
}

// Handle Verify Email
if(isset($_POST['action'])  && $_POST['action'] == 'verify_email'){
   
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();    
        $mail->Mailer = "smtp";                                        //Send using SMTP
        $mail->Host = 'mail.kenlinksolutions.com';                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;  
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );                                 //Enable SMTP authentication
        $mail->Username = 'bochieng@kenlinksolutions.com';
        $mail->Password = 'benja@1234';
        $mail->SMTPSecure = 'ssl/tls';
        $mail->Port = 25; 
        
        //Recipients
        $mail->setFrom('info@kenlinksolutions.com','Kenlinks Solutions Ltd');
        $mail->addAddress($cemail);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body    = '<h3>Click the link below to verify your email</h3>
                            <br>
                        <a href="http://localhost/admin-panel/login-system/verify-email.php?email='.$cemail.'">This Link <br>Regards<br> Kenlinks Solutions Ltd</a>';
        $mail->send();

        echo $cuser->showMessage('success', 'Verification link sent to your email');

    }catch (Exception $e) {

        echo $cuser->showMessage('danger', 'Something went wrong... please try again later');
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Handle send feedback to admins
if(isset($_POST['action'])  && $_POST['action'] == 'feedback'){
    // print_r($_POST);

    $subject = $cuser->test_input($_POST['subject']);
    $feedback = $cuser->test_input($_POST['feedback']);

    $cuser->send_feedback($subject, $feedback, $cid);
    $cuser->notifications($cid, 'admin', 'Feedback Sent');
}

//Handle fetch notifications
if(isset($_POST['action'])  && $_POST['action'] == 'fetchNotifications'){

    $notifications = $cuser->fetchNotifications($cid);

    $output = '';

    if($notifications){
        foreach($notifications as $row){
            $output .= '     
            <div class="alert alert-danger" role="alert">
                <button id="'.$row['id'].'" type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">New Notification!</h4>
                <p>'.$row['message'].'</p>              
                <hr class="my-2">
                <p class="mb-0 float-left">Reply of feedback from the Admin</p>
                <p class="mb-0 float-right">'.$cuser->timeInAgo($row['created_at']).'</p>
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
    if($cuser->fetchNotifications($cid)){
        echo '<i class="fas fa-circle fa-sm text-danger"></i>';
    }else{
        echo '';
    }
}

// Handle remove notifications
if(isset($_POST['notification_id'])){
    $id = $_POST['notification_id'];
    $cuser->removeNotifications($id);
}
?>
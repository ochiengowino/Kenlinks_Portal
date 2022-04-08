<?php 
    session_start();

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


    require_once "auth.php";

    $user = new Auth();

    //Handle register users Ajax request
if(isset($_POST['action']) && $_POST['action'] == 'register'){
    // print_r($_POST);
    $name = $user->test_input($_POST['name']);
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $hpass = password_hash($pass, PASSWORD_DEFAULT);
    // print($hpass);
   

    if($user->user_exist($email)){
        echo $user->showMessage('warning', 'This email is already registered!');
    }
    else{
        if($user->register($name, $email, $hpass)){
            echo 'register';
            //    echo $user->showMessage('success', 'User is registered!');

            $_SESSION['user'] = $email;

                //Server settings
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();    
            $mail->Mailer = "smtp";                                        
            $mail->Host = 'mail.kenlinksolutions.com';                    
            $mail->SMTPAuth   = true;  
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );                                 
            $mail->Username = 'bochieng@kenlinksolutions.com';
            $mail->Password = 'benja@1234';
            $mail->SMTPSecure = 'ssl/tls';
            $mail->Port = 25; 
            
            //Recipients
            $mail->setFrom('info@kenlinksolutions.com','Kenlinks Solutions Ltd');
            $mail->addAddress($email);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification';
            $mail->Body    = '<h3>Click the link below to verify your email</h3>
                                <br>
                            <a href="http://localhost/admin-panel/login-system/verify-email.php?email='.$email.'">This Link <br>Regards<br> Kenlinks Solutions Ltd<a/>';
            $mail->send();
        }
        else{
            echo $user->showMessage('danger', 'Something went wrong!... please try again');
        }
    }
}

    //Handle login Ajax request
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        // print_r($_POST);
        $email = $user->test_input($_POST['email']);
        $pass = $user->test_input($_POST['password']);

        $loggedInUser = $user->login($email);

        if($loggedInUser !=null){
            if(password_verify($pass, $loggedInUser['password'])){
                if(!empty($_POST['rem'])){
                    setcookie('email', $email, time()+(30*24*60*60), '/');
                    setcookie('password', $pass, time()+(30*24*60*60), '/');
                }else{
                    setcookie('email', '', 1, '/');
                    setcookie('password', '', 1, '/');
                }

                echo 'login';
                $_SESSION['user'] = $email;
            }else{
                echo $user->showMessage('danger', 'Password is Incorrect!');
            }
        }else{
            echo $user->showMessage('danger', 'User not found!');
        }

    }


    //Handle forgot password
    if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
        // print_r($_POST);
        $email = $user->test_input($_POST['email']);

        $user_found = $user->currentUser($email);

        if($user_found !=null){
            $token = uniqid();
            $token = str_shuffle($token);

            $user->forgot_password($token, $email);

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
                $mail->addAddress($email);     //Add a recipient
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body    = '<h3>Click the link below to reset your password</h3>
                                    <br>
                                <a href="http://localhost/admin-panel/login-system/reset-pass.php?email='.$email.'&token='.$token.'">This Link <br>Regards<br> Kenlinks Solutions Ltd<a/>';
                $mail->send();

                echo $user->showMessage('success', 'The reset link has been sent to your email');

            } catch (Exception $e) {

                echo $user->showMessage('danger', 'Something went wrong... please try again later');
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
            echo $user->showMessage('info', 'This email is not registered!');
        }

    }

    // Check user is logged in/out
    if(isset($_POST['action']) && $_POST['action'] == 'checkUser'){

        if(!$user->currentUser($_SESSION['user'])){
            echo 'bye';

            unset($_SESSION['user']);
        }
    }

?>
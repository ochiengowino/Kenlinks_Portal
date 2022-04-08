<?php 
    require_once "config.php";

class Auth extends Database{

    //Register new users
    public function register($name, $email, $password){

        $sql = "INSERT INTO ken_web.users (name, email, password) VALUES (:name, :email, :pass)";

        $stmt = $this->conn->prepare($sql);
        
        if($stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password])){
            // print($name);
            // echo 'data inserted successfully';
        
        }else{
            echo 'there is a problem somewhere';
        };

        // print($stmt);
        return true;
    }
    
    //check registered user exists
    public function user_exist($email){

        $sql = "SELECT email FROM ken_web.users WHERE email = :email";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['email'=>$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // check login user exists
    public function login($email){

        $sql = "SELECT email, password FROM ken_web.users WHERE email = :email AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['email'=>$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Current user in session
    public function currentUser($email){
        
        $sql = "SELECT * FROM ken_web.users WHERE email = :email AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['email'=>$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Forgot password
    public function forgot_password($token, $email){

        $sql = "UPDATE ken_web.users SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['token'=>$token,'email'=>$email]);

        return true;
    }

    // Reset user password
    public function reset_pass_auth($email, $token){

        $sql = "SELECT id FROM ken_web.users WHERE email = :email AND token = :token AND token !='' AND token_expire > NOW() AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['email'=>$email, 'token'=>$token,]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function update_new_pass($pass, $email){

        $sql = "UPDATE ken_web.users SET token = '', password = :pass WHERE email = :email AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['pass'=>$pass, 'email'=>$email,]);

        return true;
    }

    //Add New form data
    public function new_form_data($uid, $uniqueID, $name, $email, $phone, $date, $message){
        
        $sql = "INSERT INTO ken_web.demo_form (uid, uniqueID, name, email, phone_number, date, message) 
                VALUES (:uid, :uniqueID, :name, :email, :phone, :date, :message)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['uid'=>$uid, 'uniqueID'=>$uniqueID,'name'=>$name, 'email'=>$email,'phone'=>$phone, 'date'=>$date, 'message'=>$message]);

        return true;
    }

    // Fetch all added data of a user
    public function get_data($uid){

        $sql = "SELECT * FROM ken_web.demo_form WHERE uid = :uid";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['uid'=>$uid]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Edit Fetch data
    public function edit_data($id){

        $sql = "SELECT * FROM ken_web.demo_form WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Update Data
    public function update_data($id, $uniqueID, $name, $email, $phone, $date){

        $sql = "UPDATE ken_web.demo_form SET uniqueID = :uniqueID, name = :name, email = :email, phone_number = :phone, date = :date, updated_at = NOW() WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id, 'uniqueID'=>$uniqueID, 'name'=>$name, 'email'=>$email, 'phone'=>$phone, 'date'=>$date]);

        return true;
    }

    // Delete Data
    public function delete_data($id){
        $sql = "DELETE FROM ken_web.demo_form WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        return true;
    }

        //  Fetch data
    public function view_data($id){

        $sql = "SELECT * FROM ken_web.demo_form WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    // Update Profile data
    public function update_profile($id, $name, $gender, $dob, $phone ,$photo){

        $sql = "UPDATE ken_web.users SET name = :name, gender = :gender, dob = :dob, phone = :phone, photo = :photo WHERE id = :id AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id' => $id, 'name'=>$name, 'gender'=>$gender, 'dob'=>$dob, 'photo'=>$photo, 'phone'=>$phone]);

        return true;
    }

    // Change Profile Password
    public function change_password($id, $pass){
        $sql = "UPDATE ken_web.users SET password = :pass WHERE id = :id AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id' => $id, 'pass'=>$pass]);

        return true;
    }

    // Verify email of a user
    public function verify_email($email){
        $sql = "UPDATE ken_web.users SET verified = 1 WHERE email = :email AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['email' => $email]);

        return true;
    }

    // Send Feedback to Admins
    public function send_feedback($sub, $feed, $uid){
        $sql = "INSERT INTO ken_web.feedback (uid, subject, feedback) 
        VALUES (:uid, :subject, :feedback)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['uid'=>$uid, 'subject'=>$sub,'feedback'=>$feed]);

        return true;
    
    }

    // Insert Notifications
    public function notifications($uid, $type, $message){
        $sql = "INSERT INTO ken_web.notifications (uid, type, message) 
        VALUES (:uid, :type, :message)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['uid'=>$uid, 'type'=>$type,'message'=>$message]);

        return true;
    
    }

    //  Fetch notifications
    public function fetchNotifications($uid){

        $sql = "SELECT * FROM ken_web.notifications WHERE uid = :uid AND type='user' ORDER BY ken_web.notifications.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['uid'=>$uid]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    // Remove notifications
    public function removeNotifications($id){
        $sql = "DELETE FROM ken_web.notifications WHERE id = :id AND type='user'";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        return true;
    }
}
?>
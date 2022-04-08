<?php 
require "config.php";


class Admin extends Database{

    // Admin login
    public function admin_login($username, $password){
        $sql = "SELECT username, password FROM ken_web.admin WHERE username = :username AND password = :password AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['username'=>$username, 'password'=>$password]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Count Total No. of Rows
    public function totalCount($tablename){

        $sql = "SELECT * FROM ken_web.$tablename";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
    }

    // Count Total No. of Verified/unverified users
    public function verified_users($status){

        $sql = "SELECT * FROM ken_web.users WHERE verified = :status";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['status' => $status]);

        $count = $stmt->rowCount();

        return $count;
    }

    // Gender Percentage
    public function genderPer(){

        $sql = "SELECT gender, COUNT(*) AS number FROM ken_web.users WHERE gender!='' GROUP BY gender";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

     // Users verified/unverified percentage
     public function verifiedPer(){

        $sql = "SELECT verified, COUNT(*) AS number FROM ken_web.users GROUP BY verified";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Count hits
    public function site_hits(){
        $sql = "SELECT hits FROM ken_web.counter WHERE id=1";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    // Website Count hits
    public function website_site_hits(){
        $sql = "SELECT hits FROM ken_web.counter WHERE id=2";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Handle fetch all registered 
    public function fetchAllUsers($val){
        $sql = "SELECT * FROM ken_web.users WHERE deleted != $val";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Fetch User Details
    public function fetchUserDetails($id){
        $sql = "SELECT * FROM ken_web.users WHERE id = :id AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Delete User
    public function userAction($id, $val){
        $sql = "UPDATE ken_web.users SET deleted = $val WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        return true;
    }

    // Fetch all added requests with user details
    public function fetchAddedRequests(){
        $sql = "SELECT ken_web.demo_form.id, ken_web.demo_form.uniqueID, ken_web.demo_form.name, ken_web.demo_form.email, ken_web.demo_form.phone_number,
                       ken_web.demo_form.date, ken_web.demo_form.message, ken_web.demo_form.sent_date, ken_web.demo_form.updated_at, ken_web.users.name, ken_web.users.email
                       FROM ken_web.demo_form INNER JOIN ken_web.users ON ken_web.demo_form.uid = ken_web.users.id";
                       
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Delete added request of an user by admin
    public function deleteAddedRequest($id){
        $sql = "DELETE FROM ken_web.demo_form WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        return true;
    }

    // View Added request of an user by admin
    public function viewAddedRequests($id){
        $sql = "SELECT * FROM ken_web.demo_form WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Fetch all feedbacks of users
    public function fetchFeedback(){
        $sql = "SELECT ken_web.feedback.id, ken_web.feedback.subject, ken_web.feedback.feedback, ken_web.feedback.created_at, ken_web.feedback.uid,
                        ken_web.users.name, ken_web.users.email FROM ken_web.feedback INNER JOIN ken_web.users ON ken_web.feedback.uid = ken_web.users.id
                         WHERE replied !=1 ORDER BY ken_web.feedback.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    // Reply to user
    public function replyFeedback($uid, $message){
        $sql = "INSERT INTO ken_web.notifications (uid, type, message) VALUES (:uid, 'user', :message)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['uid' => $uid, 'message' => $message]);

        return true;
    }

    // Set feedback replied
    public function feedbackReplied($fid){
        $sql = "UPDATE ken_web.feedback SET replied = 1 WHERE id = :fid";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['fid' => $fid]);

        return true;
    }


    // Fetch Notifications from users
    public function fetchNotifications(){
        $sql = "SELECT ken_web.notifications.id, ken_web.notifications.message, ken_web.notifications.created_at, ken_web.users.name, ken_web.users.email
                FROM ken_web.notifications INNER JOIN ken_web.users ON ken_web.notifications.uid = ken_web.users.id WHERE type = 'admin' 
                ORDER BY ken_web.notifications.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    // Remove notifications
    public function removeNotifications($id){
        $sql = "DELETE FROM ken_web.notifications WHERE id = :id AND type='admin'";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id'=>$id]);

        return true;
    }


    // Fetch all the users from db
    public function exportUsers(){
        $sql = "SELECT * FROM ken_web.users";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    // Create Admin
    public function create_admin($username, $password){
        $sql = "INSERT INTO ken_web.admin (username, password) VALUES (:username, :password)";

        $stmt = $this->conn->prepare($sql);
        
        if($stmt->execute(['username'=>$username, 'password'=>$password])){
            // print($name);
            // echo 'data inserted successfully';
        
        }else{
            echo 'there is a problem somewhere';
        };

        // print($stmt);
        return true;
    }

    //check admin exists
    public function admin_exist($username){

        $sql = "SELECT username FROM ken_web.admin WHERE username = :username";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['username'=>$username]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    // Current Admin in session
    public function currentAdmin($username){
    
        $sql = "SELECT * FROM ken_web.admin WHERE username = :username AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['username'=>$username]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

       // Update Profile data
       public function update_profile($admin_id, $username, $gender ,$newimage){

        $sql = "UPDATE ken_web.admin SET username = :username, gender = :gender, photo = :newimage WHERE id = :id AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id' => $admin_id, 'username'=>$username, 'gender'=>$gender, 'newimage'=>$newimage]);

        return true;
    }


    // Change Admin Profile Password
    public function change_password($id, $pass){
        $sql = "UPDATE ken_web.admin SET password = :pass WHERE id = :id AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id' => $id, 'pass'=>$pass]);

        return true;
    }

    // check login admin exists
    public function checkAdminLogin($username){

        $sql = "SELECT username, password FROM ken_web.admin WHERE username = :username AND deleted !=0";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['username'=>$username]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

 
}
?>
<?php 

class Database{
    // const USERNAME = 'benjaminochieng99@gmail.com';
    // const PASSWORD = 'Sh@2@m#1397';

    private $dsn = "mysql:host=localhost; db_name=ken_web;";
    private $dbuser="root";
    private $dbpass="";

    public $conn;

  
    
    public function __construct()
    {
        try{
            
            $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            // echo "connected successfully to the db";
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }

        return $this->conn;
    }

    //Check Input
    public function test_input($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Error-success message alert
    public function showMessage($type, $message){

        return '<div class="alert alert-'.$type.' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="text-center">'.$message.'</strong>
                 </div>';
    }

    public function timeInAgo($timestamp){
        date_default_timezone_set('Africa/Nairobi');

        $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;

        $time = time() - $timestamp;

        switch($time){
            // Seconds
            case $time <= 60:
                return 'Just Now!';

            // Minutes
            case $time >= 60 && $time < 3600:
                return (round($time/60) == 1)? 'A minute ago' : round($time/60).' minutes ago';

            // Hours
            case $time >= 3600 && $time < 86400:
                return (round($time/3600) == 1)? 'An hour ago' : round($time/3600).' hours ago';

             // Days
            case $time >= 86400 && $time < 604800:
                return (round($time/86400) == 1)? 'A day ago' : round($time/86400).' days ago';

                 // Weeks
            case $time >= 604800 && $time < 2600640:
                return (round($time/604800) == 1)? 'A week ago' : round($time/604800).' weeks ago';

                // Months
            case $time >= 2600640 && $time < 31207680:
                return (round($time/2600640) == 1)? 'A month ago' : round($time/2600640).' months ago';

                 // Years
            case $time >= 31207680:
                return (round($time/31207680) == 1)? 'A year ago' : round($time/31207680).' years ago';
        }
    }
}

// $ob = new Database();
?>

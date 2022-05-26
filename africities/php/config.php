<?php 

class Database{
    // const USERNAME = 'benjaminochieng99@gmail.com';
    // const PASSWORD = 'Sh@2@m#1397';

    private $dsn = "mysql:host=localhost; db_name=africities_registration;";
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

}

// $ob = new Database();
?>

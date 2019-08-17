<?php
class Database{
 
    private $host = "localhost";
    private $db_name = "api";
    private $username = "root";
    private $password = "Admin@123";
    public $conn;
 
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exce){
            echo "Connection error: " . $exce->getMessage();
        }
 
        return $this->conn;
    }
}
?>

<?php

/**
 * class user
 */
class User
{

    private $conn;
    private $table_name = "user";

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $modified;
    public $created;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    //read all data
    function read()
    {

        // select all query
        $query = "SELECT * 
            FROM " . $this->table_name . " p
            ORDER BY p.modified DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // create user
    function create()
    {
        // query to insert record
        $query = "INSERT INTO `".$this->table_name."` (`firstname`,`lastname`,`email`,`password`, `created`,`modified`)
        VALUES('".$this->firstname."','".$this->lastname."','".$this->email."','".$this->password."','".$this->created."','".$this->modified."');";
        // prepare query
        $stmt = $this->conn->prepare($query);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    // used to readby given data
    function readBy($ref){
 
        // query to read single record
        $query = "SELECT  *
            FROM " . $this->table_name." t
            WHERE t.".$ref."='".$this->$ref."'";
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        
        // execute query
        $stmt->execute();
 
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // set values to object properties
        $this->id=$row['id'];
        $this->firstname= $row['firstname'];
        $this->lastname= $row['lastname'];
        $this->email= $row['email'];
        $this->password= $row['password'];
        $this->created= $row['created'];
        $this->modified= $row['modified'];
    }
    // update the user
    function update(){
    
        // update query
        $query = "UPDATE `".$this->table_name."`
                SET
                    firstname = '".$this->firstname."',
                    lastname = '".$this->lastname."',
                    email = '".$this->email."',
                    password = '".$this->password."',
                    created = '".$this->created."',
                    modified = '".$this->modified."'
                WHERE
                    id = ".$this->id.";";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id ='".$this->id."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }
}

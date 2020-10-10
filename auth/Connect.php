<?php


class DataBase{
Protected $servername = "localhost";
Protected $username= "root";
Protected $password="";
Protected $dbname= "crud";
protected $conn;


    public function __construct()
    {

        $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        if (!$this->conn) {
            die("Connection failed: " . $this->conn->connect_error);
        }else{

            echo "Connected successfully";
        }
    }

}





?>
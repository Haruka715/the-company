<?php
class Database{
    private $server_name = "localhost";
    private $username = "root";
    private $password = "root"; //mamp password = root
    private $db_name = "The_company";
    protected $conn;

    public function __construct(){
        $this -> conn = new mysqli($this->server_name,$this->username,$this -> password,$this -> db_name);
        //$this -> conn holds the connection to our database

        if($this->conn->connect_error){
            die("Unable to connect to the detabase: ".$this -> connect_error);
        }
    }
}
?>
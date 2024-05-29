<?php

class Database
{
    public $dbhost;
    public $dbname;
    public $username;
    public $password;
    public $conn;

    public function __construct($dbhost = "localhost", $dbname = "restaurant", $username = "root", $password = "")
    {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->dbhost; dbname=$this->dbname", $this->username, $this->password);
            return $this->conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


// $db = new Database();
// print_r($db->connect());

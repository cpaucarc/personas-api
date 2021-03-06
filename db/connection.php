<?php

//namespace App\Database;

class MySqlConnection
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;

    public function __construct()
    {
        $this->host = "localhost";
        $this->db = "personas";
        $this->user = "root";
        $this->password = "";
        $this->port = "3306";
    }

    public function getConnection()
    {
        try {

            $conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "success";
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }
}

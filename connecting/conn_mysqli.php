<?php
class Database{
    private $host = 'localhost';
    private $username='root';
    private $password='';
    private $db='apisanpham';
    private $conn;

    public function connect(){
        $this->conn = null;       
        $this->conn = new mysqli( $this->host, $this->username, $this->password, $this->db);
        if (mysqli_connect_errno()){
            return "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // Change character set to utf8
        mysqli_set_charset($this->conn,"utf8");
        return $this->conn;
    }
    public function close(){
        return mysqli_close($this->conn);
    }
}
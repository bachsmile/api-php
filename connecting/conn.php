<?php
class Database{
    private $host = 'localhost';
    private $username='root';
    private $password='';
    private $db='apisanpham';
    private $conn;

    public function connect(){
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charsets=UTF-8 ',$this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connecting error'. $e->getMessage();
        }
        return $this->conn;
    }
}
// $db= new Database();
// $db->connect();

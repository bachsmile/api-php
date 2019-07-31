<?php
class login{
    private $conn;
    private $table = 'login';

    //col table
    public $MaID;
    public $Username;
    public $Password;
    public $Authorities;
    public $Firstname;
    public $Lastname;
    public $Email;
    public $Phone;
    public $Subcrice;
    // contructor
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //get
    public function check($user){
        //creat query
        $sql='SELECT * FROM '.$this->table.' WHERE Username= "'.$user['Username'].'" AND Password="'.$user['Password'].'"';
        $data = [
            'data'=>'',
            'count_row'=>0
        ];
        $query = $this->conn->query($sql);
        $data['data'] = mysqli_fetch_all($query);

        $data['count_row']=count($data['data']);
        return $data;
    }
    public function create($item){
         //creat query
         $sql='INSERT INTO '.$this->table .'(Username,Password,Authorities,Firstname,Lastname,Email,Phone,Subcrice) VALUES("'.$item['Username'].'","'.$item['Password'].'","user","'.$item['Firstname'].'","'.$item['Lastname'].'","'.$item['Email'].'","'.$item['Phone'].'","'.$item['Subcrice'].'")' ;	
         $stml=$this->conn->prepare($sql);
         $stml->execute();
         return $stml;
    }
    public function read(){
        //creat query
        $sql='SELECT * FROM '.$this->table .' ORDER BY MaID ASC';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
    public function user($id){
        //creat query
        $sql='SELECT * FROM '.$this->table.' WHERE Username= "'.$id.'"';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
    public function delete($id){
        //creat query
        $sql='DELETE FROM '.$this->table.' WHERE MaID= "'.$id.'"';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
    public function update($data){
        //creat query
        $sql='UPDATE '.$this->table.' SET Firstname = "'.$data['Firstname'].'" , Lastname = "'.$data['Lastname'].'" , Phone = "'.$data['Phone'].'" , Email = "'.$data['Email'].'" , Subcrice = "'.$data['Subcrice'].'" , Password = "'.$data['Password'].'" , Authorities = "'.$data['Authorities'].'"  WHERE MaID = '.$data['MaID'].' ';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
}
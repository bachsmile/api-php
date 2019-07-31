<?php
class sanpham{
    private $conn;
    private $table = 'sanpham';

    //col table
    public $id_sp;
    public $name;
    public $img;
    public $img2;
    public $price;
    public $title;

    // contructor
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //get
    public function read(){
        //creat query
        $sql='SELECT * FROM '.$this->table .' ORDER BY id_sp ASC';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
    public function create($item){
         //creat query
         $sql='INSERT INTO '.$this->table .'(name,img,img2,price,title) VALUES("'.$item['name'].'","'.$item['img'].'","'.$item['img2'].'","'.$item['price'].'","'.$item['title'].'")' ;
         $stml=$this->conn->prepare($sql);
         $stml->execute();
         return $stml;
    }
    public function delete($id){
        //creat query
        $sql='DELETE FROM '.$this->table.' WHERE id_sp= "'.$id.'"';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
    public function update($data){
        //creat query
        $sql='UPDATE '.$this->table.' SET name = "'.$data['name'].'" , img = "'.$data['img'].'" , img2 = "'.$data['img2'].'"  , price = "'.$data['price'].'" , title = "'.$data['title'].'"  WHERE 	id_sp = '.$data['id_sp'].' ';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
}
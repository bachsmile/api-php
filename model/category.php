<?php
class category{
    private $conn;
    private $table = 'danhmuc';

    //col table
    public $idDM;
    public $DanhMuc;
    public $parent_id;

    // contructor
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //get
    public function read(){
        //creat query
        $sql='SELECT * FROM '.$this->table .' ORDER BY idDM ASC';
        $stml=$this->conn->prepare($sql);
        $stml->execute();
        return $stml;
    }
    public function create($item){
         //creat query
         $sql='INSERT INTO '.$this->table .'(DanhMuc,parent_id) VALUES("'.$item['DanhMuc'].'","'.$item['parent_id'].'")' ;
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
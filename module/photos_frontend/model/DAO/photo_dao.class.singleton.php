<?php
class photoDAO {
    static $_instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function list_photo_DAO($db) {
       
            $sql = "SELECT * FROM fotografia limit 10";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
            
    
    }

    public function detail_photo_DAO($db, $id) {
        
             $sql = "SELECT * FROM fotografia WHERE id=".$id;
             $stmt = $db->ejecutar($sql);
             return $db->listar($stmt);
             
     
     }
     public function list_photo_DAO_limit($db, $no) {
                
             $no = 10+$no;
                
             $sql = "SELECT * FROM fotografia limit ".$no.",5" ;
             
             $stmt = $db->ejecutar($sql);
             return $db->listar($stmt);
             
     
     }
     
}
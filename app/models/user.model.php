<?php   

class UserModel{
     
    private $db;
     function __construct() {
    include_once './config.php';
       $conex = new db(); 
        $this->db = $conex->conexion(); 
    }

    public function getByUser($user) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute([$user]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    

}
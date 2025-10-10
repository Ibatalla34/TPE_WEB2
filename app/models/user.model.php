<?php   

class UserModel{
     
    private $db;
     function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=futbol;charset=utf8', 'root', '');
    }

        public function get($id) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    public function getByUser($user) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$user]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    

}
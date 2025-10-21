<?PHP
  require_once './app/models/equipos.model.php';
class PlayerModel{
     private $db;

    function __construct() {
     $this->db = new PDO('mysql:host=localhost;dbname=futbol;charset=utf8', 'root', '');
    }

      public function get($id) {
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id = ?');
        $query->execute([$id]);
        $player = $query->fetch(PDO::FETCH_OBJ);
        return [$player];
    }

      public function getAll() {
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();
        $players = $query->fetchAll(PDO::FETCH_OBJ);
        return $players;
    }
    public function select ($equipo) {
      $query = $this->db->prepare('SELECT * FROM jugadores WHERE id_equipos = ?');
      $query->execute([$equipo]);
      $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
      return $jugadores;
    }

    public function insert($equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura){
      $query = $this->db->prepare("INSERT INTO jugadores(`id_equipos`, `nombre`, `pais`, `pierna_buena`, `posicion`, `fecha_nacimiento`, `altura`) VALUES(?,?,?,?,?,?,?)");
      $query->execute([$equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura]);
    }

    public function deletePlayer($id){
      $query = $this->db->prepare("DELETE from jugadores where id=?");
      $query-> execute([$id]);
    }

    public function editPlayer($equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura,$id){
      $query = $this->db->prepare(" UPDATE jugadores Set id_equipos = ?, nombre = ?, pais = ?, pierna_buena = ?, posicion = ?, fecha_nacimiento = ? , altura = ?  WHERE id=?" );
      $query->execute([$equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura, $id]);
    }

  }
  
  




?>
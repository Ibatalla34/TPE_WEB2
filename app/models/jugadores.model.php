<?PHP

class PlayerModel{
     private $db;

    function __construct() {
     // 1. abro conexión con la DB
     $this->db = new PDO('mysql:host=localhost;dbname=futbol;charset=utf8', 'root', '');
    }

      public function get($id) {
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id = ?');
        $query->execute([$id]);
        $player = $query->fetch(PDO::FETCH_OBJ);

        return $player;
    }

      public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();

        // 3. obtengo los resultados de la consulta
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

  }




?>
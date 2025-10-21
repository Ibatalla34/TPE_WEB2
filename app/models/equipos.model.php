<?php
require_once './app/models/jugadores.model.php';
  class EquipoModel
  {
    private $db;

    function __construct()
    {
      
      $this->db = new PDO('mysql:host=localhost;dbname=futbol;charset=utf8', 'root', '');
    }

    public function getAll()
    {

      $query = $this->db->prepare('SELECT * FROM equipos');
      $query->execute();
      $equipos = $query->fetchAll(PDO::FETCH_OBJ);
      return $equipos;
    }

    public function get ($id){
      $query = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
      $query->execute([$id]);
      $equipo = $query->fetch(PDO::FETCH_OBJ);
      return $equipo;
    }

    public function select($id)
    {
      $equipo = $this->get($id);
      $jugadores = new PlayerModel();
      $query = $jugadores->selectByTeam($id);
      return[$query,$equipo];
    }

    public function delete ($id){
      $query = $this->db->prepare("DELETE from equipos where id=?");
      $query-> execute([$id]);
    }

    public function insert ($nombre,$pais,$fecha,$ciudad){
      $query = $this->db->prepare("INSERT INTO equipos(`nombre`, `pais`, `fundacion`, `ciudad`) VALUES(?,?,?,?)");
      $query->execute([$nombre,$pais,$fecha,$ciudad]);
    }
    public function updateTeam($id,$nombre,$pais,$fecha,$ciudad){
      $query = $this->db->prepare(" UPDATE equipos Set nombre = ?, pais = ?, fundacion = ?, ciudad = ?  WHERE id=?" );
      $query->execute([$nombre,$pais,$fecha,$ciudad, $id]);
    }
  }
?>
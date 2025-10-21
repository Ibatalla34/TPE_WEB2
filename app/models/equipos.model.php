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

    public function select($id)
    {
      $equipo = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
      $equipo->execute([$id]);
      $equipo = $equipo->fetch(PDO::FETCH_OBJ);
      $jugadores = new PlayerModel();
      $query = $jugadores->select($id);
      return[$query,$equipo];
    }

  }
?>
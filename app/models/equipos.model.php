<?php
class EquipoModel{
    private $db;

    function __construct() {
     // 1. abro conexión con la DB
     $this->db = new PDO('mysql:host=localhost;dbname=futbol;charset=utf8', 'root', '');
    }

      public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);

        return $equipos;
    }
}

?>
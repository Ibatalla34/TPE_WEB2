<?php
require_once './app/models/jugadores.model.php';
require_once './app/view/jugadores.view.php';



class PlayerController{

    private $model;
    private $view;

    function __construct() {
        $this->model = new PlayerModel();
        $this->view = new PlayerView();
    }
    
     function showPlayers($request){
        $players = $this->model->getAll();
        $this->view->showPlayers($players,$request->user);
     }

     function ShowPlayerAlone($request){
        $jugador = $this->model->get($request->id);
        $this->view->ShowPlayerAlone($jugador);

     }

     function newPlayer(){
      if(!isset($_POST['nombre']) || empty($_POST['nombre'])||!isset($_POST['pais']) || empty($_POST['pais'])||!isset($_POST['altura']) || empty($_POST['altura'])){
         return $this->view->showError("falta completar");
      }
        $nombre = $_POST['nombre'];
        $equipo = $_POST['equipo'];
        $pieBueno = $_POST['pieBueno'];
        $pais = $_POST['pais'];
        $posicion = $_POST['posicion'];
        $nacimiento = $_POST['nacimiento'];
        $altura = $_POST['altura'];

        $id = $this-> model->insert($equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura);

         header('Location: ' . BASE_URL);
     }


     function eliminarjugador($id){

      $player = $this->model->get($id);
      if (!$player) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

       $this->model->deletePlayer($id); 

       header('Location: ' . BASE_URL);
     }

     function agregarJugador(){
      $this->view->agregarJugador();
     }

     function editarJugador($id){
         $player = $this->model->get($id);
         $this->view->editar($player);
     }
     function editPlayer($id){
       if(!isset($_POST['nombre']) || empty($_POST['nombre'])||!isset($_POST['pais']) || empty($_POST['pais'])||!isset($_POST['altura']) || empty($_POST['altura'])){
         return $this->view->showError("falta completar");
      }  
         
         $nombre = $_POST['nombre'];
        $equipo = $_POST['equipo'];
        $pieBueno = $_POST['pieBueno'];
        $pais = $_POST['pais'];
        $posicion = $_POST['posicion'];
        $nacimiento = $_POST['nacimiento'];
        $altura = $_POST['altura'];
        
        $this->model->editPlayer($equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura,$id);
      
         header('Location: ' . BASE_URL);
    
      }







}



?>
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

         $this->view->ShowPlayerAlone($jugador,$request->user);

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

         $this-> model->insert($equipo,$nombre,$pais,$pieBueno,$posicion,$nacimiento,$altura);

         header('Location: ' . BASE_URL);
     }


     function eliminarjugador($request){
       
      $player = $this->model->get($request->id);
      if (!$player) {
            return $this->view->showError("No existe el jugador con el id=$request->id");
        }
        $this->model->deletePlayer($request->id); 

       header('Location: ' . BASE_URL);
     }

     function agregarJugador($request){
      $equipos= $this->model->darEquipos();
      $this->view->agregarJugador($request->user,$equipos);
     }

     function editarJugador($request){
         $player = $this->model->get($request->id);
          $equipos= $this->model->darEquipos();
         $this->view->editar($player,$request->user,$equipos);
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
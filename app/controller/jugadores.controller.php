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
        $this->view->showPlayers($players);
     }

     function ShowPlayerAlone($request){
        $player = $this->model->get($request->id);
        $this->view->ShowPlayerAlone($player);

     }



}



?>
<?PHP

class PlayerView{


    public function showPlayers($players,$user){
         $count = count($players);

         require_once './templates/listar.jugadores.phtml';
    }

    public function agregarJugador($user,$equipos){
         $count= count($equipos);
          require_once './templates/form.add.player.phtml';
    }
 
    
    public function ShowPlayerAlone($jugador,$user){ 
          require_once './templates/datos.jugador.phtml';
    }

    public function editar($player,$user,$equipos){
        require_once './templates/form.edit.player.phtml';
    }

    function showError($error) {
        echo "<h1>$error</h1>";
    }


}

    



?>
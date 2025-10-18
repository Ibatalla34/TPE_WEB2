<?PHP

class PlayerView{


    public function showPlayers($players){
         $count = count($players);

         require_once './templates/listar.jugadores.phtml';
         require_once './templates/form.add.player.phtml';
    }
 
    //revisar en las clases practicas por tema de buena practica--------------------------------------------------------------------
    public function ShowPlayerAlone($jugador){
        require_once './templates/datos.jugador.phtml';
    }

    function showError($error) {
        echo "<h1>$error</h1>";
    }


}

    



?>
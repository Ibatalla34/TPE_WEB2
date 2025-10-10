<?PHP

class PlayerView{


    function showPlayers($players){
         $count = count($players);

         require_once './templates/listar.jugadores.phtml';
    }


}




?>
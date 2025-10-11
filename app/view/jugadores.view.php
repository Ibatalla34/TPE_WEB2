<?PHP

class PlayerView{


    function showPlayers($players){
         $count = count($players);

         require_once './templates/listar.jugadores.phtml';
    }
 
    //revisar en las clases practicas por tema de buena practica--------------------------------------------------------------------
    function ShowPlayerAlone($player){
        ?>
        <h1><?=$player->nombre?></h1>

        <p>equipo: <?=$player->id_equipos?></p>
        <p>pais: <?=$player->pais ?></p>
        <p>pierna buena: <?=$player->pierna_buena?></p>
        <p>posicion <?=$player->posicion?></p>
        <p>fecha de nacimiento: <?=$player->fecha_nacimiento?></p>
        <p>altura: <?=$player->altura?></p>
        <?php
    }


}




?>
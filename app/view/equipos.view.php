<?php

class EquipoView{

    public function showAll($equipos,$user){
        require 'templates/layout/header.phtml';
        echo "<h1>Equipos</h1>";
        echo "<ul>";
        foreach($equipos as $equipo){
            echo "<li><a href='equipo/$equipo->id'>$equipo->nombre</a></li>";
        }
        echo "</ul>";
        require 'templates/layout/footer.phtml';
    }

    public function show($jugadores){
        require 'templates/layout/header.phtml';
        echo "<h1>Jugadores de ".$jugadores[1]->nombre."</h1>";
        echo "<ul>";
        foreach($jugadores[0] as $jugador){
            echo "<li><a href='jugador/$jugador->id'>$jugador->nombre</a></li>";
        }
        echo "</ul>";
        require 'templates/layout/footer.phtml';
    }

}
?>
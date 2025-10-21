<?php

class EquipoView{

    public function showAll($equipos,$user){
      require 'templates/datos.equipo.phtml';
    }

    public function show($jugadores,$user){
     require 'templates/lista.jugadores.phtml';
    }

}
?>
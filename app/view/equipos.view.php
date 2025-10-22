<?php

class EquipoView
{

    public function showAll($equipos, $user)
    {
        require 'templates/datos.equipo.phtml';
    }

    public function show($jugadores, $user)
    {
        require 'templates/lista.jugadores.phtml';
    }
    public function showError($error)
    {
        echo "<h1>$error</h1>";
    }

    public function editTeam($equipo, $user)
    {
        require_once './templates/form.edit.team.phtml';
    }

    public function addTeam($user)
    {
        require_once './templates/form.add.team.phtml';
    }
}

<?php
require_once './app/models/equipos.model.php';
require_once './app/view/equipos.view.php';

class EquipoController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new EquipoModel();
        $this->view = new EquipoView();
    }

    function showAll($request)
    {
        $equipos = $this->model->getAll();
        $this->view->showAll($equipos,$request->user);
    }


    function show($request)
    {
        
        $jugadores = $this->model->select($request->id);
        $this->view->show($jugadores,$request->user);
    }
}

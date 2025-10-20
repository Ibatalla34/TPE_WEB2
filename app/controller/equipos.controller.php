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

    function showAll()
    {
        $equipos = $this->model->getAll();
        $this->view->showAll($equipos);
    }


    function show($request)
    {
        $equipo = $this->model->select($request->id);
        $this->view->show($equipo);
    }
}

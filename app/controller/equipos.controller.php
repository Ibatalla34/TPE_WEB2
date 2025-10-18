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

    function showEquipos()
    {
        $equipos = $this->model->getAll();
        $this->view->showEquipos($equipos);
    }
}

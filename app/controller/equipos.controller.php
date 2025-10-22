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
        $this->view->showAll($equipos, $request->user);
    }


    function show($request)
    {

        $jugadores = $this->model->select($request->id);
        $this->view->show($jugadores, $request->user);
    }

    function delete($id)
    {
        try {
            $this->model->delete($id);
            header('Location: ' . BASE_URL);
        } catch (Exception $e) {
            $this->view->showError("Error al eliminar el equipo");
        }
    }
    function addTeam($request)
    {
        $this->view->addTeam($request->user);
    }
    function editTeam($id, $request)
    {
        $equipo = $this->model->get($id);
        $this->view->editTeam($equipo, $request->user);
    }

    function insert()
    {
        if (!isset($_POST['nombre']) || empty($_POST['nombre']) || !isset($_POST['pais']) || empty($_POST['pais']) || !isset($_POST['ciudad']) || empty($_POST['ciudad'])) {
            return $this->view->showError("falta completar");
        }

        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $fecha = $_POST['fundacion'];
        $ciudad = $_POST['ciudad'];
        $id = $this->model->insert($nombre,$pais,$fecha,$ciudad);
        header('Location: ' . BASE_URL);
    }

    function updateTeam($id)
    {

        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $fecha = $_POST['fundacion'];
        $ciudad = $_POST['ciudad'];
        $this->model->updateTeam($id, $nombre, $pais, $fecha, $ciudad);
        header('Location: ' . BASE_URL);
    }
}

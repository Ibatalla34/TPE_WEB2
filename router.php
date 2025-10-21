<?php
require_once './app/controller/jugadores.controller.php';
require_once './app/controller/auth.controller.php';
require_once './app/controller/equipos.controller.php';
require_once './app/middlewere/session.middlewere.php';
require_once './app/middlewere/guard.middlewere.php';



/** TABLA DE RUTEO
 * parte de A
 * 
 * listar jugadores           ->     jugadoresController->showPlayers()
 * nuevo jugador            ->     jugadoresController->addPlayer();
 * eliminarjugador/:ID     ->     jugadoresController->removePlayer($id)
 * editar jugador/:ID    ->     jugadoresController->editPlayer($id)
 * login            ->     AuthController->showLogin()
 * 
 */

session_start();

// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// accion por defecto si no se envia ninguna
$action = 'listaJugador';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

$request = new StdClass();
$request = (new SessionMiddleware())->run($request);

switch ($params[0]) {
    case 'listaJugador':
        $controller = new PlayerController();
        $controller->showPlayers($request);
        break;
    case 'jugador':
        $controller = new PlayerController();
        $request->id = $params[1];
        $controller->ShowPlayerAlone($request);
        break;
    case 'equipos':
        $controller = new EquipoController();
        $controller->showAll($request);
        break;
    case 'equipo':
        $controller = new EquipoController();
        $request->id = $params[1];
        $controller->show($request);
        break;
    case 'agregar':
        $request = (new GuardMiddleware())->run($request);
        $controller = new PlayerController();
        $controller->agregarJugador($request);
        break;
    case 'nuevo':
        $controller = new PlayerController();
        $controller->newPlayer();
        break;
    case 'eliminar':
        $request = (new GuardMiddleware())->run($request);
        $controller = new PlayerController();
        $request->id = $params[1];
        $controller->eliminarJugador($request);
        break;
    case 'cambiar':
        $request = (new GuardMiddleware())->run($request);
        $controller = new PlayerController();
        $request->id = $params[1];
        $controller->editarJugador($request);
        break;
    case 'editar':
        $controller = new PlayerController();
        $id = $params[1];
        $controller->editPlayer($id);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'addTeam':
        $request = (new GuardMiddleware())->run($request);
        $controller = new EquipoController();
        $controller->addTeam($request);
        break;
    case 'insertTeam':
        $controller = new EquipoController();
        $controller->insert();
        break;
    case 'editTeam':
        $controller = new EquipoController();
        $id = $params[1];
        $controller->editTeam($id, $request);
        break;
    case 'updateTeam':
        $controller = new EquipoController();
        $id = $params[1];
        $controller->updateTeam($id);
        break;
    case 'deleteTeam':
        $request = (new GuardMiddleware())->run($request);
        $controller = new EquipoController();
        $request->id = $params[1];
        $controller->delete($request->id);
        break;
    default:
        echo "404 Page Not Found";
        break;
}

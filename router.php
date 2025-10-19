<?php
require_once './app/controller/jugadores.controller.php';
require_once './app/controller/auth.controller.php';
require_once './app/controller/equipos.controller.php';
require_once './app/middlewere/session.middlewere.php';



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
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// accion por defecto si no se envia ninguna
$action = 'listaJugador'; 
if (!empty( $_GET['action'])) {
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
        $controller->showAll();
        break;
    case 'equipo':
        $controller = new EquipoController();
        $request->id = $params[1];    
        $controller->show($request);
        break;
     case 'nuevo':
        $controller = new PlayerController();
     //   $controller-> newPlayer(); 
    case 'eliminar':
        $controller = new PlayerController();
       // $controller-> deletePlayer(); 
    case 'editar':
        $controller = new PlayerController();
        //$controller->editPlayer(); 
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;

    default: 
        echo "404 Page Not Found";
        break;
}
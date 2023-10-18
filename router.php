<?php
    require_once('controllers/TaskController.php');
    require_once('controllers/LoginController.php');

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("VER", BASE_URL . 'ver');

    if ($_GET['action'] == '')
        $_GET['action'] = 'ver';
        $_GET['action'] = 'login';

    $partesURL = explode('/', $_GET['action']);
    
    switch ($partesURL[0]) {
        case 'login':
            $controller = new LoginController();
            $controller->verifyUser();
            break;
        case 'logout':
            $controller = new LoginController();
            $controller->logout();
            break;
        case 'tarea':
            $controller = new TaskController();
            $controller->showTask($partesURL[1]);
    }
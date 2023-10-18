<?php
include_once('views/LoginView.php');

class LoginController {

    private $view;

    public function __construct() {
        $this->view = new LoginView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }
}

$user = $this->model->getByUsername($email);

        var_dump($email);
        if (!empty($email) && password_verify($password, $email->password)) {
            $this->view->showLogin("Login correcto");
        } else {
            $this->view->showLogin("Login incorrecto");
        }
       



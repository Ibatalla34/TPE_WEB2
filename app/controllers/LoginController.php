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


$user = $this->model->getByUsername($email);

        var_dump($user);
        if (!empty($user) && password_verify($password, $user->password)) {
            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['USERNAME'] = $user->email;

            header('Location: ver');
        } else {
            $this->view->showLogin("Login incorrecto");
        }
       
    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . LOGIN);
    }
}
    
    


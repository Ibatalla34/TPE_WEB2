<?php
require_once './app/models/user.model.php';
require_once './app/view/auth.view.php';

class AuthController {
    private $userModel;
    private $view;

    function __construct() {
        $this->userModel = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin($request) {
        $this->view->showLogin("", $request->user);
    }
}
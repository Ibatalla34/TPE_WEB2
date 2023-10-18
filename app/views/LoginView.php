<?php

class LoginView {

    public function showLogin($error = null) {
        $this->assign('titulo', 'Iniciar Sesión');
        $this->assign('error', $error);
        $this->display('templates/login.phtml');

    }

}

<?php 
class AuthView {

    public function showLogin($error, $user) {
        require_once './templates/form_login.phtml';
    }

 
}
<?php
class loginController extends controller {
    public function index () {
        $usuario = new Usuarios();
        $email = '';
        $senha = '';
        $dados = array(
            "login" => $usuario->auth( $email, $senha),
        );
        $this->loadTemplate('login', $dados);
    }
}
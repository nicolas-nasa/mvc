<?php
class cadastroController extends controller {
    public function index () {
        $usuario = new Usuarios();
            $nome ='';
            $email ='';
            $senha ='';
        $dados = array(
            "cadastrar" => $usuario->setUser($nome,$email,$senha),
        );
        $this->loadTemplate('cadastro', $dados);
    }
}
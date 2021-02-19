<?php
class perfilController extends controller {
    public function index () {
        $perfil = new Usuarios();
        $nome ='';
        $email ='';
        $senha ='';
        
        $dados = array(
            'usuario' => $perfil->getUser($_SESSION['id']),
            'editar' => $perfil->editUser($nome,$email,$senha,$_SESSION['id'])
        );
        $this->loadTemplate('perfil', $dados);
    }
}
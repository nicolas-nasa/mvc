<?php
class homeController extends controller {
    public function index() {
        $anuncios =  new Anuncios();
        
        $dados = array(
            'quantidade' => $anuncios->getQuantidade(),
        );



        $this->loadTemplate('home', $dados);
    }
}
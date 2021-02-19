<?php
class adicionarController extends controller {
    public function index(){
        $livros = new Livros();
            $nome = '';
            $total = '';
        
        $dados = array(
            'adicionar' => $livros->setLivro($nome,$total),
        );
        $this->loadTemplate('adicionar', $dados);
       
    }
}
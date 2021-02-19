<?php
class homeController extends controller {
    public function index() {
        $usuario = new Usuarios();
        $livro =  new Livros();
        
        $dados = array(
            'quantidade' => $livro->getQuantidade(),
            'usuario' => $usuario->getUser(),
        );
        $this->loadTemplate('home', $dados);
    }

    public function livro($id){
        $usuario = new Usuarios();
        $livro =  new Livros();
        $emprestimo = new Emprestimos();
        $dados = array(
            'id' => $livro->getLivro($id),
            'reservei' => $emprestimo->userEmprestimos($id),
            'usuario' => $usuario->getUser($_SESSION['id']),
        );

        $this->loadTemplate('livro', $dados);
    }

    public function confirmado($id){
        $livro =  new Livros();
        $registro = new Emprestimos();
        $dados = array(
            'emprestado' => $livro->emprestimo($id), 
            'registo'=> $registro->emprestimo($_SESSION['id'],$id,1),
        );
    }

    public function devolver($id){
        $livro =  new Livros();
        $registro = new Emprestimos();
        $dados = array(
            'emprestado' => $livro->devolucao($id), 
            'registo'=> $registro->emprestimo($_SESSION['id'],$id,-1),
        );       
    }

    public function editar($id){
        $livros = new Livros();

        $nome = '';
        $total = '';
        $disponiveis = '';
        $emprestados = '';

        $dados = array(
            'adicionar' => $livros->updateLivro($nome,$total,$disponiveis,$emprestados,$id),
            'id' => $livros->getLivro($id),
        );
        $this->loadTemplate('editar', $dados);
        
       
    }

    public function historico($id){
        $emprestimos = new Emprestimos();
        $usuario = new Usuarios();
        $livro = new Livros();
        $dados = array(
            'id' => $livro->getLivro($id),
            'historico'=> $emprestimos->getHistoricoLivro($id),
            'usuario'=> $usuario->getAllUsers(),
        );
        $this->loadTemplate('historico', $dados);
        
       
    }
}
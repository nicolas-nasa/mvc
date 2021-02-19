<?php 

class Livros extends model {

    public function getQuantidade() {
      $sql = "SELECT * FROM livros";
      $sql = $this->db->query($sql);
      $sql = $sql->fetchAll();
      return $sql;
    }

    public function emprestimo($id){
        $info = $this->getLivro($id);
        $sql = "UPDATE livros SET emprestados_livros=:emprestados_livros,disponiveis_livros=:disponiveis_livros WHERE id_livro=:id";
        $sql = $this->db->prepare($sql);
        $emp = $info ['emprestados_livros'];
        $dip = $info ['disponiveis_livros'];
        $emp += 1;
        $dip -= 1;
        $sql->bindValue(':emprestados_livros', $emp);
        $sql->bindValue(':disponiveis_livros', $dip); 
        $sql->bindValue(':id',$id);
        $sql->execute();
        
    }

    public function devolucao($id){
        $info = $this->getLivro($id);
        $sql = "UPDATE livros SET emprestados_livros=:emprestados_livros,disponiveis_livros=:disponiveis_livros WHERE id_livro=:id";
        $sql = $this->db->prepare($sql);
        $emp = $info ['emprestados_livros'];
        $dip = $info ['disponiveis_livros'];
        $emp -= 1;
        $dip += 1;
        $sql->bindValue(':emprestados_livros', $emp);
        $sql->bindValue(':disponiveis_livros', $dip); 
        $sql->bindValue(':id',$id);
        $sql->execute();
        header("location:".BASE_URL);
    }

    public function setLivro ($nome,$total){

        if( isset($_POST['nome_a_livro']) && !empty($_POST['nome_a_livro'])){
          
            $nome = addslashes($_POST['nome_a_livro']);
            $total = addslashes($_POST['quantidade_a_livro']);
            if($nome == null || $total == null){
                return $sql = 'por gentileza preencha todos os campos.';
            }else{
            $sql = "INSERT INTO livros (nome_livro,total_livro,disponiveis_livros,emprestados_livros) VALUES (:nome,$total,$total,0)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome',$nome);
            $sql->execute();
            header("location:".BASE_URL);
            }
        }
    }
    public function updateLivro($nome,$total,$disponiveis,$emprestados,$id){
        if( isset($_POST['nome_e_livro']) && !empty($_POST['nome_e_livro'])){
            $nome = addslashes($_POST['nome_e_livro']);
            $total = addslashes($_POST['quantidade_e_livro']);
            $disponiveis = addslashes($_POST['disponiveis_e_livro']);
            $emprestados = addslashes($_POST['emprestados_e_livro']);
    
            if($nome == null || $total == null || $disponiveis == null || $emprestados == null ){
                return $sql = 'por gentileza preencha todos os campos.';
            }
            else {
                $sql = "UPDATE livros SET nome_livro=:nome, total_livro=:total , disponiveis_livros=:disponiveis ,emprestados_livros=:emprestados WHERE id_livro = $id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome',$nome);
                $sql->bindValue(':total',$total);
                $sql->bindValue(':disponiveis',$disponiveis);
                $sql->bindValue(':emprestados',$emprestados);
                $sql->execute();
                header("location:".BASE_URL."/home/livro/".$id);
            }
        }
    }

    public function getLivro ($id){
        $sql = "SELECT * FROM livros WHERE id_livro = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id',$id);
        $sql->execute();
        $info = $sql->fetch();
        return $info;
    }

    public function deleteLivro($id){
        $sql = "DELETE FROM livros WHERE id_livro = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id',$id);
        $sql->execute();
        return $sql = "livro removido.";
    }

}
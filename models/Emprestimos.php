<?php 

class Emprestimos extends model {
    public function listarEmprestimos() {
        $sql = "SELECT * FROM emprestimos";
        $sql = $this->db->query($sql);
  
        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql;
        } else {
            return 0;
        }
      }

    public function emprestimo ($id_usuario, $id_livro ,$status){
          $sql = "INSERT INTO emprestimos ( id_usuario, id_livro, data_emprestimo, status) VALUES (:id_usuario, :id_livro, NOW(), :status )";
          $sql = $this->db->prepare($sql);
          $sql->bindValue(':id_usuario',$id_usuario);
          $sql->bindValue(':id_livro',$id_livro);
          $sql->bindValue(':status',$status); // 1 (devolvido) ou -1 (emprestado) para sempre que for devolvido o saldo ser 0.
          $sql->execute();
          header("location:".BASE_URL);       
      }

      public function getHistoricoLivro ($id){
        $sql = "SELECT * FROM emprestimos WHERE id_livro = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id',$id);
        $sql->execute();
        $info = $sql->fetchAll();
        return $info;
    }
    
    public function userEmprestimos($id_livro) {
          $id = $_SESSION['id'];
          $sql = "SELECT sum(status) FROM emprestimos WHERE id_livro = :id_livro AND id_usuario = $id";
          $sql = $this->db->prepare($sql);
          $sql->bindValue(':id_livro',$id_livro);
          $sql->execute();
          if($sql->rowCount() > 0){
            $info = $sql-> fetch();
            if($info == 0){
                return false;
            }else {
                return $info;
            }
          }else {
              return false;
          }
      }

}
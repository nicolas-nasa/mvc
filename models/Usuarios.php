<?php 

class Usuarios extends model {

    public function getAllUsers() {
        
      $sql = "SELECT * FROM usuarios";
      $sql = $this->db->query($sql);

      if($sql->rowCount() > 0) {
          $sql = $sql->fetchAll();
          return $sql;
      } else {
          return 0;
      }
    }

    public function getUser() {
        $id = '';
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        }else{
            $id = 0;
        }
        $sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
        $sql = $this->db->query($sql);
  
        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql;
        } else {
            return 0;
        }
    }


    public function setUser($nome, $email , $senha){

    if( isset($_POST['nome_cadastro']) && !empty($_POST['nome_cadastro'])){
        $nome = addslashes($_POST['nome_cadastro']);
        $email = addslashes($_POST['email_cadastro']);
        $senha = addslashes($_POST['senha_cadastro']);

        if($nome == null || $email == null || $senha == null){
            return $sql = 'por gentileza preencha todos os campos.';
        }
        if($this->existeUsuario($email)){
            return $sql = 'Email em uso.';
        } else {
            
            $sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario) VALUES (:nome, :email, :senha)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();
            return $sql = 'usuário cadastrado';
        }
    }

    
    }
    public function auth($email, $senha){

            if( isset($_POST['email_login']) && !empty($_POST['email_login'])){

                $email = $_POST['email_login'];
                $senha = $_POST['senha_login'];
                $sql = "SELECT * FROM usuarios WHERE email_usuario=:email AND senha_usuario=:senha";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':email',$email);
                $sql->bindValue(':senha',$senha);
                $sql->execute();
                if($sql->rowCount() > 0){
                    
                    $info = $sql->fetch();
                    $_SESSION['id'] = $info['id_usuario']; 
                    return $info;
                }else {
                    return "veifique usuário e senha.";
                }
            }  

    }

    public function editUser($nome,$email, $senha, $id){

        if( isset($_POST['nome_perfil']) && !empty($_POST['nome_perfil'])){
            $nome = addslashes($_POST['nome_perfil']);
            $email = addslashes($_POST['email_perfil']);
            $senha = addslashes($_POST['senha_perfil']);
    
            if($nome == null || $email == null || $senha == null){
                return $sql = 'por gentileza preencha todos os campos.';
            }
            else {
                
                $sql = "UPDATE usuarios SET nome_usuario =:nome, email_usuario =:email, senha_usuario =:senha WHERE id_usuario=$id" ;
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome',$nome);
                $sql->bindValue(':email',$email);
                $sql->bindValue(':senha',$senha);
                $sql->execute();
                header("location:".BASE_URL);
            }
        }
        

    }

    // auxiliar function
    private function existeUsuario($email){
        $sql = "SELECT * FROM usuarios WHERE email_usuario =:email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }
}
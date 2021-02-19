<?php 
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    if($usuario['permissions'] == 1){
        echo "
        <div class = "."title".">
        <h2>livros disponiveis</h2>
        <a class = "."buttonPageG"." href=".BASE_URL."adicionar/"." >Registrar</a>
        
        <hr/>
        </div>
        <div class = "."livros".">
        ";
        foreach($quantidade as $livros){
                echo "<div class = "."livro".">".$livros['nome_livro']."
                    <a class = "."buttonPageG"." href=".BASE_URL."home/livro/".$livros['id_livro']." >Gerenciar</a>
                    <a>total: ".$livros['total_livro']."</a>
                    <a>disponiveis: ".$livros['disponiveis_livros']."</a>
                    <a>reservados: ".$livros['emprestados_livros']."</a>
                    </div>
                "; 
        }
        echo "</div>";
    } else{
        echo "
            <div class = "."title".">
            <h2>livros disponiveis</h2>
            </div>
            <div class = "."livros".">";
        foreach($quantidade as $livros){
                echo "<div class = "."livro".">".$livros['nome_livro']." 
                    <a class = "."buttonPage"." href=".BASE_URL."home/livro/".$livros['id_livro']." >ver</a> 
                
                </div>
                "; 
        }
        echo "</div>";
    }
}else{
 header("location:".BASE_URL."login");
}
?>

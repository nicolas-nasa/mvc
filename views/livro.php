<div class = "livroPage">
<div><strong>Livro: </strong> <?php echo $id['nome_livro'] ?></div> <br>

<?php
if($usuario['permissions'] == 1){
    echo
    "
    
    </a> <a class = "."buttonPageG"." href=".BASE_URL."home/editar/".$id['id_livro'].">editar</a>
    </a> <a class = "."buttonPageG"." href=".BASE_URL."home/historico/".$id['id_livro'].">historico</a>
    </a> <a class = "."buttonPageG"." href=".BASE_URL.">Voltar</a>
    ";

}else{

    if($reservei['sum(status)'] > 0){
        echo "<a class = "."buttonPageG"." href=".BASE_URL."home/devolver/".$id['id_livro'].">devolver
        </a> <a class = "."buttonPageG"." href=".BASE_URL.">Voltar</a>";
    }else{
        if($id['disponiveis_livros'] > 0){
            echo "<a class = "."buttonPageG"." href=".BASE_URL."home/confirmado/".$id['id_livro'].">reservar
            </a> <a class = "."buttonPageG"." href=".BASE_URL.">Voltar</a>";
        }else{
            echo "<span>indisponível
            </span> <a class = "."buttonPageG"." href=".BASE_URL.">Voltar</a>";
        }
    }
}

?>
</div>
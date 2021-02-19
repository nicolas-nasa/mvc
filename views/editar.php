<div class="form">
    <form method="POST">

        nome:<br/>
        <input type="text" name="nome_e_livro" value="<?php echo $id['nome_livro'] ?>"/><br/><br/>
        quantidade de livros :<br/>
        <input type="number" name="quantidade_e_livro" value="<?php echo $id['total_livro'] ?>"/><br/><br/>
        disponiveis :<br/>
        <input type="number" name="disponiveis_e_livro" value="<?php echo $id['disponiveis_livros'] ?>"/><br/><br/>
        emprestados :<br/>
        <input type="number" name="emprestados_e_livro" value="<?php echo $id['emprestados_livros'] ?>"/><br/><br/>
        
        <input class="input"  type="submit" value="adicionar"/>
    </form>
</div> 


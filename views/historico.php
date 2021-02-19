<div class="titleH"><strong>Livro: </strong> <?php echo $id['nome_livro'];?></div>
<table>
<tr>
    <th>usuario</th>
    <th>data</th>
    <th>status</th>
</tr>
<?php
$idlivro = 0;
$iduser =0;
foreach($historico as $line){
    $iduser = $line['id_usuario'];

    foreach($usuario as $user){
        if(isset($user['id_usuario']) && !empty($user['id_usuario'])){
            if($user['id_usuario'] == $iduser){
                echo "<tr>";
                echo"<td>".$user['nome_usuario']."</td>";
                echo "<td>".$line['data_emprestimo']."</td>";
                echo ($line['status'] == 1 ) ? '<td>reservado</td>' : '<td>devolvido</td>';
                echo "</tr>";
            }
        }else {
                echo "<tr>";
                echo "<td>vazio</td>";
                echo "<td>vazio</td>";
                echo "<td>vazio</td>";
                echo "</tr>";
        }
    }
}
?>
</table>
<a class = "buttonPageG" href="<?php echo BASE_URL."home/livro/".$id['id_livro'];?>"> voltar </a>
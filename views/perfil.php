<div class="form">
    <form method="POST" action="">
        nome:
        <input type="text" name="nome_perfil" value="<?php print_r($usuario['nome_usuario'])?>"/><br/>
        email:
        <input type="email" name="email_perfil" value="<?php print_r($usuario['email_usuario'])?>"/><br/>
        senha:
        <input type="password" name="senha_perfil" value="<?php print_r($usuario['senha_usuario'])?>"/><br/>
        <input class="input"  type="submit" value="editar"/>

    </form>
</div>
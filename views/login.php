<div class="form">
    <form method="POST" action="">
        <div><?php echo $login?></div><br/>
        email:<br/>
        <input type="email" name="email_login" required="required" /><br/>
        senha:<br/>
        <input type="password" name="senha_login" required="required" /><br/>
        <input class="input" type="submit" value="logar" />
        <?php
            if(isset($login['id_usuario']) && !empty($login['id_usuario'])){
                session_start();
                header("location:".BASE_URL);
            }
        ?>
    </form>
</div>
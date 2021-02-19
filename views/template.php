<html>
    <head>
        <link rel="stylesheet" href=<?php echo BASE_URL."/assets/css/style.css"?>>
        <title>biblioteca</title>  
</head>
    <body>
        <header>
        <?php
            if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                echo"  
                        <a class = "."buttonHead"." href=".BASE_URL."home/".">
                            <strong> inicio </strong> 
                        </a>
                        <a class = "."buttonHead"." href=".BASE_URL."loggout/".">
                            <strong> loggout </strong>
                        </a>
                        <a class = "."buttonHead"." href=".BASE_URL."perfil/".">
                            <strong> perfil </strong>
                        </a>
            ";
            }else{
                echo"   
                        <a class = "."buttonHead"." href=".BASE_URL."home/".">
                            <strong> inicio </strong> 
                        </a>
                        <a class = "."buttonHead"." href=".BASE_URL."login/".">
                            <strong> login </strong>
                        </a>
                        <a class = "."buttonHead"." href=".BASE_URL."cadastro/".">
                            <strong> cadastro </strong>
                        </a>
            ";
            }
          ?>
        </header>
        <section>
        <?php
            $this->loadViewInTemplate($viewName, $viewData);
        ?>
        </section>
    </body>
</html>

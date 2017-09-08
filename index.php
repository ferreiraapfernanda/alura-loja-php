<?php include ("cabecalho.php"); ?>

<?php
    if( isset($_GET["login"]) && $_GET["login"] == true ){
    ?>
    <p class="alert-success">Logado com sucessso!</p>
    <?php
    }
    ?>
    <?php
    if( isset($_GET["login"]) && $_GET["login"] == false ){
    ?>
    <p class="alert-danger">Usuário ou senha inválida!</p>
    <?php
    }

    if("true" == true){
        echo "iguais com dois";
    }
    if("true" === true){
        echo "iguais com três";
    }
    ?>


    <h1>Bem vindo!</h1>

    <h2>Login</h2>
    <form action="login.php" method="post">
    <table class="table"> 
    <tr>
    <td>Email</td> 
    <td><input class="form-control" type="email" name="email"></td>
    </tr>
    <tr>
    <td>Senha</td>
    <td><input class="form-control" type="password" name="senha"></td>
    <tr>
    <td><button type="submit" clas="btn btn-primary">Login</button></td>
    </tr>
    </table>
    </form>
<?php include ("rodape.php"); ?>

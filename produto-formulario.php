<?php
        include("cabecalho.php");
        include("conecta.php");
        include("banco-categoria.php");
        include("logica-usuario.php");

        verificaUsuario();

        $produto = array(
            "nome" => "",
            "descricao" => "",
            "preco" => "",
            "categoria_id" => "1"
        );
        $usado = "";

        $categorias = listaCategorias($conexao);
?>
<html>
        <h1>Formulário de cadastro</h1>
        <form action="adiciona-produto.php" method="post">
                <table class="table">
                        <?php include("produto-formulario-base.php") ?>

                        <tr>
                                <td> <input type="submit" class="btn btn-primary" value="Cadastrar" /> </td>
                        </tr>
                        
                </table>
        </form>
</html>

<?php include("rodape.php"); ?>

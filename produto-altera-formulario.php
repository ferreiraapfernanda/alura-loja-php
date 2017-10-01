<?php
include ("cabecalho.php");
include ("conecta.php");
include ("banco-categoria.php");
include ("banco-produto.php");

$categorias = listaCategorias($conexao);

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
?>
<html>
        <h1>Alterando produto</h1>
        <form action="altera-produto.php" method="post">
                <td><input type="hidden" name="id" value="<?= $produto['id'] ?>" /></td>
                <table class="table">
                        <?php include ("produto-formulario-base.php") ?>
                        <tr>
                                
                                <td> <input type="submit" class="btn btn-primary" value="Alterar" /> </td>
                        </tr>
                        
                </table>
        </form>
</html>

<?php include ("rodape.php"); ?>

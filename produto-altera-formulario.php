<?php
require_once ("cabecalho.php");

$id = $_GET['id'];
$produtoDao = new ProdutoDao($conexao);
$categoriaDao = new CategoriaDao($conexao);

$produto = $produtoDao->buscaProduto($id);
$categorias = $categoriaDao->listaCategorias();
?>
<html>
        <h1>Alterando produto</h1>
        <form action="altera-produto.php" method="post">
                <td><input type="hidden" name="id" value="<?= $produto->getId() ?>" /></td>
                <table class="table">
                        <?php include ("produto-formulario-base.php") ?>
                        <tr>
                                
                                <td> <input type="submit" class="btn btn-primary" value="Alterar" /> </td>
                        </tr>
                        
                </table>
        </form>
</html>

<?php include ("rodape.php"); ?>

<?php
require_once ("cabecalho.php");
require_once ("banco-produto.php");
require_once ("class/Produto.php");
require_once ("class/Categoria.php");

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

if (array_key_exists('usado', $_POST)) {
    $usado = 0;
} else {
    $usado = 1;
}

$produto = new Produto($_POST["nome"], $_POST["preco"], $_POST["descricao"], $categoria, $usado);

$produto->setId($_POST['id']);

if (alteraProduto($conexao, $produto)) { ?>
    <p class="text-success">O produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> foi alterado.</p>
<?php
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O produto <?= $produto->getNome() ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>

<?php include ("rodape.php"); ?>

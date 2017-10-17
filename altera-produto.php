<?php 
require_once ("cabecalho.php");
require_once ("banco-produto.php");
require_once ("class/Produto.php");

$produto = new Produto();

$produto->id = $_POST['id'];
$produto->nome = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$produto->categoria_id = $_POST['categoria_id'];

if (array_key_exists('usado', $_POST)) {
    $produto->usado = "true";
}
else {
    $produto->usado = "false";
}

if (alteraProduto($conexao, $produto)) { ?>
    <p class="text-success">O produto <?= $produto->nome ?>, <?= $produto->preco ?> foi alterado.</p>
<?php 
}
else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">O produto <?= $produto->nome ?> não foi alterado: <?= $msg ?></p>
<?php

}
?>

<?php include ("rodape.php"); ?>

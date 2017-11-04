<?php require_once ("cabecalho.php"); ?>
<?php require_once ("logica-usuario.php"); ?>
<?php
verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$categoria_id = $_POST['categoria_id'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->getCategoria()->setId($categoria_id);

if (array_key_exists('usado', $_POST)) {
    $produto->setUsado(true);
}
else {
    $produto->setUsado(false);
}

$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->insereProduto($produto)) {
    ?>
    <p class="alert-success">Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!</p>
<?php

}
else {
    $mensagem = mysqli_error($conexao);
    ?>
    <p class="alert-danger">O produto <?= $produto->getNome(); ?> não foi adicionado: <?= $mensagem ?> </p>
<?php

}
include ("rodape.php"); ?>

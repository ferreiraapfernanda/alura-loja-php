<?php require_once ("cabecalho.php"); ?>
<?php require_once ("banco-produto.php"); ?>
<?php require_once ("logica-usuario.php"); ?>
<?php require_once ("class/Produto.php"); ?>
<?php
verificaUsuario();

$produto = new Produto();

$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];

$produto->categoria_id = $_POST['categoria_id'];

if (array_key_exists('usado', $_POST)) {
    $produto->usado = 0;
}
else {
    $produto->usado = 1;
}

// Cria a conexão com o banco
// Padrão: Endereço, usuário, senha, banco

// Executa a query
if (insereProduto($conexao, $produto)) {
    ?>
	<p class="alert-success">Produto <?= $produto->nome; ?>, <?= $produto->preco; ?> adicionado com sucesso!</p>
<?php

}
else {
    $mensagem = mysqli_error($conexao);
    ?>
	<p class="alert-danger">O produto <?= $produto->nome; ?> não foi adicionado: <?= $mensagem ?> </p>
<?php

}
include ("rodape.php"); ?>

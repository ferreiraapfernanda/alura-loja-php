<?php require_once ("cabecalho.php"); ?>
<?php require_once ("logica-usuario.php"); ?>
<?php
verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

if (array_key_exists('usado', $_POST)) {
    $usado = true;
}
else {
    $usado = false;
}

$produto = new Produto($_POST["nome"], $_POST["preco"], $_POST["descricao"], $categoria, $usado);

$produtoDao = new ProdutoDao($conexao);

// Cria a conexão com o banco
// Padrão: Endereço, usuário, senha, banco

// Executa a query
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

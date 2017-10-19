<?php require_once ("cabecalho.php"); ?>
<?php require_once ("banco-produto.php"); ?>
<?php require_once ("logica-usuario.php"); ?>
<?php require_once ("class/Produto.php"); ?>
<?php require_once ("class/Categoria.php"); ?>
<?php
verificaUsuario();

$produto = new Produto();
$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);

$produto->setCategoria($categoria);

if (array_key_exists('usado', $_POST)) {
    $produto->setUsado(0);
} else {
    $produto->setUsado(1);
}

// Cria a conexão com o banco
// Padrão: Endereço, usuário, senha, banco

// Executa a query
if (insereProduto($conexao, $produto)) {
    ?>
    <p class="alert-success">Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!</p>
<?php
} else {
    $mensagem = mysqli_error($conexao);
    ?>
    <p class="alert-danger">O produto <?= $produto->getNome(); ?> não foi adicionado: <?= $mensagem ?> </p>
<?php
}
include ("rodape.php"); ?>

<?php include ("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>
<?php

$nome = $_GET["nome"];
$preco = $_GET["preco"];

// Cria a conexão com o banco
// Padrão: Endereço, usuário, senha, banco
$conexao = mysqli_connect('localhost', 'root', '', 'loja');

// Executa a query
if (insereProduto($conexao, $nome, $preco)) {
	?>
	<p class="alert-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php

}
else {
	$mensagem = mysqli_error($conexao);
	?>
	<p class="alert-danger">O produto <?= $nome; ?> não foi adicionado: <?= $mensagem ?> </p>
<?php

}
include ("rodape.php"); ?>

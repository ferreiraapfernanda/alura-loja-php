<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>
<?php

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];

// Cria a conexão com o banco
// Padrão: Endereço, usuário, senha, banco

// Executa a query
if (insereProduto($conexao, $nome, $preco, $descricao)) {
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

<?php include ("cabecalho.php"); ?>
<?php

function insereProduto ($conexao, $nome, $preco){
	$query = "insert into produtos (nome, preco) values ('{$nome}', '{$preco}')";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

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
	?>
	<p class="alert-danger">O produto <?= $nome; ?> não foi adicionado</p>
<?php

}
include ("rodape.php"); ?>

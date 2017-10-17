<?php
require_once ("conecta.php");
require_once ("class/Produto.php");
require_once ("class/Categoria.php");

function listaProdutos($conexao)
{
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

    while ($produto_array = mysqli_fetch_assoc($resultado)) {
        $produto = new Produto();
        $categoria = new Categoria();
        $categoria->nome = $produto_array['categoria_nome'];

        $produto->id = $produto_array['id'];
        $produto->nome = $produto_array['nome'];
        $produto->preco = $produto_array['preco'];
        $produto->descricao = $produto_array['descricao'];
        $produto->categoria = $categoria;
        $produto->usado = $produto_array['usado'];

        array_push($produtos, $produto);
    }

    return $produtos;

}

function insereProduto($conexao, $produto)
{

    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $categoria_id = mysqli_real_escape_string($conexao, $produto->categoria->id);
    $usado = mysqli_real_escape_string($conexao, $produto->usado);

    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', '{$preco}', '{$descricao}', '{$categoria_id}', '{$usado}')";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function removeProduto($conexao, $id)
{
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id)
{
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);

    $produto = new Produto();
    $categoria = new Categoria();

    $categoria->id = $resultado['categoria_id'];

    $produto->id = $resultado['id'];
    $produto->nome = $resultado['nome'];
    $produto->preco = $resultado['preco'];
    $produto->descricao = $resultado['descricao'];
    $produto->categoria = $categoria;
    $produto->usado = $resultado['usado'];

    return $produto;
}

function alteraProduto($conexao, $produto)
{

    $id = $produto->id;
    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $categoria_id = mysqli_real_escape_string($conexao, $produto->categoria->id);
    $usado = mysqli_real_escape_string($conexao, $produto->usado);

    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}
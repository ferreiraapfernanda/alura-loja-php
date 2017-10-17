<?php
require_once ("conecta.php");

function listaProdutos($conexao)
{
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;

}

function insereProduto($conexao, $produto)
{

    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $categoria_id = mysqli_real_escape_string($conexao, $produto->categoria_id);
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
    return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, $produto)
{

    $id = $produto->id;
    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $categoria_id = mysqli_real_escape_string($conexao, $produto->categoria_id);
    $usado = mysqli_real_escape_string($conexao, $produto->usado);

    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}
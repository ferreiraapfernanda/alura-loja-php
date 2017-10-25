<?php
///// DESUSO /////
require_once ("conecta.php");

function listaProdutos($conexao)
{
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

    while ($produto_array = mysqli_fetch_assoc($resultado)) {

        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);

        $produto = new Produto($produto_array['nome'], $produto_array['preco'], $produto_array['descricao'], $categoria, $produto_array['usado']);
        $produto->setId($produto_array['id']);

        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $produto)
{

    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $preco = mysqli_real_escape_string($conexao, $produto->getPreco());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
    $categoria_id = $produto->getCategoria()->getId();
    $usado = $produto->getUsado();

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

    $categoria = new Categoria();
    $categoria->setId($resultado['categoria_id']);

    $produto = new Produto($resultado['nome'], $resultado['preco'], $resultado['descricao'], $categoria, $resultado['usado']);
    $produto->setId($resultado['id']);

    return $produto;
}

function alteraProduto($conexao, $produto)
{

    $id = $produto->id;
    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $preco = mysqli_real_escape_string($conexao, $produto->getPreco());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
    $categoria_id = $produto->getCategoria()->getId();
    $usado = $produto->getUsado();

    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

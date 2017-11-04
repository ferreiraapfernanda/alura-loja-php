<?php
class ProdutoDao
{

    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    function listaProdutos()
    {
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

        while ($produto_array = mysqli_fetch_assoc($resultado)) {

            $tipoProduto = $produto_array['tipoProduto'];
            $produto_id = $produto_array['id'];
            $cagetoria_nome = $produto_array['categoria_nome'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_array);
            $produto->atualizaBaseadoEm($produto_array);

            $produto->getCategoria()->setNome($categoria_nome);
            $produto->setId($produto_id);

            if ($produto_array['usado'] == "0") {
                // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
                $produto->setUsado(false);
            }
            else {
                $produto->setUsado(true);
            }


            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function insereProduto($produto)
    {
        $isbn = "";

        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $taxaImpressao = "";

        if ($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $waterMark = "";

        if ($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);

        if ($usado == "false") {
            // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
            $usado = 0;
        }
        else {
            $usado = 1;
        }

        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto, taxaImpressao, waterMark) values ('{$produto->getNome()}', '{$produto->getPreco()}', '{$produto->getDescricao()}', '{$produto->getCategoria()->getId()}', '{$usado}', '{$isbn}', '{$tipoProduto}', '{$taxaImpressao}', '{$waterMark}')";
        $resultadoDaInsercao = mysqli_query($this->conexao, $query);
        return $resultadoDaInsercao;
    }

    function removeProduto($id)
    {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

    function buscaProduto($id)
    {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $resultado = mysqli_fetch_array($resultado);

        $produto_id = $resultado['id'];
        $categoria_id = $resultado['categoria_id'];
        $tipoProduto = $resultado['tipoProduto'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $resultado);
        $produto->atualizaBaseadoEm($resultado);

        $produto->setId($produto_id);
        $produto->getCategoria()->setId($categoria_id);

        if ($resultado['usado'] == "0") {
            // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
            $produto->setUsado(false);
        }
        else {
            $produto->setUsado(true);
        }

        return $produto;
    }

    function alteraProduto($produto)
    {

        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $taxaImpressao = "";
        if ($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);

        if ($produto->getUsado()) {
            // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
            $produto->setUsado(1);
        }
        else {
            $produto->setUsado(0);
        }

        $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()}, isbn = {$isbn}, tipoProduto = '{$tipoProduto}', waterMark = '{$waterMark}', taxaImpressao = '{$taxaImpressao}' where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
    }
}

?>
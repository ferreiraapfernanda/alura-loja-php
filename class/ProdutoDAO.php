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

            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);

            if ($produto_array['usado'] == "0") {
                // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
                $produto_array['usado'] = false;
            }
            else {
                $produto_array['usado'] = true;
            }


            if ($produto_array['tipoProduto'] == "Livro") {
                $produto = new Livro($produto_array['nome'], $produto_array['preco'], $produto_array['descricao'], $categoria, $produto_array['usado']);
                $produto->setIsbn($produto_array['isbn']);
            }
            else {
                $produto = new Produto($produto_array['nome'], $produto_array['preco'], $produto_array['descricao'], $categoria, $produto_array['usado']);
            }

            $produto->setId($produto_array['id']);

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

        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $categoria_id = $produto->getCategoria()->getId();
        $usado = $produto->getUsado();
        $tipoProduto = get_class($produto);

        if ($usado == "false") {
            // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
            $usado = 0;
        }
        else {
            $usado = 1;
        }

        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$nome}', '{$preco}', '{$descricao}', '{$categoria_id}', '{$usado}', '{$isbn}', '{$tipoProduto}')";
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

        $categoria = new Categoria();
        $categoria->setId($resultado['categoria_id']);

        if ($resultado['usado'] == "0") {
            // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
            $resultado['usado'] = false;
        }
        else {
            $resultado['usado'] = true;
        }

        $produto = new Produto($resultado['nome'], $resultado['preco'], $resultado['descricao'], $categoria, $resultado['usado']);
        $produto->setId($resultado['id']);

        return $produto;
    }

    function alteraProduto($produto)
    {

        $isbn = "";

        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $tipoProduto = get_class($produto);

        if ($produto->getUsado()) {
            // POR CAUSA DO BD [0 É FALSO - 1 É VERDADEIRO]
            $produto->setUsado(1);
        }
        else {
            $produto->setUsado(0);
        }

        $id = $produto->getId();
        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $categoria_id = $produto->getCategoria()->getId();
        $usado = $produto->getUsado();

        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado}, isbn = {$isbn}, tipoProduto = '{$tipoProduto}' where id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }
}

?>
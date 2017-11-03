<?php
class Produto
{

    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;

    public function __construct($nome, $preco, $descricao, Categoria $categoria, $usado)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    public function __toString()
    {
        return $this->nome . ': R$ ' . $this->preco;
    }

    public function __destruct()
    {
        //echo "Destruindo o produto ".$this->getNome();

    }

    /**
     * função precoComDesconto
     *
     * @param float $desconto sera o valor em porcentagem de desconto
     * @return float
     */
    public function precoComDesconto($desconto = 10)
    {
        if ($desconto > 0 && $desconto <= 50) {
            $this->preco -= $this->preco * ($desconto / 100);
        }
        return $this->preco;
    }

    public function calculaImposto()
    {
        return $this->preco * 0.195;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getUsado()
    {
        return $this->usado;
    }

    /////

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUsado($usado)
    {
        $this->usado = $usado;
    }


    public function temIsbn()
    {
        return $this instanceof Livro;
    }
}

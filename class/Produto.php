<?php

class Produto
{
    
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;
    
    /**
     * função precoComDesconto
     *
     * @param float $desconto sera o valor em porcentagem de desconto
     * @return float
     */
    public function precoComDesconto($desconto = 10)
    {
        if ($desconto > 0 && $desconto <= 50) {
            $this->preco -= $this->preco * ($desconto/100);
        }
        return $this->preco;
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
    

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setPreco($preco)
    {
        if ($preco > 0) {
            $this->preco = $preco;
        }
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setUsado($usado)
    {
        $this->usado = $usado;
    }
}

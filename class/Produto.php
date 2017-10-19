<?php

class Produto
{
    
    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $categoria;
    public $usado;
    
    /**
     * função precoComDesconto
     *
     * @param float $desconto sera o valor em porcentagem de desconto
     * @return float
     */
    function precoComDesconto($desconto = 10)
    {
        return $this->preco - $this->preco * ($desconto/100);
    }
}

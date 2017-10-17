<?php
    require_once("class/Produto.php");

    $livro = new Produto();

    $livro->nome = "Livro de PHP e OO";

    var_dump($livro);
    
?>
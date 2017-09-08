<?php include ("cabecalho.php"); ?>
<?php include ("conecta.php"); ?>
<?php include ("banco-produto.php"); ?>
<?php include ("logica-usuario.php"); ?>

<?php
$produtos = listaProdutos($conexao);
?>
<table class="table table-striped table-bordered">

<?php
foreach ($produtos as $produto) :
?>
    <tr>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0, 40) ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a>
        <td> 
            <form action="remove-produto.php?id=<?=$produto['id']?>" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>" />
                <button class="btn btn-danger">remover</button>
            </form>
        </td>

        
    </tr>

<?php
endforeach
?>

<?php if( isset($_SESSION["success"]) ){ ?>
    <p class="alert-success"> <?= $_SESSION["success"] ?> </p>
<?php 
        unset($_SESSION["success"]);  
    }
?>

</table>

<?php include ("rodape.php"); ?>

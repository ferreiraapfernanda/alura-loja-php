<?php include("cabecalho.php"); ?>
<html>
        <h1>Formulário de cadastro</h1>
        <form action="adiciona-produto.php">
                <table class="table">
                        <tr>
                                <td> Nome </td>
                                <td> <input type="text" class="form-control" name="nome" /> </td>
                        </tr>
                        <tr> 
                                <td> Preço </td>
                                <td> <input type="number" class="form-control" name="preco" /> </td>
                        </tr>
                        <tr>
                                <td></td>
                                <td> <input type="submit" class="btn btn-primary" value="Cadastrar" /> </td>
                        </tr>
                        
                </table>
        </form>
</html>

<?php include("rodape.php"); ?>

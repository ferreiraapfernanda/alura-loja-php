<?php
        include("cabecalho.php");
        include("conecta.php");
        include("banco-categoria.php");
        include("logica-usuario.php");

        $categorias = listaCategorias($conexao);

        verificaUsuario();
?>
<html>
        <h1>Formulário de cadastro</h1>
        <form action="adiciona-produto.php" method="post">
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
                                <td>Descrição</td>
                                <td> <textarea name="descricao" class="form-control"></textarea> </td>
                        </tr>
                        <tr>
                                <td></td>
                                <td><input type="checkbox" name="usado" value="true"> Usado</td>
                        </tr>
                        <tr>
                                <td>Categoria</td>
                                <td>
                                <select name="categoria_id">
                                        <?php foreach($categorias as $categoria) : ?>
                                                <option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
                                        <?php endforeach ?>
                                </select>
                                </td>
                        </tr>
                        <tr>
                                <td></td>
                                <td> <input type="submit" class="btn btn-primary" value="Cadastrar" /> </td>
                        </tr>
                        
                </table>
        </form>
</html>

<?php include("rodape.php"); ?>

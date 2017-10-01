<?php require_once ("cabecalho.php"); ?>

<form method="post" action="envia-contato.php">

<table class="table">
<tr>
    <td>Nome</td>
    <td><input type="text" name="nome" class="form-control">
</tr>
<tr>
    <td>Email</td>
    <td><input type="email" name="email" class="form-control">
</tr>
<tr>
<td>Mensagem</td>
<td> <textarea name="mensagem" class="form-control"></textarea>
</tr>
<tr>
<td><button class="btn btn-primary">Enviar</button></td>
</tr>
</table>

</form>

<?php require_once ("rodape.php"); ?>
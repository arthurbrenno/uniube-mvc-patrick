<form action="/mvc20242/cliente/salvarAlterar" method="POST">
    <input type="hidden" name="id" value="<?= $param["id"]?>" />
    <label>Nome:</label></br>
    <input type="text" name="nome" value="<?= $param["nome"] ?>" />
    </br>
    <input type="submit" value="Enviar" />
</form>
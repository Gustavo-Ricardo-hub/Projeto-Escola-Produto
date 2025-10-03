<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Alterar</title>
</head>
<body>
    <center><font face = "Century Gothic" size = "6"><b>Alteração de Produtos Cadastrados</b><font size="4"></center><br>
    <font size="6">

    <form name="cliente" action="consultar_alt2.php" method="POST">
        <fieldset>
            <legend><b> Informe o ID do produto desejado: </b></legend>
            <p> Id: <input name="txtid" type="text" size="20" maxlength="5" placeholder="Id do Produto">
            <br><br><center>        
            <input name="btnenviar" type="submit" value="Consultar"> &nbsp;&nbsp;
            <input name="limpar" type="reset" value="Limpar">
        </fieldset>
    </form>
    <center> <br><br><br><br>
    <button><a style="color:black; text-decoration: none;" href="menu.html">Voltar</a></button>
</body>
</html>
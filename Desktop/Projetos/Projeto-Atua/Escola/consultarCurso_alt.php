<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alterar Curso</title>
</head>
<body>
    <center><font face = "Century Gothic" size = "6"><b>Alteração de Cursos Cadastrados</b><font size="4"></center><br>
    <font size="6">
    <form name="cliente" action="consultarCurso_alt2.php" method="POST">
        <fieldset>
            <legend><b> Informe o código do Curso desejado: </b></legend>
            <p> Código Curso: <input name="txtCodCurso" type="text" size="20" maxlength="5" placeholder="Código do Curso">
            <br><br><center>        
            <input name="btnenviar" type="submit" value="Consultar"> &nbsp;&nbsp;
            <input name="limpar" type="reset" value="Limpar">
        </fieldset>
    </form>
    <center> <br><br><br><br>
    <button><a style="color:black; text-decoration: none;" href="menu.html">Voltar</a></button>
</body>
</html>
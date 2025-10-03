<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Aluno</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        fieldset {
            border: none;
            margin-bottom: 20px;
        }

        legend {
            font-size: 18px;
            color: #555;
            font-weight: 600;
            padding: 0 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #7c3aed;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #5b2dc1;
        }

        button {
            background-color: #ddd;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 30px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #bbb;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Alteração de Alunos Cadastrados</h1>
        <form name="cliente" action="consultarAluno_alt2.php" method="POST">
            <fieldset>
                <legend><b>Informe a matrícula do Aluno desejado:</b></legend>
                <input name="txtmatricula" type="text" size="20" maxlength="5" placeholder="Matrícula do Aluno">
            </fieldset>

            <input name="btnenviar" type="submit" value="Consultar">
            <input name="limpar" type="reset" value="Limpar">
        </form>

        <button><a href="menu.html">Voltar</a></button>
    </div>

</body>
</html>

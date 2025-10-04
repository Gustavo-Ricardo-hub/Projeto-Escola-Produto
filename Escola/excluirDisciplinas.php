<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Disciplinas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 420px;
            text-align: center;
        }

        h2 {
            color: #4c1d95;
            margin-bottom: 25px;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 14px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 10px;
        }

        input[type="submit"],
        input[type="reset"],
        .back-button {
            background-color: #4c1d95;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover,
        .back-button:hover {
            background-color: #360064;
        }

        .message {
            font-weight: bold;
            color: #1d1d1d;
            margin: 15px 0;
            font-size: 16px;
        }

        .back-button {
            display: block;
            width: 100%;
            margin-top: 15px;
            text-decoration: none;
            text-align: center;
        }

        .back-button a {
            color: white;
            text-decoration: none;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><b>Exclusão de Disciplinas Cadastradas</b></h2>

        <form name="disciplina" method="POST" action="">
            <div class="form-group">
                <label for="txtid">Informe o código da disciplina:</label>
                <input type="text" name="txtid" id="txtid" maxlength="5" placeholder="Código da Disciplina">
            </div>

            <div class="buttons">
                <input name="btnenviar" type="submit" value="Excluir">
                <input name="limpar" type="reset" value="Limpar">
            </div>
        </form>

        <div class="message">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar)){
                    include_once 'disciplinas.php';
                    $d = new Disciplinas();
                    $d->setCodDisciplina($txtid);
                    $pro_bd = $d->consultar2();
                    foreach ($pro_bd as $pro_mostrar) {
                        echo "<b>Código da Disciplina: $pro_mostrar[0]</b><br>";
                        echo "<b>Nome da Disciplina: $pro_mostrar[1]</b><br>";
                    }                        
                    echo "<h3>" . $d->exclusao() . "</h3>";
                }
            ?>
        </div>

        <button class="back-button"><a href="menu.html">Voltar</a></button>
    </div>
</body>
</html>

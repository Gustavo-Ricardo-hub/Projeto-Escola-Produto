<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ebececff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            width: 400px;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #4c1d95;
            margin-bottom: 30px;
        }

        .form-box {
            background-color: #f0f4f8;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .form-box label {
            font-weight: bold;
            color: #4c1d95;
            display: block;
            margin-bottom: 10px;
        }

        .form-box input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .button-group input[type="submit"],
        .button-group input[type="reset"],
        .voltar {
            padding: 10px 20px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            color: #fff;
            background-color: #4c1d95;
            transition: 0.3s;
            font-size: 16px;
        }

        .button-group input[type="submit"]:hover,
        .button-group input[type="reset"]:hover,
        .voltar:hover {
            background-color: #7c3aed;
        }

        .resultado {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .voltar {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exclusão de Alunos</h1>

        <div class="form-box">
            <label for="txtid">Informe a matrícula do aluno:</label>
            <form name="aluno" method="POST" action="">
                <input type="text" name="txtid" id="txtid" maxlength="5" placeholder="Matrícula do Aluno">
                <div class="button-group">
                    <input type="submit" name="btnenviar" value="Excluir">
                    <input type="reset" name="limpar" value="Limpar">
                </div>
            </form>
        </div>

        <div class="resultado">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnenviar)){
                    include_once 'alunos.php';
                    $a = new Alunos();
                    $a->setMatricula($txtid);
                    $pro_bd = $a->consultar2();
                    foreach ($pro_bd as $pro_mostrar) {
                        echo "<b>Matrícula: " . $pro_mostrar[0] . "</b><br>"; 
                        echo "<b>Nome: " . $pro_mostrar[1] . "</b><br>";
                        echo "<b>Endereço: " . $pro_mostrar[2] . "</b><br>";
                        echo "<b>Cidade: " . $pro_mostrar[3] . "</b><br>";
                        echo "<b>Código Curso: " . $pro_mostrar[4] . "</b><br><br>";
                    }             
                    echo "<h3>" . $a->exclusao() . "</h3>";
                }
            ?>
        </div>

        <a href="menu.html" class="voltar">Voltar</a>
    </div>
</body>
</html>

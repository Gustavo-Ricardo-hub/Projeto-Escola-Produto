<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
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
            max-width: 600px;
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
            padding: 20px;
            background-color: #f4f4f9;
            border-radius: 8px;
        }

        legend {
            font-size: 18px;
            color: #555;
            font-weight: 600;
        }

        label {
            font-size: 16px;
            margin-top: 10px;
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="submit"], input[type="reset"] {
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

        input[type="submit"]:hover, input[type="reset"]:hover {
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
        <h1>Alteração de Produtos Cadastrados</h1>

        <form name="alterarProduto" method="POST" action="">
            <fieldset>
                <legend><b>Alterar Produto</b></legend>

                <?php
                    $txtmatricula = $_POST["txtmatricula"];
                    include_once 'alunos.php';
                    $a = new Alunos();
                    $a->setMatricula($txtmatricula);
                    $pro_bd = $a->alterar(); //chamada de método com retorno

                    foreach($pro_bd as $pro_mostrar) {
                ?>

                <input type="hidden" name="txtmatricula" value='<?php echo $pro_mostrar[0]; ?>'>
                <label for="txtnome">Matrícula:</label>
                <input type="text" name="txtmatricula" disabled value='<?php echo $pro_mostrar[0]; ?>'>

                <label for="txtnome">Nome:</label>
                <input type="text" name="txtnome" value='<?php echo $pro_mostrar[1]; ?>'>

                <label for="txtendereco">Endereço:</label>
                <input type="text" name="txtendereco" value='<?php echo $pro_mostrar[2]; ?>'>

                <label for="txtcidade">Cidade:</label>
                <input type="text" name="txtcidade" value='<?php echo $pro_mostrar[3]; ?>'>

                <label for="txtcodcurso">Código do Curso:</label>
                <input type="text" name="txtcodcurso" value='<?php echo $pro_mostrar[4]; ?>'>

                <br><br>

                <input name="btnalterar" type="submit" value="Alterar">
                <?php } ?>

            </fieldset>
        </form>

        <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnalterar)) {
                include_once 'alunos.php';
                $pro = new Alunos();

                $pro->setMatricula($txtmatricula);
                $pro->setNome($txtnome);
                $pro->setEndereco($txtendereco);
                $pro->setCidade($txtcidade);
                $pro->setCodCurso($txtcodcurso);

                echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
                header("location:consultarAluno_alt.php");
            }
        ?>

        <br><br><br>
        <button><a href="menu.html">Voltar</a></button>
    </div>

</body>
</html>

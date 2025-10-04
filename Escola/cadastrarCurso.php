<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curso</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        legend {
            font-size: 20px;
            color: #6a4fff;
            font-weight: bold;
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus {
            border: 1px solid #6a4fff;
            outline: none;
        }

        input[type="submit"], input[type="reset"] {
            padding: 12px 25px;
            background-color: #4c1d95;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 8px;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #6d28d9;
        }

        fieldset#b {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            background-color: #7a57d1;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
        }

        button a {
            color: white;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        button:hover {
            background-color: #7c3aed;
        }

        p {
            margin: 10px 0;
            font-size: 14px;
        }

        fieldset {
            margin-bottom: 20px;
        }


    </style>    
</head>
<body>
    <form name="curso" method="POST" action="">
                <legend><b>Dados do Curso</legend>
                <p> Código do Curso: <input name="txtcodcurso" type="text" size=10 ></p>
                <p> Nome: <input id="txtnome" name="txtnome" type="text" size=10 ></p>                
                <p> Código Disciplina 1: <input name="txtcoddisc1" type="text" size=10 ></p>
                <p> Código Disciplina 2: <input name="txtcoddisc2" type="text" size=10 ></p>
                <p> Código Disciplina 3: <input name="txtcoddisc3" type="text" size=10 ></p>

            <br>
                <legend><b> Opções: </b></legend>
                <br>
                <input name="btnenviar" type="submit" value="Cadastrar"> &nbsp; &nbsp;
                <input name="limpar" type="reset" value="Limpar">
    </form>        
    
    <?php
        extract($_POST, EXTR_OVERWRITE);

        if (isset($btnenviar))
        {
            include_once 'cursos.php';
            $curso = new cursos();
            $curso->setCodCurso($txtcodcurso);
            $curso->setNome($txtnome);
            $curso->setCodDisc1($txtcoddisc1);
            $curso->setCodDisc2($txtcoddisc2);
            $curso->setCodDisc3($txtcoddisc3);
            echo "<h3><br><br>" . $curso->salvar() . "</h3>";
        }
    ?>

    <br>
    <center>
    <button><a href="Menu.html"> Voltar </a></button>     
</body>
</html>
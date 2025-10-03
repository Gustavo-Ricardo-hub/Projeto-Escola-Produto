<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
    }

    body {
    background-color: #ebececff;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
    }

    form {
    width: 100%;
    max-width: 600px;
    background: #ffffff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0,0,0,0.08);
    }

    legend {
    font-weight: bold;
    font-size: 18px;
    color: #4c1d95;
    margin-bottom: 15px;
    }

    p {
    margin-bottom: 15px;
    font-size: 15px;
    color: #333;
    }

    input[type="text"],
    input[type="number"] {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.2s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
    border-color: #4c1d95;
    box-shadow: 0 0 6px rgba(76, 29, 149, 0.4);
    }

    /* Botões */
    input[type="submit"],
    input[type="reset"],
    button {
    padding: 10px 20px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s;
    color: #fff;
    }

    /* Botão cadastrar */
    input[type="submit"] {
    background-color: #4c1d95;
    }

    input[type="submit"]:hover {
    background-color: #6d28d9;
    }

    /* Botão limpar */
    input[type="reset"] {
    background-color: #f87171;
    }

    input[type="reset"]:hover {
    background-color: #dc2626;
    }

    button {
    background-color: #a78bfa;
    margin-top: 20px;
    }

    button:hover {
    background-color: #7c3aed;
    }

    button a {
    text-decoration: none;
    color: white;
    display: inline-block;
    }

    </style>
</head>
<!-- color: #4c1d95; -->
<body>
    <form name="aluno" method="POST" action="">
            <legend><b> Dados do Aluno</legend>
            <p> Matrícula: <input name="txtmatricula" type="text" size=10 placeholder="Matricula do aluno"></p>
            <p> Nome: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome do Aluno..."> </p>
            <p> Endereço: <input name="txtendereco" type="text" size=37 placeholder="Endereço do aluno..."> </p>
            <p> Cidade: <input name="txtcidade" type="text" placeholder="Cidade do aluno..."></p>
            <p> Codigo do Curso: <input name="codcurso" type="number"></p>
        <br>
            <legend><b> Opções: </b></legend>
            <br>
            <input name="btnenviar" type="submit" value="Cadastrar"> &nbsp; &nbsp;
    </form>    
    <?php
    extract($_POST, EXTR_OVERWRITE);

    if (isset($btnenviar))
    {
        include_once 'alunos.php';
        $aluno = new alunos();
        $aluno->setMatricula($txtmatricula);
        $aluno->setNome($txtnome);
        $aluno->setEndereco($txtendereco);
        $aluno->setCidade($txtcidade);
        $aluno->setCodCurso($codcurso);
        echo "<h3><br><br>" . $aluno->salvar() . "</h3>";
    }
    ?>

    <br>
    <center>
    <button><a href="menu.html"> Voltar </a></button>    
</body>
</html>
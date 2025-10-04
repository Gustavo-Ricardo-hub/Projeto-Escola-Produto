<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tabela Disciplinas</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            background-color: #f4f4fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h1 {
            font-size: 32px;
            color: #4c1d95;
            margin-bottom: 30px;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            text-align: center;
        }

        th {
            background-color: #ede9fe;
            color: #4c1d95;
        }

        tr:nth-child(even) {
            background-color: #f5f3ff;
        }

        tr:hover {
            background-color: #e9d5ff;
        }

        .btn-voltar {
            margin-top: 25px;
            background-color: #a78bfa;
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-voltar:hover {
            background-color: #7c3aed;
        }
    </style>
</head>
<body>

    <h1>Disciplinas Cadastradas</h1>

    <?php
        include_once 'disciplinas.php';
        $p = new Disciplinas();
        $pro_bd = $p->listar();

        if (!empty($pro_bd)) {
            echo "<table>";
            echo "<tr><th>Cod Disciplina</th><th>Nome Disciplina</th></tr>";
            foreach ($pro_bd as $pro_mostrar) {
                echo "<tr>";
                echo "<td>{$pro_mostrar[0]}</td>";
                echo "<td>{$pro_mostrar[1]}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum produto cadastrado.</p>";
        }
    ?>

    <a href="menu.html" class="btn-voltar">Voltar</a>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de Disciplinas</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #ebececff;
      color: #333;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #4c1d95;
      margin-bottom: 20px;
      font-size: 28px;
    }

    .container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    label {
      font-weight: 600;
      color: #4c1d95;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: 0.3s;
    }

    input[type="text"]:focus {
      border-color: #4c1d95;
      outline: none;
      box-shadow: 0 0 5px rgba(76,29,149,0.4);
    }

    .buttons {
      text-align: center;
    }

    input[type="submit"], input[type="reset"], .btn-voltar {
      background: #4c1d95;
      color: white;
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
    }

    input[type="submit"]:hover, input[type="reset"]:hover, .btn-voltar:hover {
      background: #6d28d9;
    }

    .resultado {
      margin-top: 25px;
      padding: 10px;
      border-radius: 8px;
      background-color: #f4f4f97c;
      border: 1px solid #ddd;
      overflow-y: auto;
      max-height: 300px;
    }

    .resultado b {
      display: block;
      margin: 8px 0;
      color: #333;
    }

    .voltar {
      text-align: center;
      margin-top: 20px;
    }

    .btn-voltar a {
      color: white;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <h1>Consulta de Disciplinas</h1>

  <div class="container">
    <form name="cliente" method="POST" action="">
      <label for="txtnome">Informe a Disciplina:</label>
      <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome da Disciplina">

      <div class="buttons">
        <input name="btnenviar" type="submit" value="Consultar">
        <input name="limpar" type="submit" value="Limpar">
      </div>
    </form>

    <div class="resultado">
      <?php 
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnenviar))
        {
            include_once "disciplinas.php";
            $d = new Disciplinas();
            $d->setNomeDisciplina($txtnome.'%');
            $pro_bd = $d->consultar();
            foreach ($pro_bd as $pro_mostrar) {
                echo "<b>Código da Disciplina: $pro_mostrar[0]</b>";
                echo "<b>Nome da Disciplina: $pro_mostrar[1]</b><br>";
            }    

          if(isset($btnlimpar)) {
            echo "";

          }
        }    
      ?>
    </div>
    <div class="voltar">
        <button class="btn-voltar"><a href="menu.html">Voltar</a></button>
    </div>
</div>


</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de Produtos</title>
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
      width: 500px;
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

    .resultado-box {
      background-color: #f0f4f8;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      max-height: 300px;
      overflow-y: auto;
      font-size: 15px;
    }

    .resultado-box b {
      display: block;
      margin-bottom: 8px;
    }

    .voltar {
      display: block;
      width: 100%;
      text-align: center;
      text-decoration: none;
      margin-top: 20px;
    }

    .voltar a {
      text-decoration: none;
      color: white;
      display: block;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Consulta de Produtos Cadastrados</h1>

    <div class="form-box">
      <form name="cliente" method="POST" action="">
        <label for="txtnome">Informe o nome do produto</label>
        <input type="text" name="txtnome" id="txtnome" maxlength="40" placeholder="Nome do Produto">

        <div class="button-group">
          <input type="submit" name="btnenviar" value="Consultar">
          <input type="submit" name="btnlimpar" value="Limpar">
        </div>
      </form>
    </div>

    <div class="resultado-box">
      <?php 
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnenviar)) {
          include_once "Produto.php";
          $p = new Produto();
          $p->setNome($txtnome.'%');
          $pro_bd = $p->consultar();

          foreach ($pro_bd as $pro_mostrar) {
            echo "<b>ID: " . $pro_mostrar[0] . "</b>";
            echo "<b>Nome: " . $pro_mostrar[1] . "</b>";
            echo "<b>Estoque: " . $pro_mostrar[2] . "</b><br>";
          }    
        }


        if(isset($btnlimpar)) {
          echo "";

        }
      ?>
    </div>

    <button class="voltar"><a href="menu.html">Voltar</a></button>
  </div>
</body>
</html>

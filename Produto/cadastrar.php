<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Produto</title>
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

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      outline: none;
      transition: 0.2s;
    }

    input[type="text"]:focus {
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

    input[type="submit"] {
      background-color: #4c1d95;
    }

    input[type="submit"]:hover {
      background-color: #6d28d9;
    }

    input[type="reset"] {
      background-color: #4c1d95;
    }

    input[type="reset"]:hover {
      background-color: #6d28d9;
    }

    button {
      background-color: #a78bfa;
      margin-top: 20px;
      display: block;
    }

    button:hover {
      background-color: #7c3aed;
    }

    button a {
      text-decoration: none;
      color: white;
      display: inline-block;
    }

    h3 {
      margin-top: 20px;
      color: #4c1d95;
      text-align: center;
    }

  </style>
</head>
<body>
  <form name="produto" method="POST" action="">
      <legend><b>Dados do Produto</b></legend>
      <p>Nome: <input name="txtnome" type="text" maxlength="40" placeholder="Nome do Produto"></p>
      <p>Estoque: <input name="txtestoq" type="text" placeholder="Quantidade em estoque"></p>
    </fieldset>
    <br>
      <legend><b>Opções</b></legend>
      <br>
      <input name="btnenviar" type="submit" value="Cadastrar">
      &nbsp;&nbsp;
      <input name="limpar" type="reset" value="Limpar"><br>

        <button><a href="menu.html">Voltar</a></button>
    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once 'produto.php';
            $pro = new Produto();
            $pro->setNome($txtnome);
            $pro->setEstoque($txtestoq);
            echo "<h3>" . $pro->salvar() . "</h3>";
        }
    ?>        
  </form>


</body>
</html>

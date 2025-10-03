<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Curso</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      background-color: white;
      padding: 30px 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 400px;
      text-align: center;
    }

    h2 {
      color: #4c1d95;
      margin-bottom: 25px;
    }

    .form-box {
      background-color: #f1f4fb;
      padding: 20px;
      border-radius: 15px;
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"] {
      width: 92%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
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

    .message-box {
      background-color: #f9fafc;
      border-radius: 15px;
      padding: 15px;
      margin-top: 15px;
      font-size: 15px;
      color: #1d1d1d;
      font-weight: bold;
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
    <h2>Exclusão de Cursos Cadastrados</h2>

    <form name="curso" method="POST" action="">
      <div class="form-box">
        <label for="txtid">Informe o Código do Curso</label>
        <input type="text" name="txtid" id="txtid" maxlength="5" placeholder="Código do Curso">

        <div class="buttons">
          <input name="btnenviar" type="submit" value="Excluir">
          <input name="limpar" type="reset" value="Limpar">
        </div>
      </div>
    </form>

    <div class="message-box">
      <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnenviar)){
            include_once 'cursos.php';
            $c = new Cursos();
            $c->setCodCurso($txtid);
            $pro_bd = $c->consultar2();
            foreach ($pro_bd as $pro_mostrar) {
                echo "<b>Código do Curso: $pro_mostrar[0]</b><br>";
                echo "<b>Nome do Curso: $pro_mostrar[1]</b><br>";
                echo "<b>Código da Disciplina 1: $pro_mostrar[2]</b><br>";
                echo "<b>Código da Disciplina 2: $pro_mostrar[3]</b><br>";
                echo "<b>Código da Disciplina 3: $pro_mostrar[4]</b><br><br>";
            }    
            echo "<h3>" . $c->exclusao() . "</h3>";
        }
      ?>
    </div>

    <button class="back-button"><a href="menu.html">Voltar</a></button>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Produto</title>
    </head>
    <body>
        <center><font face="Century Gothic" size="6"><b>Alteração de Disciplinas Cadastradas</b><font size="4">
        <font face="Century Gothic" size = "3"> <br>
        <fieldset>
            <legend><b> Alterar Disciplinas </b></legend>

            <?php
            $txtcodigo=$_POST["txtCodigo"];
            include_once 'disciplinas.php';
            $d = new Disciplinas();
            $d->setCodDisciplina($txtcodigo);
            $pro_bd=$d->alterar(); //chamada de método com retorno - o $p é o parâmetro enviado
            ?>
            <br><form name="" method="POST" action="">
            <?php
                foreach($pro_bd as $pro_mostrar)
                {
            ?>
                <input type="hidden" name="txtcodigo" size="5" value='<?php echo $pro_mostrar[0]?>'>
                <b> <?php echo "Código Disciplina: " . $pro_mostrar[0]; // como é matriz - posição 0  ?></b>
                <br><br> <b><?php echo "Nome Disciplina: "; ?>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
                <br><br><br><center>
                <input name="btnalterar" type="submit" value="Alterar">                    
            <?php    
                }
            ?>
        </form>        
        </fieldset>    
        <?php
            extract($_POST,EXTR_OVERWRITE);
            if(isset($btnalterar))
            {
                include_once 'disciplinas.php';
                $pro = new Disciplinas();

                $pro->setCodDisciplina($txtcodigo);
                $pro->setNomeDisciplina($txtnome);
                echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
                header("location:consultaDisciplina_alt.php");
                
            }
        ?>   
        <center> <br><br><br><br>
        <button><a style="color:black; text-decoration: none;" href="menu.html"> Voltar </a></button>
    </body>
</html>
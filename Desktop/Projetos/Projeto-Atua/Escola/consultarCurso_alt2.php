<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Produto</title>
    </head>
    <body>
        <center><font face="Century Gothic" size="6"><b>Alteração de Cursos Cadastrados</b><font size="4">
        <font face="Century Gothic" size = "3"> <br>
        <fieldset>
            <legend><b> Alterar Curso </b></legend>

            <?php
            $txtcodigo=$_POST["txtCodCurso"];
            include_once 'cursos.php';
            $c = new Cursos();
            $c->setCodCurso($txtcodigo);
            $pro_bd=$c->alterar(); //chamada de método com retorno - o $p é o parâmetro enviado
            ?>
            <br><form name="" method="POST" action="">
            <?php
                foreach($pro_bd as $pro_mostrar)
                {
            ?>
                <input type="hidden" name="txtCodCurso" size="5" value='<?php echo $pro_mostrar[0]?>'>
                <b> <?php echo "Código Disciplina: " . $pro_mostrar[0]; // como é matriz - posição 0  ?></b>
                <br><br> <b><?php echo "Nome Curso: "; ?>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
                <br><br> <b><?php echo "Código Disciplina 1: "; ?>
                <input type="text" name="txtcodDisc1" size="25" value='<?php echo $pro_mostrar[2]?>'>
                <br><br> <b><?php echo "Código Disciplina 2: "; ?>
                <input type="text" name="txtcodDisc2" size="25" value='<?php echo $pro_mostrar[3]?>'>
                <br><br> <b><?php echo "Código Disciplina 3: "; ?>
                <input type="text" name="txtcodDisc3" size="25" value='<?php echo $pro_mostrar[4]?>'>
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
                include_once 'cursos.php';
                $pro = new Cursos();
                $pro->setCodCurso($txtCodCurso);
                $pro->setNome($txtnome);
                $pro->setCodDisc1($txtcodDisc1);
                $pro->setCodDisc2($txtcodDisc2);
                $pro->setCodDisc3($txtcodDisc3);
                echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
                header("location:consultarCurso_alt.php");
                
            }
        ?>   
        <center> <br><br><br><br>
        <button><a style="color:black; text-decoration: none;" href="menu.html"> Voltar </a></button>
    </body>
</html>
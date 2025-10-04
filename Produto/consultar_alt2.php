<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Produto</title>
    </head>
    <body>
        <center><font face="Century Gothic" size="6"><b>Alteração de Produtos Cadastrados</b><font size="4">
        <font face="Century Gothic" size = "3"> <br>
        <fieldset>
            <legend><b> Alterar </b></legend>

            <?php
            $txtid=$_POST["txtid"];
            include_once 'produto.php';
            $p = new Produto();
            $p->setId($txtid);
            $pro_bd=$p->alterar(); //chamada de método com retorno - o $p é o parâmetro enviado
            ?>
            <br><form name="cliente2" method="POST" action="">
            <?php
                foreach($pro_bd as $pro_mostrar)
                {
            ?>
                <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>'>
                <b> <?php echo "ID: " . $pro_mostrar[0]; // como é matriz - posição 0  ?></b>
                <br><br> <b><?php echo "Nome: "; ?>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
                <br><br> <b> <?php echo "Estoque: " ;?></b>
                <input type="text" name="txtestoque" size="10" value='<?php echo $pro_mostrar[2]?>'>
                <br><br><br><center>
                <input name="btnalterar" type="submit" value="Alterar" >                    
            <?php    
                }
            ?>
        </form>        
        </fieldset>    
        <?php
            extract($_POST,EXTR_OVERWRITE);
            if(isset($btnalterar))
            {
                include_once 'Produto.php';
                $pro = new Produto();
                $pro->setNome($txtnome);
                $pro->setEstoque($txtestoque);
                $pro->setId($txtid);
                echo "<br><br><h3>" . $pro->alterar2() . "</h3>";
                header("location:consultar_alt.php");
                
            }
        ?>   
        <center> <br><br><br><br>
        <button><a style="color:black; text-decoration: none;" href="menu.html"> Voltar </a></button>
    </body>
</html>
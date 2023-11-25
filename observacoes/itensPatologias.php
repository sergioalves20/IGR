<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Itens Patologias</title>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/PatologiasItens.php';
        require_once '../classes/DALPatologiasItens.php';
        ?>
    </head>
    <style>
        body{
            background-color:#F5F5DC;
            color:black; 
            font-family: calibri;
            font-size: 11pt;
            font-weight: normal;
        }
        .link{ 
            color:blue;
        }
        h2{
            color:#006400;
            font-size: 14pt;
            font-weight: normal;
        }
    </style>
    <body>
        <br><br>
        <a class="link" href="../frms/frmEstrada.php">HOME</a><br><br>
        <h2>Itens de Patologias</h2>
        <table width ="100%" border="1">
            <tr>
                <td align="center" width="1%">Id Item</td>
                <td align="center" width="1%">Id Grupo</td>
                <td align="center" width="1%">Nível</td>
                <td width="3%">Patologia</td>
                <td width="15%">Descrição</td>
            </tr>
            <?php
            $valor = "";
            $cx = new Conexao();
            $dal = new DALPatologiasItens($cx);
            $resultado = $dal->Localizar($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td align="center"><?php echo $registo["id_item"]; ?></td>
                    <td align="center"><?php echo $registo["id_grupo"]; ?></td>
                    <td align="center"><?php echo $registo["nivel"]; ?></td>
                    <td><?php echo $registo["patologia"]; ?></td>
                    <td><?php echo $registo["descr"]; ?></td>
                    <td align="center" width="1%" style="background-image:url('../img/2.gif'); background-repeat: no-repeat;background-position: center "></td>
                    <td align="center" width="1%" style="background-image:url('../img/1.gif'); background-repeat: no-repeat;background-position: center "></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

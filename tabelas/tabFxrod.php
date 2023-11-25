<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Faixa de rodagem</title>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Fxrod.php';
        require_once '../classes/DALFxrod.php';
        ?>      
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="">FAIXA DE RODAGEM - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>
        <p><form class="tab" name='tab'method="post">
            <input type="text" name="fxrod" id='fxrod'placeholder="ID Estrada"style= "width: 120px;"  />
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/>
         </form>
        <p><a id="voltar"style="text-align:center;" href="../frms/frmFxrod.php">|VOLTAR|</a>
         <table accept-charset="UTF-8" width ="120%" border="1" class="tabela">
            <tr>
                <td class="title"align="center">ID Fxrod</td>     
                <td class="title" align="center">ID Estrada</td>          
                <td class="title"align="center">Data</td>     
                <td class="title"align="center">pk Início</td>               
                <td class="title" align="center">Altd.</td>
                <td class="title" colspan="2" align="center">Latitude</td>
                <td class="title" colspan="2" align="center">Longitude</td>
                <td class="title"align="center">pk Fim</td>
                <td class="title" align="center">Altd.</td>
                <td class="title" colspan="2" align="center">Latitude</td> 
                <td class="title" colspan="2" align="center">Longitude</td>
                <td class="title"align="center">Via</td>
                <td class="title"align="center">Larg.V1</td>
                <td class="title"align="center">Larg.V2</td>
                <td class="title"align="center">Larg.V3</td>
                <td class="title"align="center">Larg.V4</td>
                <td class="title"align="center">Larg.V5</td>
                <td class="title"align="center">Larg.V6</td>
                <td class="title"align="center">Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'fxrod');
            }
            $cx = new Conexao();
            $dal = new DALFxrod($cx);
            $resultado = $dal->TabFxrod($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>            
                <tr>
                    <td class="tab"width="1%"align="center"style="color:blue;"><?php echo $registo["id_fxrod"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                 
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>   
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["nvias"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv1"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv2"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv3"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv4"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv5"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv6"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>


<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Postos de contagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/PContagem.php';
        require_once '../classes/DALPContagem.php';
        ?>
        <style> body{background-color:#F5F5DC;color:black;font-family:calibri;font-size:10pt;font-weight:normal;} 
            .link{color:blue;}  
            h2{color:#006400; font-size:14pt;font-weight:normal }
            .pf{ border:none;}
            td#idt{font-weight: bolder;color:blue;}
        </style>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>   
        <h1 class="op">POSTOS DE CONTAGEM DE TRÁFEGO - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>      
       <form class="tab" name='tab'method="post">
            <input type="text" name="idEstrada" id='idEstrada'placeholder="ID Estrada"style="width: 120px;" />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width:80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <p><a id="voltar"style="text-align:center;" href="../frms/frmPContagem.php">|VOLTAR|</a>
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="80%" border="1" class="tabela">          
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >Pk</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="" >Local</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title" align="center" >Gestor</td>
            </tr>
             <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'idEstrada');
            }
            $cx = new Conexao();
            $dal = new DALPContagem($cx);
            $resultado = $dal->TabPostos($valor);
            While ($registo = $resultado->fetch_array()) {             
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_pcontagem"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pk"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="6%"align=""><?php echo $registo["sitio"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
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



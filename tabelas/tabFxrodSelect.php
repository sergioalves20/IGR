<!DOCTYPE html>
<!--canoa.2018-->
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
    <body>               
            <h1>FAIXA DE RODAGEM - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>               
       <form class="tab" name='tab'method="post">
           <input style="height: 20px;width:120px;" type="text" name="fxrod" id='fxrod'placeholder="ID Estrada" />
           &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width:80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <table accept-charset="UTF-8" width ="175%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" width="3%">ID Estrada</td> 
                <td class="title"align="center"width="3%">ID Fxrod</td>              
                <td class="title"align="center" width="1%">Data</td>     
                <td class="title"align="center" width="1%">pk Início</td>
                <td class="title"align="center">Altd.</td>
                <td class="title"align="center">Latitude</td>
                <td class="title"align="center">Longitude</td>
                <td class="title"align="center">pk Fim</td>
                <td class="title"align="center">Altd.</td>
                <td class="title"align="center">Latitude</td> 
                <td class="title"align="center">Longitude</td>
                <td class="title"align="center" width="1%">Via</td>
                <td class="title"align="center" width="1%">Larg.V1(m)</td>
                <td class="title"align="center" width="1%">Larg.V2(m)</td>
                <td class="title"align="center" width="1%">Larg.V3(m)</td>
                <td class="title"align="center" width="1%">Larg.V4(m)</td>
                <td class="title"align="center" width="1%">Larg.V5(m)</td>
                <td class="title"align="center" width="1%">Larg.V6(m)</td>           
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
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"id="idt" align="center"><?php echo $registo["id_fxrod"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                 
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>                  
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>                    
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>                
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>                 
                    <td class="tab"width="1%"align="center"><?php echo $registo["nvias"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv1"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv2"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv3"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv4"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv5"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv6"]; ?></td>
                   
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>



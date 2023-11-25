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
        require_once '../classes/Bermas.php';
        require_once '../classes/DALBermas.php';
        ?>      
    </head>
    <body>               
            <h1>BERMAS - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>               
       <form class="tab" name='tab'method="post">
           <input style="height: 20px;" type="text" name="bermas" id='bermas'placeholder="ID Estrada" />
           &nbsp;&nbsp;<input id="listar" style="background-color:#B18904;width: 65px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <table accept-charset="UTF-8" width ="120%" border="1" class="tabela">
            <tr>
                <td class="title"align="center" width="3%">ID Estrada</td> 
                <td class="title"align="center"width="3%">ID Berma</td>              
                <td class="title"align="center" width="1%">Data</td>
                <td class="title"align="center" >Pk Início</td>
                <td class="title"align="center" >Altd.</td>
                <td class="title"align="center" >Latitude</td>
                <td class="title"align="center" >Longitude</td>
                <td class="title"align="center" >pk Fim</td>
                <td class="title"align="center" >Altd.</td>
                <td class="title"align="center" >Latitude</td> 
                <td class="title"align="center" >Longitude</td>
                <td class="title"align="center" width="1%">Largura(m)</td>
                <td class="title"align="center" width="1%">Sentido</td>         
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'bermas');
            }
            $cx = new Conexao();
            $dal = new DALBermas($cx);
            $resultado = $dal->TabBermas($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"id="idt" align="center"><?php echo $registo["id_berma"]; ?></td>                   
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["larg"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["sentido"]; ?></td> 
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>



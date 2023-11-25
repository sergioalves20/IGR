<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Separador central</title> 
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/SepCentral.php';
        require_once '../classes/DALSepCentral.php';
        ?> 
    </head>
    <?php include_once '../estrutura/header.php'; ?>
    <body>       
        <h1 class="">SEPARADOR CENTRAL - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
            <form class="tab" name='tab'method="post">
            <input type="text" name="sepcent" id='sepcent'placeholder="ID Estrada" style="width: 120px;" />
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
            <a id="voltar"style="text-align:center;" href="../frms/frmSepCentral.php">|VOLTAR|</a>
        <table  width ="100%" border="1" class="tabela">
            <tr> 
                <td  <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title"colspan="2" align="center" >Latitude</td> 
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Natureza</td> 
                <td  class="title"align="center" width="1%">Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST,'localizar')) {
                $valor = filter_input(INPUT_POST,'sepcent');
            }
            $cx = new Conexao();
            $dal = new DALSepCentral($cx);
            $resultado = $dal->TabSepcentral($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_sepcent"]; ?></td>       
                    <td class="tab"width="2%" align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="3%"><?php echo $registo["nat"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>                              
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
    <footer>
        <?php include_once '../estrutura/footer.php'; ?>
    </footer>
</body>
</html>


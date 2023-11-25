<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Taludes</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Talude.php';
        require_once '../classes/DALTalude.php'
        ?>      
    </head> 
        <?php include_once '../estrutura/header.php';?>
    <body>           
        <h1 class="">TALUDES - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
       <form class="tab" name='tab'method="post">
            <input type="text" name="talude" id='talude'placeholder="ID Estrada" />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <p><a id="voltar"style="text-align:center;" href="../frms/frmBanqueta.php">|VOLTAR|</a>
        <table width ="130%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >ID</td>
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
                <td class="title" align="center" >Altura</td> 
                <td class="title" align="center" >Inclin.</td> 
                <td class="title" align="center" >Tipo</td> 
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >NºBanq.</td> 
                <td class="title" align="center" >Gestor</td> 
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'talude');
            }
            $cx = new Conexao();
            $daltalude = new DALTalude($cx);
            $resultado = $daltalude->TabTalude($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab" width="1%" align="center"><?php echo $registo["id_talude"]; ?></td>                   
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["nat"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altura"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["inclin"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["tipo"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["nbanq"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>



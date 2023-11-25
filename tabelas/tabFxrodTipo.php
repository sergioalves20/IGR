<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
     <head>
        <meta charset="UTF-8">
        <title>Tipo de Faixa de Rodagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/FxrodTipo.php';
        require_once '../classes/DALFxRodTipo.php'
        ?>    
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>       
        <h1>TIPO DE PAVIMENTO DA FAIXA DE RODAGEM - registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
            <form class="tab" name='tab'method="post">
            <input type="text" name="fxrodtipo" id='sing'placeholder="ID Estrada" style= "width: 120px;"  />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width:80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
            </form>
        <p><a id="voltar"style="text-align:center;" href="../frms/frmFxrodTipo.php">|VOLTAR|</a>
        <table width ="125%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >ID FxRod.</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title"align="center" width="1%">pk Início</td>               
                <td class="title" align="center" >Altd.</td>
                <td class="title" colspan="2" align="center" >Latitude</td>
                <td class="title" colspan="2" align="center" >Longitude</td>
                <td class="title"align="center"width="1%">pk Fim</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title" colspan="2" align="center" >Latitude</td> 
                <td class="title" colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Terra Batida</td>
                <td class="title" align="center" >Pedra</td>
                <td class="title" align="center" >Rev.Supf.</td>
                <td class="title" align="center" >B.B.</td>
                <td class="title" align="center" >BCLas</td>
                <td class="title" align="center" >Via</td>
                <td class="title" align="center" >Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'fxrodtipo');
            }
            $cx = new Conexao();
            $dal = new DALFxRodTipo($cx);
            $resultado = $dal->TabFxrodtipo($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrodtipo"]; ?></td>
                    <td class="tab"width="1%"align="center"style="color:blue;"><?php echo $registo["id_fxrod"]; ?></td>             
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
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["terrabt"]; ?></td>
                    <td class="tab"width="3%"><?php echo $registo["pedra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["revsuperf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bb"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bclas"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
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

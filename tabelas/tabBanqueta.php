<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Singularidades</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Banqueta.php';
        require_once '../classes/DALBanqueta.php'
        ?>      
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="">BANQUETAS - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>            
        <a id="voltar"style="margin-left: 0px;color:blue;" href="../tabelas/tabTaludeComBanquetas.php">|TALUDES COM REGISTO DE BANQUETAS|</a>
        <p><form class="tab" name='tab'method="post">
            <input type="text" name="talude" id='talude'placeholder="ID Talude" style="width:120px"/>
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
       </form>      
        <a id="voltar"style="text-align:center;" href="../frms/frmBanqueta.php">|VOLTAR|</a>  
        <table width ="100%" border="1" class="tabela">   
            <tr>
            <td class="title" align="center" >ID</td>
            <td class="title" align="center" >Data</td>  
            <td class="title" align="center" >ID Estrada</td>  
            <td class="title" align="center" >ID Talude</td>                       
            <td class="title" align="center" >Banqueta</td>
            <td class="title" align="center" >Dist ao pé<br>do Talude(m)</td> 
            <td class="title" align="center" >Comprt.(m)</td> 
            <td class="title" align="center" >Largura.(m)</td> 
            <td class="title" align="center" >Drenagem<br>em crista</td> 
            <td class="title" align="center" >Material</td> 
            <td class="title" align="center" >Larg.(m)<br>Dren.crista</td> 
            <td class="title" align="center" >Comp.<br>Dren.crista(m)</td> 
            <td class="title" align="center" >Profund.(m)</td>
             <td class="title" align="center" >Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'talude');
            }
            $cx = new Conexao();
            $dal = new DALBanqueta($cx);
            $resultado = $dal->TabBanqueta($valor);
            While ($registo = $resultado->fetch_array()) {   
                ?>  
                <tr>
                <td class="tab" width="1%"align="center"><?php echo $registo["id_banqueta"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["data"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                <td class="tab"width="1%"align="center"><?php echo $registo["id_talude"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["banqueta"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["dstpetal"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["compt"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["largura"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["drcrista"]; ?></td>
                <td class="tab"width="1%"><?php echo $registo["material"]; ?></td>
                <td class="tab"width="1%" align="center"><?php echo $registo["lrgdrcrista"]; ?></td> 
                <td class="tab"width="1%" align="center"><?php echo $registo["cptdrcrista"]; ?></td>
                <td class="tab"width="1%" align="center"><?php echo $registo["profund"]; ?></td> 
                <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
    <footer>
    <?php include_once '../estrutura/footer.php';?>
    </footer>
</html>



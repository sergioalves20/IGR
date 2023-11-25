<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Interseções</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Intersecao.php';
        require_once '../classes/DALIntersecao.php'
        ?>   
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>         
        <h1 class="">INTERSEÇÃO - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
        <p><form class="tab" name='tab'method="post">
            <input type="text" name="intrs" id='intrs'placeholder="ID Estrada" style="width: 120px;" />
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br>
        </form>
        <a id="voltar"style="text-align:center;" href="../frms/frmIntersecao.php">|VOLTAR|</a>
        <table width ="100%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td> 
                 <td class="title" align="center" >Código</td>
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td> 
                <td class="title" align="center" >Desniv.</td> 
                <td class="title" align="center" >De Nível</td> 
                <td class="title" align="center" >Sentido</td> 
                <td class="title" align="center" >Gestor</td>               
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'intrs');
            }
            $cx = new Conexao();
            $dal = new DALIntersecao($cx);
            $resultado = $dal->TabIntersecao($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_intrs"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["codigo"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["desniv"]; ?></td>
                    <td class="tab"width="5%" align=""><?php echo $registo["denivel"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
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




<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curvas em planta</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/CurvasPlanta.php';
        require_once '../classes/DALCurvasPlanta.php'
        ?>       
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>            
            <h1 class="">CURVAS EM PLANTA - registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>                 
        <form class="tab" name='tab'method="post">
            <input type="text" name="curvap" id='curvap'placeholder="ID Estrada" style="width: 120px;"/>
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
            <div style="text-align: center;height: 30px;">
                <a id="voltar"style="text-align:center;" href="../frms/frmCurvasPlanta.php">|VOLTAR|</a>
            </div>
            <table width ="80%"style="margin:0 auto;" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Raio (graus)</td> 
                <td class="title" align="center" >Gestor</td>               
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'curvap');
            }
            $cx = new Conexao();
            $dal = new DALCurvasPlanta($cx);
            $resultado = $dal->TabCurvap($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_curvap"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="2%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["raioplanta"]; ?></td>
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



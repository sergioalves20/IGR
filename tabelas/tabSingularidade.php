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
        require_once '../classes/Singularidade.php';
        require_once '../classes/DALSingularidade.php'
        ?>
            
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>               
        <h1 class="">SINGULARIDADES - registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>
        <p><form class="tab" name='tab'method="post">
            <input type="text" name="sing" id='sing'placeholder="ID Estrada" style="width: 120px;"/>
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>           
       <script>
        function close_window() {
            close();
        }
        </script>
        <a id="voltar"style="text-align:center;"  href="javascript:close_window();">|VOLTAR|</a>
        <table style="margin:0 auto;" width ="100%" border="1" class="tabela">
            <tr> 
                
                <td id="reg" class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td id="est"class="title" align="center" >ID Estrada</td>
                <td id="pki"class="title" align="center" >pk Início</td>
                <td id="pkf"class="title" align="center" >pk Fim</td>
                <td id="lat"colspan="2" class="title" align="center" >Latitude</td> 
                <td id="lon"colspan="2"class="title" align="center" >Longitude</td>
                <td id="alt"class="title" align="center" >Altitude</td> 
                <td id="sig"class="title" align="center" >Singularidade</td> 
                <td class="title" align="center" >Gestor</td>               
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'sing');
            }      
            $cx = new Conexao();
            $dal = new DALSingularidade($cx);
            $resultado = $dal->TabSingularidade($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>     
                <tr>                   
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_sing"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="10%" align=""><?php echo $registo["singularidade"]; ?></td>
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



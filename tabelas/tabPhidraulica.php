<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Passagem Hidráulica</title>
   <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Phidraulica.php';
        require_once '../classes/DALPhidraulica.php'
        ?>    
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>           
        <h1 class="">PASSAGENS HIDRÁULICAS - registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
         <p><form class="tab" name='tab'method="post">
            <input type="text" name="ph" id='ph'placeholder="ID Estrada" style="width: 120px;" />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width:80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/>
       </form>
         <a id="voltar"style="text-align:center;" href="../frms/frmPhidraulica.php">|VOLTAR|</a>
        <table width ="100%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID<br>Estrada</td>               
                <td class="title" align="center" >pk<br>Início</td>
                <td class="title" align="center" >pk<br>Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td> 
                <td class="title" align="center" >Material</td> 
                <td class="title" align="center" >Forma</td>
                <td class="title" align="center" >Larg.<br>PH</td> 
                <td class="title" align="center" >Alt.<br>PH</td> 
                <td class="title" align="center" >Diâmetro</td> 
                <td class="title" align="center" >Septos</td>
                <td class="title" align="center" >Alt.<br>Sept.</td>
                <td class="title" align="center" >Larg.<br>Sept.</td> 
                <td class="title" align="center" >Gestor</td>                          
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'ph');
            }
            $cx = new Conexao();
            $dalph = new DALPhidraulica($cx);
            $resultado = $dalph->TabPhidraulica($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_ph"]; ?></td>                   
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["material"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["forma"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["largura_ph"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["altura_ph"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["diametro"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["septos"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["altura_sp"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["largura_sp"]; ?></td>
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



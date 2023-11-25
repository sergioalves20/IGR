<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>BBL da Berma</title>
         
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Bermasbblig.php';
        require_once '../classes/DALBermasBblig.php';
        ?>      
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>       
            <h1>BETÃO BETUMINOSO DE LIGAÇÃO DA BERMA - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>
       <form class="tab" name='tab'method="post">
           <input style="width: 160px;" type="text" name="bermabblig" id='bermabblig'placeholder="ID Estrada" />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
            <p><a id="voltar"style="text-align:center;" href="../frms/frmBermasBblig.php">|VOLTAR|</a>
        <table style="margin: 0 auto;" accept-charset="UTF-8" width ="80%" border="1" class="tabela">
            <tr>
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
                    <td class="title" align="center" >Data</td>
                    <td class="title" align="center" >ID Estrada</td>   
                    <td class="title" align="center" >ID Berma</td>   
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>
                    <td class="title" align="center" >Granul.</td>
                    <td class="title" align="center" >Espess.(m)</td>
                    <td class="title" align="center" >Betume</td>
                    <td class="title" align="center" >Sentido</td>
                    <td class="title" align="center" >Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'bermabblig');
            }
            $cx = new Conexao();
            $dal = new DALbermasbblig($cx);
            $resultado = $dal->TabBermasBblig($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_bermabblig"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["data"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_berma"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>    
                        <td class="tab"width="1%"align="center"><?php echo $registo["granul"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td> 
                        <td class="tab"width="1%"align=""><?php echo $registo["betume"]; ?></td>
                        <td class="tab"width="1%"align=""><?php echo $registo["sentido"]; ?></td>
                        <td style="font-size:10pt;font-style: italic;"class="tab"width="2%"align=""><?php echo $registo["ass"]; ?></td> 
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
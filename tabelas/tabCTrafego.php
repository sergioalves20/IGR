<!DOCTYPE html>
<!--canoa2018-->
<?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contagem de tráfego</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/CTrafego.php';
        require_once '../classes/DALCTrafego.php'
        ?>      
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>        
        <h1>CONTAGEM DE TRÁFEGO - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
       <form class="tab" name='tab' method="post">
            <input type="text" name="idEstrada" id='idEstrada'placeholder="ID Estrada" style="width: 120px;"/>
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <p><a id="voltar"style="text-align:center;" href="../frms/frmCTrafego.php">|VOLTAR|</a>
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="120%" border="1" class="tabela">           
            <tr>
               <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td> 
                <td class="title" align="center" >ID Trecho</td> 
                <td class="title" align="center" >Máquina</td>
                <td class="title" align="center" >ID Posto</td>
                <td class="title" align="" >Alt.Solo</td>
                <td class="title" align="" >Distância<br>ao Eixo</td>
                <td class="title" align="" >Sentido</td>
                <td class="title"colspan="2" align="center" >Início</td>
                <td class="title"colspan="2" align="center" >Fim</td>
                <td class="title" align="center" >NºDias</td>
                <td class="title" align="center" >Veloc.<br>Média</td>
                <td class="title" align="center" >Cat.1(Lig)</td>
                <td class="title" align="center" >Cat2(Pes)</td>
                <td class="title" align="center" >T.M.D.A.</td>
                <td class="title" align="center" >Gestor</td>
            </tr>
             <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'idEstrada');
            }
            $cx = new Conexao();
            $dal = new DALCtrafego($cx);
            $resultado = $dal->TabCTrafego($valor);
            While ($registo = $resultado->fetch_array()) {     
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_ctrafego"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["maquina"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_posto"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altsolo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["disteixo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["datai"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["horai"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["dataf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["horaf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["ndias"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["vmedia"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lig"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pes"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["tmda"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"><?php echo $registo["ass"]; ?></td>                      
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



<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>I.R.I.</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Iri.php';
        require_once '../classes/DALIri.php'
        ?>      
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>           
        <h1>I.R.I.(International Roughness Index) - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>             
       <form class="tab" name='tab'method="post">
            <input type="text" name="idEstrada" id='idEstrada'placeholder="ID Estrada" style="width: 120px;" />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width:80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
            <a id="voltar"style="text-align:center;" href="../frms/frmIRI.php">|VOLTAR|</a>
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="60%" border="1" class="tabela">   
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td> 
                <td class="title" align="center" >ID Trecho</td> 
                <td class="title" align="center" >Data</td>           
                <td class="title" align="center" >Via</td>
                <td class="title" align="center" >I.R.I.</td>
                <td class="title" align="" >Gestor</td>
            </tr>
             <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'idEstrada');
            }
            $cx = new Conexao();
            $dal = new DALIri($cx);
            $resultado = $dal->TabIri($valor);
            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=iri&op=excluir&cod=' . $registo['id_iri'];
                $linkalterar = 'levantamento_main.php?pg=iri&op=alterar&cod=' . $registo['id_iri'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_iri"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["iri"]; ?></td>
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



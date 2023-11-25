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
        <h1 class="op">ESTRADAS COM REGISTO DE PASSAGENS HIDRÁULICAS</h1><br>
        <a id="voltar"style="text-align:center;" href="javascript:history.back()">|VOLTAR|</a>
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="75%" border="1" class="tabela">
            <tr>
                <td class="title" align="center">ID Estrada</td>      
                <td class="title"align="center" >Código</td>     
                <td class="title"align="center" >Freguesia</td>               
                <td class="title" align="center">Topónimo</td>              
            </tr>
            <?php
            $valor = "";
            $cx = new Conexao();
            $dalph = new DALPhidraulica($cx);
            $resultado = $dalph->ListaEstradas($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"id="idt" align="center"style="color:brown;"><?php echo $registo["codigo"]; ?></td>                   
                    <td class="tab"width="1%"><?php echo $registo["freguesia"]; ?></td>  
                    <td class="tab"width="5%"style="color:blue;"><?php echo $registo["toponimo"]; ?></td>
                <?php
            }
            ?>
        </table>
         <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>



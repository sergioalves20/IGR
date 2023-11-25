<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Taludes</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Talude.php';
        require_once '../classes/DALTalude.php'
        ?>      
    </head>
        <?php include_once '../estrutura/header.php';?>
    <body>
    <h1 class="">TALUDES COM REGISTO DE BANQUETAS</h1>            
        <a id="voltar"style="text-align:center;" href="javascript:history.back()">|VOLTAR|</a>
         <table style="margin:0 auto;" accept-charset="UTF-8" width ="80%" border="1" class="tabela">
            <tr>
                <td class="title" align="center">ID Talude</td>
                <td class="title" align="center">ID Estrada</td>
                <td class="title"align="center" >Código</td>                  
                <td class="title" align="center">Topónimo</td> 
                <td class="title" align="center">Pk Início</td>
                <td class="title" align="center">Pk Fim</td>
                <td class="title" align="center">Pk Tipo</td>
                <td class="title" align="center">Nº de Banq.</td>
                <td class="title" align="center">Sentido</td>
            </tr>
            <?php
            $valor = "";
            $cx = new Conexao();
            $dal = new DALTalude($cx);
            $resultado = $dal->TaludesComBanquetas($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                     <td class="tab"width="1%"align="center"><?php echo $registo["id_talude"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                     <td class="tab"width="1%"id="idt" align="center"style="color:brown;"><?php echo $registo["codigo"]; ?></td>
                     <td class="tab"width="5%"style="color:blue;"><?php echo $registo["toponimo"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["tipo"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["nbanq"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
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


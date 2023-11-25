<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/tab.css">      
        <?php
        require_once '../classes/Conexao.php';
         require_once '../classes/DALPatologia.php';
         require_once '../classes/PatologiasItens.php';
        require_once '../classes/Patologia.php';       
        ?>
    </head>   
    <?php include_once '../estrutura/header.php';?>
    <body>     
        <h1 class="op">DESCRIÇÃO DO ITEM DA PATOLOGIA</h1>            
       
          <form class="tab" name='tab'method="post">
            <input type="text" name="item" id='sing'placeholder="Item" />
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
          </form><br>
         <a id="voltar"style="text-align:center;" href="consultas_main.php?pg=consultas_patolog">|VOLTAR|</a>
            <!----------------------------------------------------------------------------------------->
            <br><br>
           <table style="margin:0 auto;" accept-charset="UTF-8" width ="75%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >Id Item</td>           
                <td class="title"  align="center">Patologia</td>
                <td class="title"  align="center">Descrição</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'item');
            }
            $cx = new Conexao();
            $dal = new DALPatologia($cx);
            $resultado = $dal->Selecionar($valor);
            
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"id="item" align="center" style="color:blue;"><?php echo $registo["id_item"]; ?></td>
                    <td class="tab"width="5%"><?php echo $registo["patologia"]; ?></td>
                    <td class="tab" width="15%"><?php echo $registo["descr"]; ?></td>                   
                </tr>
                <?php
            }
            ?>
        </table>     
       <div style="margin-top: 200px;">
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
        </div>  
    </body>
</html>

<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
     <head>
        <meta charset="UTF-8">
        <title>Tipo de Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>       
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/BermasTipo.php';
        require_once '../classes/DALBermasTipo.php'
        ?>    
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>       
            <h1 class="op">ESTRADAS COM REGISTO DO TIPO DE BERMAS</h1>         
       <?php
        $voltar="";
        if ($_SESSION["nivel"] == 1){
            $voltar = 'admin_main.php?pg=admin_nav';    
        }
         if ($_SESSION["nivel"] == 2){
            $voltar = 'gestor_main.php?pg=gestor_nav';    
        }
         if ($_SESSION["nivel"] == 3){
            $voltar = 'utilizador_main.php?pg=utilizador_nav';    
        }
        ?>
        <a id="voltar"style="text-align:center;" href="javascript:history.back()">|VOLTAR|</a>
        
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="75%" border="1" class="tabela">
            <thead>
            <tr>       
                <th data-field="id_estrada"class="title" align="center" >ID Estrada</th>               
                <th data-field="pkinicio"class="title" align="center" >Código</th>
                <th data-field="pkfim"class="title" align="center" >Freguesia</th>
                <th data-field="pavim"class="title" align="center" >Topónimo</th>           
            </tr>
            </thead>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'bermastipo');
            }
            $cx = new Conexao();
            $dal = new DALBermasTipo($cx);
            $resultado = $dal->ListaEstradas($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>       
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"id="idt" align="center"style="color:brown;"><?php echo $registo["codigo"]; ?></td>                   
                    <td class="tab"width="1%"><?php echo $registo["freguesia"]; ?></td>  
                    <td class="tab"width="5%"style="color:blue;"><?php echo $registo["toponimo"]; ?></td> 
                </tr>
                <?php
            }
            ?>
        </table>
        <footer>
        <?php include_once '../estrutura/footer.php'; ?>
        </footer>
    </body>
</html>

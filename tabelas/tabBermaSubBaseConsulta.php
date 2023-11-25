<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sub Base da Berma</title>
         
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/BermasSubBase.php';
        require_once '../classes/DALBermasSubBase.php';
        ?>      
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>
                
            <h1>SUB BASE DAS BERMAS - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>
       <form class="tab" name='tab'method="post">
            <input type="text" name="bermasubbase" id="id_estrada" placeholder="ID Estrada" style="width: 120px;" />
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
             <?php
        $voltar="";
        if ($_SESSION["nivel"] == 1){
            $voltar = 'admin_main.php?pg=constbermaconsult';    
        }
         if ($_SESSION["nivel"] == 2){
            $voltar = 'gestor_main.php?pg=constbermaconsult';    
        }
         if ($_SESSION["nivel"] == 3){
            $voltar = 'utilizador_main.php?pg=constbermaconsult';    
        }
        ?>
        <a id="voltar"style="text-align:center;" href="<?php echo $voltar; ?>">|VOLTAR|</a>
        <table style="margin: 0 auto;" accept-charset="UTF-8" width ="90%" border="1" class="tabela">
            <tr>
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
                    <td class="title" align="center" >Data</td>
                    <td class="title" align="center" >ID Estrada</td>  
                    <td class="title" align="center" >ID Berma</td>   
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>                                
                    <td class="title" align="center" >Nat.Geo.</td> 
                    <td class="title" align="center" >Granulometria</td>
                    <td class="title" align="center" >Espessura</td>
                    <td class="title" align="center" >Sentido</td> 
                    <td class="title" align="center" >Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'bermasubbase');
            }
            $cx = new Conexao();
            $dal = new DALBermasSubBase($cx);
            $resultado = $dal->TabBermasubbase($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_bermasubbase"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["data"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_berma"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>                     
                        <td class="tab"width="1%"align=""><?php echo $registo["natgeo"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["granul"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
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


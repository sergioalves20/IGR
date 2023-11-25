<!DOCTYPE html>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>I.Q.</title>
    <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
     <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="js/coordenadas.js"></script>
        <style type="text/css" media="all">
            .label_1{width:90px;float:left;display:block}
            .label_3{width:400px;display:block;background-color:#C0FF3E;color:black;padding:5px;}
            select#cNvias{ width:70px;height:25px;}
            iframe#trecho{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
            form#iq{width:900px;height: 200px;}
        </style>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Iq.php';
        require_once '../classes/DALIq.php';
        //INSERIR REGISTO
        $ind = new iq();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $id_trecho = filter_input(INPUT_POST, 'tId_trecho');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $iq = filter_input(INPUT_POST, 'tIq');
            $ass = filter_input(INPUT_POST, 'tAss');
            $ind = new Iq(0,$alt, $reg, $id_estrada, $id_trecho, $data, $hora, $iq, $ass);
            $cx = new Conexao();
            $dal = new DALIq($cx);
            $dal->Inserir($ind);
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        $ind = new iq();
            }  
            //ALTERAR REGISTO
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_iq = filter_input(INPUT_POST,'tId_iq');
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $id_trecho = filter_input(INPUT_POST, 'tId_trecho');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $iq = filter_input(INPUT_POST, 'tIq');
            $ass = filter_input(INPUT_POST, 'tAss');
            $conexao = new Conexao();
            $dal = new DALIq($conexao);
            $ind = new Iq($id_iq,$alt,$reg, $id_estrada,$id_trecho, $data, $hora, $iq, $ass);          
            $dal->Alterar($ind);
         $ind = new iq();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALIq($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALIq($conexao);
            $ind = $dal->CarregaIq(filter_input(INPUT_GET, 'cod'));
        }
            ?>
    </head>
     <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - ÍNDICE DE QUALIDADE DA ESTRADA</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form method="post" id="iq"action="../estrutura/levantamento_main.php?pg=iq&op=listar" onsubmit="return pk()">
            <input style="margin-left:50px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
              <p><label class=""for="cAlterar"> Alterar</label>   
                   <select class="alt" name ="tAlterar" id="cAlterar">
                       <option>0</option>
                       <option>1</option>
                       <option selected><?php echo $ind->getAlt(); ?></option></select>
                 <label class=""for="cReg"> Registo</label>
                  <input value="<?php echo $ind->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>        
                 <label class=""for="cId_estrada"> ID Estrada</label>          
                  <input value="<?php echo $ind->getId_estrada(); ?>"required="" type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
                 <label class=""for="cId_trecho"> ID Trecho</label>
                  <input value="<?php echo $ind->getId_trecho(); ?>"required="" type="text" name ="tId_trecho" id="cId_trecho" class="align"size= "5"/>
                 <label class="" for="cIq">I.Q.</label>
                  <input value="<?php echo $ind->getIq(); ?>"type="text" name ="tIq" id="cIq" class="align"size= "5"placeholder="0"/>	
                <br><br>
               <!-- <iframe id="trecho" src="../tabelas/tabTrechoSelect.php" name="janela"></iframe><br><br> -->
                <!--------------------------------------------------------------------------------------------------------------------------------->
                <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
            <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">                   
             <?php             
                if ($ind->getId_iq() == 0) {
                    ?>
                    <input style="margin-left:330px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabiq'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input hidden=""type="text"  name="tId_iq" id="cId_iq" value="<?php echo $ind->getId_iq(); ?>"/>
                <?php } ?>
                    </div>
        </form>
        <br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>  
            <table id="est" style="margin-left: 260px;" accept-charset="UTF-8" width ="60%" border="1" class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alt.</td>
                <td class="title" align="center" >Regst.</td>
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td>
                <td class="title" align="center" >ID Trecho</td>
                <td class="title" align="center" >I.Q.</td>       
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tId_iq');
            }
            $cx = new Conexao();
            $dal = new DALIq($cx);
            $resultado = $dal->Localizar($valor);
            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=iq&op=excluir&cod=' . $registo['id_iq'];
                $linkalterar = 'levantamento_main.php?pg=iq&op=alterar&cod=' . $registo['id_iq'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_iq"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["iq"]; ?></td>   
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>";                                
                </tr>
                <?php
            }
            ?>
        </table> 
         <footer style="width: 100%;">
<?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

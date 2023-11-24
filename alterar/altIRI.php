<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start(); ?>  
<html>
    <head>
        <meta charset="UTF-8">       
        <title>I.R.I.</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>        
        <style type="text/css" media="all">
            .label_1{width:90px;float:left;display:block}
            .label_3{width:400px;display:block;background-color:#C0FF3E;color:black;padding:5px;}
            select#cVia{ width:70px;height:25px;}
            iframe#trecho{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}           
        </style>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Iri.php';
        require_once '../classes/DALIri.php';
        date_default_timezone_set('Atlantic/Azores');       
        $ciri = new Iri();
//Retificar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_iri = filter_input(INPUT_POST,'tId_iri');
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $id_trecho = filter_input(INPUT_POST, 'tId_trecho');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $via = filter_input(INPUT_POST, 'tVia');
            $iri = filter_input(INPUT_POST, 'tIri');
            $ass = filter_input(INPUT_POST, 'tAss');
            $arq = filter_input(INPUT_POST, 'tArq');
            $data_arq = filter_input(INPUT_POST, 'tData_arq');
            $conexao = new Conexao();
            $dal = new DALIri($conexao);
            $ciri = new Iri($id_iri,$alt,$reg, $id_estrada,$id_trecho, $data, $hora, $via, $iri, $ass,$arq, $data_arq);          
            $dal->Rectificar($ciri);
            $ciri = new Iri();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALIri($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALIri($conexao);
            $ciri = $dal->CarregaIriRect(filter_input(INPUT_GET, 'cod'));
        }
            ?>
    </head>
     <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">ALTERAR - I.R.I. (International Roughness Index)</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>
        <form style="width:930px;height: 420px;" method="post" id="iri"action="../estrutura/alterar_main.php?pg=iri&op=listar" onsubmit="return pk()">
            <p><label class="label_1" for="cId_sing">ID Singualidade</label>
                <input style="background-color:#ccffcc;border-style: none;height: 25px;color:#7F7F7F;" type="text" use readonly="true"  name="tId_iri" id="id_iri" value="<?php echo $ciri->getId_iri(); ?>"class="align" size="6"/>            
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" type="text" value= '<?php echo $ciri->getData(); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" value= '<?php echo $ciri->getHora(); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
           <hr> 	            
            <p><label class=""for="cAlterar"> Alterar</label>   
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option selected>0</option>
                    <option>1</option><?php echo $ciri->getAlt(); ?></select>
                <label class=""for="cReg"> Registo</label>
                <input value="<?php echo $ciri->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"required=""/>	   
                   <label class="" for="cArq">Arquivar</label>
                <select   class="alt" name ="tArq" id="cArq">
                    <option  selected="">0</option>
                    <option>1</option><?php echo $ciri->getArq(); ?></select>          
                &nbsp;<label  for="cData_arq">Data</label>
                <input style="height: 20px"value="<?php echo $ciri->getData_arq(); ?>" type="date" name ="tData_arq"  id="cData_arq" class="align" size= "6"/>
                 <label class=""for="cId_estrada"> ID Estrada</label>          
                <input value="<?php echo $ciri->getId_estrada(); ?>"required="" type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>           
                <label class=""for="cId_trecho"> ID Trecho</label>
                <input value="<?php echo $ciri->getId_trecho(); ?>"required="" type="text" name ="tId_trecho" id="cId_trecho" class="align"size= "5"/>            
                <label class=""for="cVia">Via</label>
                <select name ="tVia" id="cVia">  
                    <option value="V1">V1</option>
                    <option value="V2">V2</option>
                    <option value="V3">V3</option>
                    <option value="V4">V4</option>
                    <option value="V5">V5</option>
                    <option value="V6">V6</option>
                    <option selected><?php echo $ciri->getVia(); ?></option>
                  </select>
            <label class="" for="cIri">I.R.I.</label>
                <input value="<?php echo $ciri->getIri(); ?>"type="text" name ="tIri" id="cIri" class="align"size= "5"placeholder="0.0"/>	
                <br><br>                          
                <iframe id="trecho" src="../tabelas/tabTrechoSelect.php" name="janela"></iframe><br><br>               
                <!--------------------------------------------------------------------------------------------------------------------------------->               
            <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">                   
             <?php            
                if ($ciri->getId_iri() == 0) {
                    ?>                  
                    <?php
                } else {
                    ?>  
                    <input style="margin-left: 350px;width: 100px;height: 28px;"  class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100px;height: 28px;"  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                <?php } ?>
                    </div>               
           </form><br>
        <h2>Registos activos</h2>  
        <form class="tab" name='tab'method="post">
        <input type="text" name="iri" id='iri' placeholder="ID Estrada"style= "width: 120px;" />
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>  
            <table id="est" style="margin-left: 260px;" accept-charset="UTF-8" width ="60%" border="1" class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alt.</td>
                <td class="title" align="center" >Regst.</td>
                <td class="title" align="center" >ID Estrada</td>
                <td class="title" align="center" >ID Trecho</td>
                <td class="title" align="center" >Via</td>
                <td class="title" align="center" >I.R.I.</td>
                <td class="title" align="center" >Arquivo</td>
                <td class="title" align="center" >Data</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'iri');
            }
            $cx = new Conexao();
            $dal = new DALIri($cx);
            $resultado = $dal->LocalizarRect($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'alterar_main.php?pg=iri&op=excluir&cod=' . $registo['id_iri'];
                $linkalterar = 'alterar_main.php?pg=iri&op=alterar&cod=' . $registo['id_iri'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_iri"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["iri"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["arq"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["data_arq"]; ?></td>
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
                </tr>
                <?php
            }
            ?>
        </table><br>
           <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=iri">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

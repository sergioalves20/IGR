<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start()?>
<html>     
    <head>
        <meta charset="UTF-8">
        <title>Banqueta</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>select#cMaterial{height: 25px;}select#cBanqueta{height: 25px;}select#cDrcrista{height: 25px;}</style>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Banqueta.php';
        require_once '../classes/DALBanqueta.php';
        date_default_timezone_set('Atlantic/Azores');
        $banq = new Banqueta();
//Rectificar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_banqueta = filter_input(INPUT_POST,'tId_banqueta');
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_talude = filter_input(INPUT_POST, 'tId_talude');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $banqueta = filter_input(INPUT_POST, 'tBanqueta');
            $dstpetal = filter_input(INPUT_POST, 'tDstpetal');
            $compt = filter_input(INPUT_POST, 'tCompt');
            $largura = filter_input(INPUT_POST, 'tLargura');
            $drcrista = filter_input(INPUT_POST, 'tDrcrista');
            $material = filter_input(INPUT_POST, 'tMaterial');
            $lrgdrcrista = filter_input(INPUT_POST, 'tLrgdrcrista');
            $cptdrcrista = filter_input(INPUT_POST, 'tCptdrcrista');
            $profund = filter_input(INPUT_POST, 'tProfund');
            $ass = filter_input(INPUT_POST, 'tAss');
            $arq = filter_input(INPUT_POST, 'tArq');
            $data_arq = filter_input(INPUT_POST, 'tData_arq');
            $conexao = new Conexao();
            $dalbanqueta = new DALBanqueta($conexao);
            $banq = new Banqueta($id_banqueta,$alt,$reg, $id_talude, $id_estrada, $data, $hora, $banqueta, $dstpetal, $compt, $largura, $drcrista, $material, $lrgdrcrista, $cptdrcrista, $profund, $ass,$arq,$data_arq);
            $dalbanqueta->Rectificar($banq);
            $banq = new Banqueta();
        }
//Rectificar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalbanqueta = new DALBanqueta($conexao);
            $banq = $dalbanqueta->CarregaBanquetaRect(filter_input(INPUT_GET, 'cod'));
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALBanqueta($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
       ?> 
    </head>
    <?php include_once '../estrutura/header.php'; ?>
    <body> 
        <h1 class="op">ALTERAR - Banqueta</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>          
        <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>        
         <form style="height:380px;"method="post" id="banq" name="banqueta" action="alterar_main.php?pg=banqueta&op=listar" >         
            <p><label class="label_1" for="cId_banqueta">ID Banqueta</label>
                <input style="background-color:#ccffcc;border-style: none;height: 25px;color:#7F7F7F;"type="text" use readonly="true"  name="tId_banqueta" id="cId_banqueta" value="<?php echo $banq->getId_banqueta(); ?>"class="align" size="6"/>            
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" type="text" value= '<?php echo $banq->getData(); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;"type="text" value= '<?php echo $banq->getHora(); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
           <hr> 
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <input value="<?php echo $banq->getAlt(); ?>"value=""type="text" name ="tAlterar"  id="cAlterar" class="align" size= "2"placeholder="0"/>               
          &nbsp;<label  for="cReg">Registo</label>
          <input style="color:blue;" value="<?php echo $banq->getReg(); ?>"value=""type="text" name ="tReg"  id="cReg" class="align" size= "2"required="true"/>          
          <label class="" for="cArq">Arquivar</label>
                <select   class="alt" name ="tArq" id="cArq">
                    <option  selected="">0</option>
                    <option>1</option><?php echo $banq->getArq(); ?></select>              
           &nbsp;<label  for="cData_arq">Data</label>   
          <input style="height: 20px"value="<?php echo $banq->getData_arq(); ?>" type="date" name ="tData_arq"  id="cData_arq" class="align" size= "6"/>
            <p><label class="label_1"  for="cId_talude">ID Talude</label>
                <input value="<?php echo $banq->getId_talude(); ?>"autofocus required type="text" name ="tId_talude" id="cId_talude" class="align"size= "5"/>	            
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $banq->getId_estrada(); ?>"autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/>           
            <p><label class="label_1"for="cBanqueta" >Banqueta</label>
                <select value="<?php echo $banq->getBanqueta(); ?>" required name ="tBanqueta" id="cBanqueta">
                    <option>B1</option>
                    <option>B2</option>
                    <option>B3</option>
                    <option>B4</option>
                    <option>B5</option>
                    <option>B6</option>
                    <option>B7</option>
                    <option selected ><?php echo $banq->getBanqueta(); ?></option></select>                 
            <p><label  class="label_1"for="cDstpetal">Distância ao pé de Talude(m)</label>
                <input value="<?php echo $banq->getDstpetal(); ?>"type="text" required="" name ="tDstpetal" id="cDstpetal" class="align" size= "5"placeholder="000,0"/>          
            <p><label  class="label_1"for="cCompt">Comprt. da Banqt.(m)</label>
                <input value="<?php echo $banq->getCompt(); ?>"type="text" required="" name ="tCompt" id="cComp" class="align"size= "5"placeholder="000,0"/>            
            <label style="margin-left:65px;"for="cLargura">Largura da Banqut.(m)</label>
                <input value="<?php echo $banq->getLargura(); ?>"type="text" required="" name ="tLargura" id="cLargura" class="align"size= "5"placeholder="00,0"/>                
            &nbsp;<label style="margin-left:35px;" for="cMaterial">Material</label>              
                <select value= "<?php echo $banq->getMaterial(); ?>" name="tMaterial" id="cMaterial">  
                    <option value="Pedra">Pedra  </option> 
                    <option value="Metal">Metal</option> 
                    <option value="Betão">Betão</option>                 
                    <option value="Polipropileno">Polipropileno</option>                
                    <option selected=""><?php echo $banq->getMaterial(); ?></option>                 
                </select>                
        <p><label  class="label_1" for="cDrcrista">Drenagem em Crista</label>
            <select value="<?php echo $banq->getDrcrista(); ?>" style="width:103px;"required=""name ="tDrcrista" id="cDrcrista">
                <option value="V">V</option>
                <option value="U">U</option>
                <option value="Meia-cana">Meia-cana</option>						
                <option selected=""><?php echo $banq->getDrcrista(); ?></option>
         </select>           
        <p><label class="label_1" for="cCptdrcrista">Comprt. da Drenag. em Crista(m)</label>
            <input value="<?php echo $banq->getCptdrcrista(); ?>"type="text" required="" name ="tCptdrcrista" id="cCptdrcrista" class="align"size= "5"placeholder="000,0"/>	
            &nbsp;&nbsp;&nbsp; <label for="cLrgdrcrista">Largura da Drenag. em Crista(m)</label>
            <input value="<?php echo $banq->getLrgdrcrista(); ?>" type="text" required="" name ="tLrgdrcrista" id="cLrgdrcrista" class="align"size= "5"placeholder="00,0"/>						
            <label style="margin-left:20px;" for="cProfund">Profundidade(m)</label>
            <input value="<?php echo $banq->getProfund(); ?>"type="text" required="" name ="tProfund" id="cProfund" class="align" size= "5"placeholder="0,00"/>        
            <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /><br><br><br>
            <?php
        if ($banq->getId_banqueta() == 0) {
            ?>
            <?php
        } else {
            ?>          
            <input style="margin-left: 240px;width: 100px;height: 28px;"  class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
            <input style="width: 100px;height: 28px;"  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>          
            <?php } ?>
        </form><br>
    <h2>Registos activos</h2>  
    <form class="tab" name='tab'method="post">
        <input type="text" name="banq" id='banq' placeholder="ID Estrada" style= "width: 120px;" />
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
    </form>  
    <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
        <tr> 
            <td class="title" align="center" >ID</td>
            <td class="title" align="center" >Alteração</td> 
            <td class="title" align="center" >Registo</td>
            <td class="title" align="center" >ID Talude</td>   
            <td class="title" align="center" >ID Estrada</td>   
            <td class="title" align="center" >Banqueta</td>
            <td class="title" align="center" >Dist ao pé<br>do Talude</td> 
            <td class="title" align="center" >Comprt.</td> 
            <td class="title" align="center" >Largura.</td> 
            <td class="title" align="center" >Drenagem<br>em crista</td> 
            <td class="title" align="center" >Material</td> 
            <td class="title" align="center" >Larg.<br>Dren.crista</td> 
            <td class="title" align="center" >Comp.<br>Dren.crista</td> 
            <td class="title" align="center" >Profund.</td>
            <td class="title" align="center" >Arquivo</td>
            <td class="title" align="center" >Data</td>  
        </tr>         
        <?php
        $valor = ""; //Localizar registo
        if (filter_input(INPUT_POST, 'localizar')) {
            $valor = filter_input(INPUT_POST, 'banq');
        }
        $cx = new Conexao();
        $dalbanqueta = new DALBanqueta($cx);
        $resultado = $dalbanqueta->LocalizarRect($valor);
        While ($registo = $resultado->fetch_array()) {
            $linkalterar = 'alterar_main.php?pg=banqueta&op=alterar&cod=' . $registo['id_banqueta'];
            $linkexcluir = 'alterar_main.php?pg=banqueta&op=excluir&cod=' . $registo['id_banqueta'];
            ?>  
            <tr>                      
                <td class="tab" width="1%"align="center"><?php echo $registo["id_banqueta"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                <td class="tab"width="1%"align="center"><?php echo $registo["id_talude"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                <td class="tab"width="1%"align="center"><?php echo $registo["banqueta"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["dstpetal"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["compt"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["largura"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["drcrista"]; ?></td>
                <td class="tab"width="1%"><?php echo $registo["material"]; ?></td>
                <td class="tab"width="1%" align="center"><?php echo $registo["lrgdrcrista"]; ?></td> 
                <td class="tab"width="1%" align="center"><?php echo $registo["cptdrcrista"]; ?></td>
                <td class="tab"width="1%" align="center"><?php echo $registo["profund"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["arq"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["data_arq"]; ?></td>
                <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>             
            </tr>
            <?php
        }
        ?>
    </table><br>
    <a style="font-size: 11pt;" id="voltar"style="text-align:center;" href="alterar_main.php?pg=banqueta">| INÍCIO |</a>
    <footer>
        <?php include_once '../estrutura/footer.php'; ?>   
    </footer>
</body>
</html>

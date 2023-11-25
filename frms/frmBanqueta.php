<!DOCTYPE html>
<html>
      <?php session_start()?>
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
//Inserir registo
        $banq = new Banqueta();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
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
            $banq = new Banqueta(0,$alt,$reg, $id_talude, $id_estrada, $data, $hora, $banqueta, $dstpetal, $compt, $largura, $drcrista, $material, $lrgdrcrista, $cptdrcrista, $profund, $ass);
            $cx = new Conexao();
            $dalbanqueta = new DALBanqueta($cx);
            $dalbanqueta->Inserir($banq);
            $banq = new Banqueta();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }
//Alterar registo
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
            $conexao = new Conexao();
            $dalbanqueta = new DALBanqueta($conexao);
            $banq = new Banqueta($id_banqueta,$alt,$reg, $id_talude, $id_estrada, $data, $hora, $banqueta, $dstpetal, $compt, $largura, $drcrista, $material, $lrgdrcrista, $cptdrcrista, $profund, $ass);
            $dalbanqueta->Alterar($banq);
            $banq = new Banqueta();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalbanqueta = new DALBanqueta($conexao);
            $retorno = $dalbanqueta->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalbanqueta = new DALBanqueta($conexao);
            $banq = $dalbanqueta->CarregaBanqueta(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
    <?php include_once '../estrutura/header.php'; ?>
    <body> 
        <h1 class="op">REGISTAR - Banqueta</h1>
         <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:430px;"method="post" id="banq" name="banqueta" action="../estrutura/levantamento_main.php?pg=banqueta&op=listar" >
            <fieldset style="width:350px;height:20px;padding: 20px;margin-bottom: 10px;border:2px groove ;">
                <label style="color:brown;margin-left: 20px;" id="talude">TALUDE</label>               
                &nbsp;&nbsp;&nbsp;&nbsp<input type="button"class="cmd"id="cCurso" value="Registos em Curso" name ="tCurso" onclick= "location.href = '../tabelas/tabTaludeEmCurso.php'"target="_blank"/>
                <input type="button"class="cmd"id="cAnt" value="Registos Anteriores" name ="tAnt" onclick= "location.href = '../tabelas/tabTaludeAnterior.php'"/>
            </fieldset>
            <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />              
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />               

            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select value="<?php echo $banq->getAlt(); ?>" class="alt" name ="tAlterar" id="cAlterar">
                    <option selected>0</option>    
                    <option>1</option></select>
                &nbsp;<label  for="cReg">Registo</label>
                <input value="<?php echo $banq->getReg(); ?>"value=""type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>       
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $banq->getId_estrada(); ?>"autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/>
            <p><label class="label_1" id= "lbTalude" for="cId_talude">ID Talude</label>
                <input value="<?php echo $banq->getId_talude(); ?>"autofocus required type="text" name ="tId_talude" id="cId_talude" class="align"size= "5"/>	
            <p><label class="label_1"for="cBanqueta" >Banqueta</label>
                <select value="<?php echo $banq->getBanqueta(); ?>" required name ="tBanqueta" id="cBanqueta">
                    <option>B1</option>
                    <option>B2</option>
                    <option>B3</option>
                    <option>B4</option>
                    <option>B5</option>
                    <option>B6</option>
                    <option>B7</option>
                    <option selected ></option></select>                    
            <p><label  class="label_1"for="cDstpetal">Distância ao pé de Talude(m)</label>
                <input value="<?php echo $banq->getDstpetal(); ?>"type="text" required="" name ="tDstpetal" id="cDstpetal" class="align" size= "5"placeholder="000,0"/>
            <p><label  class="label_1"for="cCompt">Comprt. da Banqt.(m)</label>
                <input value="<?php echo $banq->getCompt(); ?>"type="text" required="" name ="tCompt" id="cComp" class="align"size= "5"placeholder="000,0"/>                    
                <label style="margin-left:65px;"for="cLargura">Largura da Banqut.(m)</label>
                <input value="<?php echo $banq->getLargura(); ?>"type="text" required="" name ="tLargura" id="cLargura" class="align"size= "5"placeholder="00,0"/>                    
                &nbsp;<label style="margin-left:35px;" for="cMaterial">Material</label>                             
                <select name="tMaterial" id="cMaterial">                   
                    <option value="Pedra">Pedra  </option> 
                    <option value="Metal">Metal</option> 
                    <option value="Betão">Betão</option>                 
                    <option value="Polipropileno">Polipropileno</option>                
                    <option selected=""></option>                 
                </select>                       
        <p><label  class="label_1" for="cDrcrista">Drenagem em Crista</label>
            <select value="<?php echo $banq->getDrcrista(); ?>"style="width:103px;"required=""  name ="tDrcrista" id="cDrcrista" />
            <option value="V">V</option>
            <option value="U">U</option>
            <option value="Meia-cana">Meia-cana</option>						
        <option selected></option></select>		
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
        <input style="margin-left:220px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
            <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabbanqueta'"/>
            <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
            <?php
        } else {
            ?>  
            <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
            <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
            <input type="text" hidden="" name="tId_banqueta" id="id_banq" value="<?php echo $banq->getId_banqueta(); ?>"/>
 <?php } ?> 
        </form><br>
        <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>     
    <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
        <tr> 
            <td class="title" align="center" >ID</td>
            <td class="title" align="center" >Alteração</td> 
            <td class="title" align="center" >Registo</td>  
            <td class="title" align="center" >Hora</td>
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
        </tr>         
        <?php
        $valor = ""; //Localizar registo
        if (filter_input(INPUT_POST, 'localizar')) {
            $valor = filter_input(INPUT_POST, 'banq');
        }
        $cx = new Conexao();
        $dalbanqueta = new DALBanqueta($cx);
        $resultado = $dalbanqueta->Localizar($valor);
        While ($registo = $resultado->fetch_array()) {
            $linkexcluir = 'levantamento_main.php?pg=banqueta&op=excluir&cod=' . $registo['id_banqueta'];
            $linkalterar = 'levantamento_main.php?pg=banqueta&op=alterar&cod=' . $registo['id_banqueta'];
            ?>  
            <tr>                      
                <td class="tab" width="1%"align="center"><?php echo $registo["id_banqueta"]; ?></td>
                <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>
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
                <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                       
            </tr>
            <?php
        }
        ?>
    </table>
        <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
    <footer>
        <?php include_once '../estrutura/footer.php'; ?>      
    </footer>
</body>
</html>

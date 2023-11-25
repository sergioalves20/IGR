<!DOCTYPE html>
<!--canoa2018-->
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contagem de tráfego</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <style type="text/css" media="all">		
            .label_1{width:90px;float:left;display:block}	
            select#cSentido{width:100px; height:25px;}
            iframe#tab{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}       
            form#cont{width:900px;height: 880px;}
        </style> 
          <?php
            require_once '../classes/Conexao.php';
            require_once '../classes/EstradaFicha.php';
            require_once '../classes/CTrafego.php';
            require_once '../classes/DALCTrafego.php';
//Inserir registo
            $ctrafego = new CTrafego();
            if (filter_has_var(INPUT_POST, 'tGuardar')) {
                $alt = filter_input(INPUT_POST, 'tAlterar');
                $reg = filter_input(INPUT_POST, 'tReg');
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $id_trecho = filter_input(INPUT_POST, 'tId_trecho');
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $maquina = filter_input(INPUT_POST, 'tMaquina');
                $id_posto = filter_input(INPUT_POST, 'tId_posto');
                $altsolo = filter_input(INPUT_POST, 'tAltsolo');
                $disteixo = filter_input(INPUT_POST, 'tDisteixo');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $horai = filter_input(INPUT_POST, 'tHorai');
                $horaf = filter_input(INPUT_POST, 'tHoraf');
                $datai = filter_input(INPUT_POST, 'tDatai');
                $dataf = filter_input(INPUT_POST, 'tDataf');
                $ndias = filter_input(INPUT_POST, 'tNdias');
                $vmedia = filter_input(INPUT_POST, 'tVmedia');
                $lig = filter_input(INPUT_POST, 'tLig');
                $pes = filter_input(INPUT_POST, 'tPes');
                $tmda = filter_input(INPUT_POST, 'tTmda');
                $ass = filter_input(INPUT_POST, 'tAss');
                $ctrafego = new Ctrafego(0,$alt,$reg, $id_estrada, $id_trecho, $data, $hora, $maquina, $id_posto, $altsolo, $disteixo, $sentido, $horai, $horaf, $datai, $dataf, $ndias, $vmedia, $lig, $pes, $tmda, $ass);
                $cx = new Conexao();
                $dal = new DALCtrafego($cx);
                $dal->Inserir($ctrafego);
                echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            $ctrafego = new CTrafego();   
            }
//Inserir registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_ctrafego = filter_input(INPUT_POST, 'tId_ctrafego');
                $alt = filter_input(INPUT_POST, 'tAlterar');
                $reg = filter_input(INPUT_POST, 'tReg');
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $id_trecho = filter_input(INPUT_POST, 'tId_trecho');
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $maquina = filter_input(INPUT_POST, 'tMaquina');
                $id_posto = filter_input(INPUT_POST, 'tId_posto');
                $altsolo = filter_input(INPUT_POST, 'tAltsolo');
                $disteixo = filter_input(INPUT_POST, 'tDisteixo');
                 $altitude = filter_input(INPUT_POST, 'tAltitude');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $horai = filter_input(INPUT_POST, 'tHorai');
                $horaf = filter_input(INPUT_POST, 'tHoraf');
                $ndias = filter_input(INPUT_POST, 'tNdias');
                $vmedia = filter_input(INPUT_POST, 'tVmedia');
                $lig = filter_input(INPUT_POST, 'tLig');
                $pes = filter_input(INPUT_POST, 'tPes');
                $tmda = filter_input(INPUT_POST, 'tTmda');
                $ass = filter_input(INPUT_POST, 'tAss');
                $ctrafego = new Ctrafego($id_ctrafego,$alt,$reg, $id_estrada, $id_trecho, $data, $hora, $maquina, $id_posto, $altsolo, $disteixo, $sentido, $horai, $horaf, $datai, $dataf, $ndias, $vmedia, $lig, $pes, $tmda, $ass);
                $cx = new Conexao();
                $dal = new DALCtrafego($cx);
                $dal->Inserir($ctrafego);
                echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            $ctrafego = new CTrafego();   
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALCtrafego($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALCtrafego($conexao);
            $ctrafego = $dal->CarregaCTrafego(filter_input(INPUT_GET, 'cod'));
        }
            ?>
    </head> 
    <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Contagem de tráfego</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
              <form method="post" name="cont" onsubmit="return pk()" id="cont" action="../estrutura/levantamento_main.php?pg=ctrafego&op=listar"> 
                <input  style="margin-left:65px;"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true"/>               
                <p><label class="" for="cAlterar">Alteração</label>
                    <select class="alt" name ="tAlterar" id="cAlterar">
                        <option>1</option>
                        <option>0</option>
                        <option selected><?php echo $ctrafego->getAlt(); ?></option></select>                   
                    <label  for="cReg">Registo</label>
                    <input value="<?php echo $ctrafego->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>               
                    <label class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $ctrafego->getId_estrada(); ?>" type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>               
                    <label class="" for="cId_trecho"> ID Trecho</label>
                    <input value="<?php echo $ctrafego->getId_trecho(); ?>" type="text" name ="tId_trecho" id="cId_trecho" class="align"size= "5"/>     
                    <label class="" for="cMaquina"> Máquina</label>
                <input value="<?php echo $ctrafego->getMaquina(); ?>" type="text" name =tMaquina" id="cMaquina" class="align"size= "5"/><br><br>                
                <!-------------------------------------------------------------------------------------------------------->    
                <iframe  id="tab" src="../tabelas/tabTrechoSelect.php" name="janela" ></iframe>
                <!--------------------------------------------------------------------------------------------------------> 
                <p><label class=""placeholder="0"for="cIdPosto"> ID Posto</label>
                    <input value="<?php echo $ctrafego->getId_posto(); ?>"type="text" name ="tId_posto" id="cId_posto" class="align"size= "5"/>	
                    &nbsp;&nbsp;<label for="cAltsolo">Altura do Solo</label>
                    <input value="<?php echo $ctrafego->getAltsolo(); ?>"type="text" name ="tAltsolo" id="cAlts" class="align"size= "5"placeholder="0,00"/>
                    &nbsp;&nbsp;&nbsp;<label for="cDisteixo">Dist. ao Eixo</label>
                    <input value="<?php echo $ctrafego->getDisteixo(); ?>"type="text" name ="tDisteixo" id="cDistx" class="align"size= "5"placeholder="0,00"/>
                    <label for="cSentido">Sentido</label>
                    <select class="alt" name ="tSentido" id="cSentido">
                        <option>Crescente</option>
                        <option>Decrescente</option>
                        <option selected><?php echo $ctrafego->getSentido(); ?></option></select><br><br> 
                 <!-------------------------------------------------------------------------------------------------------->         
                 <iframe  id="tab" src="../tabelas/tabPContagemSelect.php" name="janela" ></iframe>
                  <!-------------------------------------------------------------------------------------------------------->    
                <p><label class="label_1"for="cDatai">Data Início</label>
                    <input type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tDatai" id="cDatai" class="align" size= "7"/>
                    <label style="margin-left:30px;" for="cHorai">Hora Início</label>	
                    <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHorai" id="cHorai" class="align" size= "7"/>
                <p><label class="label_1"for="cDataf">Data Fim</label>
                    <input type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tDataf" id="cDataf" class="align" size= "7"/>
                    <label style="margin-left:38px;"for="cHoraf">Hora Fim</label>	
                    <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHoraf" id="cHoraf" class="align" size= "7"/>
                <p><label class="label_1"for="cNdias">Nº Dias</label>
                    <input value="<?php echo $ctrafego->getNdias(); ?>"type="text" name ="tNdias" id="cNdias" class="align"size= "7"placeholder="0"/>
                    <label style="margin-left:30px;"for="cVmedia">Vel. Média</label>
                    <input value="<?php echo $ctrafego->getVmedia(); ?>"type="text" name ="tVmedia" id="cVmedia" class="align"size= "7"placeholder="0"/>	
                <p><label class="label_1"for="cLig">Veículos Catg. 1</label>
                    <input value="<?php echo $ctrafego->getLig(); ?>" type="text" name ="tLig" id="cLig" class="align"size= "7"placeholder="0"/>	
                    <label for="cC2">Veículos Catg. 2</label>
                    <input value="<?php echo $ctrafego->getPes(); ?>"type="text" name ="tPes" id="cPes" class="align"size= "7"placeholder="0"/>
                <p><label class="label_1"for="cTmda">T.M.D.A.</label>
                    <input value="<?php echo $ctrafego->getTmda(); ?>"type="text" name ="tTmda" id="cTmda" class="align"size= "7"placeholder="0"/><br><br>
                    <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>"name="tAss"id="cAss"</>                  
            <div style=" height: 25px; padding: 5px; width: 880px; margin: 0 auto;"id="botoes">                   
             <?php        
                if ($ctrafego->getId_ctrafego() == 0) {
                    ?>                  
                    <input style="margin-left:250px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabctrafego'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text"hidden="" name="tId_ctrafego" id="tId_ctrafego" value="<?php echo $ctrafego->getId_ctrafego(); ?>"/> 
                <?php } ?>
                    </div>
            </form>
        <br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>  
            <table id="est" style="margin: 0 auto;" accept-charset="UTF-8" width ="120%" border="1" class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alt.</td>
                <td class="title" align="center" >Registo</td>
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td> 
                <td class="title" align="center" >ID Trecho</td> 
                <td class="title" align="center" >Máquina</td>
                <td class="title" align="center" >ID Posto</td>
                <td class="title" align="" >Alt.Solo</td>
                <td class="title" align="" >Dist. Ao Eixo</td>
                <td class="title" align="center" >Altitude</td> 
                <td class="title" align="" >Sentido</td>
                <td class="title"colspan="2" align="center" >Início</td>
                <td class="title"colspan="2" align="center" >Fim</td>
                <td class="title" align="center" >NºDias</td>
                <td class="title" align="center" >Veloc.Média</td>
                <td class="title" align="center" >Cat.1(Lig)</td>
                <td class="title" align="center" >Cat2(Pes)</td>
                <td class="title" align="center" >T.M.D.A.</td>  
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tId_ctrafego');
            }
            $cx = new Conexao();
            $dal = new DALCtrafego($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=ctrafego&op=excluir&cod=' . $registo['id_ctrafego'];
                $linkalterar = 'levantamento_main.php?pg=ctrafego&op=alterar&cod=' . $registo['id_ctrafego'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_ctrafego"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["maquina"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_posto"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altsolo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["disteixo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["datai"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["horai"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["dataf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["horaf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["ndias"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["vmedia"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lig"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pes"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["tmda"]; ?></td>
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                               
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

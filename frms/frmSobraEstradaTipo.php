<!DOCTYPE html>

<html>
    <?php session_start()?>   
    <head>
        <meta charset="UTF-8">
        <title>Tipo de pavimento da Faixa de rodagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/fxrod.js"></script>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style type="text/css" media="all">
            .label_1{width:130px;float:left;display:block}	
            select#cPedra{width:150px;height:25px;}
            select#cRevsuperf{width:150px;height:25px;}
            select#cBb{width:150px;height:25px;}
            select#cSentido{height:25px;}
            select#cBclas{height:25px;}
            select#cTerrabat{height:25px;}
            iframe#sobra{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
        </style>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/SobraEstradaTipo.php';
        require_once '../classes/DALSobraEstradaTipo.php';
      
        //Inserir registo
            $sobratipo = new SobraTipo();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_sobra = filter_input(INPUT_POST, 'tId_sobra');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $altitd_pki = filter_input(INPUT_POST, 'tAltitd_pki');
            $lat_ci = filter_input(INPUT_POST, 'tLat_ci');
            $lat_ni = filter_input(INPUT_POST, 'tLat_ni');
            $long_ci = filter_input(INPUT_POST, 'tLong_ci');
            $long_ni = filter_input(INPUT_POST, 'tLong_ni');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $altitd_pkf = filter_input(INPUT_POST, 'tAltitd_pkf');
            $lat_cf = filter_input(INPUT_POST, 'tLat_cf');
            $lat_nf = filter_input(INPUT_POST, 'tLat_nf');
            $long_cf = filter_input(INPUT_POST, 'tLong_cf');
            $long_nf = filter_input(INPUT_POST, 'tLong_nf');
            $terrabat = filter_input(INPUT_POST, 'tTerrabat');
            $pedra = filter_input(INPUT_POST, 'tPedra');
            $revsuperf = filter_input(INPUT_POST, 'tRevsuperf');
            $bb = filter_input(INPUT_POST, 'tBb');
            $bclas = filter_input(INPUT_POST, 'tBclas');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            
            $cx = new Conexao();
            $dal = new DALSobraEstradaTipo($cx);
            $sobratipo = new SobraTipo(0,$alt,$reg, $id_sobra, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $terrabat, $pedra, $revsuperf, $bb, $bclas, $sentido, $ass);        
            $dal->Inserir($sobratipo);
            $sobratipo = new SobraTipo();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }
        //Alterar registo
         if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_sobratipo = filter_input(INPUT_POST, 'tId_sobratipo'); 
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_sobra = filter_input(INPUT_POST, 'tId_sobra');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $altitd_pki = filter_input(INPUT_POST, 'tAltitd_pki');
            $lat_ci = filter_input(INPUT_POST, 'tLat_ci');
            $lat_ni = filter_input(INPUT_POST, 'tLat_ni');
            $long_ci = filter_input(INPUT_POST, 'tLong_ci');
            $long_ni = filter_input(INPUT_POST, 'tLong_ni');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $altitd_pkf = filter_input(INPUT_POST, 'tAltitd_pkf');
            $lat_cf = filter_input(INPUT_POST, 'tLat_cf');
            $lat_nf = filter_input(INPUT_POST, 'tLat_nf');
            $long_cf = filter_input(INPUT_POST, 'tLong_cf');
            $long_nf = filter_input(INPUT_POST, 'tLong_nf');
            $terrabt = filter_input(INPUT_POST, 'tTerrabt');
            $pedra = filter_input(INPUT_POST, 'tPedra');
            $revsuperf = filter_input(INPUT_POST, 'tRevsuperf');
            $bb = filter_input(INPUT_POST, 'tBb');
            $bclas = filter_input(INPUT_POST, 'tBclas');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');

            $sobratipo = new SobraTipo($id_sobratipo,$alt,$reg, $id_sobra, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $terrabt, $pedra, $revsuperf, $bb, $bclas, $sentido, $ass);
            $cx = new Conexao();
            $dal = new DALSobraEstradaTipo($cx);
            $dal->Alterar($sobratipo);
            $sobratipo = new SobraTipo();          
        }
        //Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALSobraEstradaTipo($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
        //Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALSobraEstradaTipo($conexao);
            $sobratipo = $dal->CarregaSobratipo(filter_input(INPUT_GET, 'cod'));
        }
        ?>       
    </head>
     <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Tipo de pavimento da Sobra de Estrada</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/admin_main.php?pg=levantamento'>|VOLTAR|</a>
        <form style="width:900px;height: 550px;" method="post" name="sobratipo" onsubmit="return pk()"id="sobratipo " action="../estrutura/levantamento_main.php?pg=sobratipo&op=listar">
            <input style="margin-left: 140px" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input style="margin-left:3px;" type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />		
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $sobratipo->getAlt(); ?></option></select>
                 <label  for="cReg">Registo</label>
                 <input value="<?php echo $sobratipo->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
            <p><label class="label_1"for="cId_estrada"> ID Estrada</label>
                <input value="<?php echo $sobratipo->getId_estrada(); ?>"type="text" required="" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
            <p><label class="label_1"for="cId_sobra"> ID Sobra</label>
                <input value="<?php echo $sobratipo->getId_sobra(); ?>"required="" type="text" name ="tId_sobra" id="cId_fxrod" class="align"size= "5"/><br><br>
               <!-- <iframe  id="sobra" src="../tabelas/tabSobraEstrada.php" name="janela" ></iframe><br><br>-->
              <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
                <p><label class="label_1"for="cPkinicio"style="color:brown;">pk Início</label>
                    <input value="<?php echo $sobratipo->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left:17px;" for="cAltitd_pki">Altitude(m)</label>
                     &nbsp;&nbsp;<input value="<?php echo $sobratipo->getAltitd_pki(); ?>"type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                    <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
                <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                    <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input value="<?php echo $sobratipo->getLat_ci(); ?>"charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $sobratipo->getLat_ni(); ?>"type="text"  required=" "name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                    <input type="button" class="botao" name ="tGravarLat"  id="cGravarLati" onclick ="coordLati()"/>
                    <!----------------------------------------------------------------------------->
                <p><label class="label_1" for="cLongitudeGi">Longitude</label> 
                    <input type="text"  name ="tLongitudeGi" id="cLongitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>	
                    <input type="text"  name ="tLongitudeMi" id="cLongitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text"  name ="tLongitudeSi" id="cLongitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLongitude"></label>
                    <input value="<?php echo $sobratipo->getLong_ci(); ?>"type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input value="<?php echo $sobratipo->getLong_ni(); ?>"type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/>
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
                <p><label class="label_1"for="cPkfim" style="color:brown;">pk Fim</label>
                    <input value="<?php echo $sobratipo->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left:17px;" for="cAltitd_pkf">Altitude(m)</label>
                    &nbsp;&nbsp;<input value="<?php echo $sobratipo->getAltitd_pkf(); ?>"type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/><br><p>	
                    <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
                <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                    <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitudef"></label>					
                    <input value="<?php echo $sobratipo->getLat_cf(); ?>"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $sobratipo->getLat_nf(); ?>"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                    <input type="button" class="botao" name ="tGravarLat"  id="cGravarLatf" onclick ="coordLatf()"/>
                    <!----------------------------------------------------------------------------->
                <p><label class="label_1" for="cLongitudeGf">Longitude</label> 
                    <input type="text" name ="tLongitudeGf" id="cLongitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>	
                    <input type="text" name ="tLongitudeMf" id="cLongitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLongitudeSf" id="cLongitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLongitudef"></label>
                    <input value="<?php echo $sobratipo->getLong_cf(); ?>"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeNf"></label>
                    <input value="<?php echo $sobratipo->getLong_nf(); ?>"type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/>				
                    <!--------------------------------------------------------------------------------------------------------------------------------->        
            <p><label class="label_1"for="cTerrabat" >Terra batida</label>
                <select onchange="terrabt()"name ="tTerrabat" id="cTerrabat" >                     
                    <option>1</option>
                    <option selected><?php echo $sobratipo->getTerrabat(); ?></option></select>
            <p><label class="label_1"for="cPedra">Pedra</label>
                <select onchange="pedra()"  name ="tPedra" id="cPedra">					
                    <option>Paralelepípedos</option>
                    <option>Calçada portuguesa</option>
                    <option>Empedramento</option>
                    <option selected><?php echo $sobratipo->getPedra(); ?></option></select>
            <label class=""for="cRevsuperf">Revest. superficial</label>
                <select onchange="revsupf()" name ="tRevsuperf" id="cRevsuperf">					
                    <option>Simples</option>
                    <option>Duplo</option>
                    <option selected><?php echo $sobratipo->getRevsuperf(); ?></option></select>
            <label class=""for="cBb">Betão betuminoso</label>
                <select onchange="bb()"  name ="tBb" id="cBb">					
                    <option>Quente</option>
                    <option>Frio</option>
                    <option selected><?php echo $sobratipo->getBb(); ?></option></select>
            <p><label class="label_1"for="cBclas">Betão de cimento(LAS)</label>
                <select onchange="bclas()"  name ="tBclas" id="cBclas">
                    <option>1</option>
                    <option selected><?php echo $sobratipo->getBclas(); ?></option></select>
            <p><label class="label_1"for="cSentido">Sentido</label>
                <select  name ="tSentido" id="cSentido" required="true">
                    <option value="Crescente">Crescente</option>
                    <option value="Decrescente">Decrescente</option>
                    <option selected><?php echo $sobratipo->getSentido(); ?></option></select>
                 <input style="margin-left:50px;" type="button" class="botao1" onclick="limpatipo()">
                <br><br>	
                  <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($sobratipo->getId_sobratipo() == 0){
                    ?>
                   <input style="margin-left:325px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabsobratipo'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_sobratipo" id="id_fxrodtipo" value="<?php echo $sobratipo->getId_sobratipo(); ?>"/>          
                <?php } ?>
                    <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" />             
        </form><br> 
           <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
        <table id="est" accept-charset="UTF-8" width ="130%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID Tipo</td>
                <td class="title" align="center" >ID Sobra</td>
                <td class="title" align="center" >Alteração</td> 
                <td class="title" align="center" >Registo</td>  
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title" colspan="2" align="center" >Latitude</td>
                <td class="title" colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title" colspan="2" align="center" >Latitude</td> 
                <td class="title" colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Terra Batida</td>
                <td class="title" align="center" >Pedra</td>
                <td class="title" align="center" >Rev.Supf.</td>
                <td class="title" align="center" >B.B.</td>
                <td class="title" align="center" >BCLas</td>
                <td class="title" align="center" >Sentido</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'sobratipo');
            }
            $cx = new Conexao();
            $dal = new DALSobraEstradaTipo($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=sobratipo&op=excluir&cod=' . $registo['id_sobratipo'];
                $linkalterar = 'levantamento_main.php?pg=sobratipo&op=alterar&cod=' . $registo['id_sobratipo'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_sobratipo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_sobra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["terrabat"]; ?></td>
                    <td class="tab"width="3%"><?php echo $registo["pedra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["revsuperf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bb"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bclas"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>  
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>";                                        
                </tr>
                <?php
            }
            ?>
        </table>
           <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>

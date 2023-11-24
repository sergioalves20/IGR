<!DOCTYPE html>
<html>
    <!--smsa.2018-->
    <?php //ini_set('display_errors','1');?>
    <?php session_start(); ?>  
    <head>
        <meta charset="UTF-8">
        <title>Patologia</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <script type="text/javascript" src="../js/fxrod.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Patologia.php';
        require_once '../classes/DALPatologia.php';
        date_default_timezone_set('Atlantic/Azores');
        $patolog = new Patologia();
//Retificar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_patolog = filter_input(INPUT_POST,'tId_patolog');
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
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
            $grupo = filter_input(INPUT_POST, 'tGrupo');
            $id_talude = filter_input(INPUT_POST, 'tId_talude');
            $banq = filter_input(INPUT_POST, 'tBanq');
            $via = filter_input(INPUT_POST, 'tVia');
            $brm = filter_input(INPUT_POST, 'tBrm');
            $sobra = filter_input(INPUT_POST, 'tSobra');
            $pass = filter_input(INPUT_POST, 'tPass');
            $sentido = filter_input(INPUT_POST, 'tSentido');  
            $id_item = filter_input(INPUT_POST, 'tId_item');
            $foto1 = filter_input(INPUT_POST, 'tFoto1');
            $foto2 = filter_input(INPUT_POST, 'tFoto2');
            $ass = filter_input(INPUT_POST, 'tAss');
            $arq = filter_input(INPUT_POST, 'tArq');
            $data_arq = filter_input(INPUT_POST, 'tData_arq');
            $conexao = new Conexao();
            $dalpatolog = new DALPatologia($conexao);
            $patolog = new Patologia($id_patolog, $alt, $reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $grupo,$id_talude,$banq, $via, $brm, $sobra, $pass, $sentido, $id_item, $foto1, $foto2, $ass,$arq,$data_arq);          
            $dalpatolog->Rectificar($patolog);
            $patolog = new Patologia();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalpatolog = new DALPatologia($conexao);
            $retorno = $dalpatolog->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Retificar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalpatolog = new DALPatologia($conexao);
            $patolog = $dalpatolog->CarregaPatologiasRect(filter_input(INPUT_GET, 'cod'));
        }
        ?>
    </head>
     <?php include_once '../estrutura/header.php';?>   
    <body>
        <h1 class="op">ALTERAR Patologia</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>
        <form style="width:900px;height: 860px;" method="post" onsubmit="return pk()" name="patolog" id="patolog" action="../estrutura/alterar_main.php?pg=patologia&op=listar">
                 <p><label class="label_1" for="cId_patolog">ID Patologia</label>
                <input style="background-color:#ccffcc;border-style: none;height: 25px;color:#7F7F7F;" type="text" use readonly="true"  name="tId_patolog" id="cId_patolog" value="<?php echo $patolog->getId_patolog(); ?>"class="align" size="6"/>            
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" type="text" value= '<?php echo $patolog->getData(); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" value= '<?php echo $patolog->getHora(); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
           <hr>                
                <p><label class="label_1" for="cAlterar">Alteração</label>
                    <select value="<?php echo $patolog->getAlt(); ?>"class="alt" name ="tAlterar" id="cAlterar">
                        <option selected>0</option>
                        <option>1</option><?php echo $patolog->getAlt(); ?></select>
                       &nbsp;<label  for="cReg">Registo</label>
                       <input value="<?php echo $patolog->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"required=""/>   
                 <label class="" for="cArq">Arquivar</label>
                <select   class="alt" name ="tArq" id="cArq">
                    <option  selected="">0</option>
                    <option>1</option><?php echo $patolog->getArq(); ?></select>          
                &nbsp;<label  for="cData_arq">Data</label>
                <input style="height: 20px"value="<?php echo $patolog->getData_arq(); ?>" type="date" name ="tData_arq"  id="cData_arq" class="align" size= "6"/>
                <p><label class="label_1"for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $patolog->getId_estrada(); ?>"required="" type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
                    <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
                <p><label class="label_1"for="cPkinicio">pk Início</label>
                    <input value="<?php echo $patolog->getPkinicio(); ?>"required="" type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0,000"/>
                    &nbsp;&nbsp;<label for="cAltitd_pki">Altitude(m)</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $patolog->getAltitd_pki(); ?>"type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                    <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
                <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                    <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input value="<?php echo $patolog->getLat_ci(); ?>"charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $patolog->getLat_ni(); ?>"type="text"  required=" "name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00,00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $patolog->getLong_ci(); ?>"type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input value="<?php echo $patolog->getLong_ni(); ?>"type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00,00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/>
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
                <p><label class="label_1"for="cPkfim">pk Fim</label>
                    <input value="<?php echo $patolog->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0,000"/>
                    &nbsp;&nbsp;<label for="cAltitd_pkf">Altitude(m)</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $patolog->getAltitd_pkf(); ?>"type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/>
                
                <input class="cmd" type="button" name="replicar" value="Replicar pk Início" style="background-color: #CD950C;height: 25px;width: 120px;margin-left:10px;border-radius: 3px;" onclick="rep()"><br><p>
                    <script>
                    function rep(){
                     document.getElementById('cPkfim').value = document.getElementById('cPkinicio').value;
                     document.getElementById('cAltitd_pkf').value = document.getElementById('cAltitd_pki').value;   
                     document.getElementById('cLatitudeGf').value = document.getElementById('cLatitudeGi').value;
                     document.getElementById('cLatitudeMf').value = document.getElementById('cLatitudeMi').value;
                     document.getElementById('cLatitudeSf').value = document.getElementById('cLatitudeSi').value;
                     document.getElementById('cLongitudeGf').value = document.getElementById('cLongitudeGi').value;
                     document.getElementById('cLongitudeMf').value = document.getElementById('cLongitudeMi').value;
                     document.getElementById('cLongitudeSf').value = document.getElementById('cLongitudeSi').value;
                 }
                </script>
                    <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
                <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                    <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitudef"></label>					
                    <input value="<?php echo $patolog->getLat_cf(); ?>"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $patolog->getLat_nf(); ?>"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00,00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $patolog->getLong_cf(); ?>"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeNf"></label>
                    <input value="<?php echo $patolog->getLong_nf(); ?>"type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00,00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/><br><br>				
                    <!--------------------------------------------------------------------------------------------------------------------------------->
                            <script>               
                               function pat() {
                                var option = document.getElementById("cGrupo").value;
                                 if (option === "Pavimento") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=false;
                                    document.getElementById('cVia').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=false;
                                    document.getElementById('cBrm').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=false;
                                    document.getElementById('cSobra').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cPass').value="";
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                if (option === "Talude") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = false;
                                    document.getElementById('cId_talude').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                               
                                if (option === "Caleiras e valetas de pé de talude") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                if (option === "Passagens hidráulicas") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=true;
                                    document.getElementById('cSentido').style.backgroundColor = '#CDCDB4';
                                }
                                 if (option === "Muros") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                 if (option === "Obras de arte") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=true;
                                    document.getElementById('cSentido').style.backgroundColor = '#CDCDB4';
                                }
                                 if (option === "Guardas de segurança") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                
                                if (option === "Pavimentos em betão (linhas de água à superfície)") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=false;
                                    document.getElementById('cVia').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=false;
                                    document.getElementById('cSobra').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cPass').value="";
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                 if (option === "Sinalização horizontal") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=false;
                                    document.getElementById('cPass').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=true;
                                    document.getElementById('cSentido').style.backgroundColor = '#CDCDB4';
                                }
                                 if (option === "Sinalização vertical") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                if (option === "Caleiras e valetas de crista") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled=false;
                                    document.getElementById('cId_talude').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=false;
                                    document.getElementById('cBanq').style.backgroundColor = '#FFFFFF';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=true;
                                    document.getElementById('cSentido').style.backgroundColor = '#CDCDB4';
                                }
                               
                                 if (option === "Delineadores") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                if (option === "Marcadores") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                                if (option === "Caleiras e valetas de plataforma") {
                                    document.getElementById('cId_talude').value="";
                                    document.getElementById('cId_talude').disabled = true;
                                    document.getElementById('cId_talude').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cId_talude').style.border ="1px solid #A8A8A8";
                                    document.getElementById('cBanq').value="";
                                    document.getElementById('cBanq').disabled=true;
                                    document.getElementById('cBanq').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cVia').value="";
                                    document.getElementById('cVia').disabled=true;
                                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cBrm').value="";
                                    document.getElementById('cBrm').disabled=true;
                                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSobra').value="";
                                    document.getElementById('cSobra').disabled=true;
                                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cPass').value=""
                                    document.getElementById('cPass').disabled=true;
                                    document.getElementById('cPass').style.backgroundColor = '#CDCDB4';
                                    document.getElementById('cSentido').value="";
                                    document.getElementById('cSentido').disabled=false;
                                    document.getElementById('cSentido').style.backgroundColor = '#FFFFFF';
                                }
                            }
                            </script>
               <label class="label_1" for="cGrupo">Grupo</label>
               <select required="" name="tGrupo" id="cGrupo"  style="height:25px;" value="<?php echo $patolog->getGrupo(); ?>"  onclick ="pat();">	
                        <option value="Pavimento">Pavimento</option>
                        <option value="Talude">Talude</option>
                        <option value="Caleiras e valetas de pé de talude">Caleiras e valetas de pé de talude</option>
                        <option value="Passagens hidráulicas">Passagens hidráulicas</option>
                        <option value="Muros">Muros</option>
                        <option value="Obras de arte">Obras de arte</option>
                        <option value="Guardas de segurança">Guardas de segurança</option>
                        <option value="Pavimentos em betão (linhas de água à superfície)">Pavimentos em betão (linhas de água à superfície)</option>
                        <option value="Sinalização horizontal">Sinalização horizontal</option>
                        <option value="Sinalização vertical">Sinalização vertical</option>
                        <option value="Caleiras e valetas de crista">Caleiras e valetas de crista</option>
                        <option value="Delineadores">Delineadores</option>
                        <option value="Marcadores">Marcadores</option>
                        <option value="Caleiras e valetas de plataforma">Caleiras e valetas de plataforma</option>
                        <option selected><?php echo $patolog->getGrupo(); ?></option></select>
               <label style="margin-left:10px;"for="cId_talude">ID Talude</label>
               <input  value="<?php echo $patolog->getId_talude(); ?>" type="text" name ="tId_talude" id="cId_talude"  size="5"style="height:18px;" />
              
               <label for="cBanq" >Banqueta</label>
               <select style="width:50px;height:25px;"value="<?php echo $patolog->getBanq(); ?>" name ="tBanq" id="cBanq">
                    <option>B1</option>
                    <option>B2</option>
                    <option>B3</option>
                    <option>B4</option>
                    <option>B5</option>
                    <option>B6</option>
                    <option>B7</option>
                    <option selected ><?php echo $patolog->getBanq(); ?></option></select>
               <script>
               function via(){
                    document.getElementById('cBrm').value="";
                    document.getElementById('cBrm').disabled=true;
                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                    document.getElementById('cSobra').value="";
                    document.getElementById('cSobra').disabled=true;
                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                }
               </script>
                <p><label type="text" style="margin-left:100px;"  for="cVia">Via</label>
                    <select style="width:50px;height:25px;" value="<?php echo $patolog->getVia(); ?>" name="tVia" id="cVia"onclick="via()">	
                        <option value="v1">v1</option>
                        <option value="v2">v2</option>
                        <option value="v3">v3</option>
                        <option value="v4">v4</option>
                        <option value="v5">v5</option>
                        <option value="v6">v6</option>
                        <option selected><?php echo $patolog->getVia(); ?></option>
                    </select>
                  <script>
               function berma(){
                    document.getElementById('cVia').value="";
                    document.getElementById('cVia').disabled=true;
                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                    document.getElementById('cSobra').value="";
                    document.getElementById('cSobra').disabled=true;
                    document.getElementById('cSobra').style.backgroundColor = '#CDCDB4';
                }
               </script>   
                <label class=""for="cBrm">Berma</label>
                <select class="align" type="text" style="width:50px;height:25px;"value="<?php echo $patolog->getBrm(); ?>" name ="tBrm" id="cBrm"onclick="berma()">
                    <option value=""></option>    
                    <option value="1">1</option>
                    <option selected><?php echo $patolog->getBrm(); ?></option> </select>  
                   <script>
               function sobra(){
                    document.getElementById('cVia').value="";
                    document.getElementById('cVia').disabled=true;
                    document.getElementById('cVia').style.backgroundColor = '#CDCDB4';
                    document.getElementById('cBrm').value="";
                    document.getElementById('cBrm').disabled=true;
                    document.getElementById('cBrm').style.backgroundColor = '#CDCDB4';
                }
               </script>   
                 <label class=""for="cSobra">Sobra de estrada</label>
                 <select style="width:50px;height:25px;" value="<?php echo $patolog->getSobra(); ?>" name ="tSobra" id="cSobra"onclick="sobra()">
                    <option selected>0</option>    
                    <option>1</option><?php echo $patolog->getSobra(); ?></select>
                                   
                 <label class=""for="cPass">Passadeira</label>
                 <select style="width:50px;height:25px;" value="<?php echo $patolog->getPass(); ?>" name ="tPass" id="cPass">
                    <option selected>0</option>    
                    <option>1</option><?php echo $patolog->getPass(); ?></select>
                                    
                    <label style=" width:100px;height:25px;" class="" for="cSentido">Sentido</label>
                    <select value="<?php echo $patolog->getSentido(); ?>"class="sentido" name ="tSentido" id="cSentido">
                        <option>Crescente</option>
                        <option>Decrescente</option>
                        <option selected><?php echo $patolog->getSentido(); ?></option>
                    </select>
               
                <p><label style="margin-left:30px;" class=""for="cId_item">ID Item Patolog.</label>
                    <input required="" style="font-size:11pt;color:blue;width: 70px;"value="<?php echo $patolog->getId_item(); ?>" type="text" name ="tId_item" id="cId_item" class="align"size= "5"/>	
                    <br><br>
                    <iframe style="width: 875px;height: 250px;border: none;background-color: white;padding: 3px;" id="patolog" src="../tabelas/tabPatologiaItens.php" name="janela" ></iframe><br><br>
                    
                  <p><label class="label_1"for="cFoto1"id="foto1" >Foto 1</label>
                      <input value="<?php echo $patolog->getFoto1(); ?>"type="file"name="tFoto1"id="cFoto1" class="align"/>
            <p><label class="label_1"for="cFoto2"id="foto2" >Foto2</label>
                <input value="<?php echo $patolog->getFoto2(); ?>" type="file"name="tFoto2"id="cFoto2" class="align"/><br><br>
                       <!--------------------------------------------------------------------------------------------> 
               <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;">
                <?php
                if ($patolog->getId_patolog() == 0) {
                    ?>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left: 340px;width: 100px;height: 28px;"  class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100px;height: 28px;"  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>                           
                <?php } ?>
               </div>
                     
           </form><br>
        <h2>Registos activos</h2>  
        <form class="tab" name='tab'method="post">
        <input type="text" name="patolog" id='patolog' placeholder="ID Estrada"style= "width: 120px;" />
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/>
        </form>  
        
        <table id="est" accept-charset="UTF-8" width ="150%" border="1" class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alt.</td>
                <td class="title" align="center" >Reg.</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >Altitude.</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title"colspan="2" align="center" >Latitude</td> 
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Grupo</td>
                <td class="title" align="center" >ID Talude</td>
                <td class="title" align="center" >Banq.</td>
                <td class="title" align="center" >Via</td> 
                <td class="title" align="center" >Berma</td> 
                <td class="title" align="center" >Sobra</td>
                <td class="title" align="center" >Pass.</td>
                <td class="title" align="center" >Sentido</td> 
                <td class="title" align="center" >Item da Patologia</td>
                <td class="title" align="center" >File (foto 1)</td>
                <td class="title" align="center" >File (foto 2)</td>
                <td class="title" align="center" >Arquivo</td>
                <td class="title" align="center" >Data</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'patolog');
            }
            $cx = new Conexao();
            $dalpatologia = new DALPatologia($cx);
            $resultado = $dalpatologia->LocalizarRect($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'alterar_main.php?pg=patologia&op=excluir&cod=' . $registo['id_patolog'];
                $linkalterar = 'alterar_main.php?pg=patologia&op=alterar&cod=' . $registo['id_patolog'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_patolog"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style=""><?php echo $registo["pkinicio"]; ?></td>
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
                    <td class="tab"width="1%"><?php echo $registo["grupo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_talude"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["banq"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["brm"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["sobra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pass"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_item"]; ?></td>
                    <td class="tab"width="1%" ><?php echo $registo["foto1"]; ?></td>
                    <td class="tab"width="1%" ><?php echo $registo["foto2"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["arq"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["data_arq"]; ?></td>
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
                </tr>
                <?php
            }
            ?>
        </table><br>
           <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=patologia">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

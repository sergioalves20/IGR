<!DOCTYPE html>
 <?php session_start(); ?>  
<html>
   
    <head>
        <meta charset="UTF-8">
        <title>Faixa de Rodagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/fxrod.js"></script>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style type="text/css" media="all">
            .label_1{width:90px;float:left;display:block;}
            .label_3{width:622px;display:block;background-color:#C0FF3E;color:black;padding:5px;}			
            select#cNvias{width:70px;height:25px;}
            form#fxrod{height: 450px;}</style>

            <?php
            require_once '../classes/Conexao.php';
            require_once '../classes/EstradaFicha.php';
            require_once '../classes/Fxrod.php';
            require_once '../classes/DALFxrod.php';
            //require_once '../classes/constFxrod_main.php';
            include_once '../estrutura/header.php';
            //Inserir registo
            $fxrod = new Fxrod();
            if (filter_has_var(INPUT_POST, 'tGuardar')) {
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
                $nvias = filter_input(INPUT_POST, 'tNvias');
                $larg1 = filter_input(INPUT_POST, 'tV1');
                $larg2 = filter_input(INPUT_POST, 'tV2');
                $larg3 = filter_input(INPUT_POST, 'tV3');
                $larg4 = filter_input(INPUT_POST, 'tV4');
                $larg5 = filter_input(INPUT_POST, 'tV5');
                $larg6 = filter_input(INPUT_POST, 'tV6');
                $ass = filter_input(INPUT_POST, 'tAss');
                $fxrod = new Fxrod(0, $alt, $reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $nvias, $larg1, $larg2, $larg3, $larg4, $larg5, $larg6, $ass);
                $cx = new Conexao();
                $dal = new DALFxrod($cx);
                $dal->Inserir($fxrod);
                $fxrod = new Fxrod();
                echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
            //Alterar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_fxrod = filter_input(INPUT_POST, 'tId_fxrod');
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
                $nvias = filter_input(INPUT_POST, 'tNvias');
                $larg1 = filter_input(INPUT_POST, 'tV1');
                $larg2 = filter_input(INPUT_POST, 'tV2');
                $larg3 = filter_input(INPUT_POST, 'tV3');
                $larg4 = filter_input(INPUT_POST, 'tV4');
                $larg5 = filter_input(INPUT_POST, 'tV5');
                $larg6 = filter_input(INPUT_POST, 'tV6');
                $ass = filter_input(INPUT_POST, 'tAss');
                
                $fxrod = new Fxrod($id_fxrod, $alt, $reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $nvias, $larg1, $larg2, $larg3, $larg4, $larg5, $larg6, $ass);
                $cx = new Conexao();
                $dal = new DALFxrod($cx);
                $dal->Alterar($fxrod);
                $fxrod = new Fxrod();
            }
            //Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalfxrod = new DALFxrod($conexao);
                $retorno = $dalfxrod->Excluir(filter_input(INPUT_GET, 'cod'));
            }
            //Alterar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalfxrod = new DALFxrod($conexao);
                $fxrod = $dalfxrod->CarregaFxrod(filter_input(INPUT_GET, 'cod'));
            }
            ?> 

        </head>
        <?php include_once '../estrutura/header.php'; ?> 
        <body>
            <h1 class="op">REGISTAR - Faixa de rodagem</h1>
            <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
            <form method="post" onsubmit="return pk()" id="fxrod" action="../estrutura/levantamento_main.php?pg=fxrod&op=listar">
                 &nbsp;&nbsp;&nbsp;<input type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p><label class="label_1" for="cAlterar">Alteração</label>
                    <select class="alt" name ="tAlterar" id="cAlterar">
                        <option selected>0</option>
                        <option>1</option><?php echo $fxrod->getAlt(); ?></select>
                    &nbsp;<label  for="cReg">Registo</label>
                    <input value="<?php echo $fxrod->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <p><label class="label_1"for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $fxrod->getId_estrada(); ?>"autofocus required type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5" />
                    <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
                <p><label class="label_1"for="cPkinicio"style="color:brown;">pk Início</label>
                    <input value="<?php echo $fxrod->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left:17px;" for="cAltitd_pki">Altitude(m)</label>
                     &nbsp;&nbsp;<input value="<?php echo $fxrod->getAltitd_pki(); ?>"type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                    <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
                <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                    <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input value="<?php echo $fxrod->getLat_ci(); ?>"charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $fxrod->getLat_ni(); ?>"type="text"  required=" "name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $fxrod->getLong_ci(); ?>"type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input value="<?php echo $fxrod->getLong_ni(); ?>"type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/>
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
                <p><label class="label_1"for="cPkfim" style="color:brown;">pk Fim</label>
                    <input value="<?php echo $fxrod->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left:17px;" for="cAltitd_pkf">Altitude(m)</label>
                    &nbsp;&nbsp;<input value="<?php echo $fxrod->getAltitd_pkf(); ?>"type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/><br><p>	
                    <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
                <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                    <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitudef"></label>					
                    <input value="<?php echo $fxrod->getLat_cf(); ?>"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $fxrod->getLat_nf(); ?>"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $fxrod->getLong_cf(); ?>"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeNf"></label>
                    <input value="<?php echo $fxrod->getLong_nf(); ?>"type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/>				
                    <!--------------------------------------------------------------------------------------------------------------------------------->               
                <p><label class="label_1"for="cNvias">Nº de Vias</label>
                    <select type="text" name ="tNvias" id="cNvias" onclick ="via()" >
                        <option value="1x1">1x1</option>
                        <option value="2x2">2x2</option>
                        <option value="3x3">3x3</option>
                        <option value="1x2">1x2</option>
                        <option value="2x1">2x1</option>
                        <option value="2x3">2x3</option>
                        <option value="3x2">3x2</option>
                        <option selected><?php echo $fxrod->getNvias(); ?></option></select>
                <p><label class="label_1">Largura</label>		
                    <label for="cV1">V1</label>
                    <input value="<?php echo $fxrod->getLarg1(); ?>"type="text" name ="tV1" id="cV1" class="align"size= "5"placeholder="0.00" />
                    <label for="cV2">V2</label>
                    <input value="<?php echo $fxrod->getLarg2(); ?>"type="text" name ="tV2" id="cV2" class="align"size= "5"placeholder="0.00"/>	
                    <label for="cV3">V3</label>
                    <input value="<?php echo $fxrod->getLarg3(); ?>"type="text" name ="tV3" id="cV3" class="align"size= "5"placeholder="0.00"/>
                    <label for="cV4">V4</label>
                    <input value="<?php echo $fxrod->getLarg4(); ?>"type="text" name ="tV4" id="cV4" class="align"size= "5"placeholder="0.00"/>
                    <label for="cV5">V5</label>
                    <input value="<?php echo $fxrod->getLarg5(); ?>"type="text" name ="tV5" id="cV5" class="align"size= "5"placeholder="0.00"/>
                    <label for="cV6">V6</label>
                    <input value="<?php echo $fxrod->getLarg6(); ?>"type="text" name ="tV6" id="cV6" class="align"size= "5"placeholder="0.00"/><br><br>
                <p><label class="label_3" id="nota">&nbsp;NOTA: Registar da esquerda para a direita no sentido crescente do pk</label><br>	
                    <!--------------------------------------------------------------------------------------------> 
                    <?php
                    if ($fxrod->getId_fxrod() == 0) {
                        ?>
                    <input style="margin-left:225px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                        <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabfxrod'"/>
                        <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                        <?php
                    } else {
                        ?>  
                        <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                        <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                        <input type="text" hidden="" name="tId_fxrod" id="id_fxrod" value="<?php echo $fxrod->getId_fxrod(); ?>"/>          
                    <?php } ?>
                        <input type="text"hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" />   
            </form><br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
           
            <table id="est" accept-charset="UTF-8" width ="120%" border="1" class="tabela">
                <tr> 
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
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
                    <td class="title" align="center" >Nº Vias</td> 
                    <td class="title" align="center" >Larg.V1</td> 
                    <td class="title" align="center" >Larg.V2</td> 
                    <td class="title" align="center" >Larg.V3</td> 
                    <td class="title" align="center" >Larg.V4</td>
                    <td class="title" align="center" >Larg.V5</td> 
                    <td class="title" align="center" >Larg.V6</td> 
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'fxrod');
                }
                $cx = new Conexao();
                $dalfxrod = new DALFxrod($cx);
                $resultado = $dalfxrod->Localizar($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=fxrod&op=excluir&cod=' . $registo['id_fxrod'];
                    $linkalterar = 'levantamento_main.php?pg=fxrod&op=alterar&cod=' . $registo['id_fxrod'];
                    ?>  
                    <tr>                      
                        <td class="tab" width="1%" align="center"><?php echo $registo["id_fxrod"]; ?></td>
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
                        <td class="tab"width="1%"align="center"><?php echo $registo["nvias"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["largv1"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["largv2"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["largv3"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["largv4"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["largv5"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["largv6"]; ?></td> 
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

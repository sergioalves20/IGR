<!DOCTYPE html>
<html>
    <?php session_start()?>  
    <head>
        <meta charset="UTF-8">
        <title>Tipo de pavimento da Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/berma.js"></script>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style type="text/css" media="all">
            .label_1{width:130px;float:left;display:block}	
            select#cPedra{width:150px;height:25px;}
            select#cRevsupf{width:150px;height:25px;}
            select#cBb{width:150px;height:25px;}
            select#cVia{width:50px;height:25px;}
            select#cBclas{height:25px;}
            select#cPavim{height:25px;}
            select#cSentido{width:150px;height:25px;}
            iframe#fxrod{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
        </style>       
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/BermasTipo.php';
        require_once '../classes/DALBermasTipo.php';
        ?>
    </head>
    <?php include_once '../estrutura/header.php';?>
      <?php  
        $bermat = new BermasTipo();
//Inserir registo
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_berma = filter_input(INPUT_POST, 'tId_berma');
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
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $pavim = filter_input(INPUT_POST, 'tPavim');
            $pedra = filter_input(INPUT_POST, 'tPedra');
            $revsuperf = filter_input(INPUT_POST, 'tRevsupf');
            $bb = filter_input(INPUT_POST, 'tBb');
            $bclas = filter_input(INPUT_POST, 'tBclas');
            $ass = filter_input(INPUT_POST, 'tAss');
            $bermat = new BermasTipo(0,$alt,$reg, $id_berma, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $sentido, $pavim, $pedra, $revsuperf, $bb, $bclas, $ass);
            $cx = new Conexao();
            $dal = new DALBermasTipo($cx);
            $dal->Inserir($bermat);
            $bermat = new BermasTipo();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }
//Alterar registo
         if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_bermatipo = filter_input(INPUT_POST, 'tId_bermatipo'); 
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_berma = filter_input(INPUT_POST, 'tId_berma');
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
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $pavim = filter_input(INPUT_POST, 'tPavim');
            $pedra = filter_input(INPUT_POST, 'tPedra');
            $revsuperf = filter_input(INPUT_POST, 'tRevsupf');
            $bb = filter_input(INPUT_POST, 'tBb');
            $bclas = filter_input(INPUT_POST, 'tBclas');
            $ass = filter_input(INPUT_POST, 'tAss');
            $bermat = new BermasTipo($id_bermatipo, $alt, $reg, $id_berma, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf,$sentido,$pavim, $pedra, $revsuperf, $bb, $bclas, $ass);
            $cx = new Conexao();
            $dal = new DALBermasTipo($cx);
            $dal->Alterar($bermat);
            $bermat = new BermasTipo();          
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalbermatipo = new DALBermasTipo($conexao);
            $retorno = $dalbermatipo->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALBermasTipo($conexao);
            $bermat = $dal->CarregaBermasTipo(filter_input(INPUT_GET, 'cod'));
        }
        ?>
    </head>
    <body>
        <h1 class="op">REGISTAR - Tipo de pavimento da Berma</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/admin_main.php?pg=levantamento'>|VOLTAR|</a>
        <form style="width:900px;height: 520px;" method="post" name="bermatipo" onsubmit="return pk()"id="bermatipo "action="../estrutura/levantamento_main.php?pg=bermatipo&op=listar">
            <input style="margin-left: 140px"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />		
            <p><label style="margin-left: 3px" class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option selected>0</option>
                    <option>1</option></select>
                <label  for="cReg">Registo</label>
                 <input value="<?php echo $bermat->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
            <p><label class="label_1"for="cId_estrada"> ID Estrada</label>
                <input value="<?php echo $bermat->getId_estrada(); ?>" type="text" required="" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
            <p><label class="label_1"for="cId_berma"> ID Berma</label>
                <input value="<?php echo $bermat->getId_berma(); ?>"type="text" name ="tId_berma" id="cId_berma" class="align"size= "5"/><br><br>
                <!--<iframe  id="fxrod" src="../tabelas/tabBermasSelect.php" name="janela" ></iframe><br><br>-->
                  <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
                <p><label style="color:brown;"class="label_1"for="cPkinicio">pk Início</label>
                    <input value="<?php echo $bermat->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left: 22px;" for="cAltitd_pki">Altitude(m)</label>
                    &nbsp;<input  value="<?php echo $bermat->getAltitd_pki(); ?>"type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                    <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
                <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                    <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input value="<?php echo $bermat->getLat_ci(); ?>"charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $bermat->getLat_ni(); ?>" type="text"  required=""name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $bermat->getLong_ci(); ?>"type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input value="<?php echo $bermat->getLong_ni(); ?>"type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/>
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
                <p><label style="color:brown;"class="label_1"for="cPkfim">pk Fim</label>
                    <input  value="<?php echo $bermat->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                     <label style="margin-left:22px;" for="cAltitd_pkf">Altitude(m)</label>
                     &nbsp;<input value="<?php echo $bermat->getAltitd_pkf(); ?>" type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/><br><p>	
                    <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
                <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                    <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitudef"></label>					
                    <input value="<?php echo $bermat->getLat_cf(); ?>"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $bermat->getLat_nf(); ?>"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $bermat->getLong_cf(); ?>"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeNf"></label>
                    <input value="<?php echo $bermat->getLong_nf(); ?>"type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/>				
                    <!--------------------------------------------------------------------------------------------------------------------------------->
            <p><label class="label_1"for="cPavim" >Pavimentada</label>
                <select onchange="pavimtpbrm()"name ="tPavim" id="cPavim" >                     
                    <option>1</option>
                    <option selected><?php echo $bermat->getPavim(); ?></option></select>
                <label style="margin-left:10px;" class=""for="cPedra">Pedra</label>
                <select onchange="pedratpbrm()"  name ="tPedra" id="cPedra">					
                    <option>Paralelepípedos</option>
                    <option>Calçada portuguesa</option>
                    <option>Empedramento</option>
                    <option selected><?php echo $bermat->getPedra(); ?></option></select>
            <label class=""for="cRevsupf">Revest. superficial</label>
                <select onchange="revsupftpbrm()" name ="tRevsupf" id="cRevsupf">					
                    <option>Simples</option>
                    <option>Duplo</option>
                    <option selected><?php echo $bermat->getRevsuperf(); ?></option></select>
            <label class=""for="cBb">Betão betuminoso</label>
                <select onchange="bbtpbrm()"  name ="tBb" id="cBb">					
                    <option>Quente</option>
                    <option>Frio</option>
                    <option selected><?php echo $bermat->getBb(); ?></option></select>
            <p><label class="label_1"for="cBclas">Betão de cimento (Las)</label>
                <select class="alt"onchange="bclastpbrm()"name ="tBclas" id="cBclas">
                    <option>1</option>
                    <option selected><?php echo $bermat->getBclas(); ?></option></select>
                <input style="margin-left:20px;"type="button" class="botao1" onclick="limpatpbrm()">
            <p><label class="label_1"for="cSentido">Sentido</label>
                <select class="alt" name="tSentido" id="cSentido">					
                    <option>Crescente</option>
                    <option>Decrescente</option>							
                    <option selected><?php echo $bermat->getSentido(); ?></option></select><br><br>
                <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($bermat->getId_bermatipo() == 0) {
                    ?>
                <input style="margin-left:330px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabbermatipo'"/>
                    <input style="background-color:#7d8c9b;"type="button"class="cmd" id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_bermatipo" id="id_bermatipo" value="<?php echo $bermat->getId_bermatipo(); ?>"/>          
                <?php } ?>
                    <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" />             
        </form><br> 
           <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
        <form class="tab" name='tab'method="post">
            <select style="width:160px;color:#6E6E6E;" class="alt" name ="tSentido" id="cSentido">					
                    <option>Crescente</option>
                    <option>Decrescente</option>							
                    <option selected>Sentido</option>  </select>
                    &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>          
                    </form>      
        <table id="est" accept-charset="UTF-8" width ="120%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >ID Berma</td>
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
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Pavimentada</td>
                <td class="title" align="center" >Pedra</td>            
                <td class="title" align="center" >Rev.Supf.</td>
                <td class="title" align="center" >B.B.</td>
                <td class="title" align="center" >BCLas</td>             
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tSentido');
            }
            $cx = new Conexao();
            $dal = new DALBermasTipo($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=bermatipo&op=excluir&cod=' . $registo['id_bermatipo'];
                $linkalterar = 'levantamento_main.php?pg=bermatipo&op=alterar&cod=' . $registo['id_bermatipo'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_bermatipo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_berma"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"class="tab"width="1%"align="center"><?php echo $registo["pavim"]; ?></td>
                    <td class="tab"width="3%"><?php echo $registo["pedra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["revsuperf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bb"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bclas"]; ?></td>                        
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
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>

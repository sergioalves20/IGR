<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start(); ?>  
<html>   
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Talude.php';
        require_once '../classes/DALTalude.php';
        $talude = new Talude();
//Inserir registo
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
            $nat = filter_input(INPUT_POST, 'tNat');
            $altura = filter_input(INPUT_POST, 'tAltura');
            $inclin = filter_input(INPUT_POST, 'tInclin');
            $tipo = filter_input(INPUT_POST, 'tTipo');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $nbanq = filter_input(INPUT_POST, 'tNbanq');
            $ass = filter_input(INPUT_POST, 'tAss');
            $talude = new Talude(0,$alt, $reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $nat, $altura, $inclin, $tipo, $sentido, $nbanq, $ass);
            $cx = new Conexao();
            $daltalude = new DALTalude($cx);
            $daltalude->Inserir($talude);
            $talude=new Talude();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";           
        }
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_talude = filter_input(INPUT_POST,'tId_talude');
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
            $nat = filter_input(INPUT_POST, 'tNat');
            $altura = filter_input(INPUT_POST, 'tAltura');
            $inclin = filter_input(INPUT_POST, 'tInclin');
            $tipo = filter_input(INPUT_POST, 'tTipo');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $nbanq = filter_input(INPUT_POST, 'tNbanq');
            $ass = filter_input(INPUT_POST, 'tAss');
            $conexao = new Conexao();
            $daltalude = new DALTalude($conexao);
            $talude = new Talude($id_talude,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $nat, $altura, $inclin,$tipo, $sentido, $nbanq, $ass);          
            $daltalude->Alterar($talude);
            $talude = new Talude();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $daltalude = new DALTalude($conexao);
            $retorno = $daltalude->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $daltalude = new DALTalude($conexao);
            $talude = $daltalude->CarregaTalude(filter_input(INPUT_GET, 'cod'));
        }
        ?>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Talude</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:480px;"  method="post" name="talude" id="talude" onsubmit="return pk()" action="../estrutura/levantamento_main.php?pg=talude&op=listar" >
             &nbsp;&nbsp;&nbsp;<input type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />             
            <p> <label class="label_1" for="cAlterar">Alteração</label>
                <select value='<?php echo $talude->getAlt(); ?>' name ="tAlterar" id="cAlterar">
                    <option selected>0</option>
                    <option>1</option></select>
                 &nbsp;<label  for="cReg">Registo</label>
                <input value="<?php echo $talude->getReg(); ?>" type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>   
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input name ="tId_estrada"  id="cId_estrada"type="text" value="<?php echo $talude->getId_estrada(); ?>" autofocus required="" class="align" size= "5"/><br><br>
                <!----------------------------------------------- PK INICIO	----------------------------------------------------->
            <p><label style="color:brown;" class="label_1"for="cPkinicio">pk Início</label>
                <input value="<?php echo $talude->getPkinicio(); ?>"required="" type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0,000"/>
               <label style="margin-left: 20px;" for="cAltitd_pki">Altitude(m)</label>
                &nbsp;<input value="<?php echo $talude->getAltitd_pki(); ?>" type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
            <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input value="<?php echo $talude->getLat_ci(); ?>"charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input value="<?php echo $talude->getLat_ni(); ?>"type="text"  required=" "name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00,00000000" Use readonly="true"/>                          
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
                <input value="<?php echo $talude->getLong_ci(); ?>"type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input value="<?php echo $talude->getLong_ni(); ?>"type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00,00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/><br><br>
                <!------------------------------------------------------------- PK FIM -------------------------------------------------------------->					
            <p><label style="color:brown;"class="label_1"for="cPkfim">pk Fim</label>
                <input value="<?php echo $talude->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0,000"/>
                <label style="margin-left:20px;" for="cAltitd_pkf">Altitude(m)</label>
                &nbsp;<input value="<?php echo $talude->getAltitd_pkf(); ?>" type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/>	
            <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitudef"></label>					
                <input value="<?php echo $talude->getLat_cf(); ?>"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input value="<?php echo $talude->getLat_nf(); ?>"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00,00000000" Use readonly="true"/>                          
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
                <input value="<?php echo $talude->getLong_cf(); ?>"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeNf"></label>
                <input value="<?php echo $talude->getLong_nf(); ?>" type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00,00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/></p><br>					
            <p><label class="label_1"for="cNat">Natureza Geo</label>
                <select style="width:90px;height: 24px;" value="<?php echo $talude->getNat(); ?>"required="" name ="tNat" id="cNat">					
                    <option>Roha</option>
                    <option>Solo</option>
                    <option>Misto</option>
                    <option selected></option></select>
                <label style="margin-left:65px;" for="cAltura">Altura</label>
                <input value="<?php echo $talude->getAltura(); ?>"type="text" required="" name ="tAltura" id="cAltura" class="align"size= "5" placeholder="0,00"/>
                <label for="cInclin">Inclinação (graus)</label>
                <input value="<?php echo $talude->getInclin(); ?>"type="text" required="" name ="tInclin" id="cInclin" class="align"size= "5" placeholder="0"/>
            <p><label class="label_1"for="cTipo">Tipo</label>
                <select style="height: 24px;" value="<?php echo $talude->getTipo(); ?>"required="" name ="tTipo" id="cTipo">					
                    <option>Escavação</option>
                    <option>Aterro</option>
                    <option>Misto</option>
                    <option selected><?php echo $talude->getTipo(); ?></option></select>
                &nbsp;&nbsp;<label for="cNbanq">Nº de Banquetas</label>
                <input value="<?php echo $talude->getNbanq(); ?>" type="text" required="" name ="tNbanq" id="cNbanq" class="align"size= "5" placeholder="0"/>
                <label style="margin-left:10px;" for="cSentido">Sentido</label>
                <select style="margin-left:15px;" value="<?php echo $talude->getSentido(); ?>" class="sentido" required=""  name ="tSentido" id="cSentido">					
                    <option>Crescente</option>
                    <option>Decrescente</option>
                    <option selected></option></select><br><br>	
                     <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($talude->getId_talude() == 0) {
                    ?>
                    <input style="margin-left:220px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabtalude'"/>
                    <input style="background-color:#7d8c9b;" type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/><br><br>
                        <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden=""  name="tId_talude" id="id_talude" value="<?php echo $talude->getId_talude(); ?>"/>          
                <?php } ?>
                    <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" />              
        </form><br>
        
          <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
          <form class="tab" name='tab'method="post">       
            <select style="width:170px;height: 25px;color:#6E6E6E;"name ="talude" id="talude">					
                <option>Escavação</option>
                <option>Aterro</option>
                <option>Misto</option>
                    <option selected>Tipo</option></select>
              &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>      
        <table id="est" accept-charset="UTF-8" width ="130%" border="1" class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alt.</td>
                <td class="title" align="center" >Regst.</td>
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title"colspan="2" align="center" >Latitude</td> 
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Natureza</td> 
                <td class="title" align="center" >Altura</td> 
                <td class="title" align="center" >Inclin.</td> 
                <td class="title" align="center" >Tipo</td> 
                <td class="title" align="center" >Sentido</td> 
                <td class="title" align="center" >NºBanq.</td> 
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'talude');
            }
            $cx = new Conexao();
            $daltalude = new DALTalude($cx);
            $resultado = $daltalude->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=talude&op=excluir&cod=' . $registo['id_talude'];
                $linkalterar = 'levantamento_main.php?pg=talude&op=alterar&cod=' . $registo['id_talude'];
                ?>  
                <tr>                      
                    <td  class="tab"width="1%" align="center"><?php echo $registo["id_talude"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                    <td class="tab"width="2%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["nat"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altura"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["inclin"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["tipo"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["nbanq"]; ?></td>
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
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

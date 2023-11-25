<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start();?>
<html>    
    <head>
        <meta charset="UTF-8">
        <title>Muros</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Muros.php';
        require_once '../classes/DALMuros.php';
//Inserir registo
          $muros = new Muros();
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
            $espess = filter_input(INPUT_POST, 'tEspess');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            $muros = new Muros(0,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $nat, $altura, $espess, $sentido, $ass);
            $cx = new Conexao();
            $dalmuros = new DALMuros($cx);
            $dalmuros->Inserir($muros);
            $muros = new Muros();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";          
        }      
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_muro = filter_input(INPUT_POST,'tId_muro');
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
            $espess = filter_input(INPUT_POST, 'tEspess');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            $conexao = new Conexao();
            $dalmuros = new DALMuros($conexao);
            $muros = new Muros($id_muro,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $nat, $altura, $espess, $sentido, $ass);          
            $dalmuros->Alterar($muros);
            $muros = new Muros();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalmuros = new DALmuros($conexao);
            $retorno = $dalmuros->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalmuros = new DALMuros($conexao);
            $muros = $dalmuros->CarregaMuros(filter_input(INPUT_GET, 'cod'));
        }
        ?>
    </head>
  <?php include_once '../estrutura/header.php';?>  
    <body> 
        <h1 class="op">REGISTAR - Muros</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="padding:30px;height: 470px;" method="post" name="muro" id="muro"action="../estrutura/levantamento_main.php?pg=muros&op=listar" onsubmit="return pk()">					
            <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true"/>	
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true"/>	
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option selected>0</option>
                    <option>1</option>
                    <option><?php echo $muros->getAlt(); ?></option></select>
                 &nbsp;<label  for="cReg">Registo</label>
                <input value="<?php echo $muros->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>   
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value='<?php echo $muros->getId_estrada(); ?>' autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/><br><br>
                <!------------------------------------------------------------------------------------------------------------------------>
                <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
            <p><label style="color:brown;" class="label_1"for="cPkinicio">pk Início</label>
                <input  value='<?php echo $muros->getPkinicio(); ?>' required="" type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label style="margin-left:15px;" for="cAltitd_pki">Altitude(m)</label>
                &nbsp;<input style="margin-left:5px;" value='<?php echo $muros->getAltitd_pki(); ?>' type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
            <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input  value='<?php echo $muros->getLat_ci(); ?>'charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input  value='<?php echo $muros->getLat_ni(); ?>'type="text"  required=""name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                <input  value='<?php echo $muros->getLong_ci(); ?>'type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input  value='<?php echo $muros->getLong_ni(); ?>'type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/><br><br>
                <!----------------------------------------------------------------------------------------------------------------------------------->
                <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
            <p><label style="color:brown;"class="label_1"for="cPkfim">pk Fim</label>
                <input  value='<?php echo $muros->getPkfim(); ?>'type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                <label style="margin-left:15px;" for="cAltitd_pkf">Altitude(m)</label>
                &nbsp;<input style="margin-left:5px;" value='<?php echo $muros->getAltitd_pkf(); ?>' type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/><br><p>	
                <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
            <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitudef"></label>					
                <input  value='<?php echo $muros->getLat_cf(); ?>'charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input  value='<?php echo $muros->getLat_nf(); ?>'type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                <input  value='<?php echo $muros->getLong_cf(); ?>'type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeNf"></label>
                <input  value='<?php echo $muros->getLong_nf(); ?>'type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/><br><br>				
                <!--------------------------------------------------------------------------------------------------------------------------------->
            <p><label class="label_1"for="cNat">Natureza</label>
                <select style="height:25px;" name ="tNat" id="cNat">				
                    <option>Pedra argamassada</option>
                    <option>Pedra seca</option>
                    <option>Gabiões</option>
                    <option>Ancorados</option>
                    <option>Betão de cimento</option>
                    <option selected><?php echo $muros->getNat(); ?></option></select>
                <label style="margin-left:8px;" for="cAltura">Altura(m)</label>
                &nbsp;<input  value='<?php echo $muros->getAltura(); ?>'type="text" name ="tAltura" id="cAltura" class="align"size= "5" placeholder="0.00"/>
                <label for="cEspess">Espessura(m)</label>
                 &nbsp;<input  value='<?php echo $muros->getEspess(); ?>'type="text" name ="tEspess" id="cEspess"class="align" size= "5" placeholder="0.00"/>
            <p><label class="label_1" for="cSentido">Sentido</label>
                <select  value='<?php echo $muros->getLong_nf(); ?>'class="sentido"  name ="tSentido" id="cSentido">					
                    <option>Crescente</option>
                    <option>Decrescente</option>
                    <option selected><?php echo $muros->getSentido(); ?></option></select><br><br>		
                 <input type="text"hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" />   
                 <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($muros->getId_muro() == 0) {
                    ?>
                    <input style="margin-left:225px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../tabelas/tabMuros.php'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text"hidden=""  name="tId_muro" id="id_muro" value="<?php echo $muros->getId_muro(); ?>"/>          
                <?php } ?>
                  
        </form><br>
         <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
         <form class="tab" name='tab'method="post">          
              <select style="height:25px;width: 170px;color:#6E6E6E;" name ="muros" id="muros">			
                    <option>Pedra argamassada</option>
                    <option>Pedra seca</option>
                    <option>Gabiões</option>
                    <option>Ancorados</option>
                    <option>Betão de cimento</option>
                    <option selected>Natureza</option></select>
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>      
        <table id="est" accept-charset="UTF-8" width ="120%" border="1" class="tabela">
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
                <td class="title" align="center" >Esps.</td> 
                <td class="title" align="center" >Sentido</td>       
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'muros');
            }
            $cx = new Conexao();
            $dalmuros = new DALMuros($cx);
            $resultado = $dalmuros->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=muros&op=excluir&cod=' . $registo['id_muro'];
                $linkalterar = 'levantamento_main.php?pg=muros&op=alterar&cod=' . $registo['id_muro'];
                ?>  
                <tr>                      
                    <td class="tab" width="1%" align="center"><?php echo $registo["id_muro"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"class="tab"class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="4%"><?php echo $registo["nat"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altura"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
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

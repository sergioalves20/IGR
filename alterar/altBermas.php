<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start();?>
<html>   
    <head>
        <meta charset="UTF-8">
        <title>Bermas</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Bermas.php';
        require_once '../classes/DALBermas.php';
        date_default_timezone_set('Atlantic/Azores');
        $bermas = new Bermas();
//Retificar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_berma = filter_input(INPUT_POST, 'tId_berma');   
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
            $larg = filter_input(INPUT_POST, 'tLargura');
            $sentido = filter_input(INPUT_POST, 'tSentido');         
            $ass = filter_input(INPUT_POST, 'tAss');
            $arq = filter_input(INPUT_POST, 'tArq');
            $data_arq = filter_input(INPUT_POST, 'tData_arq');
            $bermas = new Bermas($id_berma,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $larg, $sentido,  $ass,$arq,$data_arq);
            $cx = new Conexao();
            $dalbermas = new DALBermas($cx);
            $dalbermas->Rectificar($bermas);
            $bermas = new Bermas();
            }
//Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalbermas = new DALBermas($conexao);
                $retorno = $dalbermas->Excluir(filter_input(INPUT_GET, 'cod'));
            }
//Retificar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalbermas = new DALBermas($conexao);
                $bermas = $dalbermas->CarregaBermasRect(filter_input(INPUT_GET, 'cod'));
            }
        ?>
    </head>
       <?php include_once '../estrutura/header.php'; ?> 
    <body>
        <h1 class="op">ALTERAR Bermas</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>
            <form style="height:430px;"method="post" onsubmit="return pk()" id="bermas" action="../estrutura/alterar_main.php?pg=bermas&op=listar">        
                 <p><label class="label_1" for="cId_berma">ID Bermas</label>
                <input style="background-color:#ccffcc;border-style: none;height: 25px;color:#7F7F7F;"type="text" use readonly="true"  name="tId_berma" id="id_sing" value="<?php echo $bermas->getId_berma(); ?>"class="align" size="6"/>            
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" value= '<?php echo $bermas->getData(); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" value= '<?php echo $bermas->getHora(); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
           <hr> 	
                <p><label class="label_1" for="cAlterar">Alteração</label>
                    <select class="alt" name ="tAlterar" id="cAlterar">
                        <option>1</option>
                        <option selected>0</option><?php echo $bermas->getAlt(); ?></option></select>                       
                     &nbsp;<label  for="cReg">Registo</label>
                     <input value="<?php echo $bermas->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"required="true"/>
                 <label class="" for="cArq">Arquivar</label>
                <select   class="alt" name ="tArq" id="cArq">
                    <option  selected="">0</option>
                    <option>1</option><?php echo $bermas->getArq(); ?></select>
                &nbsp;<label  for="cData_arq">Data</label>
                <input style="height: 20px"value="<?php echo $bermas->getData_arq(); ?>" type="date" name ="tData_arq"  id="cData_arq" class="align" size= "6"/>
                <p><label class="label_1"for="cId _estrada"> ID Estrada</label>
                    <input  value="<?php echo $bermas->getId_estrada(); ?>"autofocus required type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>                   
                    <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
                <p><label style="color:brown;"class="label_1"for="cPkinicio">pk Início</label>
                    <input value="<?php echo $bermas->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left: 22px;" for="cAltitd_pki">Altitude(m)</label>
                    &nbsp;<input  value="<?php echo $bermas->getAltitd_pki(); ?>"type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                    <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
                <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                    <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input value="<?php echo $bermas->getLat_ci(); ?>"charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $bermas->getLat_ni(); ?>" type="text"  required=""name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $bermas->getLong_ci(); ?>"type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input value="<?php echo $bermas->getLong_ni(); ?>"type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/>
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
                <p><label style="color:brown;"class="label_1"for="cPkfim">pk Fim</label>
                    <input  value="<?php echo $bermas->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                     <label style="margin-left:22px;" for="cAltitd_pkf">Altitude(m)</label>
                     &nbsp;<input value="<?php echo $bermas->getAltitd_pkf(); ?>" type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/><br><p>	
                    <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
                <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                    <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitudef"></label>					
                    <input value="<?php echo $bermas->getLat_cf(); ?>"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $bermas->getLat_nf(); ?>"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $bermas->getLong_cf(); ?>"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeNf"></label>
                    <input value="<?php echo $bermas->getLong_nf(); ?>"type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/>				
                    <!--------------------------------------------------------------------------------------------------------------------------------->
                <p><label class="label_1"for="cLargura">Largura(m)</label>
                    <input value="<?php echo $bermas->getLarg(); ?>"type="text" name ="tLargura" id="cLargura" class="align" class="align"size= "5" placeholder="0,00"/>                   
                <p><label class="label_1"for="cSentido">Sentido</label>
                    <select class="sentido" name ="tSentido" id="cSentido">					
                        <option value="Crescente" >Crescente</option>
                        <option value="Decrescente">Decrescente</option>							
                        <option selected><?php echo $bermas->getSentido(); ?></option></select><br><br></option>                      
                  <!--------------------------------------------------------------------------------------------> 
                    <?php
                    if ($bermas->getId_berma() == 0) {
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
        <input type="text" name="bermas" id='bermas' placeholder="ID Estrada" style= "width: 120px;" />
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>  
            <table id="est" accept-charset="UTF-8" width ="120%" border="1" class="tabela">
                <tr> 
                    <td class="title" align="center" >ID Berma</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
                    <td class="title" align="center" >ID Estrada</td>               
                    <td class="title" align="center" >pk Início</td>
                    <td class="title" align="center" >Altd.</td>
                    <td class="title" colspan="2" align="center" >Latitude</td>
                    <td class="title" colspan="2" align="center" >Longitude</td>
                    <td class="title" align="center" >pk Fim</td>
                    <td class="title" align="center" >Altd.</td>
                    <td class="title" colspan="2" align="center" >Latitude</td> 
                    <td class="title" colspan="2" align="center" >Longitude</td>
                    <td class="title" align="center" >Largura</td> 
                    <td class="title" align="center" >Sentido</td>
                    <td class="title" align="center" >Arquivo</td>
                    <td class="title" align="center" >Data</td>
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'bermas');
                }
                $cx = new Conexao();
                $dalbermas = new DALBermas($cx);
                $resultado = $dalbermas->LocalizarRect($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'alterar_main.php?pg=bermas&op=excluir&cod=' . $registo['id_berma'];
                    $linkalterar = 'alterar_main.php?pg=bermas&op=alterar&cod=' . $registo['id_berma'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%" align="center"><?php echo $registo["id_berma"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
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
                        <td class="tab"width="1%"align="center"><?php echo $registo["larg"]; ?></td>
                        <td class="tab"width="1%"><?php echo $registo["sentido"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["arq"]; ?></td>
                        <td class="tab"width="3%"align="center"><?php echo $registo["data_arq"]; ?></td>
                        <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
                    </tr>
                    <?php
                }
                ?>
            </table><br>
            <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=bermas">|INÍCIO|</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>      
            </footer>
    </body>
</html>

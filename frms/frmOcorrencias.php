<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ocorrência</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>
            textarea#cOcor{width:550px;height: 200px;}
            form#ocor{height: 740px;}      
        </style>       
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Ocorrencias.php';
        require_once '../classes/DALOcorrencias.php';       
//Inserir registo
        $ocorrencias = new Ocorrencias();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
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
            $ocor = filter_input(INPUT_POST, 'tOcor');
            $foto1 = filter_input(INPUT_POST, 'tFoto1');
            $foto2 = filter_input(INPUT_POST, 'tFoto2');
            $ass = filter_input(INPUT_POST, 'tAss');
            $ocorrencias = new Ocorrencias(0,$alt,$reg,$data, $hora, $id_estrada, $pkinicio,$altitd_pki,$lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $sentido, $ocor, $foto1, $foto2, $ass);
            $cx = new Conexao();
            $dal = new DALOcorrencias($cx);
            $dal->Inserir($ocorrencias);
            $ocorrencias = new Ocorrencias();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }
//Alterar registo
         if (filter_has_var(INPUT_POST, 'btalterar')){
            $id_ocor = filter_input(INPUT_POST, 'tId_ocor');
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
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
            $ocor = filter_input(INPUT_POST, 'tOcor');
            $foto1 = filter_input(INPUT_POST, 'tFoto1');
            $foto2 = filter_input(INPUT_POST, 'tFoto2');
            $ass = filter_input(INPUT_POST, 'tAss');
            $ocorrencias = new Ocorrencias($id_ocor,$alt,$reg, $data, $hora,$id_estrada,$pkinicio,$altitd_pki,$lat_ci, $lat_ni, $long_ci, $long_ni, $pkfim, $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf, $sentido, $ocor,$foto1, $foto2, $ass);
            $cx = new Conexao();
            $dal = new DALOcorrencias($cx);
            $dal->Alterar($ocorrencias);
            $ocorrencias = new Ocorrencias();
         }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALOcorrencias($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALOcorrencias($conexao);
            $ocorrencias = $dal->CarregaOcorrencias(filter_input(INPUT_GET, 'cod'));
        }
        ?>        
    </head>
     <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Ocorrência</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form method="post" name="ocor" onsubmit="return pk()" id="ocor" action="../estrutura/levantamento_main.php?pg=ocorrencia&op=listar">             
            <input  style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />         
            <p><label class="" for="cAlt">Alteração</label>
                    <select style="margin-left:35px;" value="<?php echo $ocorrencias->getAlt(); ?>" class="alt"  name ="tAlterar" id="cAlterar">
                        <option selected>0</option>
                        <option>1</option></select>               
                <label  for="cReg">Registo</label>
                <input value="<?php echo $ocorrencias->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0" />           
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $ocorrencias->getId_estrada(); ?>" autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/>
              <!-------------------------------------------- PK INÍCIO ----------------------------------------------------------------->
            <p><label style="color:brown;" class="label_1"for="cPkinicio">pk Início</label>
                <input  value='<?php echo $ocorrencias->getPkinicio(); ?>' required="" type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label style="margin-left:15px;" for="cAltitd_pki">Altitude(m)</label>
                &nbsp;<input style="margin-left:5px;" value='<?php echo $ocorrencias->getAltitd_pki(); ?>' type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
            <p><label class="label_1"for="cLatitudeGi">Latitude</label>
                <input type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input  value='<?php echo $ocorrencias->getLat_ci(); ?>'charset= "utf8" type="text" required="" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input  value='<?php echo $ocorrencias->getLat_ni(); ?>'type="text"  required=""name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                <input type="button" class="botao" name ="tGravarLat"  id="cGravarLati" onclick ="coordLati()"/>
                <!---------------------------------------------- LONGITUDE ----------------------------------------------->
            <p><label class="label_1" for="cLongitudeGi">Longitude</label> 
                <input type="text"  name ="tLongitudeGi" id="cLongitudeGi" class="align" size= "5"placeholder="00"/>
                <label>°</label>	
                <input type="text"  name ="tLongitudeMi" id="cLongitudeMi" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text"  name ="tLongitudeSi" id="cLongitudeSi" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLongitude"></label>
                <input  value='<?php echo $ocorrencias->getLong_ci(); ?>'type="text"  required="" name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input  value='<?php echo $ocorrencias->getLong_ni(); ?>'type="text" required="" name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/><br><br>
                <!----------------------------------------------------------------------------------------------------------------------------------->
                <!-------------------------------------------- PK FIM ------------------------------------------------------------------------------->					
            <p><label style="color:brown;"class="label_1"for="cPkfim">pk Fim</label>
                <input  value='<?php echo $ocorrencias->getPkfim(); ?>'type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                <label style="margin-left:15px;" for="cAltitd_pkf">Altitude(m)</label>
                &nbsp;<input style="margin-left:5px;" value='<?php echo $ocorrencias->getPkfim(); ?>' type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/><br><p>	
                <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
            <p><label class="label_1"for="cLatitudeGf">Latitude</label>
                <input type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitudef"></label>					
                <input  value='<?php echo $ocorrencias->getLat_cf(); ?>'charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input  value='<?php echo $ocorrencias->getLat_nf(); ?>'type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00,00000000" Use readonly="true"/>                          
                <input type="button" class="botao" name ="tGravarLat"  id="cGravarLatf" onclick ="coordLatf()"/>
                <!--------------------------------------------- LONGITUDE ---------------------------------------------------->
            <p><label class="label_1" for="cLongitudeGf">Longitude</label> 
                <input type="text" name ="tLongitudeGf" id="cLongitudeGf" class="align" size= "5"placeholder="00"/>
                <label>°</label>	
                <input type="text" name ="tLongitudeMf" id="cLongitudeMf" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLongitudeSf" id="cLongitudeSf" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLongitudef"></label>
                <input  value='<?php echo $ocorrencias->getLong_cf(); ?>'type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeNf"></label>
                <input  value='<?php echo $ocorrencias->getLong_nf(); ?>'type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/><br><br>				
                <!--------------------------------------------------------------------------------------------------------------------------------->
                 <p><label class="label_1" for="cSentido">Sentido</label>
                     <select  class="sentido"  name ="tSentido" id="cSentido">					
                    <option>Crescente</option>
                    <option>Decrescente</option>
                    <option selected><?php echo $ocorrencias->getSentido()?></option></select>        
            <p><label class="label_1"for="cOcor">Ocorrência:</label><br>	
                <textarea  name="tOcor" id="cOcor"><?php echo $ocorrencias->getOcor(); ?></textarea>                    
            <p><label class="label_1"for="cFoto1"id="foto1" >Foto 1</label>
                <input value='<?php echo $ocorrencias->getFoto1(); ?>'type="file"name="tFoto1"id="cFoto1" class="align"/>
            <p><label class="label_1"for="cFoto2"id="foto2" >Foto 2</label>
                <input value='<?php echo $ocorrencias->getFoto2(); ?>'type="file"name="tFoto2"id="cFoto2" class="align"/><br><br>
              <!----------------------------------------------------------------------------------------------------->                               
               <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">
                   
             <?php
             
                if ($ocorrencias->getId_ocor() == 0) {
                    ?>
                   
                    <input style="margin-left:250px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabocorrencias'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input hidden=""type="text"  name="tId_ocor" id="cId_ocor" value="<?php echo $ocorrencias->getId_ocor(); ?>"/> 
                <?php } ?>
                    </div>
            </form>
        <br>
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
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title"colspan="2" align="center" >Latitude</td> 
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Foto1</td>
                <td class="title" align="center" >Foto2</td>
                <td class="title" align="center" >Ocorrência</td>         
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tId_ocor');
            }
            $cx = new Conexao();
            $dal = new DALOcorrencias($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=ocorrencia&op=excluir&cod=' . $registo['id_ocor'];
                $linkalterar = 'levantamento_main.php?pg=ocorrencia&op=alterar&cod=' . $registo['id_ocor'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_ocor"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
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
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["foto1"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["foto2"]; ?></td>
                    <td class="tab"width="10%"><?php echo $registo["ocor"]; ?></td>
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>";                                
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

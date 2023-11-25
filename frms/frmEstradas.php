<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registo de Estradas</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/tab.css">
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Estrada.php';
        require_once '../classes/DALEstrada.php';
        require_once '../classes/DALIlha.php';
        $estrada = new Estrada();
 //Inserir registo 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $codigo = filter_input(INPUT_POST, 'tCodigo');
            $tutela = filter_input(INPUT_POST, 'tTutela');
            $classe = filter_input(INPUT_POST, 'tClasse');
            $ilha = filter_input(INPUT_POST, 'tIlha');
            $nseq = filter_input(INPUT_POST, 'tNseq');                       
            $estatuto = filter_input(INPUT_POST, 'tEstatuto');          
            $extensao = filter_input(INPUT_POST, 'tExtensao');
            $toponimo = filter_input(INPUT_POST, 'tToponimo');
            $pontosext = filter_input(INPUT_POST, 'tPontosext');
            $altitd_pki = filter_input(INPUT_POST, 'tAltitd_pki');
            $lat_ci = filter_input(INPUT_POST, 'tLat_ci');
            $lat_ni = filter_input(INPUT_POST, 'tLat_ni');
            $long_ci = filter_input(INPUT_POST, 'tLong_ci');
            $long_ni = filter_input(INPUT_POST, 'tLong_ni');
            $altitd_pkf = filter_input(INPUT_POST, 'tAltitd_pkf');
            $lat_cf = filter_input(INPUT_POST, 'tLat_cf');
            $lat_nf = filter_input(INPUT_POST, 'tLat_nf');
            $long_cf = filter_input(INPUT_POST, 'tLong_cf');
            $long_nf = filter_input(INPUT_POST, 'tLong_nf');
            $orient = filter_input(INPUT_POST, 'tOrient');
            $estrada = new Estrada(0,$codigo,$tutela, $classe, $ilha,$nseq,$estatuto,$extensao,$toponimo, $pontosext,$altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni,$altitd_pkf,$lat_cf, $lat_nf, $long_cf, $long_nf,$orient);                    
            $cx = new Conexao();
            $dal = new DALEstrada($cx);
            $dal->Inserir($estrada);
            $estrada = new Estrada();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
//Alterar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');    
            $codigo = filter_input(INPUT_POST, 'tCodigo');
            $tutela = filter_input(INPUT_POST, 'tTutela');
            $classe = filter_input(INPUT_POST, 'tClasse');
            $ilha = filter_input(INPUT_POST, 'tIlha');
            $nseq = filter_input(INPUT_POST, 'tNseq');
            $estatuto = filter_input(INPUT_POST, 'tEstatuto');          
            $extensao = filter_input(INPUT_POST, 'tExtensao');
            $toponimo = filter_input(INPUT_POST, 'tToponimo');
            $pontosext = filter_input(INPUT_POST, 'tPontosext');
            $altitd_pki = filter_input(INPUT_POST, 'tAltitd_pki');
            $lat_ci = filter_input(INPUT_POST, 'tLat_ci');
            $lat_ni = filter_input(INPUT_POST, 'tLat_ni');
            $long_ci = filter_input(INPUT_POST, 'tLong_ci');
            $long_ni = filter_input(INPUT_POST, 'tLong_ni');
            $altitd_pkf = filter_input(INPUT_POST, 'tAltitd_pkf');
            $lat_cf = filter_input(INPUT_POST, 'tLat_cf');
            $lat_nf = filter_input(INPUT_POST, 'tLat_nf');
            $long_cf = filter_input(INPUT_POST, 'tLong_cf');
            $long_nf = filter_input(INPUT_POST, 'tLong_nf');
            $orient = filter_input(INPUT_POST, 'tOrient');
            $cx = new Conexao();
            $dal = new DALEstrada($cx);
            $estrada = new Estrada($id_estrada,$codigo,$tutela,$classe,$ilha,$nseq,$estatuto,$extensao,
                                   $toponimo, $pontosext,$altitd_pki, $lat_ci, $lat_ni, $long_ci, $long_ni,
                                   $altitd_pkf, $lat_cf, $lat_nf, $long_cf, $long_nf,$orient);
            $dal->Alterar($estrada);
            $estrada = new Estrada();     
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalestrada = new DALEstrada($conexao);
            $retorno = $dalestrada->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $cx = new Conexao();
            $dal = new DALEstrada($cx);
            $estrada = $dal->CarregaEstrada(filter_input(INPUT_GET, 'cod'));
        }
            ?>       
    </head>
  <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Estradas</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/admin_main.php?pg=admin_nav'>|VOLTAR|</a>
            <form method="post" onsubmit="return pk()" name='estrada'id="estrada" style=" width:700px; height:850px; margin:0 auto; padding:60px; border-radius:10px;" action=../estrutura/admin_main.php?pg=estrada_registo&op=listar>
                <p><label style="margin-left: 33px;" for="cCodigo">Código</label>
                <input name="tCodigo"id="cCodigo" value="<?php echo $estrada->getCodigo(); ?>" style="height: 30px;color:#cc0066;font-size: 12pt;" autofocus  type="text" class="align"size= "12" />
                
                <p><label style="margin-left: 38px;" for="cTutela">Tutela</label>
                <select style="width:160px;color:#6E6E6E;height: 30px;" name ="tTutela" id="cTutela" >					
                   <option value="Nacional">Nacional</option>
                   <option value="Municipal">Municipal</option>
                   <option selected="true"><?php echo $estrada->getTutela(); ?></option></select> 
              
                 <p><label style="margin-left: 35px;" for="cClasse">Classe</label>
                     <select name ="tClasse" id="cClasse"value="<?php echo $estrada->getClasse(); ?>" style="height: 30px;width: 50px;"  >
                        <option value="1ª">1ª</option>
                        <option value="2ª">2ª</option>
                        <option value="3ª">3ª</option>
                        <option selected><?php echo $estrada->getClasse(); ?></option></select>   
                
               <p><label  style="margin-left: 53px;" for="cIlha">Ilha</label>
                   <select value="<?php echo $estrada->getIlha(); ?>"style="height: 30px;" name ="tIlha" id="cIlha" >
                       <option ></option>
                        <?php
                        $valor = "";
                        $conexao = new Conexao();
                        $dal = new DALIlha($conexao);
                        $res = $dal->cmbIlha($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['ilha'] . "\">" . $reg['ilha'] . "</option>";
                        }
                        ?>
                        <option selected=""><?php echo $estrada->getIlha(); ?></option></select>                  
                   <p> <label style="margin-left: 33px;" for="cNseq">Nº Seq.</label>
                <input name="tNseq"id="cNseq" value="<?php echo $estrada->getNseq(); ?>" style="height: 30px;width: 50px;" autofocus  type="text" class="align"size= "12" />                 
                 <p><label style="margin-left: 30px;" for="cEstatuto">Estatuto</label>
                    <select value="<?php echo $estrada->getEstatuto(); ?>" style="height: 30px;" name ="tEstatuto" id="cEstatuto" >					
                        <option value="Desclassificada">Desclassificada</option>
                        <option value="Reclassificada">Reclassificada</option>							
                        <option selected><?php echo $estrada->getEstatuto(); ?></option></select>                                 
                <p><label style="margin-left: 23px;"for="cExtensao">Extensão</label>
                    <input name ="tExtensao" id="cExtensao" value="<?php echo $estrada->getExtensao(); ?>"style="height: 30px;" type="text" class="align" placeholder="0.000"size= "12"/>                             
                <fieldset style="width:680px;border:2px groove ;">
                <p><label style="margin-left: 0px;"for="cToponimo">Topónimo</label>
                    <input value="<?php echo $estrada->getToponimo(); ?>" style="height: 30px;" type="text" style="height: 18px;"  name ="tToponimo" id="cToponimo" size= "80"/>                
                   <p><label style="margin-left: 18px;" for="cPontosext">Pontos</label>
                   <input value="<?php echo $estrada->getPontosext(); ?>"style="height: 30px;" type="text"name ="tPontosext" id="cPontosext"  size= "80"placeholder="Extremos e intermédios"/><p>
                </fieldset>    
                    <!-------------------------------------------- PK INÍCIO ------------------------------------------------------------------->                    
                <p><label style="margin-left: 80px;color: #708090; font-weight: bold;">pk Início</label><p>
                     <label style="margin-left:17px;" for="cAltitd_pki">Altitude(m)</label>
                     <input style="height: 30px;"value="<?php echo $estrada->getAltitd_pki(); ?>"type="text" name ="tAltitd_pki" id="cAltitd_pki" class="align" size= "5" placeholder="0"/>
                    <!-------------------------------------------- LATITUDE ------------------------------------------------------------------->
                <p><label style="margin-left:33px;" for="cLatitudeGi">Latitude</label>
                    <input style="height: 30px;" type="text"  name ="tLatitudeGi" id="cLatitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input style="height: 30px;"type="text" name ="tLatitudeMi" id="cLatitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input style="height: 30px;"type="text"  name ="tLatitudeSi" id="cLatitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label style="height: 30px;"for="cLatitude"></label>					
                    <input value="<?php echo $estrada->getLat_ci(); ?>" style="height: 30px;"charset= "utf8" type="text" name ="tLat_ci" id="cLatitudei" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $estrada->getLat_ni(); ?>"style="height: 30px;"type="text"  name ="tLat_ni" id="cLatitudeNi" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                    <input style="height: 30px;"type="button" class="botao" name ="tGravarLat"  id="cGravarLati" onclick ="coordLati()"/>
                    <!----------------------------------------------------------------------------->
                <p><label style="margin-left:23px;" for="cLongitudeGi">Longitude</label> 
                    <input style="height: 30px;"type="text"  name ="tLongitudeGi" id="cLongitudeGi" class="align" size= "5"placeholder="00"/>
                    <label>°</label>	
                    <input style="height: 30px;"type="text"  name ="tLongitudeMi" id="cLongitudeMi" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input style="height: 30px;"type="text"  name ="tLongitudeSi" id="cLongitudeSi" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label style="height: 30px;"for="cLongitude"></label>
                    <input value="<?php echo $estrada->getLong_ci(); ?>" style="height: 30px;"type="text"   name ="tLong_ci" id="cLongitudei" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label style="height: 30px;"for="cLongitudeN"></label>
                    <input value="<?php echo $estrada->getLong_ni(); ?>"style="height: 30px;"type="text"  name ="tLong_ni" id="cLongitudeNi" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input style="height: 30px;"type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongi()"/>                                       
                    <!-------------------------------------------- PK FIM -------------------------------------------------------------------------->                
                <p><label style="margin-left: 80px;color:#708090; font-weight: bold;" >pk Fim</label><p>
                    <label style="margin-left:17px;" for="cAltitd_pkf">Altitude(m)</label>
                    <input style="height: 30px;"value="<?php echo $estrada->getAltitd_pkf(); ?>"type="text" name ="tAltitd_pkf" id="cAltitd_pkf" class="align" size= "5" placeholder="0"/>
                    <!------------------------------------------- LATITUDE ------------------------------------------------------------------------------>
                <p><label style="margin-left:33px;"for="cLatitudeGf">Latitude</label>
                    <input style="height: 30px;"type="text" name ="tLatitudeGf" id="cLatitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input style="height: 30px;"type="text" name ="tLatitudeMf" id="cLatitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input style="height: 30px;"type="text" name ="tLatitudeSf" id="cLatitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitudef"></label>					
                    <input value="<?php echo $estrada->getLat_cf(); ?>"style="height: 30px;"charset= "utf8" type="text" name ="tLat_cf" id="cLatitudef" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $estrada->getLat_nf(); ?>"style="height: 30px;"type="text" name ="tLat_nf" id="cLatitudeNf" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                    <input style="height: 30px;"type="button" class="botao" name ="tGravarLat"  id="cGravarLatf" onclick ="coordLatf()"/>
                    <!----------------------------------------------------------------------------->
                <p><label style="margin-left:23px;" for="cLongitudeGf">Longitude</label> 
                    <input style="height: 30px;"style="height: 30px;"type="text" name ="tLongitudeGf" id="cLongitudeGf" class="align" size= "5"placeholder="00"/>
                    <label>°</label>	
                    <input style="height: 30px;"type="text" name ="tLongitudeMf" id="cLongitudeMf" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input style="height: 30px;"type="text" name ="tLongitudeSf" id="cLongitudeSf" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLongitudef"></label>
                    <input value="<?php echo $estrada->getLong_cf(); ?>" style="height: 30px;"type="text" name ="tLong_cf" id="cLongitudef" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeNf"></label>
                    <input value="<?php echo $estrada->getLong_nf(); ?>"style="height: 30px;"type="text" name ="tLong_nf" id="cLongitudeNf" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input style="height: 30px;"type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLongf()"/><br><br>				
                <p><label style="margin-left: 18px;" for="cOrient">Orientação</label>
                    <select name ="tOrient" id="cClasse"value="<?php echo $estrada->getOrient(); ?>" style="height: 30px;width: 100px;"  >
                    <option value="Crescente">Crescente</option>
                    <option value="Decrescente">Decrescente</option>
                    <option selected><?php echo $estrada->getOrient(); ?></option></select>       
                    
                    <!--------------------------------------------------------------------------------------------------------------------------------->
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($estrada->getId_estrada() == 0) {
                    ?>
                      <input style="margin-left:190px;width: 100Px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100Px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/admin_main.php?pg=admin_nav'"/><br>
                    <?php
                } else {
                    ?>  
                    <input style="width: 100Px;margin-left: 190px;" class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100Px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_estrada" id="id_estrada" value="<?php echo $estrada->getId_estrada(); ?>"/>      
                <?php } ?>
                     </div>   
        </form><br>
          <form style="margin:10px auto;width: 280px;height: 30px" class="tab"  name='tab' method="post">
           
                    <select style="height: 30px;color: #000099;margin-left: 30px;width: 150px;" name ="tIlha" id="cIlha">  
                        <?php
                        $ilha = "";
                        $cx = new Conexao();
                        $dal = new DALIlha($cx);
                        $resultado = $dal->cmbIlha($Ilha);
                        While ($registo = $resultado->fetch_array()) {
                            echo "<option value=\"" . $registo['ilha'] . "\">" . $registo['ilha'] . "</option>";
                        }
                        ?>  
                        <option selected=""value="0">Ilha</option>
                    </select>      
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 75px;"class="cmd" type="submit" name='localizar' value="Selecionar"<br><br>           
          </form>
         <table id="est" class="tabela" width ="180%" border="1">
                <tr >
                    <td style="border: none;" class='pf'colspan="10" align="center"></td>    
                    <td style="font-weight: bold;"class="title" colspan="5" align="center">pk Início</td> 
                    <td style="font-weight: bold;"class="title" colspan="5" align="center">pk Fim</td>     
                </tr>	
                <tr >
                    <td style="border: none;background-color: #ffffff"class='pf'colspan="11" align="center"></td>       
                </tr>	
                <tr>
                    <td style="font-weight: bold;"class="title" align="center">Id Estrada</td>
                    <td style="font-weight: bold;"class="title"align="center" >Código</td>
                    <td style="font-weight: bold;"class="title"align="center">Tutela</td>
                    <td style="font-weight: bold;"class="title"align="center">Classe</td>
                    <td style="font-weight: bold;"class="title"align="center">ilha</td>
                    <td style="font-weight: bold;"class="title"align="center">Nº Seq.</td>
                    <td style="font-weight: bold;"class="title"align="center">Estatuto</td>
                    <td style="font-weight: bold;"class="title"align="center">Extensão(km)</td>
                    <td style="font-weight: bold;"class="title"align="center">Toponimo</td>
                    <td style="font-weight: bold;"class="title"align="center">Pontos extremos e interiores</td>                   
                    <td style="font-weight: bold;"class="title"colspan=""align="center">Altitude</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Latitude</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Longitude</td>
                    <td style="font-weight: bold;"class="title"colspan=""align="center">Altitude</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Latitude</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Longitude</td> 
                    <td style="font-weight: bold;"class="title"align="center">Orientação</td>
                </tr>
                <?php               
                 $valor = "";
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tIlha');
                }
                $cx = new Conexao();
                $dal = new DALIlha($cx);
                $resultado = $dal->TabEstrada($valor);
                While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'admin_main.php?pg=estrada_registo&op=excluir&cod=' . $registo['id_estrada'];
                $linkalterar = 'admin_main.php?pg=estrada_registo&op=alterar&cod=' . $registo['id_estrada'];
                    ?>
                    <tr>
                        <td class="tab"align="center" style="width: 1%;color:#0033cc;font-size: 12pt;"><?php echo $registo["id_estrada"]; ?></td>
                        <td class="tab"align="center"style="width: 1%; color:#cc0066;font-size: 12pt;"><?php echo $registo["codigo"]; ?></td>
                        <td class="tab"style="width:3%"><?php echo $registo["tutela"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["classe"]; ?></td>
                        <td class="tab"style="width:2%"><?php echo $registo["ilha"]; ?></td> 
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["nseq"]; ?></td>
                        <td class="tab"style="width: 1%"><?php echo $registo["estatuto"]; ?></td>                     
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["extensao"]; ?></td> 
                        <td class="tab"style="width: 5%;color:#0000cc;"><?php echo $registo["toponimo"]; ?></td>
                        <td class="tab"style="width: 5%"><?php echo $registo["pontosext"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["altitd_pki"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["lat_ci"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["lat_ni"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["long_ci"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["long_ni"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["altitd_pkf"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["lat_cf"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["lat_nf"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["long_cf"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["long_nf"]; ?></td>
                        <td class="tab"style="width: 1%"><?php echo $registo["orient"]; ?></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>
                 <?php
                     }
                        ?>
            </table> 
            <p><a id="voltar"style="text-align:center;" href='#top'>| INÍCIO |</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>      
            </footer>
    </body>
</html>


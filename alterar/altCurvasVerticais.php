<!DOCTYPE html>
<!--smsa.2018-->
 <?php //ini_set('display_errors','1');?>
 <?php session_start(); ?>  
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curvas verticais</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>form#cVertical{height: 390px;}</style>    
    <?php
    require_once '../classes/Conexao.php';
    require_once '../classes/EstradaFicha.php';
    require_once '../classes/CurvasVerticais.php';
    require_once '../classes/DALCurvasVerticais.php';
    include_once '../estrutura/header.php';
    date_default_timezone_set('Atlantic/Azores');
    $curvav = new CurvasVerticais();   
//Retificar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_curvav = filter_input(INPUT_POST, 'tId_curvav');
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $lat_c = filter_input(INPUT_POST, 'tLat_c');
            $lat_n = filter_input(INPUT_POST, 'tLat_n');
            $long_c = filter_input(INPUT_POST, 'tLong_c');
            $long_n = filter_input(INPUT_POST, 'tLong_n');
            $altitude = filter_input(INPUT_POST, 'tAltitude');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $raiovertical = filter_input(INPUT_POST, 'tRaiovertical');
            $ass = filter_input(INPUT_POST, 'tAss');
            $arq = filter_input(INPUT_POST, 'tArq');
            $data_arq = filter_input(INPUT_POST, 'tData_arq');
            $conexao = new Conexao();
            $dalcurvav = new DALCurvasVerticais($conexao);
            $curvav = new CurvasVerticais($id_curvav, $alt, $reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $sentido, $raiovertical, $ass,$arq,$data_arq);
            $dalcurvav->Rectificar($curvav);
            $curvav = new CurvasVerticais();           
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalcurvav = new DALCurvasVerticais($conexao);
            $retorno = $dalcurvav->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Retificar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalcurvav = new DALCurvasVerticais($conexao);
            $curvav = $dalcurvav->CarregaCurvavRect(filter_input(INPUT_GET, 'cod'));
        }
    ?> 
        </head>
          <?php include_once '../estrutura/header.php'; ?>
    <body>
        <h1 class="op">ALTERAR - Curva vertical</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>
        <form style="height:400px;"method="post" onsubmit="return pk()"name="curvav" id="cruvav"action="../estrutura/alterar_main.php?pg=curvav&op=listar" >
            <p><label class="label_1" for="cId_curvav">ID Curva vertical</label>
                <input style="background-color:#ccffcc;border-style: none;height: 25px;color:#7F7F7F;"type="text" use readonly="true"  name="tId_curvav" id="id_curvav" value="<?php echo $curvav->getId_curvav(); ?>"class="align" size="6"/>            
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" type="text" value= '<?php echo $curvav->getData(); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;"type="text" value= '<?php echo $curvav->getHora(); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
           <hr> 
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option>1</option>
                    <option selected>0</option><?php echo $curvav->getAlt(); ?></select>
                &nbsp;<label  for="cReg">Registo</label>
                <input value="<?php echo $curvav->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"required="true"/>            
                <label class="" for="cArq">Arquivar</label>
                <select   class="alt" name ="tArq" id="cArq">
                    <option selected="">0</option>
                    <option>1</option><?php echo $curvav->getArq(); ?>  </select>    
                &nbsp;<label  for="cData_arq">Data</label>
                <input style="height: 20px"value="<?php echo $curvav->getData_arq(); ?>" type="date" name ="tData_arq"  id="cData_arq" class="align" size= "6"/> 
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $curvav->getId_estrada(); ?>"autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/>
            <p><label class="label_1" for="cPkinicio">pk Início</label>
                <input  value="<?php echo $curvav->getPkinicio(); ?>"type="text" required="" class="align"name ="tPkinicio" id="cPkinicio" size= "5"placeholder="0.000"/>
            <p><label class="label_1"for="cPkfim">pk Fim</label>
                <input  value="<?php echo $curvav->getPkfim(); ?>"type="text" class="align"name ="tPkfim" id="cPkfim" size= "5"placeholder="0.000"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1"for="cLatitudeG">Latitude</label>
                <input type="text" name ="tLatitudeG" id="cLatitudeG" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeM" id="cLatitudeM" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLatitudeS" id="cLatitudeS" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input <input value="<?php echo $curvav->getLat_c(); ?>"charset= "utf8" type="text" name ="tLat_c" id="cLatitude" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input value="<?php echo $curvav->getLat_n(); ?>"type="text" name ="tLat_n" id="cLatitudeN" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                <input type="button" class="botao" name ="tGravarLat"  id="cGravarLat" onclick ="coordLat()"/>
                <!-------------------------------------------------------------------------------------------->     
            <p><label class="label_1" for="cLongitudeG">Longitude</label> 
                <input type="text" name ="tLongitudeG" id="cLongitudeG" class="align" size= "5"placeholder="00"/>
                <label>°</label>	
                <input type="text" name ="tLongitudeM" id="cLongitudeM" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLongitudeS" id="cLongitudeS" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLongitude"></label>
                <input value="<?php echo $curvav->getLong_c(); ?>"type="text" name ="tLong_c" id="cLongitude" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input value="<?php echo $curvav->getLong_n(); ?>"type="text" name ="tLong_n" id="cLongitudeN" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLong()"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1"for="cAltitude">Altitude(m)</label>
                <input value="<?php echo $curvav->getAltitude(); ?>"type="text"class="align" name ="tAltitude" id="cAltitude" size= "5" placeholder="0"/>
            <p><label class="label_1"for="cSentido">Sentido</label>
                <select class="sentido" required="" name ="tSentido" id="cSentido">					
                    <option value="Crescente">Crescente</option>
                    <option value="Decrescente">Decrescente</option>							
                    <option selected><?php echo $curvav->getSentido()?></option></select>  
            <p><label class="label_1" for="cRaiovertical">Raio vertical</label>
                <input value="<?php echo $curvav->getRaiovertical(); ?>"type="text" class="align" name ="tRaiovertical" id="cRaiovertical" size= "5" required="true"placeholder="0"
                       /><br><br> 
                <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($curvav->getId_curvav() == 0) {
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
        <input type="text" name="curvav" id='curvav' placeholder="ID Estrada" style= "width: 120px;" />
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>  
        <table id="est" accept-charset="UTF-8" width ="100%" border='1'class="tabela" style="margin: auto;">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alteração</td> 
                <td class="title" align="center" >Registo</td>  
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Raio (graus)</td> 
                <td class="title" align="center" >Arquivo</td>
                <td class="title" align="center" >Data</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'curvav');
            }
            $cx = new Conexao();
            $dalcurvav = new DALCurvasVerticais($cx);
            $resultado = $dalcurvav->LocalizarRect($valor);
            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'alterar_main.php?pg=curvav&op=excluir&cod=' . $registo['id_curvav'];
                $linkalterar = 'alterar_main.php?pg=curvav&op=alterar&cod=' . $registo['id_curvav'];
                ?>  
                <tr>                      
                    <td class="tab" width="2%" align="center"><?php echo $registo["id_curvav"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["sentido"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["raiovertical"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["arq"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["data_arq"]; ?></td>
                    <td class="tab"width="1%"align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
           <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=curvav">| INÍCIO |</a>
      <footer>
             <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
</body>
</html>

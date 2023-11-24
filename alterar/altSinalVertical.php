<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <title>Sinalização vertical</title>     
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/SinalVertical.php';
        require_once '../classes/DALSinalVertical.php';
        include_once '../estrutura/header.php';
        date_default_timezone_set('Atlantic/Azores');
        $svt = new Sinalvt();
//Retificar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_sinalvt = filter_input(INPUT_POST,'tId_sinalvt');
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
            $sinalvt = filter_input(INPUT_POST, 'tSinalvt');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            $arq = filter_input(INPUT_POST, 'tArq');
            $data_arq = filter_input(INPUT_POST, 'tData_arq');
            $svt = new Sinalvt($id_sinalvt,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $sinalvt, $sentido, $ass, $arq, $data_arq);
            $cx = new Conexao();
            $dal = new DALSinalVertical($cx);
            $dal->Rectificar($svt);
            $svt= new Sinalvt();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalsinalvt = new DALSinalVertical($conexao);
            $retorno = $dalsinalvt->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Retificar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $svt = new DALSinalVertical($conexao);
            $svt = $svt->CarregaSinalvtRect(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
    <body>       
        <h1 class="op">ALTERAR - Sinalização vertical</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>
        <form style="height: 360px;" method="post" onsubmit="return pk()" id="sinalvt"action="../estrutura/alterar_main.php?pg=sinalvt&op=listar">
           <p><label class="label_1" for="cId_sinalvt">ID Sinalvt</label>
                <input style="background-color:#ccffcc;border-style: none;height: 25px;color:#7F7F7F;" type="text" use readonly="true"  name="tId_sinalvt" id="id_sinalvt" value="<?php echo $svt->getId_sinalvt(); ?>"class="align" size="6"/>            
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" type="text" value= '<?php echo $svt->getData(); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
                <input style="margin-left:0px;background-color:#ccffcc;border-style: none;height: 25px;" value= '<?php echo $svt->getHora(); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
           <hr> 	
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option selected="">0</option>
                    <option>1</option><?php echo $svt->getAlt(); ?></select>	
                 <label  for="cReg">Registo</label>
                 <input value="<?php echo $svt->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"required=""/>
             <label class="" for="cArq">Arquivar</label>
                <select   class="alt" name ="tArq" id="cArq">
                    <option  selected="">0</option>
                    <option>1</option><?php echo $svt->getArq(); ?></select>          
                &nbsp;<label  for="cData_arq">Data</label>
                <input style="height: 20px"value="<?php echo $svt->getData_arq(); ?>" type="date" name ="tData_arq"  id="cData_arq" class="align" size= "6"/>
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $svt->getId_estrada(); ?>"autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/>               
            <p><label class="label_1"for="cPkinicio">pk Início</label>
                <input value="<?php echo $svt->getPkinicio(); ?>"type="text" required name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label style="margin-left: 35px;" for="cPkfim">pk Fim</label>
                <input style="margin-left:10px;"value="<?php echo $svt->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1"for="cLatitudeG">Latitude</label>
                <input type="text" name ="tLatitudeG" id="cLatitudeG" class="align" size= "5"placeholder="00"/>
                <label>°</label>
                <input type="text" name ="tLatitudeM" id="cLatitudeM" class="align" size= "5"placeholder="00"/>
                <label>'</label>
                <input type="text" name ="tLatitudeS" id="cLatitudeS" class="align" size= "5"placeholder="00"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input value="<?php echo $svt->getLat_c(); ?>"charset= "utf8" type="text" name ="tLat_c" id="cLatitude" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input value="<?php echo $svt->getLat_n(); ?>"type="text" name ="tLat_n" id="cLatitudeN" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                <input value="<?php echo $svt->getLong_c(); ?>"type="text" name ="tLong_c" id="cLongitude" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input value="<?php echo $svt->getLong_n(); ?>"type="text" name ="tLong_n" id="cLongitudeN" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLong()"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1"for="cAltitude">Altitude(m)</label>
                <input value="<?php echo $svt->getAltitude(); ?>"type="text" name ="tAltitude" id="cAltitude" class="align" size= "5" placeholder="0"/>
            <p><label class="label_1"for="cSinavt">Sinal vertical</label>
                <select style="height: 24px;" name ="tSinalvt" id="cSinalvt">					
                    <option>De código</option>
                    <option>De orientação</option>
                    <option selected><?php echo $svt->getSinalvt(); ?></option></select>
            <p><label class="label_1"for="cSentido">Sentido</label>
                <select style="width:108px;" class="sentido"  name ="tSentido" id="cSentido" >					
                    <option>Crescente</option>
                    <option>Decrescente</option>
                    <option selected><?php echo $svt->getSentido(); ?></option></select><br><br><br>
                <!--------------------------------------------------------------------------------------------> 
                    <?php
                    if ($svt->getId_sinalvt() == 0) {
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
        <input type="text" name="sinalvt" id='sinalvt' placeholder="ID Estrada" style= "width: 120px;" />
        &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>  
            <table id="est" accept-charset="UTF-8" width ="110%" border='1' class="tabela">
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
                <td class="title" align="center" >Sinal vertical</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Arquivo</td>
                <td class="title" align="center" >Data</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'sinalvt');
            }
            $cx = new Conexao();
            $dal = new DALSinalVertical($cx);
            $resultado = $dal->LocalizarRect($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'alterar_main.php?pg=sinalvt&op=excluir&cod=' . $registo['id_sinalvt'];
                $linkalterar = 'alterar_main.php?pg=sinalvt&op=alterar&cod=' . $registo['id_sinalvt'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_sinalvt"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sinalvt"]; ?></td>  
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
                     <td class="tab"width="1%"align="center"><?php echo $registo["arq"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["data_arq"]; ?></td>
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
       </table><br>
           <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=sinalvt">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

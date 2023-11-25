<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <?php session_start();?>
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
//Inserir registo
        $svt = new Sinalvt();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
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
            $svt = new Sinalvt(0,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $sinalvt, $sentido, $ass);
            $cx = new Conexao();
            $dal = new DALSinalVertical($cx);
            $dal->Inserir($svt);
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
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
            $svt = new Sinalvt($id_sinalvt,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $sinalvt, $sentido, $ass);
            $cx = new Conexao();
            $dal = new DALSinalVertical($cx);
            $dal->Alterar($svt);
            $svt= new Sinalvt();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalsinalvt = new DALSinalVertical($conexao);
            $retorno = $dalsinalvt->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $svt = new DALSinalVertical($conexao);
            $svt = $svt->CarregaSinalvt(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
    <body>       
        <h1 class="op">REGISTAR - Sinalização vertical</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height: 360px;" method="post" onsubmit="return pk()" id="sinalvt"action="../estrutura/levantamento_main.php?pg=sinalvt&op=listar">
            <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input style="margin-left:3px;" type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option>0</option>
                    <option>1</option>	
            <option><?php echo $svt->getAlt(); ?></option></select>
                 <label  for="cReg">Registo</label>
                <input value="<?php echo $svt->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
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
                <input style="margin-left:225px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                        <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabsinalvt'"/>
                        <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                        <?php
                    } else {
                        ?>  
                        <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                        <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                        <input hidden="" type="text"  name="tId_sinalvt" id="id_sinalvt" value="<?php echo $svt->getId_sinalvt(); ?>"/>          
                    <?php } ?>
                    <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" />   
        </form><br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
            <form class="tab" name='tab'method="post">
                <select style="width:160px;color:#6E6E6E;height: 25px;" name ="sentido" id="sentido" >					
                    <option>Crescente</option>
                    <option>Decrescente</option>
                    <option selected="true">Sentido</option></select>
               &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
            </form>      
            <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alteração</td> 
                <td class="title" align="center" >Registo</td>  
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title" align="center" >Sinal vertical</td>
                <td class="title" align="center" >Sentido</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'sentido');
            }
            $cx = new Conexao();
            $dal = new DALSinalVertical($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=sinalvt&op=excluir&cod=' . $registo['id_sinalvt'];
                $linkalterar = 'levantamento_main.php?pg=sinalvt&op=alterar&cod=' . $registo['id_sinalvt'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_sinalvt"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sinalvt"]; ?></td>  
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

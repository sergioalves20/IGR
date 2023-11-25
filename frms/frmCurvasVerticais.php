<!DOCTYPE html>
<!--canoa.2018-->
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
//Inserir registo
        $curvav = new CurvasVerticais();
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
        $sentido = filter_input(INPUT_POST, 'tSentido');
        $raiovertical = filter_input(INPUT_POST, 'tRaiovertical');
        $ass = filter_input(INPUT_POST, 'tAss');
        $curvav = new CurvasVerticais(0,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $sentido, $raiovertical, $ass);
        $cx = new Conexao();
        $dal = new DALCurvasVerticais($cx);
        $dal->Inserir($curvav);
        $curvav = new CurvasVerticais();
        echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";        
    }
     //Alterar registo
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
            $conexao = new Conexao();
            $dalcurvav = new DALCurvasVerticais($conexao);
            $curvav = new CurvasVerticais($id_curvav, $alt, $reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $sentido, $raiovertical, $ass);
            $dalcurvav->Alterar($curvav);
            $curvav = new CurvasVerticais();           
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalcurvav = new DALCurvasVerticais($conexao);
            $retorno = $dalcurvav->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalcurvav = new DALCurvasVerticais($conexao);
            $curvav = $dalcurvav->CarregaCurvav(filter_input(INPUT_GET, 'cod'));
        }
    ?> 
        </head>
          <?php include_once '../estrutura/header.php'; ?>
    <body>
        <h1 class="op">REGISTAR - Curva vertical</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:400px;"method="post" onsubmit="return pk()" id="cVertical"action="../estrutura/levantamento_main.php?pg=curvav&op=listar" >
            <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select class="alt" name ="tAlterar" id="cAlterar">
                    <option>1</option>
                    <option selected>0</option><?php echo $curvav->getAlt(); ?></select>
                &nbsp;<label  for="cReg">Registo</label>
                <input value="<?php echo $curvav->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>   
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
                <input value="<?php echo $curvav->getRaiovertical(); ?>"type="text" class="align" name ="tRaiovertical" id="cRaiovertical" size= "5" placeholder="0"/><br><br><br>
                <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" />  
                <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($curvav->getId_curvav() == 0) {
                    ?>
                    <input style="margin-left:220px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabcurvav'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_curvav" id="cId_curvav" value="<?php echo $curvav->getId_curvav(); ?>"/>          
                <?php } ?>                         
        </form><br>
        <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
        <table id="est" accept-charset="UTF-8" width ="80%" border='1'class="tabela" style="margin: auto;">
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
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Raio (graus)</td>     
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'curvav');
            }
            $cx = new Conexao();
            $dalcurvav = new DALCurvasVerticais($cx);
            $resultado = $dalcurvav->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=curvav&op=excluir&cod=' . $registo['id_curvav'];
                $linkalterar = 'levantamento_main.php?pg=curvav&op=alterar&cod=' . $registo['id_curvav'];
                ?>  
                <tr>                      
                    <td class="tab" width="2%" align="center"><?php echo $registo["id_curvav"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["sentido"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["raiovertical"]; ?></td>                   
                    <td class="tab"width="1%"align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
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

<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Postos de contagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style type="text/css">
            .label_1{width:90px;float:left;display:block;}  
            select#cSentido{margin-left: 45px;}
            input#cSitio{text-align: left;}
            form#posto{width:740px;height: 350px;}
        </style>
            <?php
            require_once '../classes/Conexao.php';
            require_once '../classes/EstradaFicha.php';
            require_once '../classes/PContagem.php';
            require_once '../classes/DALPContagem.php';
//Inserir registo
            $pcont = new PContagem();
            if (filter_has_var(INPUT_POST, 'tGuardar')) {
                $alt = filter_input(INPUT_POST, 'tAlterar');
                $reg = filter_input(INPUT_POST, 'tReg');
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $pk = filter_input(INPUT_POST, 'tPk');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $sitio = filter_input(INPUT_POST, 'tSitio');
                $lat_c = filter_input(INPUT_POST, 'tLat_c');
                $lat_n = filter_input(INPUT_POST, 'tLat_n');
                $long_c = filter_input(INPUT_POST, 'tLong_c');
                $long_n = filter_input(INPUT_POST, 'tLong_n');
                $altitude = filter_input(INPUT_POST, 'tAltitude');
                $ass = filter_input(INPUT_POST, 'tAss');
                $pcont = new PContagem(0, $alt, $reg, $data, $hora,$id_estrada, $pk, $sentido, $sitio, $lat_c, $lat_n, $long_c, $long_n, $altitude, $ass);
                $cx = new Conexao();
                $dal = new DALPContagem($cx);
                $dal->Inserir($pcont);
                echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            $pcont = new PContagem();   
            }
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_pcontagem = filter_input(INPUT_POST, 'tId_pcontagem');
                $alt = filter_input(INPUT_POST, 'tAlterar');
                $reg = filter_input(INPUT_POST, 'tReg');
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $pk = filter_input(INPUT_POST, 'tPk');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $sitio = filter_input(INPUT_POST, 'tSitio');
                $lat_c = filter_input(INPUT_POST, 'tLat_c');
                $lat_n = filter_input(INPUT_POST, 'tLat_n');
                $long_c = filter_input(INPUT_POST, 'tLong_c');
                $long_n = filter_input(INPUT_POST, 'tLong_n');
                $altitude = filter_input(INPUT_POST, 'tAltitude');
                $ass = filter_input(INPUT_POST, 'tAss');
                $pcont = new PContagem($id_pcontagem, $alt, $reg, $data, $hora,$id_estrada, $pk, $sentido, $sitio, $lat_c, $lat_n, $long_c, $long_n, $altitude, $ass);
                $cx = new Conexao();
                $dal = new DALPContagem($cx);
                $dal->Alterar($pcont);
                echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            $pcont = new PContagem();   
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALPContagem($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALPContagem($conexao);
            $pcont = $dal->CarregaPostos(filter_input(INPUT_GET, 'cod'));
        }
            ?>             
    </head>
     <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Postos de contagem de tráfego</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
            <form method="post" name="posto" onsubmit="return pk()" id="posto" action="../estrutura/levantamento_main.php?pg=pcont&op=listar">                
                <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                    <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
                    <p><label class="label_1" for="cAlterar">Alteração</label>
                    <select class="alt" name ="tAlterar" id="cAlterar">
                        <option>1</option>
                        <option>0</option>
                        <option selected><?php echo $pcont->getAlt(); ?></option></select>
                   <label  for="cReg">Registo</label>
                    <input value="<?php echo $pcont->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>	
                <p><label class="label_1"for="cId_estrada">ID Estrada</label>
                    <input value="<?php echo $pcont->getId_estrada(); ?>" required="" type="text" name ="tId_estrada" id="cId_estrada" class="align" size= "5"/>	
                    <!----------------------------------------------- PK--------------------------------------------------->
                <p><label class="label_1"for="cPk">Pk</label>
                    <input value="<?php echo $pcont->getPk(); ?>" required="" type="text" name ="tPk" id="cPk" class="align" size= "5"placeholder="0,000"/>
                <p><label for="cSentido">Sentido</label>
                    <select class="alt" name ="tSentido" id="cSentido">					
                        <option>Crescente</option>
                        <option>Decrescente</option>
                        <option selected><?php echo $pcont->getSentido(); ?></option></select> 
                <p><label class="label_1" for="cSitio">Local</label>
                    <input value="<?php echo $pcont->getSitio(); ?>"type="text" class="align" id="cSitio" required="" name ='tSitio' size= "58" />        
                    <!--------------------------------------------------------------------------------------------> 
                <p><label class="label_1"for="cLatitudeG">Latitude</label>
                    <input type="text" name ="tLatitudeG" id="cLatitudeG" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeM" id="cLatitudeM" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeS" id="cLatitudeS" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input value="<?php echo $pcont->getLat_c(); ?>" charset= "utf8" type="text" name ="tLat_c" id="cLatitude" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input value="<?php echo $pcont->getLat_n(); ?>" type="text" name ="tLat_n" id="cLatitudeN" class="align" size= "10"placeholder="00,00000000" Use readonly="true"/>                          
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
                    <input value="<?php echo $pcont->getLong_c(); ?>"type="text" name ="tLong_c" id="cLongitude" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input value="<?php echo $pcont->getLong_n(); ?>"type="text" name ="tLong_n" id="cLongitudeN" class="align" size= "10" placeholder="00,00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLong()"/>
                <p><label class="label_1"for="cAltitude">Altitude(m)</label>
                    <input value="<?php echo $pcont->getAltitude(); ?>"type="text" name ="tAltitude" id="cAltitude" class="align" size= "5" placeholder="0"/><br><br>
                    <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" />                      
            <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">                  
             <?php            
                if ($pcont->getId_pcontagem() == 0) {
                    ?>                   
                    <input style="margin-left:250px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabpcont'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text"hidden="" name="tId_pcontagem" id="tId_pcontagem" value="<?php echo $pcont->getId_pcontagem(); ?>"/> 
                <?php } ?>
                    </div>
            </form>
        <br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>  
            <table id="est" style="margin: 0 auto;" accept-charset="UTF-8" width ="100%" border="1" class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alt.</td>
                <td class="title" align="center" >Registo</td>
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >Pk</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="" >Local</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td> 
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tId_pcontagem');
            }
            $cx = new Conexao();
            $dal = new DALPContagem($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=pcont&op=excluir&cod=' . $registo['id_pcontagem'];
                $linkalterar = 'levantamento_main.php?pg=pcont&op=alterar&cod=' . $registo['id_pcontagem'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_pcontagem"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pk"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="6%"align=""><?php echo $registo["sitio"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                               
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

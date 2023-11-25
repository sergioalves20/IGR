<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start()?>
<html>   
    <head>
        <meta charset="UTF-8">
        <title>Singularidades</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Singularidade.php';
        require_once '../classes/DALSingularidade.php';
//Inserir registo
        $sing = new Singularidade();
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
            $singularidade = filter_input(INPUT_POST, 'tSing');
            $ass = filter_input(INPUT_POST, 'tAss');           
            $cx = new Conexao();
            $dalsingularidade = new DALSingularidade($cx);
            $sing = new Singularidade(0, $alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $singularidade, $ass);
            $dalsingularidade->Inserir($sing);
            $sing = new Singularidade();
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
             }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_sing = filter_input(INPUT_POST,'tId_sing');
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
            $singularidade = filter_input(INPUT_POST, 'tSing');
            $ass = filter_input(INPUT_POST, 'tAss');
            $conexao = new Conexao();
            $dal = new DALSingularidade($conexao);
            $sing = new Singularidade($id_sing,$alt,$reg,$id_estrada,$data,$hora,$pkinicio,$pkfim,$lat_c,$lat_n,$long_c,$long_n,$altitude,$singularidade,$ass);                                   
            $dal->Alterar($sing);
            $sing = new Singularidade();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalsingularidade = new DALSingularidade($conexao);
            $retorno = $dalsingularidade->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalsingularidade = new DALSingularidade($conexao);
            $sing = $dalsingularidade->CarregaSingularidade(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
   <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Singularidade</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:350px;"method="post" onsubmit="return pk()" name='singularidade' id="sing" action="../estrutura/levantamento_main.php?pg=singularidade&op=listar" >
           <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />
            <input style="margin-left:3px;"type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select   class="alt" name ="tAlterar" id="cAlterar">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $sing->getAlt(); ?></option></select>
               <label  for="cReg">Registo</label>
                <input value="<?php echo $sing->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"autocomplete="off"/>   
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $sing->getId_estrada(); ?>" autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5" autocomplete="off"/>               
            <p><label class="label_1"for="cPkinicio">pk Início</label>
                <input  value='<?php echo $sing->getPkinicio(); ?>' type="text" required name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"autocomplete="off"/>
                <label style="margin-left:20px;" for="cPkfim">pk Fim</label>
                 <input style="margin-left:28px;" value='<?php echo $sing->getPkfim(); ?>' type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"autocomplete="off"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1"for="cLatitudeG">Latitude</label>
                <input type="text" name ="tLatitudeG" id="cLatitudeG" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>°</label>
                <input type="text" name ="tLatitudeM" id="cLatitudeM" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>'</label>
                <input type="text" name ="tLatitudeS" id="cLatitudeS" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input  value='<?php echo $sing->getLat_c(); ?>'charset= "utf8" type="text" name ="tLat_c" id="cLatitude" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input  value='<?php echo $sing->getLat_n(); ?>'type="text" name ="tLat_n" id="cLatitudeN" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                <input type="button" class="botao" name ="tGravarLat"  id="cGravarLat" onclick ="coordLat()"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1" for="cLongitudeG">Longitude</label> 
                <input type="text" name ="tLongitudeG" id="cLongitudeG" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>°</label>	
                <input type="text" name ="tLongitudeM" id="cLongitudeM" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>'</label>
                <input type="text" name ="tLongitudeS" id="cLongitudeS" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>''</label>
                <label for="cLongitude"></label>
                <input  value='<?php echo $sing->getLong_c(); ?>'type="text" name ="tLong_c" id="cLongitude" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input  value='<?php echo $sing->getLong_n(); ?>'type="text" name ="tLong_n" id="cLongitudeN" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLong()"/>
                <!--------------------------------------------------------------------------------------------> 
            <p><label class="label_1"for="cAltitude">Altitude(m)</label>
                <input  value='<?php echo $sing->getAltitude(); ?>' type="text" name ="tAltitude" id="cAltitude" class="align" size= "5" placeholder="0"autocomplete="off"/>
            <p><label class="label_1"for="cSing">Singularidade</label>
                <select style="width:220px; height: 25px;" class="align" required="" name ="tSing" id="cSing">
                    <option>Linha de água à superfície</option>
                    <option>Obra de arte na via (PI)</option>
                    <option>Obra de arte sobre a via (PS)</option>
                    <option>Lomba de redução de velocidade</option>
                    <option>Passagem Hidráulica</option>
                    <option>Túnel</option>
                    <option selected='true'><?php echo $sing->getSingularidade(); ?></option></select>
                    
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($sing->getId_sing() == 0) {
                    ?>
                    <input style="margin-left:180px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    
                    <script>
                    function anterior(){
                        window.open("../estrutura/levantamento_main.php?pg=tabsingularidade");	
                    }
                    </script>
                     <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="anterior()"/>                      
                    <input style="background-color:#7d8c9b;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                     <input style="margin-left: 200px;width: 100px;height: 28px;"  class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100px;height: 28px;"  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/> 
                    <input type="text" hidden="" name="tId_sing" id="id_sing" value="<?php echo $sing->getId_sing(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br>
           <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
            <form style="width: 300px;" class="tab" name='tab'method="post">           
               <select style="height:25px;color:#6E6E6E;"class="align"name ="sing" id="sing">
                    <option>Linha de água à superfície</option>
                    <option>Obra de arte na via (PI)</option>
                    <option>Obra de arte sobre a via (PS)</option>
                    <option>Lomba de redução de velocidade</option>
                    <option>Passagem Hidráulica</option>
                    <option>Túnel</option>
                    <option selected='true'>Singularidade</option></select>      
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
                <td class="title" align="center" >Singularidade</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'sing');
            }
            $cx = new Conexao();
            $dal = new DALSingularidade($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=singularidade&op=excluir&cod=' . $registo['id_sing'];
                $linkalterar = 'levantamento_main.php?pg=singularidade&op=alterar&cod=' . $registo['id_sing'];
                ?>  
                <tr>                      
                    <td class="tab"width="4%" align="center"><?php echo $registo["id_sing"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="3%"align="center"><?php echo $registo["hora"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="5%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="16%" align=""><?php echo $registo["singularidade"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
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

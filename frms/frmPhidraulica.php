<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start()?>
<html>     
    <head>
        <meta charset="UTF-8">
        <title>Passagem Hidráulica</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>   
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Phidraulica.php';
        require_once '../classes/DALPhidraulica.php';
        include_once '../estrutura/header.php';
//Inserir registo
        $ph = new PHidraulica();
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
            $material = filter_input(INPUT_POST, 'tMaterial');
            $forma = filter_input(INPUT_POST, 'tForma');
            $largura_ph = filter_input(INPUT_POST, 'tLargura_ph');
            $altura_ph = filter_input(INPUT_POST, 'tAltura_ph');
            $diametro = filter_input(INPUT_POST, 'tDiametro');
            $septos = filter_input(INPUT_POST, 'tSeptos');
            $altura_sp = filter_input(INPUT_POST, 'tAltura_sp');
            $largura_sp = filter_input(INPUT_POST, 'tLargura_sp');
            $ass = filter_input(INPUT_POST, 'tAss');

            $ph = new PHidraulica(0,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $material, $forma, $largura_ph, $altura_ph, $diametro, $septos, $altura_sp, $largura_sp, $ass);
            $cx = new Conexao();
            $dal = new DALPhidraulica($cx);
            $dal->Inserir($ph);
            $ph = new PHidraulica();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
            //Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_ph = filter_input(INPUT_POST,'tId_ph');
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
            $material = filter_input(INPUT_POST, 'tMaterial');
            $forma = filter_input(INPUT_POST, 'tForma');
            $largura_ph = filter_input(INPUT_POST, 'tLargura_ph');
            $altura_ph = filter_input(INPUT_POST, 'tAltura_ph');
            $diametro = filter_input(INPUT_POST, 'tDiametro');
            $septos = filter_input(INPUT_POST, 'tSeptos');
            $altura_sp = filter_input(INPUT_POST, 'tAltura_sp');
            $largura_sp = filter_input(INPUT_POST, 'tLargura_sp');  
            $ass = filter_input(INPUT_POST, 'tAss');
            $conexao = new Conexao();
            $dalph = new DALPhidraulica($conexao);
            $ph = new PHidraulica($id_ph,$alt,$reg,$id_estrada,$data,$hora,$pkinicio,$pkfim,$lat_c,$lat_n,
                                               $long_c,$long_n,$altitude,$material,$forma,$largura_ph,$altura_ph,
                                               $diametro,$septos,$altura_sp,$largura_sp,$ass);
            $dalph->Alterar($ph);
            $ph = new PHidraulica();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalph = new DALPhidraulica($conexao);
            $retorno = $dalph->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalph = new DALPhidraulica($conexao);
            $ph = $dalph->CarregaPhidraulica(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
    <body>              
        <h1 class="op">REGISTAR - Passagem Hidráulica</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:370px;"name = "ph" method="post" id="ph" action="../estrutura/levantamento_main.php?pg=phidraulica&op=listar" onsubmit="return pk()">
                &nbsp;&nbsp;&nbsp;<input type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p> <label class="label_1" for="cAlterar">Alteração</label>
                    <p><select class="alt" name ="tAlterar" id="cAlterar">
                        <option selected>0</option>
                        <option>1</option>
                        <option><?php echo $ph->getAlt(); ?></option></select>
                &nbsp;<label  for="cReg">Registo</label>
                <input value="<?php echo $ph->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>   
                <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                    <input value="<?php echo $ph->getId_estrada(); ?>"autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"/>
                <p><label  class="label_1"for="cPkinicio">pk Início</label>
                    <input  value="<?php echo $ph->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                    <label style="margin-left:29px;"for="cPkfim">pk Fim</label>
                    <input style="margin-left: 19px;" value="<?php echo $ph->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                    <!------------------------------------------ LATITUDE ------------------------------------------------------------------->
                <p><label class="label_1"for="cLatitudeG">Latitude</label>
                    <input type="text" name ="tLatitudeG" id="cLatitudeG" class="align" size= "5"placeholder="00"/>
                    <label>°</label>
                    <input type="text" name ="tLatitudeM" id="cLatitudeM" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLatitudeS" id="cLatitudeS" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLatitude"></label>					
                    <input  value="<?php echo $ph->getLat_c(); ?>"charset= "utf8" type="text" name ="tLat_c" id="cLatitude" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                    <label for="cLatitudeN"></label>					
                    <input  value="<?php echo $ph->getLat_n(); ?>"type="text" name ="tLat_n" id="cLatitudeN" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
                    <input type="button" class="botao" name ="tGravarLat"  id="cGravarLat" onclick ="coordLat()"/>
                    <!--------------------------------------- LONGITUDE ------------------------------------------------------------------------>
                <p><label class="label_1" for="cLongitudeG">Longitude</label> 
                    <input type="text" name ="tLongitudeG" id="cLongitudeG" class="align" size= "5"placeholder="00"/>
                    <label>°</label>	
                    <input type="text" name ="tLongitudeM" id="cLongitudeM" class="align" size= "5"placeholder="00"/>
                    <label>'</label>
                    <input type="text" name ="tLongitudeS" id="cLongitudeS" class="align" size= "5"placeholder="00"/>
                    <label>''</label>
                    <label for="cLongitude"></label>
                    <input  value="<?php echo $ph->getLong_c(); ?>"type="text" name ="tLong_c" id="cLongitude" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                    <label for="cLongitudeN"></label>
                    <input  value="<?php echo $ph->getLong_n(); ?>"type="text" name ="tLong_n" id="cLongitudeN" class="align" size= "10" placeholder="00.00000000" Use readonly="true"/>	     
                    <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLong()"/>
                    <!---------------------------------------------------------------------------------------------------------------------------->
                <p><label class="label_1"for="cAltitude">Altitude(m)</label>
                    <input  value="<?php echo $ph->getAltitude(); ?>"type="text" name ="tAltitude" id="cAltitude" class="align" size= "5" placeholder="0"/>
                <p><label class="label_1"for="cMaterial">Material</label>
                    <select style="height: 25px;" name ="tMaterial" id="cMaterial">
                        <option>Pedra</option>
                        <option>Metal</option>
                        <option>Betão</option>
                        <option>Polipropileno</option>
                        <option selected><?php echo $ph->getMaterial(); ?></option></select>	
                    <label for="cForma">Forma</label>
                    <select style="margin-left:0px;height: 25px;" name ="tForma" id="cForma">
                        <option>Abobadada</option>
                        <option>Quadrada</option>
                        <option>Rectangular</option>
                        <option>Circular</option>						
                        <option selected><?php echo $ph->getForma(); ?></option></select>
                <p><label class="label_1"for="cLargura_ph">Largura(m)</label>
                    <input  value="<?php echo $ph->getLargura_ph(); ?>"type="text" name ="tLargura_ph" id="cLargura_ph" class="align"size= "5"placeholder="0.00"/>	
                    <label style="margin-left:20px;" for="cAltura_ph">Altura(m)</label>
                    <input  value="<?php echo $ph->getAltura_ph(); ?>" type="text" name ="tAltura_ph" id="cAltura_ph" class="align"size= "5"placeholder="0.00"/>	
                    <label for="cDiametro">Diâmetro(m)</label>
                    <input  value="<?php echo $ph->getDiametro(); ?>"type="text" name ="tDiametro" id="cDiametro" class="align"size= "5"placeholder="0.00"/>	
                <p><label class="label_1"for="cSeptos">Septos</label>
                    <input  value="<?php echo $ph->getSeptos(); ?>"type="text" name ="tSeptos" id="cSeptos" class="align"size= "5"placeholder="0"/>	
                   <label style="margin-left:20px;"for="cAltura_sp">Altura(m)</label>
                    <input  value="<?php echo $ph->getAltura_sp(); ?>"type="text" name ="tAltura_sp" id="cAltura_sp" class="align"size= "5"placeholder="0.00"/>							
                    &nbsp;&nbsp;<label for="cLargura_sp">Largura(m)</label>
                    <input  value="<?php echo $ph->getLargura_sp(); ?>"type="text" name ="tLargura_sp" id="cLargura_sp" class="align"size= "5"placeholder="0.00"/>
                    <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /><br><br>
                    <!--------------------------------------------------------------------------------------------> 
                <?php
                if ($ph->getId_ph() == 0) {
                    ?>
                    <input style="margin-left:225px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../tabelas/tabPhidraulica.php'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_ph" id="id_ph" value="<?php echo $ph->getId_ph(); ?>"/>          
                <?php } ?>                                 
        </form><br>      
         <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
            <form class="tab" name='tab'method="post">          
                <select style="width:170px;height: 25px;color:#6E6E6E;" value="<?php echo $ph->getMaterial(); ?>" name ="material" id="material">
                        <option>Pedra</option>
                        <option>Metal</option>
                        <option>Betão</option>
                        <option>Polipropileno</option>
                        <option selected>Material</option></select>	       
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
            </form>      
        <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Altr.</td> 
                <td class="title" align="center" >Regst.</td> 
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID<br>Estrada</td>               
                <td class="title" align="center" >pk<br>Início</td>
                <td class="title" align="center" >pk<br>Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td> 
                <td class="title" align="center" >Material</td> 
                <td class="title" align="center" >Forma</td>
                <td class="title" align="center" >Larg.<br>PH</td> 
                <td class="title" align="center" >Alt.<br>PH</td> 
                <td class="title" align="center" >Diâmetro</td> 
                <td class="title" align="center" >Septos</td>
                <td class="title" align="center" >Alt.<br>Sept.</td>
                <td class="title" align="center" >Larg.<br>Sept.</td>                       
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'material');
            }
            $cx = new Conexao();
            $dalph = new DALPhidraulica($cx);
            $resultado = $dalph->Localizar($valor);
            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=phidraulica&op=excluir&cod=' . $registo['id_ph'];
                $linkalterar = 'levantamento_main.php?pg=phidraulica&op=alterar&cod=' . $registo['id_ph'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_ph"]; ?></td>  
                    <td class="tab"width="1%" align="center"><?php echo $registo["alt"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["reg"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["material"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["forma"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["largura_ph"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["altura_ph"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["diametro"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["septos"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["altura_sp"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["largura_sp"]; ?></td>  
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;" href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
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

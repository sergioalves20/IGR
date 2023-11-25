<!DOCTYPE html>
<html>
     <?php session_start(); ?>  
    <head>
        <meta charset="UTF-8">
        <title>Interseções</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>     
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Intersecao.php';
        require_once '../classes/DALIntersecao.php';
//Inserir registo
        $intrs = new Intersecao();
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
            $desniv = filter_input(INPUT_POST, 'tDesniv');
            $denivel = filter_input(INPUT_POST, 'tDenivel');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');            
            $cx = new Conexao();
            $dalintersecao = new DALIntersecao($cx);
            $intrs = new Intersecao(0,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $desniv, $denivel, $sentido, $ass);          
            $dalintersecao->Inserir($intrs);
            $intrs = new Intersecao();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }     
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_intrs = filter_input(INPUT_POST,'tId_intrs');
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
            $desniv = filter_input(INPUT_POST, 'tDesniv');
            $denivel = filter_input(INPUT_POST, 'tDenivel');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            $conexao = new Conexao();
            $dalintersecao = new DALIntersecao($conexao);
            $intrs = new Intersecao($id_intrs,$alt,$reg, $id_estrada, $data, $hora, $pkinicio, $pkfim, $lat_c, $lat_n, $long_c, $long_n, $altitude, $desniv, $denivel, $sentido, $ass);
            $dalintersecao->Alterar($intrs);
            $intrs = new Intersecao();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dalintersecao = new DALIntersecao($conexao);
            $retorno = $dalintersecao->Excluir(filter_input(INPUT_GET, 'cod'));        
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dalintersecao = new DALIntersecao($conexao);
            $intrs = $dalintersecao->CarregaIntersecao(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
      <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">REGISTAR - Interseção</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:390px;" method="post" onsubmit="return pk()" name='intersecao'  action="../estrutura/levantamento_main.php?pg=intersecao&op=listar"  >	

            <input style="margin-left:100px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
            <input style="margin-left:3px;" type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
            <p><label class="label_1" for="cAlterar">Alteração</label>
                <select  class="alt" name ="tAlterar" id="cAlterar">
                    <option selected>0</option>
                    <option>1</option>
                    <option selected><?php echo $intrs->getAlt(); ?></option></select>
                 <label  for="cReg">Registo</label>
                 <input value="<?php echo $intrs->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"autocomplete="off"/>   
            <p><label class="label_1" for="cId_estrada">ID Estrada</label>
                <input value="<?php echo $intrs->getId_estrada(); ?>" autofocus required="" type="text" name ="tId_estrada"  id="cId_estrada" class="align" size= "5"autocomplete="off"/>
            <p><label class="label_1"for="cPkinicio">pk Início</label>
                <input value="<?php echo $intrs->getPkinicio(); ?>" width="10%" class="align" required="" type="text" name ="tPkinicio" id="cPkinicio"  size= "5"placeholder="0.000"autocomplete="off"/>
               <label style="margin-left:30px;"for="cPkfim">pk Fim</label>
               <input style="margin-left:16px;" value="<?php echo $intrs->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"autocomplete="off"/>
                <!----------------------------------------------------------------------------------------------------------------->
            <p><label class="label_1"for="cLatitudeG">Latitude</label>
                <input type="text" name ="tLatitudeG" id="cLatitudeG" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>°</label>
                <input type="text" name ="tLatitudeM" id="cLatitudeM" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>'</label>
                <input type="text" name ="tLatitudeS" id="cLatitudeS" class="align" size= "5"placeholder="00"autocomplete="off"/>
                <label>''</label>
                <label for="cLatitude"></label>					
                <input value="<?php echo $intrs->getLat_c(); ?>"charset= "utf8" type="text" name ="tLat_c" id="cLatitude" class="align" size= "8" placeholder="00º00'00''"Use readonly="true"/>
                <label for="cLatitudeN"></label>					
                <input value="<?php echo $intrs->getLat_n(); ?>"type="text" name ="tLat_n" id="cLatitudeN" class="align" size= "10"placeholder="00.00000000" Use readonly="true"/>                          
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
                <input value="<?php echo $intrs->getLong_c(); ?>"type="text" name ="tLong_c" id="cLongitude" class="align" size= "8" placeholder="00°00'00''"Use readonly="true">
                <label for="cLongitudeN"></label>
                <input value="<?php echo $intrs->getLong_n(); ?>"type="text" name ="tLong_n" id="cLongitudeN" class="align" size= "10" placeholder="00,00000000" Use readonly="true"/>	     
                <input type="button" class="botao" name ="tGravarLong" id="cGravarLong" onclick="coordLong()"/>
                <!----------------------------------------------------------------------------------------------------------------------->
            <p><label class="label_1"for="cAltitude">Altitude(m)</label>
                <input value="<?php echo $intrs->getAltitude(); ?>"type="text" name ="tAltitude" id="cAltitude"class="align"size= "5" placeholder="0"autocomplete="off"/>	
            <p><label class="label_1"for="cDesniv" >Desnivelada</label>
                <select style="height:25px;" name ="tDesniv" id="cDesniv" onchange="desniv()" >
                    <option selected>0</option>
                    <option >1</option>
                    <option selected><?php echo $intrs->getDesniv(); ?></option></select>
            <p><label class="label_1"for="cDenivel">De nível</label>
                <select style="height:25px;" name ="tDenivel"  id="cDenivel"  onchange="deniv()">					
                    <option>Cruzamento</option>
                    <option>Entroncamento</option>
                    <option>Rotunda</option>
                    <option>Acesso</option>
                    <option selected><?php echo $intrs->getDenivel(); ?></option></select>
                <label style="margin-left:20px;" for="cSentido">Sentido</label>
                <select class="sentido" name ="tSentido" id="cSentido">					
                    <option>Crescente</option>
                    <option>Decrescente</option>
                    <option selected><?php echo $intrs->getSentido(); ?></option></select>
            <p><input style="margin-left:90px;"type="button" class="botao1" onclick="limpar()"><br><br>
                 <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" />
                <!---------------------------------------------------> 
                 <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                  <?php
                if ($intrs->getId_intrs() == 0) {
                    ?>
                    <input style="margin-left:180px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../tabelas/tabIntersecao.php'"/>
                    <input style="background-color:#7d8c9b;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=levantamento'"/>
                    <?php
                } else {
                    ?>  
                     <input style="margin-left: 200px;width: 100px;height: 28px;"  class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100px;height: 28px;"  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/> 
                    <input hidden=""type="text" name="tId_intrs" id="cId_intrs" value="<?php echo $intrs->getId_intrs(); ?>"/>          
                <?php } ?>  
                 </div>
               <!---------------------------------------------------> 
        </form><br>
           <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>
            <form class="tab" name='tab'method="post">
             <select style="height:25px;width: 150px;color:#6E6E6E;" name="intrs" id='intrs'  onchange="deniv()">					
                    <option>Cruzamento</option>
                    <option>Entroncamento</option>
                    <option>Rotunda</option>
                    <option>Acesso</option>
                    <option selected>Interseção</option></select>           
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>      
        <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Alteração</td> 
                <td class="title" align="center" >Registo</td> 
                <td class="title" align="center" >Hora</td>
                <td class="title" align="center" >ID Estrada</td>
                <td class="title" align="center" >Código</td>
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title" align="center" >Desniv.</td>
                <td class="title" align="center" >De Nível</td> 
                <td class="title" align="center" >Sentido</td>
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'intrs');
            }
            $cx = new Conexao();
            $dalintersecao = new DALIntersecao($cx);
            $resultado = $dalintersecao->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'levantamento_main.php?pg=intersecao&op=excluir&cod=' . $registo['id_intrs'];
                $linkalterar = 'levantamento_main.php?pg=intersecao&op=alterar&cod=' . $registo['id_intrs'];
                ?>  
                <tr>                                     
                    <td class="tab"width="4%" align="center"><?php echo $registo["id_intrs"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                    <td class="tab"width="3%"align="center"><?php echo $registo["hora"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["codigo"]; ?></td>
                    <td class="tab"width="5%"align="center"style="color:brown;"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="5%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab" width="4%" align="center"><?php echo $registo["desniv"]; ?></td>  
                    <td class="tab"width="8%" align=""><?php echo $registo["denivel"]; ?></td>
                    <td class="tab"width="5%" align=""><?php echo $registo["sentido"]; ?></td>  
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

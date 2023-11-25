<!DOCTYPE html>
<!--
canoa.2017
-->
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BB de Desgaste da Faixa de rodagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>select#cNatgeo{height: 25px;width: 100px;}
               select#cVia{height: 25px;width: 60px;}
               select#cBetume{height: 25px;width: 70px;}
               iframe#fxrod{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
               </style>      
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/FxrodBbdsg.php';
        require_once '../classes/DALFxrodBbdsg.php';
        include_once '../estrutura/header.php';
        //INSERIR REGISTO
         $fxrodbbdsg = new Fxrodbbdsg();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlt');
            $reg = filter_input(INPUT_POST, 'tReg');
             $id_fxrod = filter_input(INPUT_POST, 'tId_fxrod');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $via = filter_input(INPUT_POST, 'tVia');
            $granul = filter_input(INPUT_POST, 'tGran');
            $espess = filter_input(INPUT_POST, 'tEspss');
            $betume = filter_input(INPUT_POST, 'tBetume');
            $ass = filter_input(INPUT_POST, 'tAss');

            $fxrodbbdsg = new Fxrodbbdsg(0,$alt,$reg, $id_fxrod, $id_estrada, $data, $hora, $pkinicio, $pkfim, $via,  $granul, $espess, $betume,$ass);
            $cx = new Conexao();
            $dal = new DALFxrodbbdsg($cx);
            $dal->Inserir($fxrodbbdsg);
            $fxrodbbdsg = new Fxrodbbdsg();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
             //Alterar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_fxrodbbdsg = filter_input(INPUT_POST, 'tId_fxrodbbdsg');
                $alt = filter_input(INPUT_POST, 'tAlt');
                $reg = filter_input(INPUT_POST, 'tReg');
                 $id_fxrod = filter_input(INPUT_POST, 'tId_fxrod');  
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
                $pkfim = filter_input(INPUT_POST, 'tPkfim');
                $via = filter_input(INPUT_POST, 'tVia');
                $granul = filter_input(INPUT_POST, 'tGran');
                $espess = filter_input(INPUT_POST, 'tEspss');
                $betume = filter_input(INPUT_POST, 'tBetume');
                $ass = filter_input(INPUT_POST, 'tAss');
                
                $cx = new Conexao();
                $dalfxrodbbdsg = new DALFxrodbbdsg($cx);
                $fxrodbbdsg = new Fxrodbbdsg($id_fxrodbbdsg,$alt,$reg, $id_estrada, $id_fxrod, $data, $hora, $pkinicio, $pkfim, $via, $granul, $espess, $betume,$ass);
                $dalfxrodbbdsg->Alterar($fxrodbbdsg);
                $fxrodbbdsg = new Fxrodbbdsg();
            }
            //Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalfxrodbbdsg = new DALFxrodbbdsg($conexao);
                $retorno = $dalfxrodbbdsg->Excluir(filter_input(INPUT_GET, 'cod'));
            }
            //Alterar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalfxrodbbdsg = new DALFxrodbbdsg($conexao);
                $fxrodbbdsg = $dalfxrodbbdsg->CarregaFxrodbbdsg(filter_input(INPUT_GET, 'cod'));
            }
            
            ?> 
    </head>
    <body>
        <h1 class="op">REGISTAR - Betão Betuminoso de Desgaste da Faixa de rodagem</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/levantamento_main.php?pg=constfxrod'>|VOLTAR|</a>
        <form style="width:900px;height: 200px;"method="post" id="base" action="../estrutura/levantamento_main.php?pg=fxrodbbdsg&op=listar"onsubmit="return pk()">         
                <input style="margin-left:65px;"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p><label class="" for="cAlt">Alteração</label>
                    <select value="<?php echo $fxrodbbdsg->getAlt(); ?>" class="alt"  name ="tAlt" id="cAlt">
                        <option>0</option>
                        <option>1</option>
                        <option selected><?php echo $fxrodbbdsg->getAlt(); ?></option></select>
                     <label  for="cReg">Registo</label>
                <input value="<?php echo $fxrodbbdsg->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <label class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $fxrodbbdsg->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
                <label class=""for="cId_fxrod"> ID Fxrod</label>
                <input value="<?php echo $fxrodbbdsg->getId_fxrod(); ?>"type="text" name ="tId_fxrod" id="cId_fxrod" class="align"size= "5"/><br><br>                       
                  
                    <!--<iframe  id="fxrod" src="../tabelas/tabFxrodSelect.php" name="janela" ></iframe><br><br> -->
                    
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $fxrodbbdsg->getPkinicio(); ?>"type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $fxrodbbdsg->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>                   
                     <label class=""for="cVia">Via</label>
                    <select  value="<?php echo $fxrodbbdsg->getVia(); ?>"name ="tVia" id="cVia">					
                        <option>V1</option>
                        <option>V2</option>
                        <option>V3</option>
                        <option>V4</option>
                        <option>V5</option>
                        <option>V6</option>
                        <option selected><?php echo $fxrodbbdsg->getVia(); ?></option></select> 
                  <label class=""for="cGran">Granulometria (d/D)</label>
                    <input value="<?php echo $fxrodbbdsg->getGranul(); ?>"type="text" name ="tGran" id="cGrant" class="align"size= "5"placeholder="0-0"/>    
                 <label class=""for="cEspss">Espessura (cm)</label>
                    <input value="<?php echo $fxrodbbdsg->getEspess(); ?>"type="text" name ="tEspss" id="cEspss" class="align"size= "5"placeholder="0.0"/>     
                <label class=""for="cBetume">Betume</label>
                    <select value="<?php echo $fxrodbbdsg->getBetume(); ?>" name ="tBetume" id="cBetume">					
                        <option>B35-50</option>
                        <option>B50-70</option>
                        <option>>B70</option>
                        <option selected><?php echo $fxrodbbdsg->getBetume(); ?></option></select><br><br>      
         <!----------------------------------------------------------------------------------------------------->                               
               <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">
             <?php
                if ($fxrodbbdsg->getId_fxrodbbdsg() == 0) {
                    ?>
                    <input style="margin-left:340px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabfxrodbbdsg'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constfxrod'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_fxrodbbdsg" id="cId_fxrodbbdsg" value="<?php echo $fxrodbbdsg->getId_fxrodbbdsg(); ?>"/>          
                <?php } ?>
                    </div>
            </form>
        <br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>           
            <table id="est" style='width:70%;margin-left: 200px;' accept-charset="UTF-8"  border="1" class="tabela">
                <tr> 
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
                    <td class="title" align="center" >Hora</td>
                    <td class="title" align="center" >ID FxRod.</td> 
                    <td class="title" align="center" >ID Estrada</td>    
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>                  
                    <td class="title" align="center" >Via</td>
                    <td class="title" align="center" >Granul.</td>
                    <td class="title" align="center" >Espess.</td>  
                    <td class="title" align="center" >Betume</td>                   
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tId_fxrodbbdsg');
                }
                $cx = new Conexao();
                $dalfxrodbbdsg = new DALFxrodbbdsg($cx);
                $resultado = $dalfxrodbbdsg->Localizar($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=fxrodbbdsg&op=excluir&cod=' . $registo['id_fxrodbbdsg'];
                    $linkalterar = 'levantamento_main.php?pg=fxrodbbdsg&op=alterar&cod=' . $registo['id_fxrodbbdsg'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrodbbdsg"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>
                         <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrod"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>                   
                        <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["granul"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["betume"]; ?></td>
                        <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:#0489B1;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>";                                
                    </tr>
                    <?php
                }
                ?>
            </table>
            <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>
<!DOCTYPE html>
<!--
canoa.2017
-->
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BB de Ligação da Faixa de rodagem</title>
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
        require_once '../classes/FxrodBblig.php';
        require_once '../classes/DALFxrodBblig.php';
        include_once '../estrutura/header.php';
        //INSERIR REGISTO
         $fxrodbblig = new Fxrodbblig();
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

            $fxrodbblig = new Fxrodbblig(0, $alt, $reg, $id_fxrod, $id_estrada, $data, $hora, $pkinicio, $pkfim, $via,  $granul, $espess, $betume,$ass);
            $cx = new Conexao();
            $dal = new DALFxrodbblig($cx);
            $dal->Inserir($fxrodbblig);
            $fxrodbblig = new Fxrodbblig();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
             //Alterar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_fxrodbblig = filter_input(INPUT_POST, 'tId_fxrodbblig');
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
                $dalfxrodbblig = new DALFxrodbblig($cx);
                $fxrodbblig = new Fxrodbblig($id_fxrodbblig,$alt,$reg,$id_fxrod, $id_estrada,  $data, $hora, $pkinicio, $pkfim, $via, $granul, $espess, $betume,$ass);
                $dalfxrodbblig->Alterar($fxrodbblig);
                $fxrodbblig = new Fxrodbblig();
            }
            //Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalfxrodbblig = new DALFxrodbblig($conexao);
                $retorno = $dalfxrodbblig->Excluir(filter_input(INPUT_GET, 'cod'));
            }
            //Alterar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalfxrodbblig = new DALFxrodbblig($conexao);
                $fxrodbblig = $dalfxrodbblig->CarregaFxrodbblig(filter_input(INPUT_GET, 'cod'));
            }
            
            ?> 
    </head>
    <body>
        <h1 class="op">REGISTAR - Betão Betuminoso de Ligação da Faixa de rodagem</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/levantamento_main.php?pg=constfxrod'>|VOLTAR|</a>
        <form style="width:900px;height:200px;" method="post" id="base" action="../estrutura/levantamento_main.php?pg=fxrodbblig&op=listar"onsubmit="return pk()">         
                <input style="margin-left:65px;"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p><label class="" for="cAlt">Alteração</label>
                    <select value="<?php echo $fxrodbblig->getAlt(); ?>" class="alt"  name ="tAlt" id="cAlt">
                        <option>0</option>
                        <option>1</option>
                        <option selected><?php echo $fxrodbblig->getAlt(); ?></option></select>
                     <label  for="cReg">Registo</label>
                <input value="<?php echo $fxrodbblig->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <label class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $fxrodbblig->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
                <label class=""for="cId_fxrod"> ID Fxrod</label>
                <input value="<?php echo $fxrodbblig->getId_fxrod(); ?>"type="text" name ="tId_fxrod" id="cId_fxrod" class="align"size= "5"/><br><br>                       
                  
                   <!-- <iframe  id="fxrod" src="../tabelas/tabFxrodSelect.php" name="janela" ></iframe><br><br>--> 
                    
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $fxrodbblig->getPkinicio(); ?>"type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $fxrodbblig->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>                   
                     <label class=""for="cVia">Via</label>
                    <select  value="<?php echo $fxrodbblig->getVia(); ?>"name ="tVia" id="cVia">					
                        <option>V1</option>
                        <option>V2</option>
                        <option>V3</option>
                        <option>V4</option>
                        <option>V5</option>
                        <option>V6</option>
                        <option selected><?php echo $fxrodbblig->getVia(); ?></option></select> 
                  <label class=""for="cGran">Granulometria (d/D)</label>
                    <input value="<?php echo $fxrodbblig->getGranul(); ?>"type="text" name ="tGran" id="cGrant" class="align"size= "5"placeholder="0-0"/>    
                 <label class=""for="cEspss">Espessura (cm)</label>
                    <input value="<?php echo $fxrodbblig->getEspess(); ?>"type="text" name ="tEspss" id="cEspss" class="align"size= "5"placeholder="0.0"/>     
                <label class=""for="cBetume">Betume</label>
                    <select value="<?php echo $fxrodbblig->getBetume(); ?>" name ="tBetume" id="cBetume">					
                        <option>B35-50</option>
                        <option>B50-70</option>
                        <option>>B70</option>
                        <option selected><?php echo $fxrodbblig->getBetume(); ?></option></select><br><br>      
         <!----------------------------------------------------------------------------------------------------->                               
               <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">
             <?php
                if ($fxrodbblig->getId_fxrodbblig() == 0) {
                    ?>
                    <input style="margin-left:340px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabfxrodbblig'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constfxrod'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text"hidden="" name="tId_fxrodbblig" id="cId_fxrodbblig" value="<?php echo $fxrodbblig->getId_fxrodbblig(); ?>"/>          
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
                    $valor = filter_input(INPUT_POST, 'tId_fxrodbblig');
                }
                $cx = new Conexao();
                $dalfxrodbblig = new DALFxrodbblig($cx);
                $resultado = $dalfxrodbblig->Localizar($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=fxrodbblig&op=excluir&cod=' . $registo['id_fxrodbblig'];
                    $linkalterar = 'levantamento_main.php?pg=fxrodbblig&op=alterar&cod=' . $registo['id_fxrodbblig'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrodbblig"]; ?></td>
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
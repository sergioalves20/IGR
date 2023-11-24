<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sub base da Faixa de rodagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>select#cNatgeo{height: 25px;width: 100px;}
               select#cVia{height: 25px;width: 60px;}
               iframe#fxrod{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
               </style>      
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/FxrodBase.php';
        require_once '../classes/DALFxrodBase.php';
        include_once 'header.php';
        date_default_timezone_set('Atlantic/Azores');
        $fxrodbase = new Fxrodbase();
//Retificar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_fxrodbase = filter_input(INPUT_POST, 'tId_fxrodbase');
                $alt = filter_input(INPUT_POST, 'tAlterar');
                $reg = filter_input(INPUT_POST, 'tReg');
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $id_fxrod = filter_input(INPUT_POST, 'tId_fxrod');      
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
                $pkfim = filter_input(INPUT_POST, 'tPkfim');
                $via = filter_input(INPUT_POST, 'tVia');
                $natgeo = filter_input(INPUT_POST, 'tNatgeo');
                $granul = filter_input(INPUT_POST, 'tGran');
                $espess = filter_input(INPUT_POST, 'tEspss');
                $ass = filter_input(INPUT_POST, 'tAss');               
                $cx = new Conexao();
                $dalfxrodbase = new DALFxrodBase($cx);
                $fxrodbase = new Fxrodbase($id_fxrodbase,$alt,$reg, $id_estrada, $id_fxrod, $data, $hora, $pkinicio, $pkfim, $via, $natgeo, $granul, $espess, $ass);
                $dalfxrodbase->Retificar($fxrodbase);
                $fxrodbase = new Fxrodbase();
            }
//Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalfxrodbase = new DALFxrodBase($conexao);
                $retorno = $dalfxrodbase->Excluir(filter_input(INPUT_GET, 'cod'));
            }
//Retificar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalfxrodbase = new DALFxrodbase($conexao);
                $fxrodbase = $dalfxrodbase->CarregaFxrodbase(filter_input(INPUT_GET, 'cod'));
            }
            
            ?> 
    </head>
    <body>
        <h1 class="op">REGISTAR - Base da Faixa de rodagem</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="width:900px;height: 460px;"method="post" id="base" action="../estrutura/levantamento_main.php?pg=fxrodbase&op=listar"onsubmit="return pk()">         
                <input style="margin-left:65px;"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p><label class="" for="cAlt">Alteração</label>
                    <select value="<?php echo $fxrodbase->getAlt(); ?>" class="alt"  name ="tAlt" id="cAlt">
                        <option>0</option>
                        <option>1</option>
                        <option selected><?php echo $fxrodbase->getAlt(); ?></option></select>
                <label  for="cReg">Registo</label>
                <input value="<?php echo $fxrodbase->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <label class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $fxrodbase->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
                <label class=""for="cId_fxrod"> ID Fxrod</label>
                <input value="<?php echo $fxrodbase->getId_fxrod(); ?>"type="text" name ="tId_fxrod" id="cId_fxrod" class="align"size= "5"/><br><br>                       
                  
                    <iframe  id="fxrod" src="../tabelas/tabFxrodSelect.php" name="janela" ></iframe><br><br> 
                    
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $fxrodbase->getPkinicio(); ?>"type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $fxrodbase->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>                   
                     <label class=""for="cVia">Via</label>
                    <select  value="<?php echo $fxrodbase->getVia(); ?>"name ="tVia" id="cVia">					
                        <option>V1</option>
                        <option>V2</option>
                        <option>V3</option>
                        <option>V4</option>
                        <option>V5</option>
                        <option>V6</option>
                        <option selected><?php echo $fxrodbase->getVia(); ?></option></select>                       
                <label class=""for="cNatgeo">Nat.Geo.</label>
                    <select value="<?php echo $fxrodbase->getNatgeo(); ?>" name ="tNatgeo" id="cNatgeo">					
                        <option>Basalto</option>
                        <option>Calcário</option>
                        <option>Aluvião</option>
                        <option>Calcário</option>
                        <option>Britado</option>
                        <option selected><?php echo $fxrodbase->getNatgeo(); ?></option></select>
                <label class=""for="cGran">Granulometria (d/D)</label>
                    <input value="<?php echo $fxrodbase->getGranul(); ?>"type="text" name ="tGran" id="cGrant" class="align"size= "5"placeholder="0-0"/>
                    <label class=""for="cEsp">Espessura (cm)</label>
                    <input value="<?php echo $fxrodbase->getEspess(); ?>"type="text" name ="tEspss" id="cEspss" class="align"size= "5"placeholder="0.0"/><br><br>           
         <!----------------------------------------------------------------------------------------------------->                               
               <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">
             <?php
                if ($fxrodbase->getId_fxrodbase() == 0) {
                    ?>
                    <input style="margin-left:340px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabFxrodbase'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constfxrod'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_fxrodbase" id="cId_fxrodbase" value="<?php echo $fxrodbase->getId_fxrodbase(); ?>"/>          
                <?php } ?>
                    </div>
            </form>
        <br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>           
            <table id="est"style='width:70%;margin-left: 200px;' accept-charset="UTF-8"  border="1" class="tabela">
                <tr> 
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
                    <td class="title" align="center" >Hora</td>
                    <td class="title" align="center" >ID Estrada</td>   
                    <td class="title" align="center" >ID FxRod.</td>   
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>                  
                    <td class="title" align="center" >Via</td> 
                    <td class="title" align="center" >Nat.Geo.</td> 
                    <td class="title" align="center" >Granul.</td>
                    <td class="title" align="center" >Espess.</td>  
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tId_fxrodbase');
                }
                $cx = new Conexao();
                $dalfxrodbase = new DALFxrodBase($cx);
                $resultado = $dalfxrodbase->Localizar($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=fxrodbase&op=excluir&cod=' . $registo['id_fxrodbase'];
                    $linkalterar = 'levantamento_main.php?pg=fxrodbase&op=alterar&cod=' . $registo['id_fxrodbase'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrodbase"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrod"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>                   
                        <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["natgeo"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["granul"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td>
                        <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:#0489B1;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
                    </tr>
                    <?php
                }
                ?>
            </table><br>
            <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=fxrodbase">|INÍCIO|</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>      
            </footer>
    </body>
</html>
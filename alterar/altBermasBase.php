<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Base da Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>select#cNatgeo{height: 25px;width: 80px;}
               select#cSentido{height: 25px;width: 100px;}
               iframe#bermas{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;} 
        </style>      
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/BermasBase.php';
        require_once '../classes/DALBermasBase.php';
        include_once 'header.php';
        date_default_timezone_set('Atlantic/Azores');
        $bermasbase = new BermasBase();     
//Retificar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_bermabase = filter_input(INPUT_POST, 'tId_bermabase');
                $alt = filter_input(INPUT_POST, 'tAlt');
                $reg = filter_input(INPUT_POST, 'tReg');
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $id_berma = filter_input(INPUT_POST, 'tId_berma');      
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
                $pkfim = filter_input(INPUT_POST, 'tPkfim');         
                $natgeo = filter_input(INPUT_POST, 'tNatgeo');
                $granul = filter_input(INPUT_POST, 'tGranul');
                $espess = filter_input(INPUT_POST, 'tEspess');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $ass = filter_input(INPUT_POST, 'tAss');               
                $cx = new Conexao();
                $dal = new DALBermasBase($cx);
                $bermasbase = new BermasBase($id_bermabase,$alt,$reg, $id_estrada, $id_berma, $data, $hora, $pkinicio, $pkfim, $natgeo, $granul, $espess,$sentido, $ass);
                $dal->Alterar($bermasbase);
                $bermasbase = new BermasBase();
            }
//Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dal = new DALBermasBase($conexao);
                $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
            }
//Alterar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dal = new DALBermasBase($conexao);
                $bermasbase = $dal->CarregaBermasbase(filter_input(INPUT_GET, 'cod'));
            }           
            ?> 
    </head>
    <body>
        <h1 class="op">REGISTAR - Base da Berma</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="width:900px;height: 460px;" method="post" id="base" action="../estrutura/levantamento_main.php?pg=bermasbase&op=listar"onsubmit="return pk()">         
                <input style="margin-left:65px;"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p><label class="" for="cAlt">Alteração</label>
                    <select value="<?php echo $bermasbase->getAlt(); ?>" class="alt"  name ="tAlt" id="cAlt">
                        <option>0</option>
                        <option>1</option>
                        <option selected><?php echo $bermasbase->getAlt(); ?></option></select>
                     <label  for="cReg">Registo</label>
                <input value="<?php echo $bermasbase->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <label class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $bermasbase->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>
                <label class=""for="cId_berma"> ID Berma</label>
                <input value="<?php echo $bermasbase->getId_Berma(); ?>"type="text" name ="tId_berma" id="cId_berma" class="align"size= "5"/><br><br>                       
                  
                    <iframe  id="bermas" src="../tabelas/tabBermasSelect.php" name="janela" ></iframe><br><br> 
                    
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $bermasbase->getPkinicio(); ?>"type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $bermasbase->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>                               
                <label class=""for="cNatgeo">Nat.Geo.</label>
                    <select value="<?php echo $bermasbase->getNatgeo(); ?>" name ="tNatgeo" id="cNatgeo">					
                        <option>Basalto</option>
                        <option>Calcário</option>
                        <option>Aluvião</option>
                        <option>Britado</option>
                        <option selected><?php echo $bermasbase->getNatgeo(); ?></option></select>
                <label class=""for="cGran">Granulometria (d/D)</label>
                    <input value="<?php echo $bermasbase->getGranul(); ?>"type="text" name ="tGranul" id="cGranul" class="align"size= "5"placeholder="0-0"/>
                    <label class=""for="cEspess">Espessura (cm)</label>
                    <input value="<?php echo $bermasbase->getEspess(); ?>"type="text" name ="tEspess" id="cEspess" class="align"size= "5"placeholder="0.0"/>
                    <label class=""for="cSentido">Sentido</label>
                    <select  value="<?php echo $bermasbase->getSentido(); ?>"name ="tSentido" id="cSentido"><				
                        <option>Crescente</option>
                        <option>Decrescente</option>
                        <option selected><?php echo $bermasbase->getSentido(); ?></option></select><br><br>
                    <input hidden="" type="text" value="<?php echo $_SESSION["login"] ?>" name="tAss"/>                       
         <!----------------------------------------------------------------------------------------------------->                               
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">
          <?php
                if ($bermasbase->getId_bermabase() == 0) {
                    ?>
                <input style="margin-left:340px;" type="submit" class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabbermasbase'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constbermas'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_bermabase" id="cId_bermabase" value="<?php echo $bermasbase->getId_bermabase(); ?>"/>          
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
                    <td class="title" align="center" >ID Berma</td>   
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>
                    <td class="title" align="center" >Nat.Geo.</td> 
                    <td class="title" align="center" >Granul.</td>
                    <td class="title" align="center" >Espess.</td>
                    <td class="title" align="center" >Sentido</td> 
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tId_bermabase');
                }
                $cx = new Conexao();
                $dal = new DALBermasBase($cx);
                $resultado = $dal->Localizar($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=bermasbase&op=excluir&cod=' . $registo['id_bermabase'];
                    $linkalterar = 'levantamento_main.php?pg=bermasbase&op=alterar&cod=' . $registo['id_bermabase'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_bermabase"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td>                   
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_berma"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["natgeo"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["granul"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
                        <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:#0489B1;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
                    </tr>
                    <?php
                }
                ?>
            </table><br>
            <a style="font-size: 11pt;" id="voltar"style="text-align:center;" href="alterar_main.php?pg=bermasbase">| INÍCIO |</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>
            </footer>
    </body>
</html>

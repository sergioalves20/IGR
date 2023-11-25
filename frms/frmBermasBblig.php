<!DOCTYPE html>
<!--
canoa.2017
-->
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BB de Ligação da Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <style>select#cNatgeo{height: 25px;width: 100px;}
               select#cSentido{height: 25px;width: 100px;}
               select#cBetume{height: 25px;width: 70px;}
               iframe#bermabbl{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
               </style>      
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/Bermasbblig.php';
        require_once '../classes/DALBermasBblig.php';
        include_once '../estrutura/header.php';
//Inserir registo
         $bermasbblig = new Bermasbblig();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlt');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_berma = filter_input(INPUT_POST, 'tId_berma');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $granul = filter_input(INPUT_POST, 'tGranul');
            $espess = filter_input(INPUT_POST, 'tEspess');
            $betume = filter_input(INPUT_POST, 'tBetume');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            $bermasbblig = new Bermasbblig(0,$alt,$reg, $id_berma, $id_estrada, $data, $hora, $pkinicio, $pkfim, $granul, $espess, $betume,$sentido,$ass);
            $cx = new Conexao();
            $dal = new DALBermasbblig($cx);
            $dal->Inserir($bermasbblig);
            $bermasbblig = new bermasbblig();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
//Alterar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_bermabblig = filter_input(INPUT_POST, 'tId_bermabblig');
                $alt = filter_input(INPUT_POST, 'tAlt');
                $reg = filter_input(INPUT_POST, 'tReg');
                $id_berma = filter_input(INPUT_POST, 'tId_berma'); 
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');               
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
                $pkfim = filter_input(INPUT_POST, 'tPkfim');        
                $granul = filter_input(INPUT_POST, 'tGranul');
                $espess = filter_input(INPUT_POST, 'tEspess');
                $betume = filter_input(INPUT_POST, 'tBetume');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $ass = filter_input(INPUT_POST, 'tAss');
                
                $cx = new Conexao();
                $dal = new DALBermasbblig($cx);
                $bermasbblig = new Bermasbblig($id_bermabblig,$alt,$reg,$id_berma, $id_estrada,  $data, $hora, $pkinicio, $pkfim, $granul, $espess, $betume,$sentido,$ass);
                $dal->Alterar($bermasbblig);
                $bermasbblig = new Bermasbblig();
            }
//Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dal = new DALBermasbblig($conexao);
                $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
            }
            //Alterar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dal = new DALBermasbblig($conexao);
                $bermasbblig = $dal->CarregaBermasbblig(filter_input(INPUT_GET, 'cod'));
            }            
            ?> 
    </head>
    <body>
        <h1 class="op">REGISTAR - Betão Betuminoso de Ligação da Berma</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <p><a id="voltar"style="text-align:center;" href = '../estrutura/levantamento_main.php?pg=constbermas'>|VOLTAR|</a>
        <form style="width:900px;height: 460px;" method="post" id="bermabbl" action="../estrutura/levantamento_main.php?pg=bermasbbl&op=listar"onsubmit="return pk()">         
                <input style="margin-left:65px;"type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                <p><label class="" for="cAlt">Alteração</label>
                    <select value="<?php echo $bermasbblig->getAlt(); ?>" class="alt"  name ="tAlt" id="cAlt">
                        <option>0</option>
                        <option>1</option>
                        <option selected><?php echo $bermasbblig->getAlt(); ?></option></select>
                     <label  for="cReg">Registo</label>
                      <input value="<?php echo $bermasbblig->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                 <label class=""for="cId_berma"> ID Berma</label>
                <input value="<?php echo $bermasbblig->getId_berma(); ?>"type="text" name ="tId_berma" id="cId_berma" class="align"size= "5"/>                   
                <label class=""for="cId_estrada"> ID Estrada</label>
                <input value="<?php echo $bermasbblig->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/><br><br>
                    <iframe  id="bermabbl" src="../tabelas/tabBermasSelect.php" name="janela" ></iframe><br><br>     
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $bermasbblig->getPkinicio(); ?>"type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $bermasbblig->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>
                  <label class=""for="cGranul">Granulometria (d/D)</label>
                    <input value="<?php echo $bermasbblig->getGranul(); ?>"type="text" name ="tGranul" id="cGranul" class="align"size= "5"placeholder="0-0"/>    
                 <label class=""for="cEspess">Espessura (m)</label>
                    <input value="<?php echo $bermasbblig->getEspess(); ?>"type="text" name ="tEspess" id="cEspess" class="align"size= "5"placeholder="0.0"/>     
                <label class=""for="cBetume">Betume</label>
                    <select value="<?php echo $bermasbblig->getBetume(); ?>" name ="tBetume" id="cBetume">					
                        <option>B35-50</option>
                        <option>B50-70</option>
                        <option>>B70</option>
                        <option selected><?php echo $bermasbblig->getBetume(); ?></option></select>
                  <label class=""for="cSentido">Sentido</label>
                    <select  value="<?php echo $bermasbblig->getSentido(); ?>"name ="tSentido" id="cSentido">					
                        <option>Crescente</option>
                        <option>Decrescente</option>
                        <option selected><?php echo $bermasbblig->getSentido(); ?></option></select><br><br> 
         <!----------------------------------------------------------------------------------------------------->                               
               <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;"id="botoes">
             <?php
                if ($bermasbblig->getId_bermabblig() == 0) {
                    ?>
                    <input style="margin-left:340px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabbermasbbl'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constbermas'"/>
                    <?php
                } else {
                    ?>  
                    <input class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_bermabblig" id="cId_fxrodbblig" value="<?php echo $bermasbblig->getId_bermabblig(); ?>"/>          
                <?php } ?>
                    </div>
            </form>
        <br>
            <h2>Registos em curso&nbsp;(<?php echo date('Y-m-d'); ?>)</h2>           
            <table id="est" style='width:75%;margin-left: 165px;' accept-charset="UTF-8"  border="1" class="tabela">
                <tr> 
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Alt.</td>
                    <td class="title" align="center" >Regst.</td>
                    <td class="title" align="center" >Hora</td>
                    <td class="title" align="center" >ID Estrada</td>   
                    <td class="title" align="center" >ID Berma</td>   
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>
                    <td class="title" align="center" >Granul.</td>
                    <td class="title" align="center" >Espess.(m)</td>  
                    <td class="title" align="center" >Betume</td>
                    <td class="title" align="center" >Sentido</td>
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tId_bermabblig');
                }
                $cx = new Conexao();
                $dal = new DALbermasbblig($cx);
                $resultado = $dal->Localizar($valor);
                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=bermasbbl&op=excluir&cod=' . $registo['id_bermabblig'];
                    $linkalterar = 'levantamento_main.php?pg=bermasbbl&op=alterar&cod=' . $registo['id_bermabblig'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_bermabblig"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_berma"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["granul"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["espess"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["betume"]; ?></td>
                        <td class="tab"width="1%"align=""><?php echo $registo["sentido"]; ?></td>
                        <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:#0489B1;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                       <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
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
<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start(); ?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fundação da Faixa de rodagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <style>select#cNatgeo{height: 25px;width: 100px;}
               select#cVia{height: 25px;}
               iframe#fxrod{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
               form#fund{width:900px;height: 450px;}
               </style>     
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/FxrodFund.php';
        require_once '../classes/DALFxrodFund.php';     
        date_default_timezone_set('Atlantic/Azores'); 
        $fxrodfund = new Fxrodfund();    
//Retificar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_fxrodfund = filter_input(INPUT_POST, 'tId_fxrodfund');
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
                $cbr = filter_input(INPUT_POST, 'tCbr');
                $ass = filter_input(INPUT_POST, 'tAss');               
                $cx = new Conexao();
                $dalfxrodfund = new DALFxrodfund($cx);
                $fxrodfund = new Fxrodfund($id_fxrodfund,$alt,$reg, $id_estrada, $id_fxrod, $data, $hora, $pkinicio, $pkfim, $via, $natgeo, $cbr, $ass);
                $dalfxrodfund->Alterar($fxrodfund);
                $fxrodfund = new Fxrodfund();
            }
//Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalfxrodfund = new DALFxrodfund($conexao);
                $retorno = $dalfxrodfund->Excluir(filter_input(INPUT_GET, 'cod'));
            }
//Retificar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalfxrodfund = new DALFxrodfund($conexao);
                $fxrodfund = $dalfxrodfund->CarregaFxrodfund(filter_input(INPUT_GET, 'cod'));
            }
            ?> 
    </head>
    <?php include_once '../estrutura/header.php'; ?> 
    <body>
        <h1 class="op">REGISTAR - Fundação da Faixa de Rodagem</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
            <form method="post" id="fund" action="../estrutura/levantamento_main.php?pg=fxrodfund&op=listar"onsubmit="return pk()">
                <input style="margin-left:65px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                 <p><label class="" for="cAlterar">Alteração</label>
                     <select value="<?php echo $fxrodfund->getAlt(); ?>"class="alt" name ="tAlterar" id="cAlterar">
                    <option>0</option>
                    <option>1</option>
                    <option selected><?php echo $fxrodfund->getAlt(); ?></option></select> 
               <label  for="cReg">Registo</label>
                <input value="<?php echo $fxrodfund->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <label  class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $fxrodfund->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>               
                <label class=""for="cId_fxrod">ID Fxrod</label>
                    <input value="<?php echo $fxrodfund->getId_fxrod(); ?>"type="text" name ="tId_fxrod" id="cId_fxrod" class="align"size= "5"/><br><br>                      
                    <iframe  id="fxrod" src="../tabelas/tabFxrodSelect.php" name="janela" ></iframe><br><br>                       
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $fxrodfund->getPkinicio(); ?>"type="text" name ="tPkinicio" id="cPkinicio" class="align"size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $fxrodfund->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align"size= "5"placeholder="0.000"/>
                <label class=""for="cCbr">CBR</label>
                    <input value="<?php echo $fxrodfund->getCbr(); ?>"type="text" name ="tCbr" id="cBr" class="align"size= "5" placeholder="0.000"/>
                <label class=""for="cNatgeo">Nat.geológica</label>
                    <select value="<?php echo $fxrodfund->getNatgeo(); ?>" name ="tNatgeo" id="cNatgeo">					
                        <option>Solo</option>
                        <option>Rocha</option>
                        <option selected><?php echo $fxrodfund->getNatgeo(); ?></option></select> 
                <label class=""for="cVia">Via</label>
                    <select  value="<?php echo $fxrodfund->getVia(); ?>"name ="tVia" id="cVia">					
                        <option>V1</option>
                        <option>V2</option>
                        <option>V3</option>
                        <option>V4</option>
                        <option>V5</option>
                        <option>V6</option>
                        <option selected><?php echo $fxrodfund->getVia(); ?></option></select><br><br>
                <!----------------------------------------------------------------------------------------------------->                               
                 <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;">
                <?php
                if ($fxrodfund->getId_fxrodfund() == 0) {
                    ?>
                    <input style="margin-left:340px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabFxrodfund'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constfxrod'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:340px;" class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_fxrodfund" id="cId_fxrodfund" value="<?php echo $fxrodfund->getId_fxrodfund(); ?>"/>          
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
                    <td class="title" align="center" >ID Estrada</td>   
                    <td class="title" align="center" >ID FxRod.</td>   
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>                  
                    <td class="title" align="center" >Via</td> 
                    <td class="title" align="center" >Nat.Geo.</td> 
                    <td class="title" align="center" >CBR</td>                   
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tId_fxrodfund');
                }
                $cx = new Conexao();
                $dalfxrodfund = new DALFxrodfund($cx);
                $resultado = $dalfxrodfund->Localizar($valor);
                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=fxrodfund&op=excluir&cod=' . $registo['id_fxrodfund'];
                    $linkalterar = 'levantamento_main.php?pg=fxrodfund&op=alterar&cod=' . $registo['id_fxrodfund'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrodfund"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_fxrod"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>                   
                        <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["natgeo"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["cbr"]; ?></td>                      
                        <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:#0489B1;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                        <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                
                    </tr>
                    <?php
                }
                ?>
             </table><br>
            <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=fxrodfund">|INÍCIO|</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>      
            </footer>
    </body>
</html>

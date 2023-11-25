<!DOCTYPE html>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fundação da Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <style>select#cNatgeo{height: 25px;width: 100px;}
               select#cSentido{height: 25px;}
               iframe#fxrod{width: 880px;height: 250px;border: none;background-color: white;padding: 3px;}
               </style>     
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/EstradaFicha.php';
        require_once '../classes/BermasFund.php';
        require_once '../classes/DALBermasFund.php';     
//Inserir registo
         $bermasfund = new Bermasfund();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $alt = filter_input(INPUT_POST, 'tAlterar');
            $reg = filter_input(INPUT_POST, 'tReg');
            $id_berma = filter_input(INPUT_POST, 'tId_berma');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $natgeo = filter_input(INPUT_POST, 'tNatgeo');
            $cbr = filter_input(INPUT_POST, 'tCbr');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $ass = filter_input(INPUT_POST, 'tAss');
            $bermasfund = new BermasFund(0,$alt, $reg,$id_berma, $id_estrada,  $data, $hora, $pkinicio, $pkfim, $natgeo, $cbr,$sentido, $ass);
            $cx = new Conexao();
            $dalbermasfund = new DALBermasFund($cx);
            $dalbermasfund->Inserir($bermasfund);
            $bermasfund = new Bermasfund();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
            }
//Alterar registo
            if (filter_has_var(INPUT_POST, 'btalterar')) {
                $id_bermafund = filter_input(INPUT_POST, 'tId_bermafund');
                $alt = filter_input(INPUT_POST, 'tAlterar');
                $reg = filter_input(INPUT_POST, 'tReg');
                 $id_berma = filter_input(INPUT_POST, 'tId_berma');   
                $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
                $data = filter_input(INPUT_POST, 'tData');
                $hora = filter_input(INPUT_POST, 'tHora');
                $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
                $pkfim = filter_input(INPUT_POST, 'tPkfim');         
                $natgeo = filter_input(INPUT_POST, 'tNatgeo');
                $cbr = filter_input(INPUT_POST, 'tCbr');
                $sentido = filter_input(INPUT_POST, 'tSentido');
                $ass = filter_input(INPUT_POST, 'tAss');
                
                $cx = new Conexao();
                $dalbermasfund = new DALBermasfund($cx);
                $bermasfund = new Bermasfund($id_bermafund,$alt,$reg,$id_berma, $id_estrada,  $data, $hora, $pkinicio, $pkfim, $natgeo, $cbr,$sentido, $ass);
                $dalbermasfund->Alterar($bermasfund);
                $bermasfund = new Bermasfund();
            }
//Excluir registo
            if (filter_input(INPUT_GET, 'op') == 'excluir') {
                $conexao = new Conexao();
                $dalbermasfund = new DALBermasfund($conexao);
                $retorno = $dalbermasfund->Excluir(filter_input(INPUT_GET, 'cod'));
            }
//Alterar registo
            if (filter_input(INPUT_GET, 'op') == 'alterar') {
                $conexao = new Conexao();
                $dalbermasfund = new DALBermasfund($conexao);
                $bermasfund = $dalbermasfund->CarregaBermasfund(filter_input(INPUT_GET, 'cod'));
            }
            ?> 
    </head>
    <?php include_once '../estrutura/header.php'; ?> 
    <body>
        <h1 class="op">REGISTAR - Fundação da Berma</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/levantamento_main.php?pg=constbermas'>|VOLTAR|</a>
        <form style="width:900px;height: 450px;" method="post" id="fund" action="../estrutura/levantamento_main.php?pg=bermasfund&op=listar"onsubmit="return pk()">
                <input style="margin-left:65px;" type="text" value= '<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" class="align" size= "8" Use readonly="true" />	
                <input type="text" value= '<?php echo date('H:i:s'); ?>' name ="tHora" id="cHora" class="align" size= "6" Use readonly="true" />	
                 <p><label class="" for="cAlterar">Alteração</label>
                     <select value="<?php echo $bermasfund->getAlt(); ?>"class="alt" name ="tAlterar" id="cAlterar">
                    <option>0</option>
                    <option>1</option>
                    <option selected><?php echo $bermasfund->getAlt(); ?></option></select> 
               <label  for="cReg">Registo</label>
                <input value="<?php echo $bermasfund->getReg(); ?>"type="text" name ="tReg"  id="cReg" class="align" size= "2"placeholder="0"/>
                <label  class=""for="cId_estrada"> ID Estrada</label>
                    <input value="<?php echo $bermasfund->getId_estrada(); ?>"type="text" name ="tId_estrada" id="cId_estrada" class="align"size= "5"/>               
                <label class=""for="cId_fxrod"> ID Berma</label>
                <input value="<?php echo $bermasfund->getId_berma(); ?>"type="text" name ="tId_berma" id="cId_bermafund" class="align"size= "5"/><br><br>                      
                    <iframe  id="fxrod" src="../tabelas/tabBermasSelect.php" name="janela" ></iframe><br><br>                       
                <p><label class=""for="cPkinicio">pk Início</label>
                    <input value="<?php echo $bermasfund->getPkinicio(); ?>" type="text" name ="tPkinicio" id="cPkinicio" class="align"size= "5"placeholder="0.000"/>
                <label class="" for="cPkfim">pk Fim</label>
                    <input value="<?php echo $bermasfund->getPkfim(); ?>" type="text" name ="tPkfim" id="cPkfim" class="align"size= "5"placeholder="0.000"/>
                 <label class=""for="cNatgeo">Nat.geológica</label>
                    <select value="<?php echo $bermasfund->getNatgeo(); ?>" name ="tNatgeo" id="cNatgeo">					
                        <option>Solo</option>
                        <option>Rocha</option>
                        <option selected><?php echo $bermasfund->getNatgeo(); ?></option></select> 
                    <label class=""for="cCbr">CBR</label>
                    <input value="<?php echo $bermasfund->getCbr(); ?>"type="text" name ="tCbr" id="cBr" class="align"size= "5" placeholder="0.000"/>             
                <label class=""for="cSentido">Sentido</label>
                    <select  value="<?php echo $bermasfund->getSentido(); ?>"name ="tSentido" id="cSentido">					
                        <option>Crescente</option>
                        <option>Decrescente</option>
                        <option selected><?php echo $bermasfund->getSentido(); ?></option></select><br><br>
                        <!----------------------------------------------------------------------------------------------------->                               
                 <input type="text" hidden=""value="<?php echo $_SESSION["login"] ?>" name="tAss" /> 
                <div style=" height: 25px; padding: 5px; width: 900px; margin: 0 auto;">
                <?php
                if ($bermasfund->getId_bermafund() == 0) {
                    ?>
                    <input style="margin-left:340px;" type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input type="button"class="cmd" id="cVer"value="Registos anteriores"name ="tVer"onclick ="location.href = '../estrutura/levantamento_main.php?pg=tabbermasfund'"/>
                    <input style="background-color:#7d8c9b;"type="button" class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/levantamento_main.php?pg=constbermas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:340px;" class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input  class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_bermafund" id="cId_bermafund" value="<?php echo $bermasfund->getId_bermafund(); ?>"/>          
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
                    <td class="title" align="center" >ID Berma</td> 
                    <td class="title" align="center" >ID Estrada</td>      
                    <td class="title" align="center" >pk Início</td>           
                    <td class="title" align="center" >pk Fim</td>                
                    <td class="title" align="center" >Nat.Geo.</td> 
                    <td class="title" align="center" >CBR</td>
                    <td class="title" align="center" >Sentido</td> 
                </tr>         
                <?php
                $valor = ""; //Localizar registo
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tId_bermafund');
                }
                $cx = new Conexao();
                $dalbermasfund = new DALBermasfund($cx);
                $resultado = $dalbermasfund->Localizar($valor);

                While ($registo = $resultado->fetch_array()) {
                    $linkexcluir = 'levantamento_main.php?pg=bermasfund&op=excluir&cod=' . $registo['id_bermafund'];
                    $linkalterar = 'levantamento_main.php?pg=bermasfund&op=alterar&cod=' . $registo['id_bermafund'];
                    ?>  
                    <tr>                      
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_bermafund"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["alt"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["reg"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["hora"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_berma"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>  
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>                     
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>                
                        <td class="tab"width="1%"align="center"><?php echo $registo["natgeo"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["cbr"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td>
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

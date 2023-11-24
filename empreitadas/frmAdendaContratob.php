<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adenda ao Contrato de Obra</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/AdendaContratOb.php';
        require_once '../classes/DALAdendaContratOb.php';        
//Inserir registo
        
        $adctob = new AdendaContratOb(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_contratobra = filter_input(INPUT_POST, 'tId_contratobra');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf'); 
            $datass = filter_input(INPUT_POST, 'tDatass'); 
            $val = filter_input(INPUT_POST, 'tVal');
            $just = filter_input(INPUT_POST, 'tJust');
            $ass = filter_input(INPUT_POST, 'tAss');         
            $cx = new Conexao();
            $dal = new DALAdendaContratOb($cx);
            $adctob = new AdendaContratOb(0, $id_contratobra, $datai, $dataf,$datass,$val,$just,$ass);
            $dal->Inserir($adctob);
            $adctob = new AdendaContratOb();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_adendactob = filter_input(INPUT_POST, 'tId_adendactob');
            $id_contratobra = filter_input(INPUT_POST, 'tId_contratobra');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf'); 
            $datass = filter_input(INPUT_POST, 'tDatass'); 
            $val = filter_input(INPUT_POST, 'tVal');
            $just = filter_input(INPUT_POST, 'tJust');
            $ass = filter_input(INPUT_POST, 'tAss'); 
            $cx = new Conexao();
            $dal = new DALAdendaContratOb($cx);
            $adctob = new AdendaContratOb($id_adendactob, $id_contratobra, $datai, $dataf,$datass,$val,$just,$ass);
            $dal->Alterar($adctob);
            $adctob = new AdendaContratOb();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALAdendaContratOb($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALAdendaContratOb($conexao);
            $adctob = $dal->CarregaAdendaco(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Adenda ao Contrato de Obra</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:330px;width: 500px;" method="post" name= "adendactob" id="adendactob" action="../estrutura/empreitadas_main.php?pg=adendactob&op=listar">          
             <p><label style="width: 80px;margin-left: 0px;" class="label_1" for="cId_contratobra" >ID Contrato</label>
             <select style="height: 30px;width: 143px;" name ="tId_contratobra" id="cId_contratobra" >                  
                          <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALAdendaContratOb($conexao);
                        $res = $dal->cmbContratOb($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_contratobra'] . "\">" ."Contrato Obra (" .$reg['id_contratobra']. ")"." - Concurso (". $reg['id_concurso'] .")"." - Empresa (". $reg['empresa'] .")"." - Consórcio (". $reg['consorcio'] .")";                          
                        }
                        ?>
                 <option selected=""><?php echo $adctob->getId_contratobra(); ?></option></select>   
                        
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatai" >Data início</label>
                    <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $adctob->getDatai(); ?>" name ="tDatai" id="cDatai" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDataf" >Data final</label>
                <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $adctob->getDataf(); ?>" name ="tDataf" id="cDataf" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatass" >Assinatura</label>
                    <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $adctob->getDatass(); ?>" name ="tDatass" id="cDatass" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cVal" >Valor</label>
                    <input style="height:25px;text-align: right;width: 140px;" type="text" value= "<?php echo $adctob->getVal(); ?>" name ="tVal" id="cVal" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cJust">Justificação</label>
                    <textarea style="height:50px;margin-left: 0px;width: 350px;text-align: left;"required type="text" name ="tJust" id="cJust" ><?php echo $adctob->getJust(); ?></textarea>
                               
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($adctob->getId_adendactob() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden=""  name="tId_adendactob" id="cId_adendactob" value="<?php echo $adctob->getId_adendactob(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
             <tr >
                    <td style="border: none;" class='pf'colspan="2" align="center"></td>    
                    <td class="title" colspan="3" align="center">Datas</td> 
                        
                </tr>	
                <tr>
                    <td style="border: none;background-color: #ffffff"class='pf'colspan="2" align="center"></td>       
                </tr>	
            <tr> 
                <td class="title" align="center" >ID Adenda</td>
                <td class="title" align="center" >ID Contrato</td> 
                <td class="title" align="center" >Início</td>
                <td class="title" align="center" >Final</td>
                <td class="title" align="center" >Assinatura</td>
                <td class="title" align="center" >Valor</td>
                <td class="title" align="center" >Justificação</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'adendactob');
            }
            $cx = new Conexao();
            $dal = new DALAdendaContratOb($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=adendactob&op=excluir&cod=' . $registo['id_adendactob'];
                $linkalterar = 'empreitadas_main.php?pg=adendactob&op=alterar&cod=' . $registo['id_adendactob'];
                ?>  
                <tr> 
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_adendactob"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_contratobra"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["datai"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["dataf"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["datass"]; ?></td>
                    <td class="tab"width="1%"align="right"><?php echo $registo["val"]; ?></td>
                    <td class="tab"width="8%"><?php echo $registo["just"]; ?></td>
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=adendactob">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>
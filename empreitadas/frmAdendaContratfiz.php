<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Adenda ao Contrato de Fiscalização</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/AdendaContratoFz.php';
        require_once '../classes/DALAdendaContratoFz.php';        
//Inserir registo
        $acontf = new AdendaContratoFz(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_contratfiz = filter_input(INPUT_POST, 'tId_contratfiz');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf'); 
            $datass = filter_input(INPUT_POST, 'tDatass'); 
            $val = filter_input(INPUT_POST, 'tVal');
            $just = filter_input(INPUT_POST, 'tJust');
            $ass = filter_input(INPUT_POST, 'tAss');         
            $cx = new Conexao();
            $dal = new DALAdendaContratoFz($cx);
            $acontf = new AdendaContratoFz(0, $id_contratfiz, $datai, $dataf,$datass,$val,$just,$ass);
            $dal->Inserir($acontf);
            $acontf = new AdendaContratoFz();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_adendactfiz = filter_input(INPUT_POST, 'tId_adendactfiz');
            $id_contratfiz = filter_input(INPUT_POST, 'tId_contratfiz');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf'); 
            $datass = filter_input(INPUT_POST, 'tDatass'); 
            $val = filter_input(INPUT_POST, 'tVal');
            $just = filter_input(INPUT_POST, 'tJust');
            $ass = filter_input(INPUT_POST, 'tAss'); 
            $cx = new Conexao();
            $dal = new DALAdendaContratoFz($cx);
            $acontf = new AdendaContratoFz($id_adendactfiz, $id_contratfiz, $datai, $dataf,$datass,$val,$just,$ass);
            $dal->Alterar($acontf);
            $acontf = new AdendaContratoFz();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALAdendaContratoFz($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALAdendaContratoFz($conexao);
            $acontf = $dal->CarregaAdendacf(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Adenda ao Contrato de Ficalização</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:330px;width: 500px;" method="post" name= "adendactfz" id="adendactfz" action="../estrutura/empreitadas_main.php?pg=adendactfz&op=listar">          
             <p><label style="width: 80px;margin-left: 0px;" class="label_1" for="cId_contratfiz" >ID Contrato</label>
             <select style="height: 30px;width: 143px;" name ="tId_contratfiz" id="cId_contratfiz" >                  
                          <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALAdendaContratoFz($conexao);
                        $res = $dal->cmbContratFiz($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_contratfiz'] . "\">" ."Contrato (" .$reg['id_contratfiz']. ") - Empreitada (". $reg['id_empreitada'] .") - ". $reg['nome'] ."</option>";                          
                        }
                        ?>
                 <option selected=""><?php echo $acontf->getId_contratfiz(); ?></option></select>   
                        
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatai" >Data início</label>
                    <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $acontf->getDatai(); ?>" name ="tDatai" id="cDatai" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDataf" >Data final</label>
                <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $acontf->getDataf(); ?>" name ="tDataf" id="cDataf" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatass" >Assinatura</label>
                    <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $acontf->getDatass(); ?>" name ="tDatass" id="cDatass" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cVal" >Valor</label>
                    <input style="height:25px;text-align: right;width: 140px;" type="text" value= "<?php echo $acontf->getVal(); ?>" name ="tVal" id="cVal" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cJust">Justificação</label>
                    <textarea style="height:50px;margin-left: 0px;width: 350px;text-align: left;"required type="text" name ="tJust" id="cJust" ><?php echo $acontf->getJust(); ?></textarea>
                               
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($acontf->getId_adendactfiz() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden=""  name="tId_adendactfiz" id="cId_adendactfz" value="<?php echo $acontf->getId_adendactfiz(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
             <tr >
                    <td style="border: none;" class='pf'colspan="2" align="center"></td>    
                    <td class="title" colspan="3" align="center">Datas</td> 
                        
                </tr>	
                <tr >
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
                $valor = filter_input(INPUT_POST, 'adendactfz');
            }
            $cx = new Conexao();
            $dal = new DALAdendaContratoFz($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=adendactfz&op=excluir&cod=' . $registo['id_adendactfiz'];
                $linkalterar = 'empreitadas_main.php?pg=adendactfz&op=alterar&cod=' . $registo['id_adendactfiz'];
                ?>  
                <tr> 
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_adendactfiz"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_contratfiz"]; ?></td>
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
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=adendactfz">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>
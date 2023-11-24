<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contrato de Fiscalização</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/ContratFiz.php';
        require_once '../classes/DALContratFiz.php';        
//Inserir registo
        $contf = new ContratFiz(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_empreitada = filter_input(INPUT_POST, 'tId_empreitada');
            $empresa = filter_input(INPUT_POST, 'tEmpresa');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf'); 
            $datass = filter_input(INPUT_POST, 'tDatass'); 
            $val = filter_input(INPUT_POST, 'tVal'); 
            $ass = filter_input(INPUT_POST, 'tAss');         
            $cx = new Conexao();
            $dal = new DALContratFiz($cx);
            $contf = new ContratFiz(0, $id_empreitada, $empresa, $datai, $dataf,$datass,$val,$ass);
            $dal->Inserir($contf);
            $contf = new ContratFiz();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_contratfiz = filter_input(INPUT_POST, 'tId_contratfiz');
            $id_empeitada = filter_input(INPUT_POST, 'tId_empreitada');
            $empresa = filter_input(INPUT_POST, 'tEmpresa');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf'); 
            $datass = filter_input(INPUT_POST, 'tDatass'); 
            $val = filter_input(INPUT_POST, 'tVal'); 
            $ass = filter_input(INPUT_POST, 'tAss');   
            $cx = new Conexao();
            $dal = new DALContratFiz($cx);
            $contf = new ContratObra($id_contratfiz, $id_empreitada, $empresa, $datai, $dataf,$datass,$val,$ass);
            $dal->Alterar($contf);
            $contf = new ContratFiz();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALContratFiz($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALContratFiz($conexao);
            $conto = $dal->CarregaContf(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Contrato de Ficalização</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:300px;width: 500px;" method="post" name= "contratfiz" id="contratfiz" action="../estrutura/empreitadas_main.php?pg=contratfiz&op=listar">          
             <p><label style="width: 80px;margin-left: 0px;" class="label_1" for="cId_empreitada" >ID Empreitada</label>
             <select style="height: 30px;width: 143px;text-align: center;" name ="tId_empreitada" id="cId_empreitada" >                  
                          <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALContratFiz($conexao);
                        $res = $dal->cmbEmpreitada($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_empreitada'] . "\">" . $reg['id_empreitada'] ." - ". $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $contf->getId_empreitada(); ?></option></select>   
            
             <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cEmpresa" >Empresa</label>
                <select style="height: 30px;width: 320px;text-align:left;" name ="tEmpresa" id="cEmpresa" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALContratFiz($conexao);
                        $res = $dal->cmbEmpresa($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['nome'] . "\">" . $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $contf->getEmpresa(); ?></option></select>  
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatai" >Data início</label>
                    <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $contf->getDatai(); ?>" name ="tDatai" id="cDatai" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDataf" >Data final</label>
                <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $contf->getDataf(); ?>" name ="tDataf" id="cDataf" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatass" >Data assinatura</label>
                    <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $contf->getDatass(); ?>" name ="tDatass" id="cDatass" class="align" required="true" />
                
                <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cVal">Valor</label>
                <input style="height:23px;margin-left: 0px;width: 140px;text-align: right;"value="<?php echo $contf->getVal(); ?>"required type="text" name ="tVal" id="cVal" class="align" size= "5"placeholder="0.00"/>
                               
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($contf->getId_contratfiz() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden=""  name="tId_contratobra" id="cId_contratobra" value="<?php echo $contf->getId_contratfiz(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="90%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
             <tr >
                    <td style="border: none;" class='pf'colspan="3" align="center"></td>    
                    <td class="title" colspan="3" align="center">Datas</td> 
                        
                </tr>	
                <tr >
                    <td style="border: none;background-color: #ffffff"class='pf'colspan="2" align="center"></td>       
                </tr>	
            <tr> 
                <td class="title" align="center" >ID Contrato</td>
                <td class="title" align="center" >ID Empreitada</td> 
                <td class="title" align="center" >Empresa</td>
                <td class="title" align="center" >Início</td>
                <td class="title" align="center" >Final</td>
                <td class="title" align="center" >Assinatura</td>
                <td class="title" align="center" >Valor</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'contratfiz');
            }
            $cx = new Conexao();
            $dal = new DALContratFiz($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=contratfiz&op=excluir&cod=' . $registo['id_contratfiz'];
                $linkalterar = 'empreitadas_main.php?pg=contratfiz&op=alterar&cod=' . $registo['id_contratfiz'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_contratfiz"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_empreitada"]; ?></td> 
                    <td class="tab"width="5%"align=""><?php echo $registo["empresa"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["datai"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["dataf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["datass"]; ?></td>
                    <td class="tab"width="1%"align="right"><?php echo $registo["val"]; ?></td>        
                    <td class="tab"width="2%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                       
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=contratfiz">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

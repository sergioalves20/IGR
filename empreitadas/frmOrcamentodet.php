<!DOCTYPE html>
<!--smsa.2018-->
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalhe do Orçamento</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>          
          <script type="text/javascript">
                function ddlselect(){
                    var select = document.getElementById("cCod");
                     alert(select.options[select.selectedIndex].text); 
                }
                </script>           
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Orcamentodet.php';
        require_once '../classes/DALOrcamentodet.php';       
//Inserir registo   
        $orcdet = new Orcamentodet(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_orc = filter_input(INPUT_POST, 'tId_orc');
            $trabalhos = filter_input(INPUT_POST, 'tTrabalhos');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $cod = filter_input(INPUT_POST, 'tCod');
            $quant = filter_input(INPUT_POST, 'tQuant');
            $preco = filter_input(INPUT_POST, 'tPreco');
            $ass = filter_input(INPUT_POST, 'tAss');                   
            $cx = new Conexao();
            $dal = new DALOrcamentodet($cx);
            $orcdet = new Orcamentodet(0,$id_orc,$trabalhos,$pkinicio,$pkfim,$cod,$quant,$preco,$ass);
            $dal->Inserir($orcdet);
            $orcdet = new Orcamentodet();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo   
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_orcdet = filter_input(INPUT_POST, 'tId_orcdet');
            $id_orc = filter_input(INPUT_POST, 'tId_orc');
            $trabalhos = filter_input(INPUT_POST, 'tTrabalhos');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $cod = filter_input(INPUT_POST, 'tCod');
            $quant = filter_input(INPUT_POST, 'tQuant');
            $preco = filter_input(INPUT_POST, 'tPreco');
            $ass = filter_input(INPUT_POST, 'tAss');                   
            $cx = new Conexao();
            $dal = new DALOrcamentodet($cx);
            $orcdet = new Orcamentodet($id_orcdet,$id_orc,$trabalhos,$pkinicio,$pkfim,$cod,$quant,$preco,$ass);
            $dal->Alterar($orcdet);
            $orcdet = new Orcamentodet();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALOrcamentodet($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALOrcamentodet($conexao);
            $orcdet = $dal->CarregaOrcamentodet(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Detalhe do Orçamento</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:330px;width:550px;" method="post" name= "orcdet" id="orcdet" action="../estrutura/empreitadas_main.php?pg=orcamentodet&op=listar" >
            <br>       
            <p><label style="width: 90px;margin-left: 20px" class="label_1" for="cId_orc" >ID Orçamento</label>
            <select style="height: 25px;width: 105px;text-align: center;" name ="tId_orc" id="cId_orc" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALOrcamentodet($conexao);
                        $res = $dal->cmbOrc($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_orc'] . "\">" ."Orçamento(". $reg['id_orc'].")"." Estrada (". $reg['id_estrada'].") - ".$reg['tipo_obra']."</option>";
                        }
                        ?>
                <option selected=""><?php echo $orcdet->getId_orc(); ?></option></select> 
                
            <p><label style="width: 90px;margin-left: 20px" class="label_1" for="cTrabalhos" >Trabalhos</label>
            <select style="height: 25px;width: 200px;text-align: left;" name ="tTrabalhos" id="cTrabalhos" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALOrcamentodet($conexao);
                        $res = $dal->cmbTrabalhos($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['trabalhos'] . "\">" . $reg['trabalhos']."</option>";
                        }
                        ?>
                <option selected=""><?php echo $orcdet->getTrabalhos(); ?></option></select>     
                
           
            <p><label style="width: 90px;margin-left: 20px"class="label_1"for="cPkinicio">pk Início</label>
                    <input style="margin-left: 0px" value="<?php echo $orcdet->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>        
                    
               <p><label style="width: 90px;margin-left: 20px"class="label_1"for="cPkfim">pk Fim</label>
                    <input  value="<?php echo $orcdet->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>               
      
        <p><label style="width: 90px;margin-left: 20px" class="label_1" for="cCod" >Item Orçamento</label>
            <select style="height: 25px;width:105px;text-align: left;margin-left: 0px" name ="tCod" id="cCod"onchange="ddlselect()"  >
                 <option selected=""><?php echo $orcdet->getCod(); ?></option>
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALOrcamentodet($conexao);
                        $res = $dal->cmbItens($valor);
                        While ($reg = $res->fetch_array()) {
                        echo "<option value=\"" . $reg['cod'] . "\">" . $reg['cod']." - ".$reg['descr']."   ".$reg['und']."</option>";
                        }           
                        ?>                               
                      </select>                   
                                   
                <p><label style="width: 90px;margin-left: 20px;" class="label_1" for="cQuant" >Quantidade</label>
                   <input style="height: 20px;width: 95px;text-align: right" type="text" value= "<?php echo $orcdet->getQuant(); ?>" name ="tQuant" id="cQuant"placeholder="0.0"/>    
                
            <p> <label class="label_1" style="width: 90px;margin-left: 20px;" class="label_1" for="cPreco" >Preço</label>
            <input style="margin-left: 0px;height: 20px;width: 100px;text-align: right;" type="text" value= "<?php echo $orcdet->getPreco(); ?>" name ="tPreco" id="cPreco"placeholder="0.00"/>
            <a href="../estrutura/empreitadas_main.php?pg=precomedio"target="blank"style="font-family: calibri light;font-size:10pt;margin-left: 20px;">| PREÇOS DE PROPOSTAS ANTERIORES |</a>      
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($orcdet->getId_orcdet() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_orcdet" id="id_orcdet" value="<?php echo $orcdet->getId_orcdet(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;">
            <tr> 
                <td class="title" align="center" >ID Detalhe</td>
                <td class="title" align="center" >ID Orçamento</td> 
                <td class="title" align="center" >Trabalhos</td>  
                <td class="title" align="center" >pkInício</td>
                <td class="title" align="center" >pkFim</td>
                <td class="title" align="center" >Item</td>
                <td class="title" align="center" >Quant.</td>
                <td class="title" align="center" >Preço</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'orcdet');
            }
            $cx = new Conexao();
            $dal = new DALOrcamentodet($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=orcamentodet&op=excluir&cod=' . $registo['id_orcdet'];
                $linkalterar = 'empreitadas_main.php?pg=orcamentodet&op=alterar&cod=' . $registo['id_orcdet'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_orcdet"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_orc"]; ?></td> 
                    <td class="tab"width="5%"><?php echo $registo["trabalhos"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["cod"]; ?></td>
                    <td class="tab"width="1%"align="right"><?php echo $registo["quant"]; ?></td>
                    <td class="tab"width="1%"align="right"><?php echo $registo["preco"]; ?></td>
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                       
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

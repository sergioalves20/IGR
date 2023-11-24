<!DOCTYPE html>
<!--smsa.2018-->
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Orçamento</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Orcamento.php';
        require_once '../classes/DALOrcamento.php';        
//Inserir registo     
        $orc = new Orcamento(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $data = filter_input(INPUT_POST, 'tData');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $tipo_obra = filter_input(INPUT_POST, 'tTipo_obra');
            $ass = filter_input(INPUT_POST, 'tAss');                   
            $cx = new Conexao();
            $dal = new DALOrcamento($cx);
            $orc = new Orcamento(0,$data,$id_estrada,$tipo_obra,$ass);
            $dal->Inserir($orc);
            $orc = new Orcamento();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_orc = filter_input(INPUT_POST, 'tId_orc');
            $data = filter_input(INPUT_POST, 'tData');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $tipo_obra = filter_input(INPUT_POST, 'tTipo_obra');
            $ass = filter_input(INPUT_POST, 'tAss');            
            $cx = new Conexao();
            $dal = new DALOrcamento($cx);
            $orc = new Orcamento($id_orc,$data,$id_estrada,$tipo_obra,$ass);
            $dal->Alterar($orc);
            $orc = new Orcamento();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALOrcamento($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALOrcamento($conexao);
            $orc = $dal->CarregaOrc(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Orçamento</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:200px;width:550px; " method="post" name= "orcamento" id="orcamento" action="../estrutura/empreitadas_main.php?pg=orcamento&op=listar" >
            <br>
            
            <p><label style="width: 70px;margin-left: 20px;" class="label_1" for="cData">Data</label>
                 <input style="margin-left: 10px;height: 23px;" type="date" value= "<?php echo $orc->getData(); ?>" name ="tData" id="cData" class="align" /> 
            
            <p><label style="width: 70px;margin-left: 20px" class="label_1" for="cId_estrada" >ID Estrada</label>
            <select style="height: 25px;width: 143px;text-align: center;margin-left: 10px;" name ="tId_estrada" id="cId_estrada" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALOrcamento($conexao);
                        $res = $dal->cmbEstrada($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_estrada'] . "\">" .$reg['ilha']." - "."Estrada(". $reg['id_estrada'].")"." - ". $reg['codigo'] ." - ".$reg['toponimo']."</option>";
                        }
                        ?>
                <option selected=""><?php echo $orc->getId_estrada(); ?></option></select>          
           
            
            
            <p><label style="width: 70px;margin-left: 20px;" class="label_1" for="cTipo_obra" >Tipo de Obra</label>
               <select style="height: 25px;width: 350px;text-align: left;margin-left: 10px;" name ="tTipo_obra" id="cTipo_obra" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALOrcamento($conexao);
                        $res = $dal->cmbTipobra($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['tipo_obra'] . "\">" . $reg['tipo_obra']."</option>";
                        }
                        ?>
                   <option selected=""><?php echo $orc->getTipo_obra(); ?></option></select>      
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($orc->getId_orc() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_orc" id="id_orc" value="<?php echo $orc->getId_orc(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="60%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >Orçamento</td>
                <td class="title" align="center" >Data</td> 
                <td class="title" align="center" >ID Estrada</td>  
                <td class="title" align="center" >Tipo de Obra</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'orcamento');
            }
            $cx = new Conexao();
            $dal = new DALOrcamento($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=orcamento&op=excluir&cod=' . $registo['id_orc'];
                $linkalterar = 'empreitadas_main.php?pg=orcamento&op=alterar&cod=' . $registo['id_orc'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_orc"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td> 
                    <td class="tab"width="10%"align=""><?php echo $registo["tipo_obra"]; ?></td>             
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=orcamento">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

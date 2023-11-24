<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Empreitada</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Proposta.php';
        require_once '../classes/DALProposta.php';        
//Inserir registo
        $prop = new Proposta(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $data = filter_input(INPUT_POST, 'tData');
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $empresa = filter_input(INPUT_POST, 'tEmpresa');
            $consorcio = filter_input(INPUT_POST, 'tConsorcio');
            $valorp = filter_input(INPUT_POST, 'tValorp');
            $prazo = filter_input(INPUT_POST, 'tPrazo');
            $classifc = filter_input(INPUT_POST, 'tClassifc');
            $ass = filter_input(INPUT_POST, 'tAss');
            $cx = new Conexao();          
            $dal = new DALProposta($cx);
            $prop = new Proposta(0,$data,$id_concurso,$empresa,$consorcio,$valorp,$prazo,$classifc,$ass);
            $dal->Inserir($prop);
            $prop = new Proposta();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_proposta = filter_input(INPUT_POST, 'tId_proposta');
            $data = filter_input(INPUT_POST, 'tData');
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $empresa = filter_input(INPUT_POST, 'tEmpresa');
            $consorcio = filter_input(INPUT_POST, 'tConsorcio');
            $valorp = filter_input(INPUT_POST, 'tValorp');
            $prazo = filter_input(INPUT_POST, 'tPrazo'); 
            $classifc = filter_input(INPUT_POST, 'tClassifc'); 
            $ass = filter_input(INPUT_POST, 'tAss'); 
            
            $cx = new Conexao();
            $dal = new DALProposta($cx);
            $prop = new Proposta($id_proposta,$data,$id_concurso,$empresa,$consorcio,$valorp,$prazo,$classifc,$ass);
            $dal->Alterar($prop);
            $prop = new Proposta();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALProposta($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALProposta($conexao);
            $prop = $dal->CarregaProposta(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Proposta</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:350px;width:500px; " method="post" name= "proposta" id="proposta" action="../estrutura/empreitadas_main.php?pg=propostas&op=listar" >
        
             <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cData" >Data</label>
                <input style="margin-left: 0px;height: 25px;" type="date" value= "<?php echo $prop->getData(); ?>" name ="tData" id="cData" class="align" required="true" />         
                        
             <p><label style="width: 80px;margin-left: 0px;" class="label_1" for="cId_concurso" >ID Concurso</label>
             <select style="height: 30px;width: 143px;text-align: center;" name ="tId_concurso" id="cId_concurso" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALProposta($conexao);
                        $res = $dal->cmbConcurso($valor);
                        While ($reg = $res->fetch_array()) {
                            
                            echo "<option value=\"" . $reg['id_concurso'] . "\">" ."Concurso(". $reg['id_concurso'].")"." - ". $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $prop->getId_concurso(); ?></option></select> 
                 
                <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cEmpresa" >Empresa</label>
                <select style="height: 30px;width: 320px;text-align: left;" name ="tEmpresa" id="cEmpresa" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALProposta($conexao);
                        $res = $dal->cmbEmpresa($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['nome'] . "\">" . $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $prop->getEmpresa(); ?></option></select> 
                    
                <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cConsorcio" >Consórcio</label>
               <select style="height: 30px;width: 320px;text-align: left;" name ="tConsorcio" id="cConsorcio" >                       
                        <?php
                       $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALProposta($conexao);
                        $res = $dal->cmbConsorcio($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['empresa'] . "\">" ."Concurso (".$reg['id_concurso'].") - ".$reg['empresa']."</option>";
                        }
                        ?>
                   <option selected=""><?php echo $prop->getConsorcio(); ?></option></select> 
                    
            <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cValorp">Valor</label>
                <input style="height:25px;margin-left: 0px;"value="<?php echo $prop->getValorp(); ?>"required type="text" name ="tValorp" id="cValorp" class="align" size= "5"placeholder="0.00"/>        
                    
            <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cPrazo" >Prazo</label>
                <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $prop->getPrazo(); ?>" name ="tPrazo" id="cPrazo" class="align" required="true" />       
           
              <p><label style="width: 50px;margin-left: 0px;" class="label_1" for="cClassifc" >Classificação</label>
                 <select style="height:28px;margin-left: 30px;" name ="tClassifc" id="cClassifc">
                    <option value="s/cº">s/c</option>
                    <option value="1º">1º</option>
                    <option value="2º">2º</option>
                    <option value="3º">3º</option>
                    <option value="4º">4º</option>
                    <option value="5º">5º</option>
                    <option value="6º">6º</option>
                    <option value="7º">7º</option>
                    <option value="8º">8º</option>
                    <option value="9º">9º</option>
                    <option value="10º">10º</option>
                    <option selected=""><?php echo $prop->getClassifc(); ?></option></select>               
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($prop->getId_proposta() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_proposta" id="id_proposta" value="<?php echo $prop->getId_proposta(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="80%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Proposta<br>Concurso</td>
                <td class="title" align="center" >Data</td>  
                <td class="title" align="center" >ID<br>Concurso</td> 
                <td class="title" align="center" >Empresa</td>  
                <td class="title" align="center" >Consórcio<br>Empresa Lider</td>
                <td class="title" align="center" >Valor</td>
                <td class="title" align="center" >Prazo</td>
                <td class="title" align="center" >Classificação</td>  
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'proposta');
            }
            $cx = new Conexao();
            $dal = new DALProposta($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=propostas&op=excluir&cod=' . $registo['id_proposta'];
                $linkalterar = 'empreitadas_main.php?pg=propostas&op=alterar&cod=' . $registo['id_proposta'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_proposta"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_concurso"]; ?></td> 
                    <td class="tab"width="5%"><?php echo $registo["empresa"]; ?></td> 
                    <td class="tab"width="5%"><?php echo $registo["consorcio"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["valorp"]; ?></td> 
                    <td class="tab"width="2%"align="center"><?php echo $registo["prazo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["classifc"]; ?></td> 
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                   <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                       
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=objconcurso">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

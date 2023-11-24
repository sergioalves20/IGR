<!DOCTYPE html>
<!--smsa.2018-->
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Empreitada</title>
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
        require_once '../classes/Intervencao.php';
        require_once '../classes/DALIntervencao.php';        
//Inserir registo
        $int = new Intervencao(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_proposta = filter_input(INPUT_POST, 'tId_proposta');
            $id_objconcurso = filter_input(INPUT_POST, 'tId_objconcurso');
            $valor_global = filter_input(INPUT_POST, 'tValor_global');
            $trabalhos = filter_input(INPUT_POST, 'tTrabalhos');
            $cod = filter_input(INPUT_POST, 'tCod');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $und = filter_input(INPUT_POST, 'tUnd');
            $quant = filter_input(INPUT_POST, 'tQuant');
            $preco = filter_input(INPUT_POST, 'tPreco');
            $ass = filter_input(INPUT_POST, 'tAss');                           
            $cx = new Conexao();
            $dal = new DALIntervencao($cx);
            $int = new Intervencao(0,$id_proposta,$id_objconcurso,$valor_global,$trabalhos,$cod,$pkinicio,$pkfim,$sentido,$und,$quant,$preco,$ass);
            $dal->Inserir($int);
            $int = new Intervencao();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }         
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_intervencao = filter_input(INPUT_POST, 'tId_intervencao');
            $id_proposta = filter_input(INPUT_POST, 'tId_proposta');
            $id_objconcurso = filter_input(INPUT_POST, 'tId_objconcurso');
            $valor_global = filter_input(INPUT_POST, 'tValor_global');
            $trabalhos = filter_input(INPUT_POST, 'tTrabalhos');
            $cod = filter_input(INPUT_POST, 'tCod');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $sentido = filter_input(INPUT_POST, 'tSentido');
            $und = filter_input(INPUT_POST, 'tUnd');
            $quant = filter_input(INPUT_POST, 'tQuant');
            $preco = filter_input(INPUT_POST, 'tPreco');
            $ass = filter_input(INPUT_POST, 'tAss');     
            $cx = new Conexao();
            $dal = new DALIntervencao($cx);
            $int = new Intervencao($id_intervencao,$id_proposta,$id_objconcurso,$valor_global,$trabalhos,$cod,$pkinicio,$pkfim,$sentido,$und,$quant,$preco,$ass);
            $dal->Alterar($int);
            $int = new Intervencao();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALIntervencao($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALIntervencao($conexao);
            $int = $dal->CarregaIntervencao(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Intervenções</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:370px;width:550px;" method="post" name= "intervencao" id="intervencao" action="../estrutura/empreitadas_main.php?pg=intervencao&op=listar" >
            <p><label style="width: 70px;" class="label_1" for="cId_proposta" >ID Proposta</label>
            <select style="height: 25px;width: 100px;" name ="tId_proposta" id="cId_proposta" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALIntervencao($conexao);
                        $res = $dal->cmbProposta($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_proposta'] . "\">" ."Concurso(". $reg['id_concurso'] .")"." - ". "Proposta(".$reg['id_proposta'].") ".$reg['empresa'].$reg['consorcio']."</option>";                           
                        }
                        ?>
                <option selected=""><?php echo $int->getId_proposta(); ?></option></select> 
                        
                <label style="width: 130px;" class="" for="cId_objeto" >ID Objeto do Concurso</label>
                <select style="height: 25px;width: 100px;text-align: center;" name ="tId_objconcurso" id="cId_objconcurso" >
                       
                <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALIntervencao($conexao);
                        $res = $dal->cmbObjeto($valor);
                        While ($reg = $res->fetch_array()) {
                        echo "<option value=\"" . $reg['id_objconcurso'] . "\">" ."Concurso(". $reg['id_concurso'] .")" ." - "."ID Objeto(". $reg['id_objconcurso'] .")  "."Estrada(". $reg['id_estrada']."</option>";
                        }
                        ?>
                        <option selected=""><?php echo $int->getId_objconcurso(); ?></option></select>     
                
            <hr>
            <p><label style="width: 300px;" class="label_1" for="cValor_global" >Valor global<br>para <em>Manutenção Corrente</em> ou <em>Manutenção Periódica</em></label>
                <input style="margin-left: 0px;height: 23px;width: 100px;text-align: right;" type="text" value= "<?php echo $int->getValor_global(); ?>" name ="tValor_global" id="cValor_global"placeholder="0.00" />   
            <hr>    
                <br>
                 <p><label style="width: 65px;" class="label_1" for="cTrabalhos" >Trabalhos</label>
            <select style="height: 25px;width:200px;margin-left: 35px;" name ="tTrabalhos" id="cTrabalhos" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALIntervencao($conexao);
                        $res = $dal->cmbTrabalhos($valor);
                        While ($reg = $res->fetch_array()) {
                        echo "<option value=\"" . $reg['trabalhos'] . "\">" . $reg['trabalhos']."</option>";
                        }
                        ?>
                <option selected=""><?php echo $int->getTrabalhos(); ?></option></select>     

               <p><label style="width: 100px;" class="label_1" for="cCod" >Item Orçamento</label>
               <select style="height: 25px;width: 200px;text-align: left;" name ="tCod" id="cCod" onchange="ddlselect()" >
                 <option selected=""></option>
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALIntervencao($conexao);
                        $res = $dal->cmbItens($valor);
                        While ($reg = $res->fetch_array()) {
                        echo "<option value=\"" . $reg['cod'] . "\">" . $reg['cod']." - ".$reg['descr']."   ".$reg['und']."</option>";
                        }
                        ?>
                   
                    <option><?php echo $int->getCod(); ?></option></select>

                   <a  href="../estrutura/empreitadas_main.php?pg=itensorcamento" target="_blank" style="font-family: calibri light;font-size: 10pt;margin-left: 20px;text-decoration: none;">| TABELA DOS ITENS |</a>      
                     
             <p><label style="width: 50px;margin-left: 50px;"class="label_1"for="cPkinicio">pk Início</label>
                 <input  value='<?php echo $int->getPkinicio(); ?>' type="text" required name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>
             <label class=""style="width: 50px;margin-left: 20px;" for="cPkfim">pk Fim</label>
                 <input style="margin-left:0px;" value='<?php echo $int->getPkfim(); ?>' type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>         
           
               
             <p><label style="width: 50px;margin-left: 50px;"class="label_1"for="cSentido">Sentido</label>
                    <select class="sentido" name ="tSentido" id="cSentido">					
                        <option value="Crescente" >Crescente</option>
                        <option value="Decrescente">Decrescente</option>							
                        <option selected><?php echo $int->getSentido(); ?></option></select> 
                            
               <p><label style="width: 75px;margin-left: 25px;" class="label_1" for="cQuant" >Quantidade</label>
                   <input style="margin-left: 0px;height: 20px;width: 95px;text-align: right" type="text" value= "<?php echo $int->getQuant(); ?>" name ="tQuant" id="cQuant"placeholder="0.0"/>    
                
            <label style="width: 40px;margin-left: 10px;" class="" for="cPreco" >Preço</label>
            <input style="margin-left: 0px;height: 20px;width: 100px;text-align: right;" type="text" value= "<?php echo $int->getPreco(); ?>" name ="tPreco" id="cPreco"placeholder="0.00"/>
                                     
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($int->getId_intervencao() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_intervencao" id="id_intervencao" value="<?php echo $int->getId_intervencao(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;">
            <tr> 
                <td class="title" align="center" >ID<br>Intervenção</td>
                <td class="title" align="center" >ID<br>Proposta</td> 
                <td class="title" align="center" >ID Objeto<br>Concurso</td>  
                <td class="title" align="center" >Valor global</td>
                <td class="title" align="center" >Trabalhos</td>
                <td class="title" align="center" >Item do Orçamento</td>
                <td class="title" align="center" >Pk Início</td>
                <td class="title" align="center" >Pk Fim</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Quant</td>
                <td class="title" align="center" >Preço</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'intervencao');
            }
            $cx = new Conexao();
            $dal = new DALIntervencao($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=intervencao&op=excluir&cod=' . $registo['id_intervencao'];
                $linkalterar = 'empreitadas_main.php?pg=intervencao&op=alterar&cod=' . $registo['id_intervencao'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_intervencao"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_proposta"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_objconcurso"]; ?></td> 
                    <td class="tab"width="1%"align="right"><?php echo $registo["valor_global"]; ?></td>
                    <td class="tab"width="3%"align="left"><?php echo $registo["trabalhos"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["cod"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td> 
                    <td class="tab"width="1%"align="left"><?php echo $registo["sentido"]; ?></td> 
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
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=intervencao">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>
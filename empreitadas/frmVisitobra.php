<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Visita a Obras</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Visitobra.php';
        require_once '../classes/DALVisitobra.php';        
//Inserir registo    
        $visit = new Visitobra(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $id_intervencao = filter_input(INPUT_POST, 'tId_intervencao');
            $executada = filter_input(INPUT_POST, 'tExecutada');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $quant = filter_input(INPUT_POST, 'tQuant');
            $obsrv = filter_input(INPUT_POST, 'tObsrv');
            $foto1 = filter_input(INPUT_POST, 'tFoto1');
            $foto2 = filter_input(INPUT_POST, 'tFoto2');
            $ass = filter_input(INPUT_POST, 'tAss');
            $cx = new Conexao();          
            $dal = new DALVisitobra($cx);
            $visit = new Visitobra(0,$data,$hora,$id_intervencao,$executada,$pkinicio,$pkfim,$quant,$obsrv,$foto1,$foto2,$ass);
            $dal->Inserir($visit);
            $visit = new Visitobra();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_visitobra = filter_input(INPUT_POST, 'tId_visitobra');
            $data = filter_input(INPUT_POST, 'tData');
            $hora = filter_input(INPUT_POST, 'tHora');
            $id_intervencao = filter_input(INPUT_POST, 'tId_intervencao');
            $executada = filter_input(INPUT_POST, 'tExecutada');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $quant = filter_input(INPUT_POST, 'tQuant');
            $obsrv = filter_input(INPUT_POST, 'tObsrv');
            $foto1 = filter_input(INPUT_POST, 'tFoto1');
            $foto2 = filter_input(INPUT_POST, 'tFoto2');
            $ass = filter_input(INPUT_POST, 'tAss');
            
            $cx = new Conexao();
            $dal = new DALVisitobra($cx);
            $visit = new Visitobra($id_visitobra,$data,$hora,$id_intervencao,$executada,$pkinicio,$pkfim,$quant,$obsrv,$foto1,$foto2,$ass);
            $dal->Alterar($visit);
            $visit = new Visitobra();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALVisitobra($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALVisitobra($conexao);
            $visit = $dal->CarregaVisitobra(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Visita a Obras</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:470px;width:600px; " method="post" name= "visitobra" id="visitobra" action="../estrutura/empreitadas_main.php?pg=visitobra&op=listar" >
        
             <p><label style="margin-left: 0px"class="label_1" for="cData" >Data</label>
                 <input style="margin-left: 0px;height: 25px;" type="date" value= "<?php echo $visit->getData(); ?>" name ="tData" id="cData" class="align" required="true" />         
                        
             <p><label style="margin-left: 0px"class="label_1" for="cHora" >Hora</label>
                <input style="margin-left: 0px;height: 25px;" type="time" value= "<?php echo $visit->getHora(); ?>" name ="tHora" id="cHora" class="align" required="true" />
                
             <p><label style="width: 80px;margin-left:0px;" class="label_1" for="cId_intervencao" >ID Intervenção</label>
             <select style="height: 30px;width: 143px;text-align: center;margin-left: 10px;" name ="tId_intervencao" id="cId_intervencao" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALVisitobra($conexao);
                        $res = $dal->cmbIntervencao($valor);
                        While ($reg = $res->fetch_array()) {
                            
                            echo "<option value=\"" . $reg['id_intervencao'] ."\">" .
                                    "Intervenção(". $reg['id_intervencao'].") ".              
                                    "Concurso(". $reg['id_concurso'].") ".
                                    "Proposta(".$reg['id_proposta'].") ".
                                    "Estrada(".$reg['id_estrada'].") ".
                                     $reg['tipo_obra']." - ".
                                     $reg['trabalhos']." - ".
                                    "Cod.(".$reg['cod'].") ".
                                    "pkInicio(".$reg['pkinicio'].") ".
                                    "pkFim(".$reg['pkfim'].") ".
                                    "Quant.(".$reg['quant'].") ".
                                   ")</option>";
                        }
                        ?>
               <option selected=""><?php echo $visit->getId_intervencao(); ?></option></select> 
                                 
             <label style="width: 50px;margin-left: 30px;"  for="cExecutada" >CONCLUÍDA</label>
                 <select style="height:25px;margin-left: 0px;" name ="tExecutada" id="cExecutada">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $visit->getExecutada(); ?></option></select>   
            
             <fieldset style="border:solid 1px #ABADAA; ">
                 <label>EM EXECUÇÃO</label>
               <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cPkinicio">pk Início</label>
                    <input value="<?php echo $visit->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>        
                    
               <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cPkfim">pk Fim</label>
                    <input  value="<?php echo $visit->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>               
                             
               <p><label style="width: 75px;margin-left: 0px;" class="label_1" for="cQuant" >Quantidade</label>
                   <input style="margin-left: 5px;height: 20px;width: 95px;text-align: right" type="text" value= "<?php echo $visit->getQuant(); ?>" name ="tQuant" id="cQuant"placeholder="0.0"/>    
                    
               <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cObsrv">Observações</label>
                    <textarea style="height:50px;margin-left: 0px;width: 350px;text-align: left;"required type="text" name ="tObsrv" id="cObsvr" ><?php echo $visit->getObsrv(); ?></textarea> 
              </fieldset >       
               <p><label class="label_1"for="cFoto1"id="foto1" >Foto 1</label>
                      <input value="<?php echo $visit->getFoto1(); ?>"type="file"name="tFoto1"id="cFoto1" class="align"/>
               <p><label class="label_1"for="cFoto2"id="foto2" >Foto 2</label>
                   <input value="<?php echo $visit->getFoto2(); ?>" type="file"name="tFoto2"id="cFoto2" class="align"/><br><br>
                    
               <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> 
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($visit->getId_visitobra() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_visitobra" id="id_visitobra" value="<?php echo $visit->getId_visitobra(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Visita</td>
                <td class="title" align="center" >Data</td>  
                <td class="title" align="center" >ID Intervenção</td> 
                <td class="title" align="center" >Executada</td>
                <td class="title" align="center" >pkInício</td>
                <td class="title" align="center" >pkFim</td>
                <td class="title" align="center" >Quant.</td>
                <td class="title" align="center" >Observaçoes</td>
                <td class="title" align="center" >File (foto 1)</td>
                <td class="title" align="center" >File (foto 2)</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'visitobra');
            }
            $cx = new Conexao();
            $dal = new DALVisitobra($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=visitobra&op=excluir&cod=' . $registo['id_visitobra'];
                $linkalterar = 'empreitadas_main.php?pg=visitobra&op=alterar&cod=' . $registo['id_visitobra'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_visitobra"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_intervencao"]; ?></td> 
                    <td class="tab"width="1%" align="center"><?php echo $registo["executada"]; ?></td> 
                    <td class="tab"width="1%" align="center"><?php echo $registo["pkinicio"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["quant"]; ?></td>
                    <td class="tab"width="10%"><?php echo $registo["obsrv"]; ?></td>
                     <td class="tab"width="1%" ><?php echo $registo["foto1"]; ?></td>
                    <td class="tab"width="1%" ><?php echo $registo["foto2"]; ?></td>
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                       
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=visitobra">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

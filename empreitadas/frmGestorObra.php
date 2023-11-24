<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestor de Obra</title>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/GestorObra.php';
        require_once '../classes/DALGestorObra.php';        
//Inserir registo
        $gestorobra = new GestorObra();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_gestor = filter_input(INPUT_POST, 'tId_gestor');
            $data = filter_input(INPUT_POST, 'tData');
            $id_objconcurso = filter_input(INPUT_POST, 'tId_objconcurso');
            $nomeado = filter_input(INPUT_POST, 'tNomeado');
            $substituto = filter_input(INPUT_POST, 'tSubstituto');
            $interino = filter_input(INPUT_POST, 'tInterino');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf');
            $just = filter_input(INPUT_POST, 'tJust');
            $ass = filter_input(INPUT_POST, 'tAss');
            $ativo = filter_input(INPUT_POST, 'tAtivo');
            $cx = new Conexao();
            $dal = new DALGestorObra($cx);
            $gestorobra = new GestorObra(0, $id_gestor,$data,$id_objconcurso,$nomeado,$substituto,$interino,$datai,$dataf,$just,$ass,$ativo);
            $dal->Inserir($gestorobra);
            $gestorobra = new GestorObra();
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_gestorobra = filter_input(INPUT_POST, 'tId_gestorobra');
            $id_gestor = filter_input(INPUT_POST, 'tId_gestor');
            $data = filter_input(INPUT_POST, 'tData');
            $id_objconcurso = filter_input(INPUT_POST, 'tId_objconcurso');
            $nomeado = filter_input(INPUT_POST, 'tNomeado');
            $substituto = filter_input(INPUT_POST, 'tSubstituto');
            $interino = filter_input(INPUT_POST, 'tInterino');
            $datai = filter_input(INPUT_POST, 'tDatai');
            $dataf = filter_input(INPUT_POST, 'tDataf');
            $just = filter_input(INPUT_POST, 'tJust');
            $ass = filter_input(INPUT_POST, 'tAss');
            $ativo = filter_input(INPUT_POST, 'tAtivo');
            $cx = new Conexao();
            $dal = new DALGestorObra($cx);
            $gestorobra = new GestorObra($id_gestorobra,$id_gestor,$data,$id_objconcurso,$nomeado,$substituto,$interino,$datai,$dataf,$just,$ass,$ativo);
            $dal->Alterar($gestorobra);
            $gestorobra = new GestorObra();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALGestorObra($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALGestorObra($conexao);
            $gestorobra = $dal->CarregaGestorObra(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
         <h1 class="op">REGISTAR - Gestor de Obra</h1>
         <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/admin_main.php?pg=admin_nav" style="text-align: center;display: block;">|VOLTAR|</a>
        <form  style=" height:420px;width: 500px;"method="post" name='gestorobra' id="gestor" action="../estrutura/gestor_main.php?pg=gestorobra&op=listar">           
            
            <input style="margin-left: 80px;" type="text" value='<?php echo date('Y-m-d'); ?>' name ="tData" id="cData" size= "8" Use readonly="true" />
        
             <p><label style="width: 70px;margin-left: 0px" class="label_1" for="cId_gestor" >ID Gestor</label>
            <select style="height: 25px;width: 143px;text-align: center;" name ="tId_gestor" id="cId_gestor" >
             <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALGestorObra($conexao);
                        $res = $dal->cmbGestor($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_gestor'] . "\">" . $reg['id_gestor'] ." - ". $reg['nome_gestor'] ."</option>";
                        }
                        ?> 
                <option selected=""><?php echo $gestorobra->getId_gestor(); ?></option></select> 
             
            <p><label style="width: 70px;margin-left: 0px" class="label_1" for="cId_objconcurso" >Objeto Concurso</label>
            <select style="height: 25px;width: 143px;text-align: center;" name ="tId_objconcurso" id="cId_objconcurso" >         
                     
                     <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALGestorObra($conexao);
                        $res = $dal->cmbObjconcurso($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_objconcurso'] . "\">" ."Concurso (". $reg['id_concurso'].")"." - "."Estrada (". $reg['id_estrada'].")"." - ".$reg['tipo_obra'] ." - "."pkInício (".$reg['pkinicio'].")"." - "."pkFim (".$reg['pkfim'].")"."</option>";
                            
                        }
                        ?>
                <option selected=""><?php echo $gestorobra->getId_objconcurso(); ?></option></select>                
            <fieldset style="width:415px;border:solid 1px #ABADAA; ">  
            <p><label  for="cNomeado">Nomeado</label>
                    <select class="alt" name ="tNomeado" id="cNomeado">
                        <option>0</option>
                        <option>1</option>
                        <option selected=""><?php echo $gestorobra->getNomeado(); ?></option></select>                
                <label style="margin-left: 20px;" for="cSubstituto">Substituto</label>
                    <select class="alt" name ="tSubstituto" id="cSubstituto">
                        <option>0</option>
                        <option>1</option>
                        <option selected=""><?php echo $gestorobra->getSubstituto(); ?></option></select>                  
                <label style="margin-left: 20px;" for="cInterino">Interino</label>
                    <select class="alt" name ="tInterino" id="cInterino">
                        <option>0</option>
                        <option>1</option>
                        <option selected=""><?php echo $gestorobra->getInterino(); ?></option></select>
            </fieldset>     
             <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDatai" >Data início</label>
                <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $gestorobra->getDatai(); ?>" name ="tDatai" id="cDatai" class="align" required="true" />                
             <p><label style="width: 80px;margin-left: 0px"class="label_1" for="cDataf" >Data fim</label>
                <input style="height:25px;margin-left: 0px;" type="date" value= "<?php echo $gestorobra->getDataf(); ?>" name ="tDataf" id="cDataf" class="align" required="true" />                   
             <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cJust">Justificação</label>                
                <textarea style="height:50px;margin-left: 0px;width: 350px;text-align: left;"required type="text" name ="tJust" id="cJust" ><?php echo utf8_encode($gestorobra->getJust()); ?></textarea>
                
                  <p><label for="cAtivo">Ativo</label>
                <select style="height: 28px;width: 40px;margin-left: 50px;"  name ="tAtivo" id="cAtivo">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $gestorobra->getAtivo(); ?></option></select> 
                      
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                   if ($gestorobra->getId_gestorobra() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/admin_main.php?pg=admin_nav'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden=""  name="tId_gestorobra" id="cId_gestorobra" value="<?php echo $gestorobra->getId_gestorobra(); ?>"/>          
                <?php } ?>
                     </div> 
        </form><br>
<!--------------------------------------------------- TABELA ---------------------------------------------->
     <a style="text-align: center;display: block;font-family: calibri;font-size: 12pt;text-decoration: none;color:brown;" target='_blank' href = '../estrutura/gestor_main.php?pg=tabgobra'>| CONSULTAR POR ILHA |</a><br>               
   <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
             <tr >
                    <td style="border: none;" class='pf'colspan="7" align="center"></td>    
                    <td class="title" colspan="2" align="center">Período em funções</td> 
                        
                </tr>	
                <tr >
                    <td style="border: none;background-color: #ffffff"class='pf'colspan="2" align="center"></td>       
                </tr>	
            <tr> 
                <td class="title" align="center" >ID Gestor de Obra</td>
                <td class="title" align="center" >Registo</td>
                <td class="title" align="center" >ID Gestor</td>
                <td class="title" align="center" >ID Objeto<br>do Concurso</td>
                <td class="title" align="center" >Nomeado</td>
                <td class="title" align="center" >Substituto</td>
                <td class="title" align="center" >Interino</td>
                <td class="title" align="center" >Início</td>
                <td class="title" align="center" >Fim</td>
                <td class="title" align="center" >Justificação</td>
                <td class="title" align="center" >Ativo</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'gestorobra');
            }
            $cx = new Conexao();
            $dal = new DALGestorObra($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'gestor_main.php?pg=gestorobra&op=excluir&cod=' . $registo['id_gestorobra'];
                $linkalterar = 'gestor_main.php?pg=gestorobra&op=alterar&cod=' . $registo['id_gestorobra'];
                ?>  
                <tr> 
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_gestorobra"]; ?></td>
                    <td class="tab"width="3%" align="center"><?php echo $registo["data"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_gestor"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_objconcurso"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["nomeado"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["substituto"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["interino"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["datai"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["dataf"]; ?></td>
                    <td  class="tab"width="8%"><?php echo $registo["just"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["ativo"]; ?></td>
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/gestor_main.php?pg=gestorobra">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>
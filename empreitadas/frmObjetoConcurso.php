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
        require_once '../classes/ObjetoConcurso.php';
        require_once '../classes/DALObjetoConcurso.php';        
//Inserir registo
        $objeto = new ObjetoConcurso(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $tipo_obra = filter_input(INPUT_POST, 'tTipo_obra');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $ass = filter_input(INPUT_POST, 'tAss');                    
            $cx = new Conexao();
            $dal = new DALObjetoConcurso($cx);
            $objeto = new ObjetoConcurso(0,$id_concurso,$id_estrada,$tipo_obra,$pkinicio,$pkfim,$ass);
            $dal->Inserir($objeto);
            $objeto = new ObjetoConcurso();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_objconcurso = filter_input(INPUT_POST, 'tId_objconcurso');
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $id_estrada = filter_input(INPUT_POST, 'tId_estrada');
            $tipo_obra = filter_input(INPUT_POST, 'tTipo_obra');
            $pkinicio = filter_input(INPUT_POST, 'tPkinicio');
            $pkfim = filter_input(INPUT_POST, 'tPkfim');
            $ass = filter_input(INPUT_POST, 'tAss');           
            $cx = new Conexao();
            $dal = new DALObjetoConcurso($cx);
            $objeto = new ObjetoConcurso($id_objconcurso,$id_concurso,$id_estrada,$tipo_obra,$pkinicio,$pkfim,$ass);
            $dal->Alterar($objeto);
            $objeto = new ObjetoConcurso();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALObjetoConcurso($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALObjetoConcurso($conexao);
            $objeto = $dal->CarregaObjeto(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Objeto do Concurso</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:250px;width:500px; " method="post" name= "objeto" id="objeto" action="../estrutura/empreitadas_main.php?pg=objconcurso&op=listar" >
            <br>            
             <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cId_concurso" >ID Concurso</label>
             <select style="height: 25px;width: 143px;text-align: center;" name ="tId_concurso" id="cId_concurso" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALObjetoConcurso($conexao);
                        $res = $dal->cmbConcurso($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_concurso'] . "\">" ."Concurso(". $reg['id_concurso'].")"." - ". $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $objeto->getId_concurso(); ?></option></select>             
                <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cId_estrada" >ID Estrada</label>
                <select style="height: 25px;width: 143px;text-align: left;" name ="tId_estrada" id="cId_estrada" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALObjetoConcurso($conexao);
                        $res = $dal->cmbEstrada($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_estrada'] . "\">" . $reg['id_estrada'] ." - ". $reg['codigo']." - ".$reg['toponimo']."</option>";
                        }
                        ?>
                <option selected=""><?php echo $objeto->getId_estrada(); ?></option></select>                  
                <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cTipo_obra" >Tipo de obra</label>
                <select style="height: 25px;width: 320px;text-align: left;" name ="tTipo_obra" id="cTipo_obra" >                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALObjetoConcurso($conexao);
                        $res = $dal->cmbTipo_obra($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['tipo_obra'] . "\">" . $reg['tipo_obra']."</option>";
                        }
                        ?>
                    <option selected=""><?php echo $objeto->getTipo_obra(); ?></option></select>   
                    
            <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cPkinicio">pk Início</label>
                    <input value="<?php echo $objeto->getPkinicio(); ?>"required type="text" name ="tPkinicio" id="cPkinicio" class="align" size= "5"placeholder="0.000"/>        
                    
             <p><label style="width: 80px;margin-left: 0px"class="label_1"for="cPkfim">pk Fim</label>
                    <input  value="<?php echo $objeto->getPkfim(); ?>"type="text" name ="tPkfim" id="cPkfim" class="align" size= "5"placeholder="0.000"/>        
                    
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($objeto->getId_objconcurso() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_objconcurso" id="id_objconcurso" value="<?php echo $objeto->getId_objconcurso(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="50%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Objeto<br>Concurso</td>
                <td class="title" align="center" >ID<br>Concurso</td> 
                <td class="title" align="center" >ID Estrada</td>  
                <td class="title" align="left" >Tipo de Obra</td>
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'objeto');
            }
            $cx = new Conexao();
            $dal = new DALObjetoConcurso($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=objconcurso&op=excluir&cod=' . $registo['id_objconcurso'];
                $linkalterar = 'empreitadas_main.php?pg=objconcurso&op=alterar&cod=' . $registo['id_objconcurso'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_objconcurso"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_concurso"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td> 
                    <td class="tab"width="10%"align=""><?php echo $registo["tipo_obra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>               
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

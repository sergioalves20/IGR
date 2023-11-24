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
        require_once '../classes/Empreitada.php';
        require_once '../classes/DALEmpreitada.php';        
//Inserir registo
        $empreitada = new Empreitada(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $data = filter_input(INPUT_POST, 'tData');
            $nome = filter_input(INPUT_POST, 'tNome');
            $tipos_proced = filter_input(INPUT_POST, 'tTipos_proced');
            $concurso = filter_input(INPUT_POST, 'tConcurso');
            $ass = filter_input(INPUT_POST, 'tAss'); 
            $cx = new Conexao();
            $dal = new DALEmpreitada($cx);
            $empreitada = new Empreitada(0, $data, $nome, $tipos_proced, $concurso, $ass);
            $dal->Inserir($empreitada);
            $empreitada = new Empreitada();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_empreitada = filter_input(INPUT_POST,'tId_empreitada');
            $data = filter_input(INPUT_POST, 'tData');
            $nome = filter_input(INPUT_POST, 'tNome');
            $tipos_proced = filter_input(INPUT_POST, 'tTipos_proced');
            $concurso = filter_input(INPUT_POST, 'tConcurso');
            $ass = filter_input(INPUT_POST, 'tAss');
            $cx = new Conexao();
            $dal = new DALEmpreitada($cx);
            $empreitada = new Empreitada($id_empreitada, $data,$nome, $tipos_proced,$concurso,$ass);
            $dal->Alterar($empreitada);
            $empreitada = new Empreitada();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALEmpreitada($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALEmpreitada($conexao);
            $empreitada = $dal->CarregaEmpreitada(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Empreitada</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:280px;" method="post" name= "empreitada" id="empreitada" action="../estrutura/empreitadas_main.php?pg=registo&op=listar" >
            <br>
            <p><label class="label_1" for="cData" >Data</label>
                <input style="margin-left: 0px;" type="date" value= "<?php echo $empreitada->getData(); ?>" name ="tData" id="cData" class="align" required="true" />         
           
            <p><label class="label_1" for="cNome">Nome</label>
                <textarea type="text" style="width: 500px;height: 75px;color:brown;overflow:auto;font-size: 10pt;"  name="tNome" id="cNome" required="true"><?php echo $empreitada->getNome(); ?></textarea>
                         
            <p><label class="label_1"for="cTipos_proced">Procedimento</label>                
                 <select style="width:200px; height: 25px;margin-left: 0px;color:#585858;" required="true" name ="tTipos_proced" id="cTipos_proced">
                    <option>Concurso público</option>
                    <option>Concurso limitado</option>
                    <option>Aquisição competitiva</option>
                    <option>Ajuste directo</option>
                    <option selected='true'><?php echo $empreitada->getTipos_proced(); ?></option></select>
                
            <p><label for="cConcurso">Concurso</label>
                <select style="width:200px; height: 25px;margin-left: 35px;color:#585858;" required="true" name ="tConcurso" id="cConcurso">
                    <option>Nacional</option>
                    <option>Internacional</option>
                    <option selected='true'><?php echo $empreitada->getConcurso(); ?></option></select>
                    
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($empreitada->getId_empreitada() == 0) {
                    ?>
                    <input style="margin-left:180px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:180px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_empreitada" id="id_empreitada" value="<?php echo $empreitada->getId_empreitada(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td> 
                <td class="title" align="center" >Nome</td>  
                <td class="title" align="center" >Tipos Procedimento</td>
                <td class="title" align="center" >Concurso</td>               
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'empreitada');
            }
            $cx = new Conexao();
            $dal = new DALEmpreitada($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                /*$linkexcluir = 'empreitadas_main.php?pg=empreitada&op=excluir&cod=' . $registo['id_empreitada'];*/
                $linkalterar = 'empreitadas_main.php?pg=empreitada&op=alterar&cod=' . $registo['id_empreitada'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_empreitada"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="20%"align=""><?php echo $registo["nome"]; ?></td> 
                    <td class="tab"width="1%"align=""><?php echo $registo["tipos_proced"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["concurso"]; ?></td>                                   
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <!--<td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php// echo $linkexcluir; ?>">EXCLUIR</a></td>-->                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=registo">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

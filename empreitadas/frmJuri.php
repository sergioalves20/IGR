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
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Juri.php';
        require_once '../classes/DALJuri.php';        
//Inserir registo
        $juri = new Juri(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $data = filter_input(INPUT_POST, 'tData');
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $nome = filter_input(INPUT_POST, 'tNome');
            $instituicao = filter_input(INPUT_POST, 'tInstituicao');
            $ass = filter_input(INPUT_POST, 'tAss');                   
            $cx = new Conexao();
            $dal = new DALJuri($cx);
            $juri = new Juri(0,$data,$id_concurso,$nome,$instituicao,$ass);
            $dal->Inserir($juri);
            $juri = new Juri();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_juri = filter_input(INPUT_POST, 'tId_juri');
            $data = filter_input(INPUT_POST, 'tData');
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $nome = filter_input(INPUT_POST, 'tNome');
            $instituicao = filter_input(INPUT_POST, 'tInstituicao');
            $ass = filter_input(INPUT_POST, 'tAss');            
            $cx = new Conexao();
            $dal = new DALJuri($cx);
            $juri = new Juri($id_juri,$data,$id_concurso,$nome,$instituicao,$ass);
            $dal->Alterar($juri);
            $juri = new Juri();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALJuri($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALJuri($conexao);
            $juri = $dal->CarregaJuri(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Juri do Concurso</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:240px;width:550px; " method="post" name= "juri" id="juri" action="../estrutura/empreitadas_main.php?pg=juri&op=listar" >
            <br>
            
            <p><label style="width: 70px;margin-left: 20px;" class="label_1" for="cData">Data</label>
                 <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $juri->getData(); ?>" name ="tData" id="cData" class="align" /> 
            
            <p><label style="width: 70px;margin-left: 20px" class="label_1" for="cId_concurso" >Concurso</label>
            <select style="height: 25px;width: 143px;text-align: center;" name ="tId_concurso" id="cId_concurso" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALJuri($conexao);
                        $res = $dal->cmbConcurso($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_concurso'] . "\">" ."Concurso(". $reg['id_concurso'].")"." - ". $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $juri->getId_concurso(); ?></option></select>          
           
            <p><label style="width: 70px;margin-left: 20px;" class="label_1" for="cNome" >Nome</label>
                <input style="margin-left: 0px;height: 23px;width: 400px;text-align: left;" type="text" value= "<?php echo $juri->getNome(); ?>" name ="tNome" id="cNome" class="align" />   
                
             <p><label style="width: 70px;margin-left: 20px;" class="label_1" for="cInstituicao" >Instituição</label>
                 <input style="margin-left: 0px;height: 23px;width: 400px;text-align: left;" type="text" value= "<?php echo $juri->getInstituicao(); ?>" name ="tInstituicao" id="cInstituicao" class="align" />  
      
                  
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($juri->getId_juri() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_juri" id="id_juri" value="<?php echo $juri->getId_juri(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="60%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Juri</td>
                <td class="title" align="center" >Data</td> 
                <td class="title" align="center" >ID Concurso</td>  
                <td class="title" align="center" >Nome</td>
                <td class="title" align="center" >Instituição</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'juri');
            }
            $cx = new Conexao();
            $dal = new DALJuri($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=juri&op=excluir&cod=' . $registo['id_juri'];
                $linkalterar = 'empreitadas_main.php?pg=juri&op=alterar&cod=' . $registo['id_juri'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_juri"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_concurso"]; ?></td> 
                    <td class="tab"width="10%"align=""><?php echo $registo["nome"]; ?></td>
                    <td class="tab"width="10%"align=""><?php echo $registo["instituicao"]; ?></td>               
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=juri">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

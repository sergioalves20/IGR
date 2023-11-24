<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consórcio</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Consorcio.php';
        require_once '../classes/DALConsorcio.php';        
//Inserir registo
        $cons = new Consorcio(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $empresa = filter_input(INPUT_POST, 'tEmpresa');
            $lider = filter_input(INPUT_POST, 'tLider');
            $ass = filter_input(INPUT_POST, 'tAss');         
            $cx = new Conexao();
            $dal = new DALConsorcio($cx);
            $cons = new Consorcio(0, $id_concurso, $empresa, $lider,$ass);
            $dal->Inserir($cons);
            $cons = new Consorcio();                      
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
       
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_consorcio = filter_input(INPUT_POST, 'tId_consorcio');
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $empresa = filter_input(INPUT_POST, 'tEmpresa');
            $lider = filter_input(INPUT_POST, 'tLider');
            $ass = filter_input(INPUT_POST, 'tAss');   
            $cx = new Conexao();
            $dal = new DALConsorcio($cx);
            $cons = new Consorcio($id_consorcio, $id_concurso, $empresa, $lider,$ass);
            $dal->Alterar($cons);
            $cons = new Consorcio();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALConsorcio($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALConsorcio($conexao);
            $cons = $dal->CarregaConsorcio(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Consórcio</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:200px;width: 400px;" method="post" name= "consorcio" id="consorcio" action="../estrutura/empreitadas_main.php?pg=consorcio&op=listar" >
            <br>
            
            
            <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cId_concurso" >ID Concurso</label>
             <select style="height: 25px;width: 100px;text-align: center;" name ="tId_concurso" id="cId_concurso" >                  
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALConsorcio($conexao);
                        $res = $dal->cmbConcurso($valor);
                        While ($reg = $res->fetch_array()) {
                            
                            echo "<option value=\"" . $reg['id_concurso'] . "\">" ."Concurso(". $reg['id_concurso'].")"." - ". $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $cons->getId_concurso(); ?></option></select> 
                     
            <p><label style="width: 80px;margin-left: 0px" class="label_1" for="cEmpresa" >Empresa</label>
                <select style="height: 25px;width: 300px;text-align: center;" name ="tEmpresa" id="cEmpresa" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALConsorcio($conexao);
                        $res = $dal->cmbEmpresa($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['nome'] . "\">" . $reg['nome'] ."</option>";
                        }
                        ?>
                    <option selected=""><?php echo $cons->getEmpresa(); ?></option></select> 
            
            <p><label style="width: 50px;margin-left: 0px;" class="label_1" for="cLider" >Lider</label>
                 <select style="height:25px;margin-left: 30px;" name ="tLider" id="cLider">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $cons->getLider(); ?></option></select>
                             
                 <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($cons->getId_consorcio() == 0) {
                    ?>
                    <input style="margin-left:100px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:100px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_consorcio" id="id_consorcio" value="<?php echo $cons->getId_consorcio(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="70%" border='1' class="tabela" style="border-color: #848484;display: block;margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Consorcio</td>
                <td class="title" align="center" >ID Concurso</td> 
                <td class="title" align="center" >Empresa</td> 
                <td class="title" align="center" >Lider</td>  
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'consorcio');
            }
            $cx = new Conexao();
            $dal = new DALConsorcio($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=consorcio&op=excluir&cod=' . $registo['id_consorcio'];
                $linkalterar = 'empreitadas_main.php?pg=consorcio&op=alterar&cod=' . $registo['id_consorcio'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_consorcio"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_concurso"]; ?></td>
                    <td class="tab"width="5%"><?php echo $registo["empresa"]; ?></td> 
                    <td class="tab"width="1%" align="center"><?php echo $registo["lider"]; ?></td>         
                    <td class="tab"width="2%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=consorcio">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

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
        require_once '../classes/Motivo.php';
        require_once '../classes/DALMotivo.php';        
//Inserir registo
        $mot = new Motivo(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $motivo = filter_input(INPUT_POST, 'tMotivo');
            $ass = filter_input(INPUT_POST, 'tAss'); 
            $cx = new Conexao();
            $dal = new DALMotivo($cx);
            $mot = new Motivo(0, $motivo, $ass);
            $dal->Inserir($mot);
            $mot = new Motivo();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_motivo = filter_input(INPUT_POST,'tId_motivo');
            $motivo = filter_input(INPUT_POST, 'tMotivo');
            $ass = filter_input(INPUT_POST, 'tAss');
            $cx = new Conexao();
            $dal = new DALMotivo($cx);
            $mot = new Motivo($id_motivo, $motivo,$ass);
            $dal->Alterar($mot);
            $mot = new Motivo();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALMotivo($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALMotivo($conexao);
            $mot = $dal->CarregaMotivo(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Motivo de anulação de Concurso</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:250px;width: 550px;" method="post" name= "motivo " id="motivo" action="../estrutura/empreitadas_main.php?pg=motivo&op=listar" >
            <br>           
            <p><label class="label_1" for="cMotivo">Motivo</label><br><p>
                <textarea type="text" style="width: 500px;height: 100px;color:brown;overflow:auto;font-size: 10pt;"  name="tMotivo" id="cMotivo" required="true"><?php echo $mot->getMotivo(); ?></textarea>
                    
                <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($mot->getId_motivo() == 0) {
                    ?>
                    <input style="margin-left:180px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:180px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_motivo" id="id_motivo" value="<?php echo $mot->getId_motivo(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Motivo</td>               
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'motivo');
            }
            $cx = new Conexao();
            $dal = new DALMotivo($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                /*$linkexcluir = 'empreitadas_main.php?pg=empreitada&op=excluir&cod=' . $registo['id_motivo'];*/
                $linkalterar = 'empreitadas_main.php?pg=motivo&op=alterar&cod=' . $registo['id_motivo'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_motivo"]; ?></td> 
                    <td class="tab"width="20%"align=""><?php echo $registo["motivo"]; ?></td>                                  
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <!--<td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>">EXCLUIR</a></td>-->                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=motivo">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

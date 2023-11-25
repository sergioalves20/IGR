<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start()?>
<html>   
    <head>
        <meta charset="UTF-8">
        <title>Itens de Patologias</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>        
        <?php
        require_once '../classes/Conexao.php';       
        require_once '../classes/PatologiasItens.php';
        require_once '../classes/DALPatologiasItens.php';
        require_once '../classes/DALPatologiaGrupo.php';
//Inserir registo        
        $item = new PatologiasItens();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_grupo = filter_input(INPUT_POST, 'tId_grupo');
            $nivel = filter_input(INPUT_POST, 'tNivel');
            $patologia = filter_input(INPUT_POST, 'tPatologia');
            $descr = filter_input(INPUT_POST, 'tDescr');           
            $cx = new Conexao();
            $dal = new DALPatologiasItens($cx);
            $item = new PatologiasItens(0,$id_grupo, $nivel, $patologia, $descr );
            $dal->Inserir($item);
            $item = new PatologiasItens();
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
             }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_item = filter_input(INPUT_POST,'tId_item');          
            $id_grupo = filter_input(INPUT_POST, 'tId_grupo');
            $nivel = filter_input(INPUT_POST, 'tNivel');
            $patologia = filter_input(INPUT_POST, 'tPatologia');
            $descr = filter_input(INPUT_POST, 'tDescr');   
            $conexao = new Conexao();
            $dal = new DALPatologiasItens($conexao);
            $item = new PatologiasItens($id_item,$id_grupo, $nivel, $patologia, $descr );                                   
            $dal->Alterar($item);
            $item = new PatologiasItens();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALPatologiasItens($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALPatologiasItens($conexao);
            $item = $dal->CarregaItem(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
   <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Itens de Patologias</h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/admin_main.php?pg=admin_nav'>|VOLTAR|</a>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:300px;"method="post"  name='itens' id="itens" action="../estrutura/admin_main.php?pg=itenspatolog&op=listar" >
            
           <p><label class="label_1" style="margin-left: 0px;" for="cId_grupo">Grupo</label>
               <select value="<?php echo $item->getId_grupo(); ?>"style="height: 30px;" name ="tId_grupo" id="cId_grupo" >
                        <?php
                        $valor = "";
                        $conexao = new Conexao();
                        $dal = new DALPatologiaGrupo($conexao);
                        $res = $dal->cmbGrupo($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_grupo'] . "\">" . $reg['id_grupo'] ." - ". $reg['grupo'] . "</option>";
                        }
                        ?>               
                       <option selected=""><?php echo $item->getId_grupo(); ?></option></select>               
              <p><label class="label_1"for="cNivel">Nivel</label>
                    <select class="sentido" name ="tNivel" id="cNivel">					
                        <option value="N1">N1</option>
                        <option value="N2">N2</option>
                        <option value="N3">N3</option>
                        <option selected><?php echo $item->getNivel(); ?></option></select>
            
            <p><label class="label_1"for="cPatologia">Patologia</label>
                <input style="width:500px;height: 25px;" value='<?php echo $item->getPatologia(); ?>' type="text" required name ="tPatologia" id="cPatologia" />
                
            <p><label class="label_1"for="cDescr">Descrição</label>
                <textarea style="width:500px;height: 100px;" name="tDescr" id="cDescr"><?php echo $item->getDescr(); ?></textarea><br><br>            
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($item->getId_item() == 0) {
                    ?>
                    <input style="margin-left:180px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                   
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/admin.php?pg=admin_nav'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:180px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_item" id="id_item" value="<?php echo $item->getId_item(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br>         
        <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID Item</td>
                <td class="title" align="center" >ID Grupo</td> 
                <td class="title" align="center" >Nível</td>  
                <td class="title">Patologia</td>
                <td class="title">Descrição</td>                  
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'itens');
            }
            $cx = new Conexao();
            $dal = new DALPatologiasItens($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'admin_main.php?pg=itenspatolog&op=excluir&cod=' . $registo['id_item'];
                $linkalterar = 'admin_main.php?pg=itenspatolog&op=alterar&cod=' . $registo['id_item'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_item"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_grupo"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["nivel"]; ?></td> 
                    <td class="tab"width="5%"><?php echo $registo["patologia"]; ?></td>
                    <td class="tab"width="10%"><?php echo $registo["descr"]; ?></td>                                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table>
           <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

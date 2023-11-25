<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start()?>
<html>   
    <head>
        <meta charset="UTF-8">
        <title>Itens do Orçamento</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>        
        <?php
        require_once '../classes/Conexao.php';       
        require_once '../classes/OrcamentoItens.php';
        require_once '../classes/DALOrcamentoItens.php';
        
//Inserir registo        
        $item = new OrcamentoItens();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_orc = filter_input(INPUT_POST, 'tId_orc');
            $cod = filter_input(INPUT_POST, 'tCod');
            $descr = filter_input(INPUT_POST, 'tDescr');
            $und = filter_input(INPUT_POST, 'tUnd');           
            $cx = new Conexao();
            $dal = new DALOrcamentoItens($cx);
            $item = new OrcamentoItens(0,$cod, $descr, $und );
            $dal->Inserir($item);
            $item = new OrcamentoItens();
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
             }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_orc = filter_input(INPUT_POST,'tId_orc');          
            $cod = filter_input(INPUT_POST, 'tCod');
            $descr = filter_input(INPUT_POST, 'tDescr');
            $und = filter_input(INPUT_POST, 'tUnd');
            
            $conexao = new Conexao();
            $dal = new DALOrcamentoItens($conexao);
            $item = new OrcamentoItens($id_orc,$cod, $descr, $und);                                   
            $dal->Alterar($item);
            $item = new OrcamentoItens();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALOrcamentoItens($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALOrcamentoItens($conexao);
            $item = $dal->CarregaItem(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>
   <?php include_once '../estrutura/header.php';?>
    <body>
        <h1 class="op">REGISTAR - Itens do Orçamento</h1>
        <p><a id="voltar"style="text-align:center;" href = '../estrutura/admin_main.php?pg=admin_nav'>|VOLTAR|</a>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <form style="height:280px;"method="post"  name='itens' id="itens" action="../estrutura/admin_main.php?pg=itensorcamento&op=listar" >
            
           <p><label class="label_1"for="cCod">Código</label>
               <input style="width:100px;height: 25px;" value='<?php echo $item->getCod(); ?>' type="text" required name ="tCod" id="cCod" />
            
             <p><label class="label_1"for="cDescr">Descrição</label>
                <textarea style="width:500px;height: 100px;" name="tDescr" id="cDescr"><?php echo $item->getDescr(); ?></textarea>    
            <p><label class="label_1"for="cUnd">Unidade</label>   
                <select style="height: 28px;" value='<?php echo $item->getUnd(); ?>' name ="tUnd" id="cUnd">					
                    <option>m</option>
                    <option>m2</option>
                    <option>m3</option>
                    <option>un</option>
                    <option>kg</option>
                    <option>ton</option>
                    <option>vg</option>              
                    <option selected><?php echo $item->getUnd(); ?></option></select><br><br>
                        
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($item->getId_orc() == 0) {
                    ?>
                    <input style="margin-left:180px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                   
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/admin.php?pg=admin_nav'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:180px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_orc" id="id_or" value="<?php echo $item->getId_orc(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br>         
        <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela">
            <tr> 
                <td class="title" align="center" >ID Item</td>
                <td class="title" align="center" >Código</td> 
                <td class="title"align="center">Descrição</td>
                <td class="title"align="center">Unidade</td>                  
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'itens');
            }
            $cx = new Conexao();
            $dal = new DALOrcamentoItens($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'admin_main.php?pg=itensorcamento&op=excluir&cod=' . $registo['id_orc'];
                $linkalterar = 'admin_main.php?pg=itensorcamento&op=alterar&cod=' . $registo['id_orc'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_orc"]; ?></td>
                    <td class="tab"width="1%"><?php echo $registo["cod"]; ?></td>                                   
                    <td class="tab"width="20%"><?php echo $registo["descr"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["und"]; ?></td>      
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

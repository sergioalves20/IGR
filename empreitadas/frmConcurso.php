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
        require_once '../classes/Concurso.php';
        require_once '../classes/DALConcurso.php';        
//Inserir registo
        $concurso = new Concurso(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $id_empreitada = filter_input(INPUT_POST, 'tId_empreitada');
            $data_publicacao = filter_input(INPUT_POST, 'tData_publicacao');
            $data_entra_prop = filter_input(INPUT_POST, 'tData_entra_prop');
            $data_relat_prop = filter_input(INPUT_POST, 'tData_relat_prop');
            $data_homolog = filter_input(INPUT_POST, 'tData_homolog');
            $data_consignacao = filter_input(INPUT_POST, 'tData_consignacao');
            $data_ordem_inicio = filter_input(INPUT_POST, 'tData_ordem_inicio');
            $anulado = filter_input(INPUT_POST, 'tAnulado');
            $data_anulacao = filter_input(INPUT_POST, 'tData_anulacao');
            $id_motivo = filter_input(INPUT_POST, 'tId_motivo');
            $ass = filter_input(INPUT_POST, 'tAss');
                    
            $cx = new Conexao();
            $dal = new DALConcurso($cx);
            $concurso = new Concurso(0,$id_empreitada,$data_publicacao,$data_entra_prop,$data_relat_prop,$data_homolog,$data_consignacao,$data_ordem_inicio,$anulado,$data_anulacao,$id_motivo,$ass);
            $dal->Inserir($concurso);
            $concurso = new Concurso();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_concurso = filter_input(INPUT_POST, 'tId_concurso');
            $id_empreitada = filter_input(INPUT_POST, 'tId_empreitada');
            $data_publicacao = filter_input(INPUT_POST, 'tData_publicacao');
            $data_entra_prop = filter_input(INPUT_POST, 'tData_entra_prop');
            $data_relat_prop = filter_input(INPUT_POST, 'tData_relat_prop');
            $data_homolog = filter_input(INPUT_POST, 'tData_homolog');
            $data_consignacao = filter_input(INPUT_POST, 'tData_consignacao');
            $data_ordem_inicio = filter_input(INPUT_POST, 'tData_ordem_inicio');
            $anulado = filter_input(INPUT_POST, 'tAnulado');
            $data_anulacao = filter_input(INPUT_POST, 'tData_anulacao');
            $id_motivo = filter_input(INPUT_POST, 'tId_motivo');
            $ass = filter_input(INPUT_POST, 'tAss');           
            $cx = new Conexao();
            $dal = new DALConcurso($cx);
            $concurso = new Concurso($id_concurso,$id_empreitada,$data_publicacao,$data_entra_prop,$data_relat_prop,$data_homolog,$data_consignacao,$data_ordem_inicio,$anulado,$data_anulacao,$id_motivo,$ass);
            $dal->Alterar($concurso);
            $concurso = new Concurso();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALConcurso($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALConcurso($conexao);
            $concurso = $dal->CarregaConcurso(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Concurso</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:480px;width:500px; " method="post" name= "concurso" id="empreitada" action="../estrutura/empreitadas_main.php?pg=concurso&op=listar" >
            <br>
            <p><label style="width: 70px;margin-left: 103px" class="label_1" for="cId_empreitada" >Empreitada</label>
            <select style="height: 25px;width: 143px;text-align: center;" name ="tId_empreitada" id="cId_empreitada" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALConcurso($conexao);
                        $res = $dal->cmbEmpreitada($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_empreitada'] . "\">" . $reg['id_empreitada'] ." - ". $reg['nome'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $concurso->getId_empreitada(); ?></option></select>          
           
            <p><label style="width: 133px;margin-left: 41px;" class="label_1" for="cData_publicacao" >Publicação do concurso</label>
                 <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_publicacao(); ?>" name ="tData_publicacao" id="cData_publicacao" class="align" />   
                
            <p><label style="width: 115px;margin-left: 60px;" class="label_1" for="cData_entra_prop" >Entrega da proposta</label>
                <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_entra_prop(); ?>" name ="tData_entra_prop" id="cData_entra_prop" class="align" />    
                
            <p><label style="width: 175px;" class="label_1" for="cData_relat_prop" >Relat. de avaliação da proposta</label>
                <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_relat_prop(); ?>" name ="tData_relat_prop" id="cData_relat_prop" class="align" />
                
            <p><label style="width: 80px;margin-left: 96px;" class="label_1" for="cData_homolog">Homologação</label>
                 <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_homolog(); ?>" name ="tData_homolog" id="cData_homolog" class="align" />    
           
            <p><label style="width: 80px;margin-left: 96px;" class="label_1" for="cData_consignacao">Consignação</label>
                <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_consignacao(); ?>" name ="tData_consignacao" id="cData_consignacao" class="align" />
                 
            <p><p><label style="width: 165px;margin-left: 11px;" class="label_1" for="cData_ordem_inicio" >Ordem de início dos trabalhos</label>
                <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_ordem_inicio(); ?>" name ="tData_ordem_inicio" id="cData_ordem inicio" class="align" />     
                     
                            
             <p><label style="width: 50px;margin-left: 127px;" class="label_1" for="cAnulado" >Anulado</label>
                 <select style="height:25px;" name ="tAnulado" id="cAnulado">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $concurso->getAnulado(); ?></option></select>
                    
                 
            <p><label style="width: 100px;margin-left: 78px;" class="label_1" for="cData_anulacao" >Data da anulação</label>
                <input style="margin-left: 0px;height: 23px;" type="date" value= "<?php echo $concurso->getData_anulacao(); ?>" name ="tData_anulacao" id="cData_anulacao" class="align" />     
            
             <p><label style="width: 70px;margin-left: 103px" class="label_1" for="cId_motivo" >Motivo</label>
            <select style="height: 25px;width: 150px;text-align: left;" name ="tId_motivo" id="cId_motivo" >
                       
                        <?php
                        $valor ="";
                        $conexao = new Conexao();
                        $dal = new DALConcurso($conexao);
                        $res = $dal->cmbMotivo($valor);
                        While ($reg = $res->fetch_array()) {
                            echo "<option value=\"" . $reg['id_motivo'] . "\">" . $reg['id_motivo'] ." - ". $reg['motivo'] ."</option>";
                        }
                        ?>
                <option selected=""><?php echo $concurso->getId_motivo(); ?></option></select>     
      
                  
            <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($concurso->getId_concurso() == 0) {
                    ?>
                    <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:150px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_concurso" id="id_concurso" value="<?php echo $concurso->getId_concurso(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;">
            <tr> 
                <td class="title" align="center" >ID<br>Concurso</td>
                <td class="title" align="center" >ID<br>Empreitada</td> 
                <td class="title" align="center" >Data<br>Publicação<br>Concurso</td>  
                <td class="title" align="center" >Data<br>Entrada<br>Proposta</td>
                <td class="title" align="center" >Data<br>Relat.Avaliação<br>Proposta</td>
                <td class="title" align="center" >Data<br>Homologação</td>
                <td class="title" align="center" >Data<br>Consignação</td>
                <td class="title" align="center" >Data<br>Ordem<br>Início trabalhos</td>
                <td class="title" align="center" >Anulado</td>
                <td class="title" align="center" >Data<br>Anulação</td>
                <td class="title" align="center" >ID Motivo</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'concurso');
            }
            $cx = new Conexao();
            $dal = new DALConcurso($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                /*$linkexcluir = 'empreitadas_main.php?pg=empreitada&op=excluir&cod=' . $registo['id_concurso'];*/
                $linkalterar = 'empreitadas_main.php?pg=concurso&op=alterar&cod=' . $registo['id_concurso'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_concurso"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_empreitada"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_publicacao"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_entra_prop"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_relat_prop"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_homolog"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_consignacao"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_ordem_inicio"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["anulado"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["data_anulacao"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_motivo"]; ?></td>                
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <!--<td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>">EXCLUIR</a></td>-->                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=concurso">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

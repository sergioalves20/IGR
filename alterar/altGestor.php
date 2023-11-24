<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start()?>
<html>
    <head>
        <meta charset=utf-8"/>
        <title>Usuário</title>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Gestor.php';
        require_once '../classes/DALGestor.php';
        date_default_timezone_set('Atlantic/Azores');
        $gestor = new Gestor();      
//Retificar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_gestor = filter_input(INPUT_POST,'tId_gestor');
            $nome_gestor =  filter_input(INPUT_POST, 'tNome_gestor');
            $nasc = filter_input(INPUT_POST, 'tNasc');
            $grauac = filter_input(INPUT_POST, 'tGrauac');
            $nif = filter_input(INPUT_POST, 'tNif');
            $endr = filter_input(INPUT_POST, 'tEndr');
            $corr = filter_input(INPUT_POST, 'tCorr');
            $tel1 = filter_input(INPUT_POST, 'tTel1');
            $tel2 = filter_input(INPUT_POST, 'tTel2');
            $data_reg = filter_input(INPUT_POST, 'tData_reg');
            $cx = new Conexao();
            $dal = new DALGestor($cx);
            $gestor = new Gestor($id_gestor, $nome_gestor, $nasc, $grauac, $nif, $endr, $corr, $tel1, $tel2,$data_reg);
            $dal->Alterar($gestor);
            $gestor = new Gestor();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALGestor($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Retificar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALGestor($conexao);
            $gestor = $dal->CarregaGestor(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
         <h1 class="op">REGISTAR - Gestor</h1>
         <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1><br>
        <a id="voltar" href="../estrutura/admin_main.php?pg=admin_nav" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style=" height:400px;width: 500px;"method="post" name='gestor' id="gestor" action="../estrutura/admin_main.php?pg=regisgestor&op=listar">           
            <p><label for="cData_reg"style="margin-left:64px; ;">Data</label>
             <input type="date"name="tData_reg"id="cData_reg"value= "<?php echo $gestor->getData_reg(); ?>"style="margin-left: 24px;height: 30px;width: 250px;"><p> 
            <label for="cNome_gestor"style="margin-left:62px;">Nome</label>
             <input type="text" name="tNome_gestor"id="cNome_gestor"value="<?php echo utf8_encode($gestor->getNome_gestor()); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><p>
            <label for="cNasc">Data Nascimento</label>
             <input type="date"type="text"name="tNasc"id="cNasc"value="<?php echo $gestor->getNasc(); ?>"style="margin-left: 23px;height: 30px;width: 250px;"placeholder="0000-00-00"/><p>
            <label for="cGrauac"style="margin-left:2px ;">Grau académico</label>
             <input accept-charset="UTF-8"type="text" name="tGrauac"id="cGrauac"value="<?php echo utf8_encode($gestor->getGrauac()); ?>"style="margin-left: 25px;height: 30px;width: 250px;"><p>
            <label for="cNif"style="margin-left:66px ;">N.I.F.</label>
             <input type="text" name="tNif"id="cNif"value="<?php echo $gestor->getNif(); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><p>
            <label for="cEndr"style="margin-left:50px ;">Endreço</label>
             <input type="text" name="tEndr"id="cEndr"value="<?php echo utf8_encode($gestor->getEndr()); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><p>    
            <label for="cCorr"style="margin-left:65px ;">Email</label>
             <input type="text" name="tCorr"id="cCorr"value="<?php echo $gestor->getCorr(); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><p>    
            <label for="cTel1"style="margin-left:68px ;">Tel.1</label>
             <input type="text" name="tTel1"id="cTel1"value="<?php echo $gestor->getTel1(); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><p>    
            <label for="cTel2"style="margin-left:68px ;">Tel.2</label>
            <input type="text" name="tTel2"id="cTel2"value="<?php echo $gestor->getTel2(); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><br><br>
                    <?php
                if ($gestor->getId_Gestor() == 0) {
                    ?>
             <input style="margin-left:200px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                     
                    <?php
                } else {
                    ?>
                 <input style="margin-left: 140px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text"hidden=""name="tId_gestor" id="cId_gestor" value="<?php echo $gestor->getId_gestor(); ?>"/>         
                <?php } ?>
        </form><br>
<!--------------------------------------------------- TABELA ---------------------------------------------->
            <h2>Registos activos</h2>
            <form style="width: 300px;" class="tab" name='tab'method="post">
                 
               <input type="text" name="nome"id="nome"style="margin-left: 20px;height: 25px;width: 180px;"placeholder="Nome"/>           
               &nbsp;&nbsp;<input  id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
            </form>        
            <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Gestor</td>
                <td class="title" align="center" >Nome</td> 
                <td class="title" align="center" >Data Nasc.</td>  
                <td class="title" align="center" >Grau Académico</td>
                <td class="title" align="center" >NIF</td> 
                <td class="title" align="center" >Endereço</td> 
                <td class="title" align="center" >Email</td>
                <td class="title" align="center" >Tel.1</td>
                <td class="title" align="center" >Tel.2</td>
                <td class="title" align="center" >Data</td>
            </tr>         
           <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'nome');
            }
            $cx = new Conexao();
            $dal = new DALGestor($cx);
            $resultado = $dal->Localizar($valor);
            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'admin_main.php?pg=regisgestor&op=excluir&cod=' . $registo['id_gestor'];
                $linkalterar = 'admin_main.php?pg=regisgestor&op=alterar&cod=' . $registo['id_gestor'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_gestor"]; ?></td>
                    <td class="tab"width="4%"><?php echo $registo["nome_gestor"]; ?></td> 
                    <td class="tab"width="2%"align="center"><?php echo $registo["nasc"]; ?></td> 
                    <td class="tab"width="3%"><?php echo $registo["grauac"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["nif"]; ?></td>
                    <td class="tab"width="5%"><?php echo $registo["endr"]; ?></td>
                    <td class="tab"width="2%"><?php echo $registo["corr"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["tel1"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["tel2"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data_reg"]; ?></td>
                    <td class="tab"width="1%"align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar;?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:red;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
            <a id="voltar"style="text-align:center;" href="alterar_main.php?pg=gestor">|INÍCIO|</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>      
            </footer>
    </body>
</html>


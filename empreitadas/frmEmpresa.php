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
        require_once '../classes/Empresa.php';
        require_once '../classes/DALEmpresa.php';        
//Inserir registo
        $empresa = new Empresa(); 
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $nome = filter_input(INPUT_POST, 'tNome');
            $alvara = filter_input(INPUT_POST, 'tAlvara');
            $nif = filter_input(INPUT_POST, 'tNif');
            $nac = filter_input(INPUT_POST, 'tNac');
            $endereco = filter_input(INPUT_POST, 'tEndereco'); 
            $email = filter_input(INPUT_POST, 'tEmail'); 
            $tel1 = filter_input(INPUT_POST, 'tTel1'); 
            $cont1 = filter_input(INPUT_POST, 'tCont1');  
            $tel2 = filter_input(INPUT_POST, 'tTel2'); 
            $cont2 = filter_input(INPUT_POST, 'tCont2'); 
            $tel3 = filter_input(INPUT_POST, 'tTel3'); 
            $cont3 = filter_input(INPUT_POST, 'tCont3'); 
            $ass = filter_input(INPUT_POST, 'tAss');         
            $cx = new Conexao();
            $dal = new DALEmpresa($cx);
            $empresa = new Empresa(0, $nome, $alvara, $nif, $nac, $endereco,$email,$tel1,$cont1,$tel2,$cont2,$tel3,$cont3,$ass);
            $dal->Inserir($empresa);
            $empresa = new Empresa();
            echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_empresa = filter_input(INPUT_POST,'tId_empresa');
            $nome = filter_input(INPUT_POST, 'tNome');
            $alvara = filter_input(INPUT_POST, 'tAlvara');
            $nif = filter_input(INPUT_POST, 'tNif');
            $nac = filter_input(INPUT_POST, 'tNac');
            $endereco = filter_input(INPUT_POST, 'tEndereco'); 
            $email = filter_input(INPUT_POST, 'tEmail'); 
            $tel1 = filter_input(INPUT_POST, 'tTel1'); 
            $cont1 = filter_input(INPUT_POST, 'tCont1');  
            $tel2 = filter_input(INPUT_POST, 'tTel2'); 
            $cont2 = filter_input(INPUT_POST, 'tCont2'); 
            $tel3 = filter_input(INPUT_POST, 'tTel3'); 
            $cont3 = filter_input(INPUT_POST, 'tCont3'); 
            $ass = filter_input(INPUT_POST, 'tAss');
            $cx = new Conexao();
            $dal = new DALEmpresa($cx);
            $empresa = new Empresa($id_empresa, $nome, $alvara, $nif, $nac, $endereco,$email,$tel1,$cont1,$tel2,$cont2,$tel3,$cont3,$ass);
            $dal->Alterar($empresa);
            $empresa = new Empresa();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALEmpresa($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALEmpresa($conexao);
            $empresa = $dal->CarregaEmpresa(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
          <h1 class="op">REGISTAR - Empresa</h1>
        <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
         <a id="voltar" href="../estrutura/gestor_main.php?pg=empreitadas" style="text-align: center;display: block;">|VOLTAR|</a>
        <form style="height:330px;width: 850px;" method="post" name= "empresa" id="empresa" action="../estrutura/empreitadas_main.php?pg=empresas&op=listar" >
            <br>           
            <p><label class="label_1" for="cNome">Nome</label>
                <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tNome" id="cNome" required="true"value="<?php echo $empresa->getNome(); ?>">
            <label  style="margin-left:20px;"for="cAlvara">Alvará</label>
                 <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;margin-left: 6px;"  name="tAlvara" id="cAlvara" value="<?php echo $empresa->getAlvara(); ?>">             
            <p><label class="label_1" for="cNac">Nacionalidade</label>
                <input type="text" style="width: 300px;height: 25px;color:#585858;;font-size: 10pt;"  name="tNac" id="cNac" value="<?php echo $empresa->getNac(); ?>"> 
            <label style="margin-left:20px;"for="cNif">NIF</label>
                 <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;margin-left: 22px;"  name="tNif" id="cNif" value="<?php echo $empresa->getNif(); ?>">               
            <p><label class="label_1" for="Endereco">Endereço</label>
                <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tEndereco" id="cEndereco" value="<?php echo $empresa->getEndereco(); ?>">
            <label style="margin-left:20px;"for="cEmail">Email</label>
                <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;margin-left: 12px;"  name="tEmail" id="cEmail" value="<?php echo $empresa->getEmail(); ?>">
            <p><label class="label_1" for="cTel1">Tel.1</label>
                 <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tTel1" id="cTel1" value="<?php echo $empresa->getTel1(); ?>">
                <label style="margin-left:20px;" for="cCont1">Contato</label>
                <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tCont1" id="cCont1" value="<?php echo $empresa->getCont1(); ?>">    
            <p> <label class="label_1" for="cTel2">Tel.2</label>
                 <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tTel2" id="cTel2" value="<?php echo $empresa->getTel2(); ?>">    
             <label style="margin-left:20px;" for="cCont2">Contato</label>
                <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tCont2" id="cCont2" value="<?php echo $empresa->getCont2(); ?>">    
            <p><label class="label_1" for="cTel3">Tel.3</label>
                 <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tTel3" id="cTel3" value="<?php echo $empresa->getTel3(); ?>">    
                 <label style="margin-left:20px;" for="cCont3">Contato</label>
                 <input type="text" style="width: 300px;height: 25px;color:#585858;font-size: 10pt;"  name="tCont3" id="cCont3" value="<?php echo $empresa->getCont3(); ?>">       
                 
                 <input type="text" hidden="" value="<?php echo $_SESSION["login"] ?>" name="tAss" id="cAss" /> <br><br>
                <!--------------------------------------------------------------------------------------------> 
                  <div style=" height: 25px; padding: 5px; width: 590px; margin: 0 auto;"id="botoes">
                    <?php
                if ($empresa->getId_empresa() == 0) {
                    ?>
                    <input style="margin-left:180px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"type="button"class="cmd"id="voltar"value="Voltar"name ="tVoltar" onclick="location.href = '../estrutura/gestor_main.php?pg=empreitadas'"/>
                    <?php
                } else {
                    ?>  
                    <input style="margin-left:180px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                    <input style="background-color:#7d8c9b;width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text" hidden="" name="tId_empresa" id="id_empresa" value="<?php echo $empresa->getId_empresa(); ?>"/>          
                <?php } ?>
                     </div>               
        </form><br> 
         <table id="est" accept-charset="UTF-8" width ="100%" border='1' class="tabela" style="border-color: #848484;">
            <tr> 
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Nome</td> 
                <td class="title" align="center" >Alvara</td>  
                <td class="title" align="center" >NIF</td>
                <td class="title" align="center" >Nacionalidade</td>
                <td class="title" align="center" >Endereço</td>
                <td class="title" align="center" >Email</td>
                <td class="title" align="center" >Tel. 1</td>
                <td class="title" align="center" >Contato 1</td>
                <td class="title" align="center" >Tel. 2</td>
                <td class="title" align="center" >Contato 2</td>
                <td class="title" align="center" >Tel. 3</td>
                <td class="title" align="center" >Contato 3</td>
                <td class="title" align="center" >Registado por:</td>              
            </tr>         
            <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'empresa');
            }
            $cx = new Conexao();
            $dal = new DALEmpresa($cx);
            $resultado = $dal->Localizar($valor);

            While ($registo = $resultado->fetch_array()) {
                $linkexcluir = 'empreitadas_main.php?pg=empresas&op=excluir&cod=' . $registo['id_empresa'];
                $linkalterar = 'empreitadas_main.php?pg=empresas&op=alterar&cod=' . $registo['id_empresa'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%" align="center"><?php echo $registo["id_empresa"]; ?></td>
                    <td class="tab"width="5%"><?php echo $registo["nome"]; ?></td> 
                    <td class="tab"width="1%"align=""><?php echo $registo["alvara"]; ?></td> 
                    <td class="tab"width="1%"align=""><?php echo $registo["nif"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["nac"]; ?></td>
                    <td class="tab"width="5%"align=""><?php echo $registo["endereco"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["email"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["tel1"]; ?></td>
                    <td class="tab"width="2%"align=""><?php echo $registo["cont1"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["tel2"]; ?></td>
                    <td class="tab"width="2%"align=""><?php echo $registo["cont2"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["tel3"]; ?></td>
                    <td class="tab"width="2%"align=""><?php echo $registo["cont3"]; ?></td>           
                    <td class="tab"width="3%" style="color:#848484;font-style: italic;font-size: 10pt;"><?php echo $registo["ass"]; ?></td>                 
                    <td class="tab"width="1%" align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar; ?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('Tem certeza que deseja apagar esse registro?');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
        </table><br>
        <a id="voltar"style="text-align:center;" href="../estrutura/empreitadas_main.php?pg=empresas">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer>
    </body>
</html>

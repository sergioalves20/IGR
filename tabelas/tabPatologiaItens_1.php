<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/tab.css">
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/PatologiasItens.php';
        require_once '../classes/DALPatologiasItens.php';
        require_once '../classes/DALPatologiaGrupo.php';
        ?>
    </head>
    <style>
        body{background-color:white;color:black;font-family: calibri;font-size:10pt;font-weight:normal;}           
        td#item{color:blue;}
        td#titulo{font-weight:bold;}
        form#tabp{border-radius:0px;display:block ;margin: 0 auto;width:470px;padding: 0px;background-color: white;margin-top: 10px;}   
        table#patolog{background-color:white;}
        .frm{margin-left: 11px;margin-top: 15px;width: 200px;height: 30px;border-radius: 3px;background-color: #BEBEBE;} 
        .frm:hover{ background-color:#2F4F4F; color:#ffffff; font-weight:normal;}
    </style>
     <?php include_once '../estrutura/header.php'; ?>
    <body>
        <br><br>
        <form class="frm" method="post" name="tabp" id="tabp">   
            <select name ="tGrupo" id="cGrupo" style="height:25px;width:320px;margin-left:0px;background-color: beige;color:blue;" >
                <?php
                $grupo = "";
                $cxc = new Conexao();
                $dalg = new DALPatologiaGrupo($cxc);
                $res = $dalg->Selecionar($grupo);
                While ($reg = $res->fetch_array()) {
                    echo "<option value=\"" . $reg['grupo'] . "\">" . $reg['grupo'] . "</option>";
                }
                ?> 
                <option selected="">Grupo de patologias</option>
            </select>
            <input class="cmd" type="submit" name="localizar" value="Selecionar grupo" style="background-color: #CD950C;height: 25px;width: 120px;margin-left:10px;border-radius: 3px;">
        </form><br><br>
        <a id="voltar" href="../estrutura/gestor_main.php?pg=gestor_nav" style="text-align: center;display: block;">| VOLTAR |</a><br>
            <!----------------------------------------------------------------------------------------->
            <table accept-charset="UTF-8" width ="100%" border="1" class="tabela">
                <tr>
                    <td class="title" align="center" width="1%"><b>Id Item</b></td>
                <td class="title" ><b>Grupo</b></td>            
                <td class="title" width="5%"><b>Patologia</b></td>
                <td class="title" width="15%"><b>Descrição</b></td>
                </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tGrupo');
            }
            $cx = new Conexao();
            $dal = new DALPatologiasItens($cx);
            $resultado = $dal->patologia($valor);
            
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td width="6%"class="tab"id="item" align="center"><?php echo $registo["id_item"]; ?></td>
                    <td class="tab"><?php echo $registo["grupo"]; ?></td>
                    <td class="tab"><?php echo $registo["patologia"]; ?></td>
                    <td class="tab"><?php echo $registo["descr"]; ?></td>                   
                </tr>
                <?php
            }
            ?>
            </table><br> 
           <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php'; ?>      
        </footer> 
        
        
    </body>
</html>

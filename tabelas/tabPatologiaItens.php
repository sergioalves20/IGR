<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
        <script type="text/javascript" src="../js/coordenadas.js"></script>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/PatologiasItens.php';
        require_once '../classes/DALPatologiasItens.php';
        require_once '../classes/DALPatologiaGrupo.php';
        ?>
    </head>
    <style>
        body{background-color:#CDCDB4;color:black;font-family: calibri;font-size:10pt;font-weight:normal;}           
        td#item{color:blue;font-weight: bold;}
        td#titulo{font-weight:bold;}
        form#tabp{border-radius:0px;margin-left:0px;width:100%;padding: 0px;background-color:#CDCDB4;}   
        table#patolog{background-color: #CDCDB4;}
    </style>
    <body>     
        <form method="post" name="tabp" id="tabp">   
            <select name ="tGrupo" id="cGrupo" style="height:25px;width:320px;margin-left:0px;" >
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
            <input type="submit" name="localizar" value="Selecionar grupo" style="height: 25px;width: 120px;margin-left:10px;border-radius: 3px;" /><br><br>
            <table id="patolog" width ="100%" border="1">
            <tr>
                <td id="titulo" align="center" width="1%">Id Item</td>
                <td id="titulo" width="3%">Grupo</td>            
                <td id="titulo" width="5%">Patologia</td>
                <td id="titulo" width="15%">Descrição</td>
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
                    <td id="item" align="center"><?php echo $registo["id_item"]; ?></td>
                    <td><?php echo $registo["grupo"]; ?></td>
                    <td><?php echo $registo["patologia"]; ?></td>
                    <td><?php echo $registo["descr"]; ?></td>                   
                </tr>
                <?php
            }
            ?>
        </table>     
        </form>      
    </body>
</html>

<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>BBD da Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Patologia.php';
        require_once '../classes/DALPatologia.php';
        ?> 
          <style>
            #foto1{
                width: 30px;
                height: 30px;
            }
            #zoomfoto1{
                position: absolute;
                width: 0px;
                -webkit-transition: width 1s linear 0s;
                transition: width 0.7s linear 0s;
                z-index: 10;
            }
            #foto1:hover + #zoomfoto1{
                width: 300px;
            }
             #foto2{
                width: 30px;
                height: 30px;
            }
            #zoomfoto2{
                position: absolute;
                width: 0px; 
                -webkit-transition: width 1s linear 0s;
                transition: width 0.7s linear 0s;
                z-index: 10;
            }
            #foto2:hover + #zoomfoto2{
                width: 300px;
            }
        </style>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>       
        <h1>PATOLOGIAS- Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
       <form class="tab" name='tab'method="post">
            <input type="text" name="patolog" id='bermasbbdsg'placeholder="ID Estrada" style="width: 120px;"/>
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 80px;"class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <a id="voltar"style="text-align:center;color:blue;"target="_blank" href="levantamento_main.php?pg=patologias_itens">|DESCRIÇÃO DOS ITENS|</a>
        <p><a id="voltar"style="text-align:center;" href="../frms/frmPatologia.php">|VOLTAR|</a>
        <table style="margin: 0 auto;" accept-charset="UTF-8" width ="150%" border="1" class="tabela">
            <tr>
                    <td class="title" align="center" >ID</td>
                    <td class="title" align="center" >Data</td>
                    <td class="title" align="center" >ID Estrada</td>  
                    <td class="title" align="center" >pk Início</td>
                    <td class="title" align="center" >Altitude</td>
                    <td class="title"colspan="2" align="center" >Latitude</td>
                    <td class="title"colspan="2" align="center" >Longitude</td>
                    <td class="title" align="center" >pk Fim</td>
                    <td class="title" align="center" >Altitude</td>
                    <td class="title"colspan="2" align="center" >Latitude</td> 
                    <td class="title"colspan="2" align="center" >Longitude</td>
                    <td class="title" align="center" >Foto 1</td>  
                    <td class="title" align="center" >Foto 2</td>
                    <td class="title" align="center" >Item</td>
                    <td class="title" align="center" >Nível</td>
                    <td class="title" align="center" >Grupo</td> 
                    <td class="title" align="center" >ID Talude</td>
                    <td class="title" align="center" >Banq.</td> 
                    <td class="title" align="center" >Via</td>
                    <td class="title" align="center" >Berma</td>
                    <td class="title" align="center" >Sobra</td>
                    <td class="title" align="center" >Pass.</td>
                    <td class="title" align="center" >Sentido</td>
                    <td class="title" align="center" >Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'patolog');
            }
            $cx = new Conexao();
            $dal = new DALPatologia($cx);
            $resultado = $dal->TabPatologias($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_patolog"]; ?></td>
                        <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                        <td class="tab"width="3%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                        <td class="tab"width="3%"align="center"><?php echo $registo["long_ci"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                        <td class="tab"width="3%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                        <td class="tab"width="3%"align="center"><?php echo $registo["long_cf"]; ?></td> 
                        <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                        <td class="tab"width="1%"align=""><img id='foto1' src='../estrutura/img/<?php echo $registo["foto1"]; ?>'><img id='zoomfoto1' src='../fotos/<?php echo $registo["foto1"]; ?>'></td>
                        <td class="tab"width="1%"align=""><img id='foto2' src='../estrutura/img/<?php echo $registo["foto2"]; ?>'><img id='zoomfoto2' src='../fotos/<?php echo $registo["foto2"]; ?>'></td>
                        <td class="tab"width="1%"style="color:blue;" align="center"><?php echo $registo["id_item"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["nivel"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["grupo"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["id_talude"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["banq"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["via"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["brm"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["sobra"]; ?></td>
                        <td class="tab"width="1%"align="center"><?php echo $registo["pass"]; ?></td>
                        <td class="tab"width="1%"align=""><?php echo $registo["sentido"]; ?></td>
                        <td style="font-size:10pt;font-style: italic;"class="tab"width="2%"align=""><?php echo $registo["ass"]; ?></td> 
                </tr>
                <?php
            }
            ?>
        </table>
        <div style="margin-top: 200px;">
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
        </div>
    </body>
</html>

<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
     <head>
        <meta charset="UTF-8">
        <title>Tipo de Berma</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>      
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/BermasTipo.php';
        require_once '../classes/DALBermasTipo.php'
        ?> 
         <script>
            function freguesia(){
        var freguesia = document.getElementById("cFreguesia").value;
        
         if(freguesia === "Freguesia"){
           alert("Selecione uma Freguesia!"); 
        }
         if(freguesia === "Todas as freguesias"){
           window.location.href = "../excel/bermastipo/expBermaTipo.php";  
        }
        if(freguesia === "Altares"){
           window.location.href = "../excel/bermastipo/expBermaTipoAltares.php";  
        }
       
        if(freguesia === "Raminho"){
           window.location.href = "../excel/bermastipo/expBermaTipoRaminho.php";  
        }
         if(freguesia === "Serreta"){
           window.location.href = "../excel/bermastipo/expBermaTipoSerreta.php";  
        }
         if(freguesia === "Doze Ribeiras"){
           window.location.href = "../excel/bermastipo/expBermaTipoDRibeiras.php";  
        }
         if(freguesia === "Santa Bárbara"){
           window.location.href = "../excel/bermastipo/expBermaTipoSBarbara.php";  
        }
         if(freguesia === "Cinco Ribeiras"){
           window.location.href = "../excel/bermastipo/expBermaTipoCRibeiras.php";  
        }
         if(freguesia === "São Bartolomeu dos Regatos"){
           window.location.href = "../excel/bermastipo/expBermaTipoSBartolomeu.php";  
        }
         if(freguesia === "São Mateus da Calheta"){
           window.location.href = "../excel/bermastipo/expBermaTipoSMateus.php";  
        }
         if(freguesia === "Terra Chã"){
           window.location.href = "../excel/bermastipo/expBermaTipoTCha.php";  
        }
         if(freguesia === "São Pedro"){
           window.location.href = "../excel/bermastipo/expBermaTipoSPedro.php";  
        }
         if(freguesia === "Posto Santo"){
           window.location.href = "../excel/bermastipo/expBermaTipoPSanto.php";  
        }
         if(freguesia === "Santa Luzia"){
           window.location.href = "../excel/bermastipo/expBermaTipoSLuzia.php";  
        }
         if(freguesia === "Sé"){
           window.location.href = "../excel/bermastipo/expBermaTipoSe.php";  
        }
         if(freguesia === "Conceição"){
           window.location.href = "../excel/bermastipo/expBermaTipoConceicao.php";  
        }
         if(freguesia === "São Bento"){
           window.location.href = "../excel/bermastipo/expBermaTipoSBento.php";  
        }
         if(freguesia === "Ribeirinha"){
           window.location.href = "../excel/bermastipo/expBermaTipoRibeirinha.php";  
        }
         if(freguesia === "Feteira"){
           window.location.href = "../excel/bermastipo/expBermaTipoFeteira.php";  
        }
         if(freguesia === "Porto Judeu"){
           window.location.href = "../excel/bermastipo/expBermaTipoPJudeu.php";  
        }
         if(freguesia === "São Sebastião"){
           window.location.href = "../excel/bermastipo/expBermaTipoSSebastiao.php";  
        }
            }
        
        </script>
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>       
       <h1>TIPO DE PAVIMENTO DAS BERMAS- registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1><br>
       <form class="tab" name='tab'method="post">
            <input type="text" name="bermastipo" id='sing'placeholder="ID Estrada" style="width: 120px;"/>
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width:80px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
       <p><a id="voltar"style="text-align:center;" href="../frms/frmBermasTipo.php">|VOLTAR|</a>
        <table  width ="130%" border="1" class="tabela">
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >ID Berma</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>           
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title" colspan="2" align="center" >Latitude</td> 
                <td class="title" colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Pavimentada</td>
                <td class="title" align="center" >Pedra</td>
                <td class="title" align="center" >Rev.Supf.</td>
                <td class="title" align="center" >B.B.</td>
                <td class="title" align="center" >BCLas</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="center" >Gestor</td>
                <td class="title" align="center" >ID</td>
            </tr>
            </thead>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'bermastipo');
            }
            $cx = new Conexao();
            $dal = new DALBermasTipo($cx);
            $resultado = $dal->TabBermasTipo($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab" width="1%"align="center"><?php echo $registo["id_bermatipo"]; ?></td>
                    <td class="tab"width="1%"align="center"style="color:blue;"><?php echo $registo["id_berma"]; ?></td>             
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
                    <td class="tab"width="1%"align="center"><?php echo $registo["pavim"]; ?></td>
                    <td class="tab"width="3%"><?php echo $registo["pedra"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["revsuperf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bb"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["bclas"]; ?></td>
                    <td id="sentido"class="tab"width="1%"><?php echo $registo["sentido"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>           
                    <td class="tab" width="1%"align="center"><?php echo $registo["id_bermatipo"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <footer>
        <?php include_once '../estrutura/footer.php'; ?>
        </footer>
    </body>
</html>

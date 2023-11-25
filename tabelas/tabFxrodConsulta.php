<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Faixa de rodagem</title>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Fxrod.php';
        require_once '../classes/DALFxrod.php';
        require_once '../classes/DALIlha.php';
        ?>
           <script>
           function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/fxrod/expFxrod.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/fxrod/expFxrodSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/fxrod/expFxrodSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/fxrod/expFxrodSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/fxrod/expFxrodSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/fxrod/expFxrodBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/fxrod/expFxrodMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/fxrod/expFxrodSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/fxrod/expFxrodFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/fxrod/expFxrodBrava.php";  
        }
            }       
        </script>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">FAIXA DE RODAGEM - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>           
          <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;width: 200px;color: #000099;" name ="fxrod" id="fxrod">  
                        <?php
                        $estrada = "";
                        $cx = new Conexao();
                        $dal = new DALFxrod($cx);
                        $resultado = $dal->ListaEstradas($estrada);
                        While ($registo = $resultado->fetch_array()) {
                            echo "<option value=\"" . $registo['id_estrada'] . "\">" . $registo['ilha']." -> (". $registo['id_estrada'] .") -> ". $registo['codigo']." -> ". $registo['toponimo']."</option>";
                        }
                        ?>  
                        <option selected="">ID Estrada</option>
                    </select>   
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
         <?php
        $voltar="";
        if ($_SESSION["nivel"] == 1){
            $voltar = 'admin_main.php?pg=consultas';    
        }
         if ($_SESSION["nivel"] == 2){
            $voltar = 'gestor_main.php?pg=registos';    
        }
         if ($_SESSION["nivel"] == 3){
            $voltar = 'utilizador_main.php?pg=utilizador_nav';    
        }
        ?>
         <a id="voltar"style="text-align:center;color:blue;" href="consultas_main.php?pg=consultas_fxrodtipo"target="_blank">|TIPO DE PAVIMENTO|</a>
            <!---------------------------------------------------------------->
        <h1 style="color:green">Exportar <b>'Faixas de Rodagem'</b> por Ilha</h1>
        <form style="margin:10px auto;width: 200px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;color: #000099;width: 180px;" name ="tIlha" id="cIlha">  
                        <?php
                        $ilha = "";
                        $cx = new Conexao();
                        $dal = new DALIlha($cx);
                        $resultado = $dal->cmbIlha($ilha);
                        While ($registo = $resultado->fetch_array()) {
                            echo "<option value=\"" . $registo['ilha'] . "\">" . $registo['ilha'] . "</option>";
                        }
                        ?>
                        <option style="color:gray" selected="">Ilha</option>
                        <option style="color:gray">Todas</option>
                    </select>                 
        </form>
        <!---------------------------------------------------------------->
          <form style="background-color: #F5F5DC;margin: 0 auto;display: block;" action="" method="post" class="tab">
            <input style="color:green;margin: 0 auto;display: block;height: 25px;" id="excel" type="button" name="" value="Exportar para Excel" onclick="ilha();">
          </form>
       <!------------------------------------------>
         <a id="voltar"style="text-align:center;" href="<?php echo $voltar; ?>">|VOLTAR|</a>
         <table accept-charset="UTF-8" width ="120%" border="1" class="tabela">
            <tr>
                <td class="title"align="center">ID Fxrod</td>     
                <td class="title" align="center">ID Estrada</td>          
                <td class="title"align="center">Data</td>     
                <td class="title"align="center">pk Início</td>               
                <td class="title" align="center">Altd.</td>
                <td class="title" colspan="2" align="center">Latitude</td>
                <td class="title" colspan="2" align="center">Longitude</td>
                <td class="title"align="center">pk Fim</td>
                <td class="title" align="center">Altd.</td>
                <td class="title" colspan="2" align="center">Latitude</td> 
                <td class="title" colspan="2" align="center">Longitude</td>
                <td class="title"align="center">Via</td>
                <td class="title"align="center">Larg.V1</td>
                <td class="title"align="center">Larg.V2</td>
                <td class="title"align="center">Larg.V3</td>
                <td class="title"align="center">Larg.V4</td>
                <td class="title"align="center">Larg.V5</td>
                <td class="title"align="center">Larg.V6</td>
                <td class="title"align="center">Gestor</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'fxrod');
            }
            $cx = new Conexao();
            $dal = new DALFxrod($cx);
            $resultado = $dal->TabFxrod($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>            
                <tr>
                    <td class="tab"width="1%"align="center"style="color:blue;"><?php echo $registo["id_fxrod"]; ?></td>  
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td>  
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
                    <td class="tab"width="1%"align="center"><?php echo $registo["nvias"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv1"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv2"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv3"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv4"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv5"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["largv6"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
         <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>


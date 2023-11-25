<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ocorrências</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Trecho.php';
        require_once '../classes/DALTrecho.php';
        require_once '../classes/DALIlha.php';
        ?>      
     <script>
           function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/trechos/expTrecho.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/trechos/expTrechoSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/trechos/expTrechoSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/trechos/expTrechoSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/trechos/expTrechoSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/trechos/expTrechoBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/trechos/expTrechoMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/trechos/expTrechoSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/trechos/expTrechoFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/trechos/expTrechoBrava.php";  
        }
            }       
        </script>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">TRECHOS DE ESTRADA - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>           
          <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;width: 200px;color: #000099;" name ="trecho" id="trecho">  
                        <?php
                        $estrada = "";
                        $cx = new Conexao();
                        $dal = new DALTrecho($cx);
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

            <!---------------------------------------------------------------->
        <h1 style="color:green">Exportar <b>'Trechos de Estrada'</b> por Ilha</h1>
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
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="130%" border="1" class="tabela">         
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title" align="" >Local</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >pk Fim</td>
                <td class="title" align="center" >Altd.</td>
                <td class="title" align="" >Local</td>
                <td class="title"colspan="2" align="center" >Latitude</td> 
                <td class="title"colspan="2" align="center" >Longitude</td>     
                <td class="title" align="center" >Gestor</td> 
            </tr>
             <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'idEstrada');
            }
            $cx = new Conexao();
            $dal = new DALTrecho($cx);
            $resultado = $dal->TabTrecho($valor);
            While ($registo = $resultado->fetch_array()) {             
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pki"]; ?></td>
                    <td class="tab"width="5%"align=""><?php echo $registo["sitioi"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["lat_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_ni"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["long_ci"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_ni"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitd_pkf"]; ?></td>
                    <td class="tab"width="5%"align=""><?php echo $registo["sitiof"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["lat_cf"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_nf"]; ?></td>
                    <td class="tab"width="4%"align="center"><?php echo $registo["long_cf"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_nf"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>                    
                </tr>
                <?php
            }
            ?>
        </table> 
         <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>



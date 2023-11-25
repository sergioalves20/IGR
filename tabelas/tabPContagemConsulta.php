<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Postos de contagem</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/PContagem.php';
        require_once '../classes/DALPContagem.php';
        require_once '../classes/DALIlha.php';
        ?>
        <style> body{background-color:#F5F5DC;color:black;font-family:calibri;font-size:10pt;font-weight:normal;} 
            .link{color:blue;}  
            h2{color:#006400; font-size:14pt;font-weight:normal }
            .pf{ border:none;}
            td#idt{font-weight: bolder;color:blue;}
        </style>
       <script>
           function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/pcontagem/expPContagem.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/pcontagem/expPContagemSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/pcontagem/expPContagemSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/pcontagem/expPContagemSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/pcontagem/expPContagemSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/pcontagem/expPContagemBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/pcontagem/expPContagemMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/pcontagem/expPContagemSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/pcontagem/expPContagemFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/pcontagem/expPContagemfBrava.php";  
        }
            }       
        </script>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">POSTOS DE CONTAGEM DE TRÁFEGO - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>           
          <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;width: 200px;color: #000099;" name ="pcontagem" id="pcontagem">  
                        <?php
                        $estrada = "";
                        $cx = new Conexao();
                        $dal = new DALPContagem($cx);
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
        <h1 style="color:green">Exportar <b>'Postos de Contagem'</b> por Ilha</h1>
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
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="80%" border="1" class="tabela">       
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >Pk</td>
                <td class="title" align="center" >Sentido</td>
                <td class="title" align="" >Local</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td>
                <td class="title" align="center" >Gestor</td>
            </tr>
             <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'idEstrada');
            }
            $cx = new Conexao();
            $dal = new DALPContagem($cx);
            $resultado = $dal->TabPostos($valor);
            While ($registo = $resultado->fetch_array()) {             
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_pcontagem"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["pk"]; ?></td>
                    <td class="tab"width="1%"align=""><?php echo $registo["sentido"]; ?></td>
                    <td class="tab"width="6%"align=""><?php echo $registo["sitio"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
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



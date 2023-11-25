<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sobra de Estrada</title>
         <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/SobraEstrada.php';
        require_once '../classes/DALSobraEstrada.php';
        require_once '../classes/DALIlha.php';
        ?> 
         <script>
           function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/sobra/expSobra.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/sobra/expSobraSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/sobra/expSobraSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/sobra/expSobraSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/sobra/expSobraSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/sobra/expSobraBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/sobra/expSobraMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/sobra/expSobraSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/sobra/expSobraFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/sobra/expSobraBrava.php";  
        }
            }       
        </script>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">SOBRA DE ESTRADA - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>           
          <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;width: 200px;color: #000099;" name ="sobra" id="sobra">  
                        <?php
                        $estrada = "";
                        $cx = new Conexao();
                        $dal = new DALSobraEstrada($cx);
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
        <h1 style="color:green">Exportar <b>'Sobra de Estrada'</b> por Ilha</h1>
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
                <td class="title" align="center" width="3%">ID Estrada</td> 
                <td class="title"align="center"width="3%">ID Sobra</td>              
                <td class="title"align="center" width="1%">Data</td>     
                <td class="title"align="center" >pk Início</td>
                <td class="title"align="center" >Altitude (m)</td>
                <td class="title"colspan="2" align="center" >Latitude</td>
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title"align="center" >pk Fim</td>
                <td class="title"align="center" >Altitude (m)</td>
                <td class="title"colspan="2" align="center" >Latitude</td> 
                <td class="title"colspan="2" align="center" >Longitude</td>
                <td class="title"align="center" width="1%">Sentido</td>
                <td class="title"align="center" width="1%">Larg.</td>            
                <td class="title"align="center" width="2%">Gestor</td>
            </tr>
           <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'sobra');
            }
            $cx = new Conexao();
            $dal = new DALSobraEstrada($cx);
            $resultado = $dal->TabSobra($valor);
            While ($registo = $resultado->fetch_array()) {
               
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"id="idt" align="center"><?php echo $registo["id_sobra"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td>  
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
                    <td class="tab"width="1%"align="center"><?php echo $registo["sentido"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["larg"]; ?></td>                   
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>  
                </tr>
                <?php
            }
            ?>
        </table>
         <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
        <footer style="width: 100%;">
         <?php include_once '../estrutura/footer.php'; ?>      
         </footer>
    </body>
</html>



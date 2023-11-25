<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>I.Q.</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Iq.php';
        require_once '../classes/DALIq.php';
        require_once '../classes/DALIlha.php';
        ?>      
    <script>
           function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/iq/expIq.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/iq/expIqSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/iq/expIqSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/iq/expIqSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/iq/expIqSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/iq/expIqBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/iq/expIqMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/iq/expIqSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/iq/expIqFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/iq/expIqBrava.php";  
        }
            }       
        </script>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">I.Q.(Índice de Qualidade) - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>           
          <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;width: 200px;color: #000099;" name ="iq" id="iq">  
                        <?php
                        $estrada = "";
                        $cx = new Conexao();
                        $dal = new DALIq($cx);
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
        <h1 style="color:green">Exportar <b>' I.Q.'</b> por Ilha</h1>
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
        <table style="margin:0 auto;" accept-charset="UTF-8" width ="50%" border="1" class="tabela">          
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td>               
                <td class="title" align="center" >ID Trecho</td>
                <td class="title" align="center" >I.Q.</td>
                <td class="title" align="center" >Gestor</td> 
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'iq');
            }
            $cx = new Conexao();
            $dal = new DALIq($cx);
            $resultado = $dal->TabIq($valor);
            While ($registo = $resultado->fetch_array()) {              
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_iq"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["data"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_trecho"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["iq"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"align=""><?php echo $registo["ass"]; ?></td>        
                </tr>
                <?php } ?>
        </table>
         <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>
    </body>
</html>
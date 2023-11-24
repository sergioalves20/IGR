<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Itens Orçamento</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/OrcamentoItens.php';
        require_once '../classes/DALOrcamentoItens.php';
        ?>
        <script>
            function cap(){
        var cap = document.getElementById("cCap").value;
        
        if(cap === "Todas"){
         window.location.href = "../excel/itensorc/expOrcamentoCap.php";  
        }
         if(cap === "Capítulo"){
           alert("Selecione um Capítulo!"); 
        }
        if(cap === "Terraplenagem"){
           window.location.href = "../excel/itensorc/expOrcamentoCap1.php"; 
        }     
        if(cap === "Drenagem"){
          window.location.href = "../excel/itensorc/expOrcamentoCap2.php"; 
        }
         if(cap === "Pavimentação"){
          window.location.href = "../excel/itensorc/expOrcamentoCap3.php"; 
        }
         if(cap === "Obras acessórias"){
          window.location.href = "../excel/itensorc/expOrcamentoCap4.php";  
        }
         if(cap === "Equipamento de sinalização e segurança"){
          window.location.href = "../excel/itensorc/expOrcamentoCap5.php";  
        }
        if(cap === "Obras de arte"){
         window.location.href = "../excel/itensorc/expOrcamentoCap6.php";   
        }
        if(cap === "Túneis"){
          window.location.href = "../excel/itensorc/expOrcamentoCap7.php"; 
        }
        if(cap === "Diversos"){
          window.location.href = "../excel/itensorc/expOrcamentoCap8.php";  
        }       
            }
        
        </script>
        <style>
        body{
            background-color:#F5F5DC;
            color:black; 
            font-family: calibri;
            font-size: 11pt;
            font-weight: normal;
        }
        .link{ 
            color:blue;
        }
        h2{
            color:#006400;
            font-size: 14pt;
            font-weight: normal;
        }
    </style>
    </head>
    
    <?php include_once '../estrutura/header.php'; ?>
    <body>
        <br>
        <h1 style="font-size:11pt;">Itens do Orçamento</h1>
        <!---------------------------------------------------------------------->
        <form style="margin:10px auto;width: 400px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;color: #000099;width: 200px;" name ="tCap" id="cCap">
                        
                        <?php
                        $cap = "";
                        $cx = new Conexao();
                        $dal = new DALOrcamentoItens($cx);
                        $resultado = $dal->OcarmantoCap($cap);
                        While ($registo = $resultado->fetch_array()) {
                            echo "<option value=\"" . $registo['capitulo'] . "\">" . $registo['capitulo'] . "</option>";
                        }
                        ?>  
                        <option style="color:brown;"selected="">Capítulo</option>                       
                    </select>   
            &nbsp;&nbsp;<input style="color:green;height: 25px;" id="excel" type="button" name="" value="Exportar Capítulo para Excel" onclick="cap();"><br><br>
        </form>
        <!---------------------------------------------------------------------->
       <script>
        function close_window() {
            close();
        }
        </script>
        <a id="voltar"style="text-align:left;"  href="javascript:close_window();">|FECHAR|</a>
        <!---------------------------------------------------------------------->    
        
        <table class="tabela" width ="100%" border="0" style="color:#2E2E2E;">
            <tr >
                <td align="center" width="1%">ID</td>
                <td width="1%">CÓDIGO</td>
                <td width="35%">DESCRIÇÃO</td>
                <td width="1%">UNID</td>
            </tr>
            <?php
                $valor = "";
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tCap');
                }
                $cx = new Conexao();
                $dal = new DALOrcamentoItens($cx);
                    $resultado = $dal->Localizar($valor);                    
                While ($registo = $resultado->fetch_array()) { 
                    ?>
                <tr>
                    <td align="center"><?php echo $registo["id_orc"]; ?></td>
                    <td><?php echo $registo["cod"]; ?></td>
                    <td><?php echo $registo["descr"]; ?></td>
                    <td align="center"><?php echo $registo["und"]; ?></td>
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

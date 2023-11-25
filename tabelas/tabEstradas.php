<!DOCTYPE html>
<!--canoa.2018-->
  <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estradas</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/> 
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Estrada.php';
        require_once '../classes/DALEstrada.php';
        require_once '../classes/DALIlha.php';       
        ?> 
        <script>
            function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
        if(ilha === "Todas"){
           window.location.href = "../excel/estradas/expEstradas.php";  
        }
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/estradas/expEstradasSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/estradas/expEstradasSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/estradas/expEstradasSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/estradas/expEstradasSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/estradas/expEstradasBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/estradas/expEstradasMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/estradas/expEstradasSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/estradas/expEstradasFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/estradas/expEstradasBrava.php";  
        }
            }
        
        </script>
    </head>     
    <?php include_once '../estrutura/header.php';?>
    <body>  
        <nav style="width:180%;padding:20px; ">
            <label >Sessão iniciada por: <?php echo $_SESSION["login"] ?> </label>
            <label id="op">Registo de Estradas</label>
            <label style="width:600px;display: block;margin-left: 0px;margin-top: 20px;">
            <?php
                     $all = "";
                      if (filter_input(INPUT_POST, 'localizar')) {
                                 $total = filter_input(INPUT_POST, 'tIlha');
                     $cx = new Conexao();
                     $dal = new DALEstrada($cx);
                     $resultado = $dal->ExtensoesTotal($all); 
                     while ($linhas = $resultado->fetch_assoc()){
                     echo '<h1 style="color:#424242;margin-left:100px;"> Total de extensões Nacional: <b>'. $linhas['SOMA'].' km</b>'.'<br><font color="#FF0000">(em actualização)</font>'.'</h1>';
                     ?>
                     <?php
                      }}
                     ?>  </label>
                        
        </nav>          
        <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;color: #000099;width: 200px;" name ="tIlha" id="cIlha">
                        
                        <?php
                        $ilha = "";
                        $cx = new Conexao();
                        $dal = new DALIlha($cx);
                        $resultado = $dal->cmbIlha($ilha);
                        While ($registo = $resultado->fetch_array()) {
                            echo "<option value=\"" . $registo['ilha'] . "\">" . $registo['ilha'] . "</option>";
                        }
                        ?>  
                        <option style="color:brown;">Todas</option>
                        <option style="color:brown;"selected="">Ilha</option>                       
                    </select>   
            &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <?php
        $voltar="";
        if ($_SESSION["nivel"] == 1){
            $voltar = 'admin_main.php?pg=admin_nav';    
        }
         if ($_SESSION["nivel"] == 2){
            $voltar = 'gestor_main.php?pg=gestor_nav';    
        }
         if ($_SESSION["nivel"] == 3){
            $voltar = 'utilizador_main.php?pg=utilizador_nav';    
        }
        ?>        
        <form style="background-color: #F5F5DC;margin: 0 auto;display: block;" action="" method="post" class="tab">
            <input style="color:green;margin: 0 auto;display: block;height: 25px;" id="excel" type="button" name="" value="Exportar para Excel" onclick="ilha();">
        </form>
        <a id="voltar"style="text-align:center;" href="<?php echo $voltar; ?>">|VOLTAR|</a>
        <table id="est" class="tabela" width ="180%" border="1" >
                 <tr >
                    <td style="border: none;" class='pf'colspan="10" align="center"></td>    
                    <td style="font-weight: bold;"class="title" colspan="5" align="center">pk Início</td> 
                    <td style="font-weight: bold;"class="title" colspan="5" align="center">pk Fim</td>     
                </tr>	
                <tr >
                    <td style="border: none;background-color: #ffffff"class='pf'colspan="11" align="center"></td>       
                </tr>	
                <tr>
                    <td style="font-weight: bold;"class="title" align="center">Id Estrada</td>
                    <td style="font-weight: bold;"class="title"align="center" >Código</td>
                    <td style="font-weight: bold;"class="title"align="center">Ilha</td>
                    <td style="font-weight: bold;"class="title"align="center">Nº Seq.</td>
                    <td style="font-weight: bold;"class="title"align="center">Estatuto</td>
                    <td style="font-weight: bold;"class="title"align="center">Tutela</td>
                    <td style="font-weight: bold;"class="title"align="center">Classe</td> 
                    <td style="font-weight: bold;"class="title"align="center">Extensão(km)</td>
                    <td style="font-weight: bold;"class="title"align="center">Topónimo</td>                    
                    <td style="font-weight: bold;"class="title"align="center">Pontos extremos e interiores</td>                  
                    <td style="font-weight: bold;"class="title"colspan=""align="center">Altitude(m)</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Latitude</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Longitude</td>
                    <td style="font-weight: bold;"class="title"colspan=""align="center">Altitude(m)</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Latitude</td>
                    <td style="font-weight: bold;"class="title"colspan="2"align="center">Longitude</td>  
                </tr>
              <?php
                $valor = "";
                if (filter_input(INPUT_POST, 'localizar')) {
                    $valor = filter_input(INPUT_POST, 'tIlha');
                }
                $cx = new Conexao();
                $dal = new DALIlha($cx);
                $resultado = $dal->TabEstrada($valor);                
                While ($registo = $resultado->fetch_array()) { 
                    ?>
                    <tr>
                        <td class="tab"align="center" style="width: 1%;color:#0033cc;font-size: 12pt;"><?php echo $registo["id_estrada"]; ?></td>
                        <td class="tab"align="center"style="width: 1%; color:#cc0066;font-size: 12pt;"><?php echo $registo["codigo"]; ?></td>
                         <td class="tab"style="width: 3%"><?php echo $registo["ilha"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["nseq"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["estatuto"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["tutela"]; ?></td>
                         <td class="tab"align="center"style="width: 1%"><?php echo $registo["classe"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["extensao"]; ?></td> 
                        <td class="tab"style="width: 5%;color:#0000cc;"><?php echo $registo["toponimo"]; ?></td>                       
                        <td class="tab"style="width: 5%"><?php echo $registo["pontosext"]; ?></td>                      
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["altitd_pki"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["lat_ci"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["lat_ni"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["long_ci"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["long_ni"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["altitd_pkf"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["lat_cf"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["lat_nf"]; ?></td>
                        <td class="tab"align="center"style="width: 2%"><?php echo $registo["long_cf"]; ?></td>
                        <td class="tab"align="center"style="width: 1%"><?php echo $registo["long_nf"]; ?></td>
                    </tr>
                    <?php                   
                        }
                           ?> 
                        
                            <?php
                     $total = "";
                      if (filter_input(INPUT_POST, 'localizar')) {
                                 $total = filter_input(INPUT_POST, 'tIlha');
                     $cx = new Conexao();
                     $dal = new DALEstrada($cx);
                     $resultado = $dal->Extensoes($total); 
                     while ($linhas = $resultado->fetch_assoc()){
                     echo '<h1> Total de extensões da Ilha <b>'.$linhas['ilha'].':</b> '.'<b><font color="#FF0000">'. $linhas['SOMA'].' km'.'</font></b></h1>';
                     ?>
                     <?php
                      }}
                     ?>
            </table> 
    <br><br>
              <a id="voltar"style="text-align:center;" href="#top">|INÍCIO|</a>
    <footer>
        <?php include_once '../estrutura/footer.php'; ?>
    </footer>    
    </body>
   
</html>


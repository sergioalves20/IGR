<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Interseções</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Intersecao.php';
        require_once '../classes/DALIntersecao.php';
        require_once '../classes/DALIlha.php';
        ?> 
         <script>
            function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/intersecao/expIntersecao.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/intersecao/expIntersecaoSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/intersecao/expIntersecaoSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/intersecao/expIntersecaoSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/intersecao/expIntersecaoSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/intersecao/expIntersecaoBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/intersecao/expIntersecaoMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/intersecao/expIntersecaoSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/intersecao/expIntersecaoFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/intersecao/expIntersecaoBrava.php";  
        }
            }
        
        </script>
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>         
        <h1 class="">INTERSEÇÃO - Registos válidos anteriores a&nbsp;<?php echo date('Y-m-d'); ?></h1>  
        
         <form style="margin:10px auto;width: 280px;" class="tab" name='tab'method="post">
                    <select style="height: 30px;width: 200px;color: #000099;" name ="intersecao" id="intersecao">  
                        <?php
                        $estrada = "";
                        $cx = new Conexao();
                        $dal = new DALIntersecao($cx);
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
        <h1 style="color:green">Exportar <b>'Insterseções'</b> por Ilha</h1>
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
            
            <a id="voltar"style="text-align:center;" href="<?php echo $voltar; ?>">|VOLTAR|</a>
            <table width ="100%" border="1" class="tabela"style="margin:0 auto;" >
            <tr>
                <td class="title" align="center" >ID</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Estrada</td> 
                <td class="title" align="center" >Código</td>
                <td class="title" align="center" >pk Início</td>
                <td class="title" align="center" >pk Fim</td>
                <td colspan="2" class="title" align="center" >Latitude</td> 
                <td colspan="2"class="title" align="center" >Longitude</td>
                <td class="title" align="center" >Altitude</td> 
                <td class="title" align="center" >Desniv.</td> 
                <td class="title" align="center" >De Nível</td> 
                <td class="title" align="center" >Sentido</td> 
                <td class="title" align="center" >Gestor</td>               
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'intersecao');
            }
            $cx = new Conexao();
            $dal = new DALIntersecao($cx);
            $resultado = $dal->TabIntersecao($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_intrs"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_estrada"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["codigo"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkinicio"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["pkfim"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["lat_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["lat_n"]; ?></td>
                    <td class="tab"width="3%"align="center"><?php echo $registo["long_c"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["long_n"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["altitude"]; ?></td>
                    <td class="tab"width="1%" align="center"><?php echo $registo["desniv"]; ?></td>
                    <td class="tab"width="5%" align=""><?php echo $registo["denivel"]; ?></td>
                    <td class="tab"width="1%" align=""><?php echo $registo["sentido"]; ?></td>
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




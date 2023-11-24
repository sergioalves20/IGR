<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Preços médios</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Precos.php';
        require_once '../classes/DALIntervencao.php';
        require_once '../classes/DALIlha.php';
        ?> 
         
          <script>
           function ilha(){
        var ilha = document.getElementById("cIlha").value;
        
         if(ilha === "Ilha"){
           alert("Selecione uma Ilha!"); 
        }
        if(ilha === "Todas"){
           window.location.href = "../excel/precos/expPrecos.php";  
        }
        if(ilha === "Santo Antão"){
           window.location.href = "../excel/precos/expPrecosSAntao.php";  
        }
        if(ilha === "São Vicente"){
           window.location.href = "../excel/precos/expPrecosSVicente.php";  
        }
         if(ilha === "São Nicolau"){
           window.location.href = "../excel/precos/expPrecosSNicolau.php";  
        }
         if(ilha === "Sal"){
           window.location.href = "../excel/precos/expPrecosSal.php";  
        }
         if(ilha === "Boa Vista"){
           window.location.href = "../excel/precos/expPrecosBVista.php";  
        }
         if(ilha === "Maio"){
           window.location.href = "../excel/precos/expPrecosMaio.php";  
        }
         if(ilha === "Santiago"){
           window.location.href = "../excel/precos/expPrecosSantiago.php";  
        }
         if(ilha === "Fogo"){
           window.location.href = "../excel/precos/expPrecosFogo.php";  
        }
         if(ilha === "Brava"){
           window.location.href = "../excel/precos/expPrecosBrava.php";  
        }
            }       
        </script>
    </head>
    <?php include_once '../estrutura/header.php';?>
    <body>      
        <h1 class="op">PREÇOS - Propostas dos Concursos</h1>           
        
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
        <form style="margin:10px auto;width: 270px;" class="tab" name='tab'method="post">
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
                    </select> 
             &nbsp;&nbsp;<input id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
        </form>
        <!---------------------------------------------------------------->
          <form style="background-color: #F5F5DC;margin: 0 auto;display: block;" action="" method="post" class="tab">
            <input style="color:green;margin: 0 auto;display: block;height: 25px;" id="excel" type="button" name="" value="Exportar para Excel" onclick="ilha();">
          </form>
       <!------------------------------------------>
        <script>
        function close_window() {
            close();
        }
        </script>
        <a id="voltar"style="text-align:center;"  href="javascript:close_window();">|FECHAR|</a>
        <table style="margin: 0 auto;" accept-charset="UTF-8" width ="100%" border="1" class="tabela">
            <tr>
                    <td class="title"align="center">Ilha</td>
                    <td class="title"align="center">Data</td>
                    <td class="title"align="center">Tipo de Obra</td>  
                    <td class="title"align="center">Trabalhos</td>
                    <td class="title"align="center">Item Orçamento</td>
                    <td class="title"align="center">Descrição</td>
                    <td class="title"align="center" >Preço</td>
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tIlha');
            }
            $cx = new Conexao();
            $dal = new DALIntervencao($cx);
            $resultado = $dal->precoMedio($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>  
                <tr>
                        <td class="tab"width="2%"><?php echo $registo["ilha"]; ?></td>
                        <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td>
                        <td class="tab"width="3%"><?php echo $registo["tipo_obra"]; ?></td>
                        <td class="tab"width="3%"><?php echo $registo["trabalhos"]; ?></td>
                        <td class="tab"width="1%"><?php echo $registo["cod"]; ?></td>
                        <td class="tab"width="20%"><?php echo $registo["descr"]; ?></td>
                        <td class="tab"width="1%"align="right"><?php echo $registo["preco"]; ?></td>
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

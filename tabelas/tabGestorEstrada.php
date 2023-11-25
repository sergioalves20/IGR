<!DOCTYPE html>
<!--canoa.2018-->
 <?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Singularidades</title>
        <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
         <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/GestorEstrada.php';
        require_once '../classes/DALGestorEstrada.php';
        require_once '../classes/DALIlha.php';
        ?>      
    </head> 
 <?php include_once '../estrutura/header.php';?>
    <body>               
        <h1 class="">GESTORES DE ESTRADA EM FUNÇÕES</h1>
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
            <script>
        function close_window() {
            close();
        }
        </script>
        </form>
        <a id="voltar"style="text-align:center;" href="javascript:close_window()">|VOLTAR|</a><br>
        <table style="margin:0 auto;" width ="100%" border="1" class="tabela">
            <tr>  
                <td class="title" align="center" >Registo</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >ID Gestor</td>      
                <td class="title" align="center" >Nome</td>
                <td class="title" align="center" >Ilha</td>
                <td class="title" align="center" >ID Estrada</td>
                <td class="title" align="center" >Código</td>
                <td class="title" align="center" >Nomeado</td>
                <td class="title" align="center" >Substituto</td>
                <td class="title" align="center" >Interino</td> 
                <td class="title" align="center" >Início</td>
                <td class="title" align="center" >Fim</td> 
                <td class="title" align="center" >Justificação</td> 
                <td class="title" align="center" >Registado por:</td>               
            </tr>
            <?php
            $valor = "";
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'tIlha');
            }      
            $cx = new Conexao();
            $dal = new DALGestorEstrada($cx);
            $resultado = $dal->TabGestorEstrada($valor);
            While ($registo = $resultado->fetch_array()) {
                ?>     
                <tr>         
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_gestrada"]; ?></td>                   
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td> 
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_gestor"]; ?></td>
                    <td class="tab"width="3%"><b><?php echo $registo["nome_gestor"]; ?></b></td>
                    <td class="tab"width="2%"><?php echo $registo["ilha"]; ?></td>
                    <td class="tab"width="1%"align="center"style="color:blue;"><?php echo $registo["id_estrada"]; ?></td>
                    <td class="tab"width="1%"align="center"style="color:blue;"><?php echo $registo["codigo"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["nomeado"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["substituto"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["interino"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["datai"]; ?></td>
                    <td class="tab"width="2%" align=""><?php echo $registo["dataf"]; ?></td>
                    <td class="tab"width="10%" align=""><?php echo $registo["just"]; ?></td>
                    <td style="font-size:10pt;font-style: italic;"class="tab"width="3%"><?php echo $registo["ass"]; ?></td>                 
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

<!DOCTYPE html>
<?php session_start();?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
    </head>
    <body>
         <?php include_once 'header.php';?>
         <nav >
            <label >Gestor: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Consultas</label>        
        </nav>
        <nav class="const">
            <h1>Constituição da Faixa de rodagem</h1> 
        </nav>
       
         <?php
        $voltar="";
        if ($_SESSION["nivel"] == 1){
            $voltar = 'admin_main.php?pg=registos';    
        }
         if ($_SESSION["nivel"] == 2){
            $voltar = 'gestor_main.php?pg=registos';    
        }
         if ($_SESSION["nivel"] == 3){
            $voltar = 'utilizador_main.php?pg=utilizador_nav';    
        }
        ?>
        <div>
            <ul>
                <li><a style="width: 100px;background-color: brown;"class="oper1" href="<?php echo $voltar; ?>">Voltar</a></li>  
                <li><a class="oper1" href="consultas_main.php?pg=consultas_fxrodfund">Fundação</a></li>               
                <li><a class="oper1" href="consultas_main.php?pg=consultas_Fxrodsubbase">Sub base</a></li>
                <li><a class="oper1" href="consultas_main.php?pg=consultas_fxrodbase">Base</a></li>              
                <li><a class="oper1" href="consultas_main.php?pg=consultas_fxrodbblig">BB de Ligação</a></li> 
                <li><a class="oper1" href="consultas_main.php?pg=consultas_fxrodbbdsg">BB de Desgaste</a></li>
            </ul>
        </div> <br><br><br> 
          <footer>
            <?php include_once 'footer.php'; ?>           
        </footer>
    </body>
</html>

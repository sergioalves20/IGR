<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Constituição das bermas</title>
         <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
    </head>
    <body>
       <?php include_once 'header.php';?>
        <nav >
            <label >Gestor: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Levantamentos</label>        
        </nav>
        <nav class="const">
             <h1>Constituição das Bermas</h1>
        </nav>
         <?php
        $voltar="";
        if ($_SESSION["nivel"] == 1){
            $voltar = 'admin_main.php?pg=levantamento';    
        }
         if ($_SESSION["nivel"] == 2){
            $voltar = 'gestor_main.php?pg=levantamento';    
        }
        ?>
        <div>
            <ul>
                <li ><a style="width: 100px;background-color: brown;"class="oper1" href="<?php echo $voltar; ?>">Voltar</a></li>  
                <li><a class="oper1" href="constBerma_main.php?pg=bermafund">Fundação</a></li> 
                <li><a class="oper1"href="constBerma_main.php?pg=bermasubbase">Sub base</a></li>
                <li><a class="oper1" href="constBerma_main.php?pg=bermabase">Base</a></li>              
                <li><a class="oper1"href="constBerma_main.php?pg=bermabbl">BB de Ligação</a></li> 
                <li><a class="oper1"href="constBerma_main.php?pg=bermabbd">BB de Desgaste</a></li>
            </ul>
        </div> <br><br><br>  
    </body>
</html>

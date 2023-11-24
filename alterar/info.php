<!DOCTYPE html>
<?php session_start();?>  
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informação</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
    </head>
    <body>      
        <?php include_once '../estrutura/header.php';?>
        <nav>
            <label >Acessado por: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Informação</label>    
        </nav>
        <h4 style="text-align: center;font-family: Georgia, serif;font-weight: normal;">Operação de alteração não disponível!</h4>
         <a id="voltar" style="display: block;text-align:center;" href="alterar_main.php?pg=alterar">|VOLTAR|</a>
        <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>    
     
    </body>
</html>

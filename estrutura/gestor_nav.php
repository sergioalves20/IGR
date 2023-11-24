<!DOCTYPE html>
 <?php session_start();?>       
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestor</title>
    </head>
    <head>
        <meta charset="UTF-8">
        <title>Gestor</title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
    </head>
    <body>       
        <?php include_once 'header.php';?>
        <nav>
            <label >Sessão iniciada por: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Gestor</label>      
        </nav> 
        <div>
            <ul>
                 <li><a  style="width: 100px;background-color: brown;"class="oper" href="../index.php">Sair</a> </li>                 
                    <ul> 
                        <li><a class="oper1">Levantamentos</a>
                         <ul>
                          <li><a class="inicio"href="gestor_main.php?pg=levantamento">Registar</a></li>
                        </ul></li>                       
                        <li><a class="oper1">Empreitadas</a>
                         <ul>
                          <li><a class="inicio"href="gestor_main.php?pg=empreitadas">Registar</a></li>
                        </ul></li>
                        <li><a class="oper1">Consultas</a>
                        <ul>
                          <li><a class="inicio"href="gestor_main.php?pg=listanac">Tabela de estradas</a></li>
                          <li><a class="inicio"href="gestor_main.php?pg=registos">Levantamentos</a></li>
                          <li><a class="inicio"href="gestor_main.php?pg=tabgestrada"target="blank">Gestor de estrada</a></li>
                          <li><a class="inicio"href="gestor_main.php?pg=tabgobra"target="blank">Gestor de obra</a></li>
                          <li><a class="inicio"href="gestor_main.php?pg=itensorcamento" target="blank">Itens do orçamento</a></li>
                          <li><a class="inicio"href="gestor_main.php?pg=itenspatologia">Itens de patologias</a></li>
                        </ul> </li>                           
                     </ul>
            </ul>
        </div><br><br>
        <div class="fotogest" ></div>
         <footer>
            <?php include_once './footer.php'; ?>      
        </footer>
        </div>
    </body>
</html>

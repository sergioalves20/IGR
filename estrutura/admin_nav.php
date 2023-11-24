<!DOCTYPE html>
<!--canoa.2018-->
<?php session_start();?>  
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
    </head>
    <body>      
        <?php include_once '../estrutura/header.php';?>
        <nav>
            <label >Acessado por: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Administrador</label>    
        </nav>    
        <div>
            <ul >
               <li><a  style="width: 100px;background-color: brown;"class="oper" href="../index.php">Sair</a> </li>
               <li ><a class="oper1" href="">Usuários</a>
                     <ul> 
                        <li><a class="inicio" href="admin_main.php?pg=usuario">Registar</a></li>                         
                    </ul>
                </li>    
                <li ><a class="oper1"href="">Gestores</a>         
                    <ul> 
                        <li><a class="inicio"href="admin_main.php?pg=regisgestor">Registar</a></li>
                        <li><a class="inicio"href="gestor_main.php?pg=gestrada">De Estrada</a></li>
                        <li><a class="inicio"href="gestor_main.php?pg=gestorobra">De Obra</a></li>
                    </ul>
                </li>    
                <li ><a class="oper1"href="">Estradas</a>         
                    <ul> 
                        <li><a class="inicio"href="admin_main.php?pg=estrada_registo">Formulário</a></li> 
                        <li><a class="inicio"href="admin_main.php?pg=estradas">Tabela de estradas</a></li>
                        <li><a class="inicio"href="admin_main.php?pg=alterar">Rectificar registos</a></li>
                        <li><a class="inicio"href="admin_main.php?pg=itenspatolog">Itens Patologias</a></li>
                        <li><a class="inicio"href="admin_main.php?pg=itensorcamento">Itens Orçamento</a></li>
                    </ul> 
                </li> 
                <li ><a class="oper1"href="">Entrar como</a>         
                    <ul> 
                       <li><a name="gestor" id="gestor" class="inicio" href="admin_main.php?pg=gestor">Gestor</a></li>       
                       <li><a id="utilizador" class="inicio" href="admin.php?pg=utilizador">Utilizador</a></li>                     
                    </ul> 
                </li> 
                <!--<li ><a class="oper1"href="">Backup</a></li>-->                      
            </ul>
        </div>
         <div class="fotogest"></div>
         <footer>
            <?php include_once '../estrutura/footer.php';?>
        </footer>    
    </body>
</html>

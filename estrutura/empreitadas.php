<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Empreitadas</title>  
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
        <style>
            ul{
    font-family:Microsoft Sans Serif;
    font-size:10pt;
    margin: 0px auto;
    padding: 0;
    list-style: none;   
}
ul li{
    display: block;
    position: relative;
    float: left;     
}
.title{
    width: 90px;
}
li ul{
    display: none;
    margin: 0px;    
}
ul li a{
    display: block;
    text-decoration: none;
    text-align: center;
    color:#ffffff;
    width: 120px;
    border-top: 1px solid #ffffff;
    padding: 10px;
    background:#003333;
    margin-left: 2px;
    white-space: nowrap;  
}
ul li a.inicio{
    display: block;
    text-decoration: none;
    text-align: center;
    color:#ffffff;
    width: 120px;
    border-top: 1px solid #ffffff;
    padding: 10px ;    
    background:#003333;
    margin-left: 2px;
    white-space: nowrap;     
}
ul li a.oper{
    background-color: #0B0B61;
    font-size: 10pt;
}
ul li a.oper1{
    width: 120px;
    background-color: #0B0B61;
    font-size: 10pt; 
}
ul li a:hover{
    background: #617F8A;
}
li:hover ul{
    display: block;
    position: absolute;
}
li:hover li{
    float: none;
    font-size: 10pt;
}
li:hover a {
    background: black;
}
li:hover li a:hover{
    background: #95A9B1;
}
        </style>
    </head>
    <body>       
        <?php session_start(); ?>  
        <?php include_once 'header.php'; ?> 
        <a  id="voltar" href="gestor.php">|VOLTAR|</a>
        <nav >          
            <label >Gestor: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Empreitadas</label>        
        </nav>      
        <div>          
            <ul>
                <li><a  style="width: 100px;background-color: brown;"class="oper" href="../index.php">Sair</a></li>
                        <li><a class="oper" href="">Empreitada</a>
                            <ul>
                            <li><a href="../estrutura/empreitadas_main.php?pg=registo">Registar</a>   
                            </ul></li>    
                        <li><a class="oper" href="">Concurso</a>
                            <ul>
                             <li><a href="../estrutura/empreitadas_main.php?pg=concurso">Registar</a>
                             <li><a href="empreitadas_main.php?pg=objconcurso">Objecto</a>
                             <li><a href="empreitadas_main.php?pg=juri">Juri</a>
                             <li><a href="empreitadas_main.php?pg=propostas">Proposta</a>
                             <li><a href="empreitadas_main.php?pg=motivo">Motivo de anulação</a>    
                            </ul></li>
                        <li><a class="oper" href="empreitadas_main.php?pg=">Empresas</a>
                        <ul>
                         <li><a href="empreitadas_main.php?pg=empresas">Cadastro</a>
                         <li><a href="empreitadas_main.php?pg=consorcio">Consórcio</a>    
                        </ul></li>
                        <li><a class="oper" href="">Intervenções</a>
                        <ul>
                          <li><a href="empreitadas_main.php?pg=intervencao">Registar</a>  
                        </ul></li>
                        <li><a class="oper"href="">Contratos</a>
                        <ul>
                         <li><a href="empreitadas_main.php?pg=contratobra">Obra</a>
                         <li><a href="empreitadas_main.php?pg=contratfiz">Fiscalização</a>    
                        </ul></li>
                        
                         <li><a class="oper"href="empreitadas_main.php?pg=">Adendas</a>
                        <ul>
                         <li><a href="empreitadas_main.php?pg=adendactob">Obra</a>
                         <li><a href="empreitadas_main.php?pg=adendactfz">Fiscalizacao</a>    
                        </ul></li>
                        <li><a class="oper" href="">Visitas</a> 
                        <ul>
                          <li><a href="empreitadas_main.php?pg=visitobra">Registar</a>  
                        </ul></li>
                         <li><a class="oper"href="">Orçamento</a>
                        <ul>
                         <li><a href="empreitadas_main.php?pg=orcamento">Registar</a>
                         <li><a href="empreitadas_main.php?pg=orcamentodet">Detalhe</a>
                         <li><a href="empreitadas_main.php?pg=itensorcamento"target="blank">Itens</a>   
                        </ul></li>               
            </ul> <br><br><br><br>              
        </div>
      
        
        <footer><?php include_once 'footer.php';?></footer>
</body>
</html>

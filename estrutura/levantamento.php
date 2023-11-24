<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Levantamento</title>  
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
    </head>
    <body>       
        <?php session_start(); ?>  
        <?php include_once 'header.php'; ?> 
        <a  id="voltar" href="gestor.php">|VOLTAR|</a>
        <nav >          
            <label >Gestor: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Registar Levantamentos</label>        
        </nav>      
        <div>          
            <ul>
                <li><a  style="width: 100px;background-color: brown;"class="oper" href="../index.php">Sair</a> </li>
                <li><a class="oper"href="">Elementos da estrada</a>         
                    <ul> 
                        <li><a href="levantamento_main.php?pg=singularidade">Singularidade</a></li> 
                        <li><a href="levantamento_main.php?pg=intersecao">Interseção</a></li> 
                        <li><a href="levantamento_main.php?pg=muros&op=muros">Muro</a></li>
                        <li><a href="levantamento_main.php?pg=phidraulica">Passagem hidráulica</a></li> 
                        <li><a href="levantamento_main.php?pg=talude">Talude</a></li>
                        <li><a href="levantamento_main.php?pg=banqueta">Banqueta</a></li>
                        <li><a href="levantamento_main.php?pg=curvap">Curva em planta</a></li>
                        <li><a href="levantamento_main.php?pg=curvav">Curva vertical</a></li> 
                    </ul>
                <li><a class="oper" href="">Perfis transversais</a> 
                    <ul> 
                        <li><a href="levantamento_main.php?pg=fxrod">Faixa de rodagem</a></li> 
                        <li><a href="levantamento_main.php?pg=bermas">Bermas</a></li>
                        <li><a href="levantamento_main.php?pg=sobra">Sobra de estrada</a></li>
                        <li><a href="levantamento_main.php?pg=drensupf">Drenagem superficial</a></li> 
                        <li><a href="levantamento_main.php?pg=sepcentral">Separador central</a></li>
                    </ul>
                </li> 
                <li><a class="oper" href="">Equipamentos de segurança</a> 
                    <ul>
                        <li><a href="levantamento_main.php?pg=guardseg">Guardas de segurança</a></li> 
                        <li><a href="levantamento_main.php?pg=sinalhz">Sinalizaçao horizontal</a></li>
                        <li><a href="levantamento_main.php?pg=marcadores">Marcadores</a></li> 
                        <li><a href="levantamento_main.php?pg=delineadores">Delineadores</a></li>
                        <li><a href="levantamento_main.php?pg=sinalvt">Sinalização vertical</a></li>
                    </ul>
                </li> 
                <li><a class="oper" href="">Tipo de pavimento</a> 
                    <ul>
                        <li><a href="levantamento_main.php?pg=fxrodtipo">Faixa de rodagem</a></li>
                        <li><a href="levantamento_main.php?pg=sobratipo">Sobra de estrada</a></li>
                        <li><a href="levantamento_main.php?pg=bermatipo">Bermas</a></li>
                    </ul>
                </li> 
                <li><a class="oper" href="">Constituição do pavimento</a> 
                    <ul class="sub-menu clearfix">
                        <li><a href="levantamento_main.php?pg=constfxrod">Faixa de rodagem</a></li>
                        <li><a href="levantamento_main.php?pg=constbermas">Bermas</a></li> 
                    </ul>
                </li>
                <li><a class="oper" href="">Observações</a> 
                    <ul> 
                        <li><a href="levantamento_main.php?pg=patologia">Patologias</a></li> 
                        <li><a href="levantamento_main.php?pg=ocorrencia">Ocorrências</a></li>
                        <li><a href="levantamento_main.php?pg=trecho">Trechos</a></li> 
                        <li><a href="levantamento_main.php?pg=iri">I.R.I.</a></li>
                        <li><a href="levantamento_main.php?pg=iq">I.Q.</a></li> 
                        <li><a href="levantamento_main.php?pg=pcont">Postos de contagem</a></li>
                        <li><a href="levantamento_main.php?pg=ctrafego">Contagem de tráfego</a></li> 
                    </ul>
                </li>
            </ul>               
        </div>
        <div style="margin-top: 320px;">
        <footer><?php include_once 'footer.php';?></footer>
        </div>
</body>
</html>

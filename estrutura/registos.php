<!DOCTYPE html>
  <?php session_start(); ?>  
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registos</title>  
        <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>

    </head>
    <body>       
        <?php include_once 'header.php'; ?> 
        <a  id="voltar" href="gestor.php">|VOLTAR|</a>
        <nav >
            <label >Gestor: <?php echo $_SESSION["login"] ?> </label> 
            <label id="op">Consultas</label>        
        </nav>
        <div>          
            <ul>
                <li><a  style="width: 100px;background-color: brown;"class="oper" href="../index.php">Sair</a> </li>
                <li><a class="oper"href="">Elementos da estrada</a>         
                    <ul> 
                        <li><a href="consultas_main.php?pg=consultas_sing">Singularidade</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_inters">Interseção</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_muros">Muro</a></li>
                        <li><a href="consultas_main.php?pg=consultas_ph">Passagem hidráulica</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_talude">Talude</a></li>
                        <li><a href="consultas_main.php?pg=consultas_banq">Banqueta</a></li>
                        <li><a href="consultas_main.php?pg=consultas_curvap">Curva em planta</a></li>
                        <li><a href="consultas_main.php?pg=consultas_curvav">Curva vertical</a></li> 
                    </ul>
                <li><a class="oper" href="">Perfis transversais</a> 
                    <ul> 
                        <li><a href="consultas_main.php?pg=consultas_fxrod">Faixa de rodagem</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_bermas">Bermas</a></li>
                        <li><a href="consultas_main.php?pg=consultas_sobra">Sobra de estrada</a></li>
                        <li><a href="consultas_main.php?pg=consultas_drensupf">Drenagem superficial</a></li>  
                    </ul>
                </li> 
                <li><a class="oper" href="">Equipamentos de segurança</a> 
                    <ul>
                        <li><a href="consultas_main.php?pg=consultas_guardseg">Guardas de segurança</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_sinalhz">Sinalizaçao horizontal</a></li>
                        <li><a href="consultas_main.php?pg=consultas_marc">Marcadores</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_delin">Delineadores</a></li>
                        <li><a href="consultas_main.php?pg=consultas_sinalvt">Sinalização vertical</a></li>
                        <li><a href="consultas_main.php?pg=consultas_sepcentral">Separador central</a></li>
                    </ul>
                </li> 
                <li><a class="oper" href="">Tipo de pavimento</a> 
                    <ul>
                        <li><a href="consultas_main.php?pg=consultas_fxrodtipo">Faixa de rodagem</a></li>
                        <li><a href="consultas_main.php?pg=consultas_bermatipo">Bermas</a></li>
                        <li><a href="consultas_main.php?pg=consultas_sobratipo">Sobra de estrada</a></li>
                    </ul>
                </li> 
                <li><a class="oper" href="">Constituição do pavimento</a> 
                    <ul class="sub-menu clearfix">
                        <li><a href="consultas_main.php?pg=constfxrodconsult">Faixa de rodagem</a></li>
                        <li><a href="consultas_main.php?pg=constbermasconsult">Bermas</a></li> 
                    </ul>
                </li>
                <li><a class="oper" href="">Observações</a> 
                    <ul> 
                        <li><a href="consultas_main.php?pg=consultas_patolog">Patologias</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_ocorr">Ocorrências</a></li>
                        <li><a href="consultas_main.php?pg=consultas_trecho">Trechos</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_iri">I.R.I.</a></li>
                        <li><a href="consultas_main.php?pg=consultas_iq">I.Q.</a></li> 
                        <li><a href="consultas_main.php?pg=consultas_pcont">Postos de contagem</a></li>
                        <li><a href="consultas_main.php?pg=consultas_ctrafego">Contagem de tráfego</a></li> 
                    </ul>
                </li>
            </ul>               
        </div>
        <div class="fotolevant" ></div> 
        
        <footer style="margin-top: 200px;"><?php include_once 'footer.php';?></footer>
</body>
</html>

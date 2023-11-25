<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/CurvasPlanta.php';
        require_once '../../classes/DALCurvasPlanta.php'
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>ID</td>
                <td>ID Estrada</td>
                <td>Código</td>
                <td>pk Início</td>
                <td>pk Fim</td>
                <td>Latitude</td>
                <td></td>
                <td>Longitude</td>
                <td></td>
                <td>Altitude</td> 
                <td>Sentido</td>
                <td>Raio em Planta</td>
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALCurvasPlanta($cx);
            $resultado = $dal->ExportExcelSantiago($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_curvap"]}</td>                   
                    <td> {$registo["id_estrada"]}</td> 
                    <td> {$registo["codigo"]}</td>    
                    <td> {$registo["pkinicio"]}</td>
                    <td> {$registo["pkfim"]}</td>
                    <td> {$registo["lat_c"]}</td>
                    <td> {$registo["lat_n"]}</td>
                    <td> {$registo["long_c"]}</td>
                    <td> {$registo["long_n"]}</td>
                    <td> {$registo["altitude"]}</td>
                    <td> {$registo["sentido"]}</td>    
                    <td> {$registo["raioplanta"]}</td> 
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=raio_em_planta_santiago.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>





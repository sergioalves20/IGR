<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Marcadores.php';
        require_once '../../classes/DALMarcadores.php'
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>ID Marc.</td>
                <td>ID Estrada</td>
                <td>Código</td>
                <td>pk Início</td>
                <td>Altitude</td>
                <td>Latitude</td>
                <td></td>
                <td>Longitude</td>
                <td></td>
                <td>pk Fim</td>
                <td>Altitude</td>
                <td>Latitude</td>
                <td></td>
                <td>Longitude</td>
                <td></td>
                <td>Marcadores</td>
                <td>Sentido</td>  
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALMarcadores($cx);
            $resultado = $dal->ExportExcelMarcadores($valor);
            While ($registo = $resultado->fetch_array()) {                 
      $arqexcel .=" <tr>
                    <td>{$registo["id_marc"]}</td>       
                    <td>{$registo["id_estrada"]}</td> 
                    <td>{$registo["codigo"]}</td>     
                    <td>{$registo["pkinicio"]}</td>
                    <td>{$registo["altitd_pki"]}</td>
                    <td>{$registo["lat_ci"]}</td>
                    <td>{$registo["lat_ni"]}</td>
                    <td>{$registo["long_ci"]}</td>
                    <td>{$registo["long_ni"]}</td>
                    <td>{$registo["pkfim"]}</td>
                    <td>{$registo["altitd_pkf"]}</td>
                    <td>{$registo["lat_cf"]}</td>
                    <td>{$registo["lat_nf"]}</td>
                    <td>{$registo["long_cf"]}</td>
                    <td>{$registo["long_nf"]}</td>
                    <td>{$registo["marc"]}</td>
                    <td>{$registo["sentido"]}</td>
                </tr>";
            }
       $arqexcel .="</table>";
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=marcadores.xls');
       echo $arqexcel;
    ?>
    </body>      
</html>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/FxrodTipo.php';
        require_once '../../classes/DALFxRodTipo.php'
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>ID FxrodTipo</td>
                <td>ID FxRod.</td>
                <td>ID Estrada</td>
                <td>Código</td>
                <td>pk Início</td>               
                <td>Altd.</td>
                <td>Latitude</td>
                <td></td>
                <td>Longitude</td>
                <td></td>
                <td>pk Fim</td>
                <td>Altd.</td>
                <td>Latitude</td>
                <td></td>
                <td>Longitude</td>
                <td></td>
                <td>Terra Batida</td>
                <td>Pedra</td>
                <td>Rev.Supf.</td>
                <td>B.B.</td>
                <td>BCLas</td>
                <td>Via</td>
            </tr>";
            $valor = "";
            $cx = new Conexao();
            $dal = new DALFxRodTipo($cx);
            $resultado = $dal->ExportExcel>Maio($valor);
            While ($registo = $resultado->fetch_array()) {          
      $arqexcel .=" <tr>
                    <td>{$registo["id_fxrodtipo"]}</td>
                    <td>{$registo["id_fxrod"]}</td>             
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
                    <td>{$registo["terrabt"]}</td>
                    <td>{$registo["pedra"]}</td>
                    <td>{$registo["revsuperf"]}</td>
                    <td>{$registo["bb"]}</td>
                    <td>{$registo["bclas"]}</td>
                    <td>{$registo["via"]}</td>
                </tr>";
            }
       $arqexcel .="</table>";
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=fxrod_tipopav_maio.xls');
       echo $arqexcel;
    ?>
    </body>
        
</html>



<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Talude.php';
        require_once '../../classes/DALTalude.php'
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
                <td>Natureza</td> 
                <td>Altura</td> 
                <td>Inclin.</td> 
                <td>Tipo</td> 
                <td>Sentido</td>
                <td>NºBanq.</td> 
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALTalude($cx);
            $resultado = $dal->ExportExcelSantiago($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td>{$registo["id_talude"]}</td>                   
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
                    <td>{$registo["nat"]}</td>
                    <td>{$registo["altura"]}</td>
                    <td>{$registo["inclin"]}</td>
                    <td>{$registo["tipo"]}</td>
                    <td>{$registo["sentido"]}</td>
                    <td>{$registo["nbanq"]}</td>
                </tr>";
            }
       $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=taludes_santiago.xls');
       echo $arqexcel;
    ?>
    </body>        
</html>



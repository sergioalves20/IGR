<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Fxrod.php';
        require_once '../../classes/DALFxrod.php';
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>ID Fxrod</td>  
                <td>ID Estrada</td>
                <td>Código</td>           
                <td>Data</td>     
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
                <td>Via</td>
                <td>Larg.V1</td>
                <td>Larg.V2</td>
                <td>Larg.V3</td>
                <td>Larg.V4</td>
                <td>Larg.V5</td>
                <td>Larg.V6</td>
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALFxrod($cx);
            $resultado = $dal->ExportExcelFogo($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_fxrod"]}</td> 
                    <td> {$registo["id_estrada"]}</td>
                    <td> {$registo["codigo"]}</td>     
                    <td> {$registo["pkinicio"]}</td>                 
                    <td> {$registo["altitd_pki"]}</td>
                    <td> {$registo["lat_ci"]}</td>
                    <td> {$registo["lat_ni"]}</td>
                    <td> {$registo["long_ci"]}</td>
                    <td> {$registo["long_ni"]}</td>   
                    <td> {$registo["pkfim"]}</td> 
                    <td> {$registo["altitd_pkf"]}</td>
                    <td> {$registo["lat_cf"]}</td>
                    <td> {$registo["lat_nf"]}</td>
                    <td> {$registo["long_cf"]}</td>
                    <td> {$registo["long_nf"]}</td>
                    <td> {$registo["nvias"]}</td>
                    <td> {$registo["largv1"]}</td>
                    <td> {$registo["largv2"]}</td>
                    <td> {$registo["largv3"]}</td>
                    <td> {$registo["largv4"]}</td>
                    <td> {$registo["largv5"]}</td>
                    <td> {$registo["largv6"]}</td>
                </tr>";
            }
        $arqexcel .="</table>";    
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=faixa_rodagem_fogo.xls');
       echo $arqexcel;
    ?>
    </body>        
</html>



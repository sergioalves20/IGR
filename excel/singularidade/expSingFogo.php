<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Singularidade.php';
        require_once '../../classes/DALSingularidade.php'
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
                <td>Singularidade</td>              
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALSingularidade($cx);
            $resultado = $dal->ExportExcelFogo($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_sing"]}</td>                   
                    <td> {$registo["id_estrada"]}</td> 
                    <td> {$registo["codigo"]}</td>    
                    <td> {$registo["pkinicio"]}</td>
                    <td> {$registo["pkfim"]}</td>
                    <td> {$registo["lat_c"]}</td>
                    <td> {$registo["lat_n"]}</td>
                    <td> {$registo["long_c"]}</td>
                    <td> {$registo["long_n"]}</td>
                    <td> {$registo["altitude"]}</td>
                    <td> {$registo["singularidade"]}</td> 
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=singularidades_fogo.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>



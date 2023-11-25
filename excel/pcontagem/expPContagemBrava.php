<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/PContagem.php';
        require_once '../../classes/DALPContagem.php'
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
                <td>Data</td>
                <td>Pk</td>
                <td>Sentido</td>
                <td>Sítio</td>
                <td>Latitude</td>
                <td></td>
                <td>Longitude</td>
                <td></td>
                <td>Altitude</td>              
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALPContagem($cx);
            $resultado = $dal->ExportExcelBrava($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_pcontagem"]}</td>                   
                    <td> {$registo["id_estrada"]}</td> 
                    <td> {$registo["codigo"]}</td>
                    <td> {$registo["data"]}</td>    
                    <td> {$registo["pk"]}</td>
                    <td> {$registo["sentido"]}</td>    
                    <td> {$registo["sitio"]}</td>
                    <td> {$registo["lat_c"]}</td>
                    <td> {$registo["lat_n"]}</td>
                    <td> {$registo["long_c"]}</td>
                    <td> {$registo["long_n"]}</td>
                    <td> {$registo["altitude"]}</td>
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=postos_contagem_brava.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>






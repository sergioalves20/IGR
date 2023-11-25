<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Phidraulica.php';
        require_once '../../classes/DALPhidraulica.php'
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
                <td>pkInício</td>
                <td>pkFim</td>
                <td>Latitude</td>
                 <td></td>
                <td>Longitude</td>
                 <td></td>
                <td>Altitude</td> 
                <td>Material</td> 
                <td>Forma</td>
                <td>Larg.PH</td> 
                <td>Alt.PH</td> 
                <td>Diâmetro</td> 
                <td>Septos</td>
                <td>Alt.Sept.</td>
                <td>Larg.Sept.</td>              
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALPhidraulica($cx);
            $resultado = $dal->ExportExcelSal($valor);
            While ($registo = $resultado->fetch_array()) {                 
      $arqexcel .=" <tr>
                    <td>{$registo["id_ph"]}</td>                   
                    <td>{$registo["id_estrada"]}</td>
                    <td>{$registo["codigo"]}</td>   
                    <td>{$registo["pkinicio"]}</td>
                    <td>{$registo["pkfim"]}</td>
                    <td>{$registo["lat_c"]}</td>
                    <td>{$registo["lat_n"]}</td>
                    <td>{$registo["long_c"]}</td>
                    <td>{$registo["long_n"]}</td>
                    <td>{$registo["altitude"]}</td>
                    <td>{$registo["material"]}</td>
                    <td>{$registo["forma"]}</td>
                    <td>{$registo["largura_ph"]}</td>
                    <td>{$registo["altura_ph"]}</td>
                    <td>{$registo["diametro"]}</td>
                    <td>{$registo["septos"]}</td>
                    <td>{$registo["altura_sp"]}</td>
                    <td>{$registo["largura_sp"]}</td>                   
                </tr>";
            }
        $arqexcel .="</table>";    
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=phidraulica_sal.xls');
       echo $arqexcel;
    ?>
    </body>        
</html>



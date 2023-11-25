<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Estrada.php';
        require_once '../../classes/DALEstrada.php'
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                   <td>Id Estrada</td>
                    <td>Código</td>
                    <td>Ilha</td>
                    <td>Nº Seq.</td>
                    <td>Estatuto</td>
                    <td>Tutela</td>
                    <td>Classe</td>
                    <td>Extensão(km)</td>
                    <td>Toponimo</td>
                    <td>Pontos extremos e interiores</td>
                    <td>Altitude</td>
                    <td>Latitude</td>
                    <td></td>
                    <td>Longitude</td>
                    <td></td>                   
                    <td>Altitude</td>
                    <td>Latitude</td>
                    <td></td>
                    <td>Longitude</td>
                    <td></td>
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALEstrada($cx);
            $resultado = $dal->ExportExcelSal($valor);
            While ($registo = $resultado->fetch_array()) {         
            $arqexcel .="<tr>
                         <td>{$registo["id_estrada"]}</td>
                         <td>{$registo["codigo"]}</td>
                         <td>{$registo["ilha"]}</td>    
                         <td>{$registo["nseq"]}</td>
                         <td>{$registo["estatuto"]}</td>
                         <td>{$registo["tutela"]}</td>
                         <td>{$registo["classe"]}</td>
                         <td>{$registo["extensao"]}</td>                      
                         <td>{$registo["toponimo"]}</td>
                         <td>{$registo["pontosext"]}</td>
                         <td>{$registo["altitd_pki"]}</td> 
                         <td>{$registo["lat_ci"]}</td>
                         <td>{$registo["lat_ni"]}</td>
                         <td>{$registo["long_ci"]}</td>
                         <td>{$registo["long_ni"]}</td>
                         <td>{$registo["altitd_pkf"]}</td>
                         <td>{$registo["lat_cf"]}</td>
                         <td>{$registo["lat_nf"]}</td>
                         <td>{$registo["long_cf"]}</td>
                         <td>{$registo["long_nf"]}</td>
                </tr>";
            }
        $arqexcel .="</table>";    
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=estradas_sal.xls');
       echo $arqexcel;
    ?>
    </body>        
</html>



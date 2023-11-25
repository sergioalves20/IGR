<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Patologia.php';
        require_once '../../classes/DALPatologia.php';
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                    <td>ID Patolog.</td>
                    <td>ID Estrada</td> 
                    <td>Data</td>
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
                    <td>ID Talude</td>
                    <td>Banq.</td> 
                    <td>Via</td>
                    <td>Berma</td>
                    <td>Sobra</td>
                    <td>Pass.</td>
                    <td>Sentido</td>    
                    <td>Item</td>
                    <td>Grupo</td>
                    <td>Patologia</td>
                    <td>Drescrição</td>               
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALPatologia($cx);
            $resultado = $dal->ExportExcelSAntao($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>                  
                        <td>{$registo["id_patolog"]}</td>
                        <td>{$registo["id_estrada"]}</td>
                        <td>{$registo["codigo"]}</td>
                        <td>{$registo["data"]}</td>                      
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
                        <td>{$registo["id_talude"]}</td>
                        <td>{$registo["banq"]}</td>
                        <td>{$registo["via"]}</td>
                        <td>{$registo["brm"]}</td>
                        <td>{$registo["sobra"]}</td>
                        <td>{$registo["pass"]}</td> 
                        <td>{$registo["sentido"]}</td>   
                       <td>{$registo["id_item"]}</td>                        
                        <td>{$registo["grupo"]}</td>                        
                        <td>{$registo["patologia"]}</td>
                        <td>{$registo["descr"]}</td>                      
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=patologias_santo_antao.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>



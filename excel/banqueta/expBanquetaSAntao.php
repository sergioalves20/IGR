<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Banqueta.php';
        require_once '../../classes/DALBanqueta.php'
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>ID Banqueta</td>
                <td>ID Talude</td>
                <td>ID Estrada</td>
                <td>Código</td>
                <td>Data</td>
                <td>Banqueta</td>
                <td>Dist.Pé Tal.</td>
                <td>Comprmt.</td>
                <td>Largura</td>
                <td>Dren.Crt</td>
                <td>Material</td>
                <td>Larg.Dren.Crt</td>
                <td>Comprmt.Dren.Crt</td> 
                <td>Profund.</td>
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALBanqueta($cx);
            $resultado = $dal->ExportExcelSAntao($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_banqueta"]}</td>
                    <td> {$registo["id_talude"]}</td>    
                    <td> {$registo["id_estrada"]}</td> 
                    <td> {$registo["codigo"]}</td>    
                    <td> {$registo["data"]}</td>
                    <td> {$registo["dstpetal"]}</td>
                    <td> {$registo["compt"]}</td>
                    <td> {$registo["largura"]}</td>
                    <td> {$registo["drcrista"]}</td>
                    <td> {$registo["material"]}</td>
                    <td> {$registo["lrgdrcrista"]}</td>
                    <td> {$registo["cptdrcrista"]}</td>    
                    <td> {$registo["profund"]}</td> 
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=banqueta_santo_antao.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>




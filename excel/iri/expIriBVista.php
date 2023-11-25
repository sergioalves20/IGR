<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Iri.php';
        require_once '../../classes/DALIri.php'
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
                <td>ID Trecho</td>
                <td>Via</td>
                <td>IRI</td>        
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALIri($cx);
            $resultado = $dal->ExportExcelBVista($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_iri"]}</td>                   
                    <td> {$registo["id_estrada"]}</td> 
                    <td> {$registo["codigo"]}</td>
                    <td> {$registo["data"]}</td>   
                    <td> {$registo["id_trecho"]}</td>
                    <td> {$registo["via"]}</td>
                    <td> {$registo["iri"]}</td>
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=iri_boa_vista.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>



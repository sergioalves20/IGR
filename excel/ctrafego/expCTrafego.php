<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/CTrafego.php';
        require_once '../../classes/DALCTrafego.php'
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
                <td>Maquina</td>
                <td>ID Posto</td>
                <td>Alt.Solo</td>
                <td>Dist.Eixo</td>
                <td>Sentido</td>
                <td>Data Início</td>
                <td>Hora Início</td>
                <td>Data Fim</td>
                <td>Hora Fim</td>
                <td>Nº Dias</td>
                <td>Vel.Média</td>
                <td>Ligeiros</td>
                <td>Pesados</td>
                <td>T.M.D.A.</td>                
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALCtrafego($cx);
            $resultado = $dal->ExportExcelCTrafego($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_ctrafego"]}</td>                   
                    <td> {$registo["id_estrada"]}</td> 
                    <td> {$registo["codigo"]}</td>
                    <td> {$registo["data"]}</td>   
                    <td> {$registo["id_trecho"]}</td>
                    <td> {$registo["maquina"]}</td>
                    <td> {$registo["id_posto"]}</td>
                    <td> {$registo["altsolo"]}</td>
                    <td> {$registo["disteixo"]}</td> 
                    <td> {$registo["sentido"]}</td>
                    <td> {$registo["datai"]}</td>
                    <td> {$registo["horai"]}</td>
                    <td> {$registo["dataf"]}</td>
                    <td> {$registo["horaf"]}</td>
                    <td> {$registo["ndias"]}</td>
                    <td> {$registo["vmedia"]}</td>
                    <td> {$registo["lig"]}</td>
                    <td> {$registo["pes"]}</td>
                    <td> {$registo["tmda"]}</td>    
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=cont_trafego.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>



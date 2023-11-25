<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/Precos.php';
        require_once '../../classes/DALIntervencao.php'
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>Ilha</td>
                <td>Data</td>
                <td>Tipo de Obra</td>
                <td>Trabalhos</td>
                <td>Item Orçamento</td>
                <td>Descrição</td>
                <td>Preço</td>
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALIntervencao($cx);
            $resultado = $dal->ExportExcelSVicente($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["ilha"]}</td>                   
                    <td> {$registo["data"]}</td> 
                    <td> {$registo["tipo_obra"]}</td>    
                    <td> {$registo["trabalhos"]}</td>
                    <td> {$registo["cod"]}</td>
                    <td> {$registo["descr"]}</td>
                    <td> {$registo["preco"]}</td>

                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=precos_sao_vicente.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>



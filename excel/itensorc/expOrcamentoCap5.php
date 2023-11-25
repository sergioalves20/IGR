<!DOCTYPE html>
<!--canoa.2018-->
<html>
    <head>
        <meta charset="UTF-8">    
         <?php
        require_once '../../classes/Conexao.php';
        require_once '../../classes/OrcamentoItens.php';
        require_once '../../classes/DALOrcamentoItens.php';
        ?>      
    </head> 
    <body>
        <?php
        $arqexcel="";
        $arqexcel .=" <table border='1' class='tabela'>
            <tr>
                <td>ID</td>
                <td>Código</td>
                <td>Descrição</td>
                <td>Unidade</td>            
            </tr>";           
            $valor = "";
            $cx = new Conexao();
            $dal = new DALOrcamentoItens($cx);
            $resultado = $dal->OcarmantoCap5($valor);
            While ($registo = $resultado->fetch_array()) {                
      $arqexcel .=" <tr>
                    <td> {$registo["id_orc"]}</td>                   
                    <td> {$registo["cod"]}</td> 
                    <td> {$registo["descr"]}</td>    
                    <td> {$registo["und"]}</td>
                </tr>";
            }
        $arqexcel .="</table>";     
       header('Content-type:application/xls');
       header('Content-Disposition:attachment;filename=itens_orcamento_sinalizacao_seguranca.xls');
       echo $arqexcel;
    ?>
    </body>       
</html>

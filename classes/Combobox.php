<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Conexao.php';
        require_once 'DALIlha.php';
        
        $DALIlha = new DALIlha($resultado);
        $resultado = $DALIlha->Exibir();
        
        if ($resultado == false){
            
            echo "Não existem ilhas registadas.";
            
        }else{
            echo "<select name='tIlha'>";
            
            for ($i = 0; $i < mysqli_num_rows($resultado);$i++){
                $linha = mysqli_fetch_array($resultado);
                echo "<option name ='".$linha['ilha']."'>".$linha['ilha']."</option>";
            }
        }
        
        ?>
    </body>
</html>

<!DOCTYPE html>
<!--smsa.2018-->
<?php //ini_set('display_errors','1');?>
<?php date_default_timezone_set('Atlantic/Azores');?>
<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuário</title>
          <link rel="stylesheet" type="text/css" href= "../css/estilo.css"/>
          <link rel="stylesheet" type="text/css" href= "../css/tab.css"/>
          <?php
        require_once '../classes/Conexao.php';
        require_once '../classes/Usuario.php';
        require_once '../classes/DALUsuario.php';        
//Inserir registo
        $usuario = new Usuario();
        if (filter_has_var(INPUT_POST, 'tGuardar')) {
            $nome = filter_input(INPUT_POST, 'tNome');
            $email = filter_input(INPUT_POST, 'tEmail');
            $login = filter_input(INPUT_POST, 'tLogin');
            $senha = filter_input(INPUT_POST, 'tSenha');
            $nivel = filter_input(INPUT_POST, 'tNivel');
            $data = filter_input(INPUT_POST, 'tData');
            $ativo = filter_input(INPUT_POST, 'tAtivo');
            $cx = new Conexao();
            $dalusuario = new DALUsuario($cx);
            $usuario = new Usuario(0, $nome,$email, $login,$senha, $nivel, $data,$ativo);
            $dalusuario->Inserir($usuario);
            $usuario = new Usuario();
             echo "<script type=\"text/javascript\"> alert('Os registos foram enviados com sucesso!');</script>";
        }        
//Alterar registo
        if (filter_has_var(INPUT_POST, 'btalterar')) {
            $id_usuario = filter_input(INPUT_POST,'tId_usuario');
            $nome = filter_input(INPUT_POST, 'tNome');
            $email = filter_input(INPUT_POST, 'tEmail');
            $login = filter_input(INPUT_POST, 'tLogin');
            $senha = filter_input(INPUT_POST, 'tSenha');
            $nivel = filter_input(INPUT_POST, 'tNivel');
            $data = filter_input(INPUT_POST, 'tData');
            $ativo = filter_input(INPUT_POST, 'tAtivo');
            $cx = new Conexao();
            $dal = new DALUsuario($cx);
            $usuario = new Usuario($id_usuario, $nome,$email, $login,$senha, $nivel, $data,$ativo);
            $dal->Alterar($usuario);
            $usuario = new Usuario();
        }
//Excluir registo
        if (filter_input(INPUT_GET, 'op') == 'excluir') {
            $conexao = new Conexao();
            $dal = new DALUsuario($conexao);
            $retorno = $dal->Excluir(filter_input(INPUT_GET, 'cod'));
        }
//Alterar registo
        if (filter_input(INPUT_GET, 'op') == 'alterar') {
            $conexao = new Conexao();
            $dal = new DALUsuario($conexao);
            $usuario = $dal->CarregaUsuario(filter_input(INPUT_GET, 'cod'));
        }
        ?> 
    </head>  
     <?php include_once '../estrutura/header.php';?>
    <body>
         <h1 class="op">REGISTAR - Usuário</h1>
         <h1 class="op"><a href="#est" style="text-decoration: none;color:blue;">| TABELA |</a></h1>
        <a id="voltar" href="../estrutura/admin_main.php?pg=admin_nav" style="text-align: center;display: block;">|VOLTAR|</a>
        <form  style="height:350px;width: 380px;"method="post" name='usuario' id="usuario" action="../estrutura/admin_main.php?pg=usuario&op=listar">           
            <p><label for="cData"style="text-align: right;">Data</label>
            <input type="date" name="tData"id="cData"value= '<?php echo $usuario->getData(); ?>'required="" style="margin-left: 26px;height: 30px;width: 250px;"><p> 
            <p><label for="cNome"style="text-align: right;">Nome</label>
            <input accept-charset="UTF-8" type="text" name="tNome"id="cNome"value="<?php echo $usuario->getNome(); ?>"required=""style="margin-left: 20px;height: 30px;width: 250px;"/><p>
            <label for="cEmail">Email</label>
            <input type="text"name="tEmail"id="cEmail"value="<?php echo $usuario->getEmail(); ?>"style="margin-left: 23px;height: 30px;width: 250px;"/><p>
            <label for="cLogin">Login</label>
            <input type="text" name="tLogin"id="cLogin"value="<?php echo $usuario->getLogin(); ?>"style="margin-left: 25px;height: 30px;width: 250px;"><p>
            <label for="cSenha">Senha</label>
            <input type="text" name="tSenha"id="cSenha"value="<?php echo $usuario->getSenha(); ?>"style="margin-left: 20px;height: 30px;width: 250px;"/><p>
                <label for="cNivel">Nível</label>
                <select name="tNivel"id="cNivel"value="<?php echo $usuario->getNivel(); ?>"style="margin-left:29px;height: 30px;width: 250px;">
                <option value="1">Administrador</option>
                <option value="2">Gestor</option>
                <option value="3">Utilizador</option>
                <option selected><?php echo $usuario->getNivel(); ?></option></select>
                
            <p><label for="cAtivo">Ativo</label>
                <select style="height: 28px;margin-left: 30px;"  name ="tAtivo" id="cAtivo">
                    <option>0</option>
                    <option>1</option>
                    <option selected=""><?php echo $usuario->getAtivo(); ?></option></select><br><br>    
                
                    <?php
                if ($usuario->getId_usuario() == 0) {
                    ?>
             <input style="margin-left:150px;width: 100px;"type="submit"class="cmd" id="cGuardar"value="Guardar"name ="tGuardar"/>      
                    <?php
                } else {
                    ?>
                 <input style="margin-left: 90px;width: 100px;"class="cmd" type="submit" name="btalterar" id="btalterar" value="Alterar"/>
                 <input style="width: 100px;"class="cmd" type="submit" name="btcancelar" id="btcancelar" value="Cancelar"/>
                    <input type="text"hidden=""name="tId_usuario" id="cId_usuario" value="<?php echo $usuario->getId_usuario(); ?>"/>         
                <?php } ?>
        </form><br>
        <!----------------------------------------- TABELA -------------------------------------------->
            <h2>Registos activos</h2>
            <form style="width: 300px;height: 30px;" class="tab" name='tab'method="post">  
               <input type="text" name="nome"id="nome"style="margin-left: 20px;height: 25px;width: 180px;"placeholder="Nome"/>           
               &nbsp;&nbsp;<input  id="listar" style="background-color: #CD950C;width: 67px;" class="cmd" type="submit" name='localizar' value="Selecionar"/><br><br>
            </form><br>        
            <table id="est" accept-charset="UTF-8" width ="80%" border='1' class="tabela" style="margin: 0 auto;">
            <tr> 
                <td class="title" align="center" >ID Usuário</td>
                <td class="title" align="center" >Nome</td> 
                <td class="title" align="center" >Email</td>  
                <td class="title" align="center" >Login</td>
                <td class="title" align="center" >Senha</td>               
                <td class="title" align="center" >Nível</td>
                <td class="title" align="center" >Data</td>
                <td class="title" align="center" >Ativo</td>
            </tr>         
           <?php
            $valor = ""; //Localizar registo
            if (filter_input(INPUT_POST, 'localizar')) {
                $valor = filter_input(INPUT_POST, 'nome');
            }
            $cx = new Conexao();
            $dal = new DALUsuario($cx);
            $resultado = $dal->Localizar($valor);
            While ($registo = $resultado->fetch_array()) {
                $linkexcluir ='admin_main.php?pg=usuario&op=excluir&cod=' . $registo['id_usuario'];
                $linkalterar ='admin_main.php?pg=usuario&op=alterar&cod=' . $registo['id_usuario'];
                ?>  
                <tr>                      
                    <td class="tab"width="1%"align="center"><?php echo $registo["id_usuario"]; ?></td>
                    <td class="tab"width="5%"><?php echo utf8_encode( $registo["nome"]); ?></td> 
                    <td class="tab"width="4%"><?php echo $registo["email"]; ?></td> 
                    <td class="tab"width="2%"><?php echo $registo["login"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["senha"]; ?></td>                
                    <td class="tab"width="1%"align="center"><?php echo $registo["nivel"]; ?></td>
                    <td class="tab"width="2%"align="center"><?php echo $registo["data"]; ?></td>
                    <td class="tab"width="1%"align="center"><?php echo $registo["ativo"]; ?></td>
                    <td class="tab"width="1%"align="center"><a style="font-family: calibri;font-size: 9pt;"href="<?php echo $linkalterar;?>">ALTERAR</a></td>
                    <td class="tab"width="1%" align="center"style="width: 1%"><a style="font-family: calibri;font-size: 9pt;color:brown;" href="<?php echo $linkexcluir; ?>" onclick="return confirm('ATENÇÃO!\n\Tem certeza que deseja apagar este registro?\n\
Não apague Usuários que tenham efetuado ou estão a efectuar registos na Base de Dados.');">EXCLUIR</a></td>                                        
                </tr>
                <?php
            }
            ?>
            </table><br>
            <a id="voltar"style="text-align:center;" href="admin_main.php?pg=usuario">|INÍCIO|</a>
            <footer>
                <?php include_once '../estrutura/footer.php'; ?>      
            </footer>
    </body>
</html>

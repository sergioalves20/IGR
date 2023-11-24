<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href= "css/estilo.css"/>
        <style>
             form#login_admin{
               /* background-color:#CDCDB4; */
                background-color:  #a9b3bc;
                width: 230px;
                height: 160px;
                padding-top: 20px;
                margin-top: 30px;
                margin-bottom: 30px;
            }
            input{
                width: 200px;
                height: 30px;              
            }
            input#entrar{
                width: 205px;
                margin-top: 20px;
                height: 40px;
                font-size: 11pt;
                background-color: #7d8c9b;
            }
            input#usu_login{
                padding: 3px;             
            }
            input#usu_senha{
                padding: 3px;
            }
        </style>
        <?php
        include_once "classes/DALUsuario.php";
        include_once "classes/Usuario.php";
        ?>
    </head>
    <body>
        
        <form method="post"id="login_admin">
            
            <p><input name="login" type="text" id="login"placeholder="Login" autofocus=""required="">	
            <p><input name="senha" type="password" id="senha"placeholder="Senha"required="">
                <input class="cmd" name="entrar" type="submit" id="entrar" value="Entrar">             
                <?php
                session_start();
                   if(filter_has_var(INPUT_POST, "login")){
                    $login = filter_input(INPUT_POST, 'login');
                    $senha = filter_input(INPUT_POST, 'senha');
                   
                    $conexao = new Conexao();
                    $dalusuario = new DALUsuario($conexao);
                    $usuario = $dalusuario->CarregaUsuarioLogin($login);
                    if ($usuario->GetLogin() == $login && $usuario->GetSenha() == $senha) {
                        if ($usuario->getNivel() == 1) {
                            $_SESSION["login"] = $login;
                            $_SESSION["nivel"] = 1;
                            header("location:estrutura/admin.php?pg=admin_nav");   
                        } 
                        //-------------------------------------------------------------          
                        if ($usuario->getNivel() == 2){
                            $_SESSION["login"] = $login;
                            $_SESSION["nivel"] = 2;
                            header("location:estrutura/gestor.php?pg=gestor_nav");    
                                 
                            }
                        //--------------------------------------------------------------
                       
                        if ($usuario->getNivel() == 3) {
                            $_SESSION["login"] = $login;
                            $_SESSION["nivel"] = 3;
                            header("location:estrutura/utilizador.php?pg=utilizador_nav");
                        } 
                    } else {
                        echo "<p style=color:blue;font-family:calibri;>Login ou senha invalido!";     
                    }
                }                   
                ?>            
        </form>  
    </body>
</html>
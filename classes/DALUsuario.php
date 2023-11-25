
<meta charset=utf-8" />
<?php
require_once 'Conexao.php';
require_once 'Usuario.php';
class DALUsuario {
    private $conexao;   
    function __construct($conexao) {
        $this->conexao = $conexao;
       } 
       
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($usuario) {

        $sql = "INSERT INTO tbl_usuario (nome,email,login,senha,nivel,data,ativo)VALUES('";
        $sql = $sql . $usuario->getNome() . "','";
        $sql = $sql . $usuario->getEmail() . "','";
        $sql = $sql . $usuario->getLogin() . "','";
        $sql = $sql . $usuario->getSenha() . "','";
        $sql = $sql . $usuario->getNivel() . "','";
        $sql = $sql . $usuario->getData() . "','";
        $sql = $sql . $usuario->getAtivo() . "')"; 
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query($sql);
        $banco->query('SET NAMES utf-8');
        $this->conexao->desconectar();
    }

    public function Alterar($usuario) {

        $sql = "UPDATE tbl_usuario SET nome = '" . $usuario->getNome() .
                "',email = '" . $usuario->getEmail() .
                "',login = '" . $usuario->getLogin() .
                "',senha = '" . $usuario->getSenha() .
                "',nivel = '" . $usuario->getNivel() .
                "',data = '" . $usuario->getData() .
                "',ativo = '" . $usuario->getAtivo() . "' WHERE id_usuario =" . $usuario->getId_usuario();          
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query($sql);
        $banco->query('SET NAMES utf8');
        $this->conexao->desconectar();
    }

    public function Excluir($usuario) {
        $sql = "DELETE FROM tbl_usuario WHERE id_usuario = $usuario";
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function Localizar($usuario) {
        $sql = "SELECT * FROM tbl_usuario WHERE nome like '%" . $usuario . "%'";
        //echo $sql;
        //echo "<br>";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabUsuario($usuario) {
        $sql = "SELECT * FROM tbl_usuario WHERE id_usuario = '$usuario' ";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function cmbUsuario() {
        $sql = "SELECT * FROM tbl_usuario WHERE ativo = 1 ORDER BY nome";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function CarregaUsuario($cod) {
        $sql = "SELECT * FROM tbl_usuario WHERE id_usuario = $cod";
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $usuario = new Usuario($registo['id_usuario'], $registo['nome'], $registo['email'], $registo['login'], $registo['senha'], $registo['nivel'], $registo['data'], $registo['ativo']);

        $this->conexao->desconectar();
        return $usuario;
    }
                     
        public function CarregaUsuarioLogin($login){
		$sql = "SELECT * FROM tbl_usuario where login = '$login'";
		
		$this->conexao->Conectar();
		$banco = $this->conexao->GetBanco();
		$tabela = $banco->query($sql);
		$registo = $tabela->fetch_array();
               // echo $sql;
		if (isset($registo)){
                $usuario = new Usuario($registo["id_usuario"],$registo["nome"],$registo["email"],$registo["login"],$registo["senha"], $registo["nivel"], $registo["data"], $registo["ativo"]);
		}
		else {$usuario = new Usuario();
                
                }
		$this->conexao->Desconectar();
		return $usuario;
	}
}

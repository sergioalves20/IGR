<!--
canoa.2018
-->
<meta charset=utf-8" />
<?php
require_once 'Conexao.php';
require_once 'Gestor.php';
class DALGestor {   
    private $conexao;
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($gestor) {

        $sql = "INSERT INTO tbl_gestor (id_gestor,nome_gestor, nasc,grauac,nif,endr,corr,tel1,tel2,data_reg)VALUES('";
        $sql = $sql . $gestor->getId_gestor() . "','";
        $sql = $sql . $gestor->getNome_gestor() . "','";
        $sql = $sql . $gestor->getNasc() . "','";
        $sql = $sql . $gestor->getGrauac() . "','";
        $sql = $sql . $gestor->getNif() . "','";
        $sql = $sql . $gestor->getEndr() . "','";
        $sql = $sql . $gestor->getCorr() . "','";
        $sql = $sql . $gestor->getTel1() . "','";
        $sql = $sql . $gestor->getTel2() . "','";
        $sql = $sql . $gestor->getData_reg() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($gestor) {

        $sql = "UPDATE tbl_gestor SET nome_gestor = '" . $gestor->getNome_gestor() .
                "',nasc = '" . $gestor->getNasc() .
                 "',grauac = '" . $gestor->getGrauac() .
                 "',nif = '" . $gestor->getNif() .
                 "',endr = '" . $gestor->getEndr() .
                 "',corr = '" . $gestor->getCorr() .
                 "',tel1 = '" . $gestor->getTel1() .
                "',tel2 = '" . $gestor->getTel2() .
                "',data_reg = '" . $gestor->getData_reg() . "'WHERE id_gestor =" . $gestor->getId_gestor();

        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($gestor) {
        $sql = "DELETE FROM tbl_gestor WHERE id_gestor = $gestor";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($gestor) {
        $sql = "SELECT * FROM tbl_gestor WHERE nome_gestor like '%" . $gestor . "%'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    } 
     public function TabGestor($gestor) {
        $sql = "SELECT * FROM tbl_gestor WHERE id_gestor = '$gestor' ";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function CarregaGestor($cod) {
        $sql = "SELECT * FROM tbl_gestor WHERE id_gestor = $cod";
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $gestor = new Gestor($registo['id_gestor'], $registo['nome_gestor'], $registo['nasc'], $registo['grauac'], $registo['nif'], $registo['endr'], $registo['corr'], $registo['tel1'], $registo['tel2'], $registo['data_reg']);
        $this->conexao->desconectar();
        return $gestor;
    }
    
    
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
}

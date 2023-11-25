<?php

require_once 'Conexao.php';
require_once 'Orcamento.php';

class DALOrcamento {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($orc) {
        $sql = "INSERT INTO tbl_orcamento (data,id_estrada,tipo_obra,ass )VALUES('";
        $sql = $sql . $orc->getData() . "','";
        $sql = $sql . $orc->getId_estrada() . "','";
        $sql = $sql . $orc->getTipo_obra() . "','";
        $sql = $sql . $orc->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($orc) {
        $sql = "UPDATE tbl_orcamento SET data = '" . $orc->getData() .
                "',id_estrada = '" . $orc->getId_estrada() .
                "',tipo_obra = '" . $orc->getTipo_obra() .
                "',ass = '" . $orc->getAss() . "'WHERE id_orc =" . $orc->getId_orc();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($orc) {
        $sql = "DELETE FROM tbl_orcamento WHERE id_orc = $orc";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_orcamento";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaOrc($cod) {
        $sql = "SELECT * FROM tbl_orcamento WHERE id_orc = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $orc = new Orcamento($registo['id_orc'],$registo['data'],$registo['id_estrada'],$registo['tipo_obra'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $orc;
    } 
    public function cmbEstrada() {
        $sql = "SELECT * FROM tbl_estrada ORDER BY ilha ASC";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function cmbTipobra() {
        $sql = "SELECT * FROM tbl_tipobra";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}

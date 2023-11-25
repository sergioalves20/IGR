<?php

require_once 'Conexao.php';
require_once 'Proposta.php';

class DALProposta {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($prop) {

        $sql = "INSERT INTO tbl_propostas (data, id_concurso, empresa,consorcio, valorp, prazo, classifc, ass)VALUES('";
        $sql = $sql . $prop->getData() . "','";
        $sql = $sql . $prop->getId_concurso() . "','";
        $sql = $sql . $prop->getEmpresa() . "','";
        $sql = $sql . $prop->getConsorcio() . "','";
        $sql = $sql . $prop->getValorp() . "','";
        $sql = $sql . $prop->getPrazo() . "','";
        $sql = $sql . $prop->getClassifc() . "','";      
        $sql = $sql . $prop->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($prop) {
        $sql = "UPDATE tbl_propostas SET data = '" . $prop->getData() .
                "',id_concurso = '" . $prop->getId_concurso() .
                "',empresa = '" . $prop->getEmpresa() .
                "',consorcio = '" . $prop->getConsorcio() .
                "',valorp = '" . $prop->getValorp() .
                "',prazo = '" . $prop->getPrazo() .
                "',classifc = '" . $prop->getClassifc() .
                "',ass = '" . $prop->getAss() . "'WHERE id_proposta =" . $prop->getId_proposta();
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($prop) {
        $sql = "DELETE FROM tbl_propostas WHERE id_proposta = $prop";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_propostas";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaProposta($cod) {
        $sql = "SELECT * FROM tbl_propostas WHERE id_proposta = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $prop = new Proposta($registo['id_proposta'],$registo['data'],$registo['id_consurso'],$registo['empresa'],$registo['consorcio'],$registo['valorp'],$registo['prazo'],$registo['classifc'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $prop;
    } 
     public function cmbConcurso() {
        $sql = "SELECT tbl_concurso.id_concurso,tbl_empreitada.nome
                FROM tbl_empreitada INNER JOIN tbl_concurso ON tbl_empreitada.id_empreitada = tbl_concurso.id_concurso";       
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function cmbEmpresa() {
        $sql = "SELECT * FROM tbl_empresa";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function cmbConsorcio() {
        $sql = "SELECT * FROM tbl_consorcio WHERE lider = 1";
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

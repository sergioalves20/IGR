<?php

require_once 'Conexao.php';
require_once 'Concurso.php';

class DALConcurso {

    private $conexao;

    public function Inserir($concurso) {

        $sql = "INSERT INTO tbl_concurso (id_empreitada,data_publicacao,data_entra_prop,data_relat_prop,data_homolog,data_consignacao,data_ordem_inicio,anulado,data_anulacao,id_motivo,ass)VALUES('";
        $sql = $sql . $concurso->getId_empreitada() . "','";
        $sql = $sql . $concurso->getData_publicacao() . "','";
        $sql = $sql . $concurso->getData_entra_prop() . "','";
        $sql = $sql . $concurso->getData_relat_prop() . "','";
        $sql = $sql . $concurso->getData_homolog() . "','";
        $sql = $sql . $concurso->getData_consignacao() . "','";
        $sql = $sql . $concurso->getData_ordem_inicio() . "','";
        $sql = $sql . $concurso->getAnulado() . "','";
        $sql = $sql . $concurso->getData_anulacao() . "','";
        $sql = $sql . $concurso->getId_motivo() . "','";
        $sql = $sql . $concurso->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($concurso) {

        $sql = "UPDATE tbl_concurso SET id_empreitada = '" . $concurso->getId_empreitada() .
                "',data_publicacao = '" . $concurso->getData_publicacao() .
                "',data_entra_prop = '" . $concurso->getData_entra_prop() .
                "',data_relat_prop = '" . $concurso->getData_relat_prop() .
                "',data_homolog = '" . $concurso->getData_homolog() .
                "',data_consignacao = '" . $concurso->getData_consignacao() .
                "',data_ordem_inicio = '" . $concurso->getData_ordem_inicio() .
                "',anulado = '" . $concurso->getAnulado() .
                "',data_anulacao = '" . $concurso->getData_anulacao() .
                "',id_motivo = '" . $concurso->getId_motivo() .
                "',ass = '" . $concurso->getAss() . "'WHERE id_concurso =" . $concurso->getId_concurso();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($concurso) {
        $sql = "DELETE FROM tbl_concurso WHERE id_concurso = $concurso";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_concurso";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function CarregaConcurso($cod) {
        $sql = "SELECT * FROM tbl_concurso WHERE id_concurso = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $concurso = new Concurso($registo['id_concurso'],$registo['id_empreitada'],$registo['data_publicacao'],$registo['data_entra_prop'],$registo['data_relat_prop'],$registo['data_homolog'],$registo['data_consignacao'],$registo['data_ordem_inicio'],$registo['anulado'],$registo['data_anulacao'],$registo['id_motivo'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $concurso;
    }
     
    public function cmbEmpreitada() {
        $sql = "SELECT * FROM tbl_empreitada";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
    public function cmbMotivo() {
        $sql = "SELECT * FROM tbl_motivo";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    } 
    

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}

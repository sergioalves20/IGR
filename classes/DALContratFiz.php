<?php

require_once 'Conexao.php';
require_once 'ContratFiz.php';

class DALContratFiz {

    private $conexao;

    public function __construct($conexao) {
        $this->setConexao($conexao);
    }

    public function Inserir($contf) {

        $sql = "INSERT INTO tbl_contratfiz (id_empreitada,empresa,datai,dataf,datass,val,ass)VALUES('";
        $sql = $sql . $contf->getId_empreitada() . "','";
        $sql = $sql . $contf->getEmpresa() . "','";
        $sql = $sql . $contf->getDatai() . "','";
        $sql = $sql . $contf->getDataf() . "','";
        $sql = $sql . $contf->getDatass() . "','";
        $sql = $sql . $contf->getVal() . "','";
        $sql = $sql . $contf->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($contf) {

        $sql = "UPDATE tbl_contrfiscz SET id_empreitada = '" . $contf->getId_empreitada() .
                "',id_empresa = '" . $contf->getEmpresa() .
                "',datai = '" . $contf->getDatai() .
                "',dataf = '" . $contf->getDataf() .
                "',datass = '" . $contf->getDatass() .
                "',val = '" . $contf->getVal() .
                "',ass = '" . $contf->Ass() . "'WHERE id_contratfiz =" . $contf->getId_contratfiz();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($contf) {
        $sql = "DELETE FROM tbl_contratfiz WHERE id_contratfiz = $contf";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_contratfiz";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaContf($cod) {
        $sql = "SELECT * FROM tbl_contratfiz WHERE id_contratfiz = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $contf = new ContratFiz($registo['id_contratfiz'],$registo['id_empreitada'],$registo['empresa'],$registo['datai'],$registo['dataf'],$registo['datass'],$registo['val'],['ass']);                                              
        $this->conexao->desconectar();
        return $contf;
    } 
     public function cmbEmpresa() {
        $sql = "SELECT * FROM tbl_empresa";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
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
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}

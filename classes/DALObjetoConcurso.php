<?php

require_once 'Conexao.php';
require_once 'ObjetoConcurso.php';

class DALObjetoConcurso {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($objeto) {

        $sql = "INSERT INTO tbl_objconcurso (id_concurso, id_estrada, tipo_obra, pkinicio, pkfim,ass)VALUES('";
        $sql = $sql . $objeto->getId_concurso() . "','";
        $sql = $sql . $objeto->getId_estrada() . "','";
        $sql = $sql . $objeto->getTipo_obra() . "','";
        $sql = $sql . $objeto->getPkinicio() . "','";
        $sql = $sql . $objeto->getPkfim() . "','";
        $sql = $sql . $objeto->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($objeto) {

        $sql = "UPDATE tbl_objconcurso SET id_concurso = '" . $objeto->getId_concurso() .
                "',id_estrada = '" . $objeto->getId_estrada() .
                "',tipo_obra = '" . $objeto->getTipo_obra() .
                "',pkinicio = '" . $objeto->getPkinicio() .
                "',pkfim = '" . $objeto->getPkfim() .
                "',ass = '" . $objeto->getAss() . "'WHERE id_objconcurso =" . $objeto->getId_objconcurso();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($objeto) {
        $sql = "DELETE FROM tbl_objconcurso WHERE id_objconcurso = $objeto";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_objconcurso";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaObjeto($cod) {
        $sql = "SELECT * FROM tbl_objconcurso WHERE id_objconcurso = '$cod'";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $objeto = new ObjetoConcurso($registo['id_objconcurso'],$registo['id_concurso'],$registo['id_estrada'],$registo['tipo_obra'],$registo['pkinicio'],$registo['pkfim'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $objeto;
    }
     public function cmbConcurso() {
        $sql = "SELECT tbl_concurso.id_concurso,tbl_empreitada.nome
                FROM tbl_empreitada INNER JOIN tbl_concurso ON tbl_empreitada.id_empreitada = tbl_concurso.id_concurso";       
       echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function cmbEstrada() {
        $sql = "SELECT * FROM tbl_estrada";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function cmbTipo_obra() {
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

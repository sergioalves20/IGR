<?php

require_once 'Conexao.php';
require_once 'TipObra.php';

class DALTipObra {

    private $conexao;

    public function __construct($conexao) {
        $this->setConexao($conexao);
    }

    public function Inserir($tipobra) {

        $sql = "INSERT INTO tbl_tipobra (id_tipobra,tipobra)VALUES('";
        $sql = $sql . $tipobra->getId_tipobra() . "','";
        $sql = $sql . $tipobra->getTipobra() . "')";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($tipobra) {

        $sql = "UPDATE tbl_tipobra SET tipobra = '" . $tipobra->getTipobra() . "'WHERE id_tipobra =" . $tipobra->getId_tipobra();
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($tipobra) {
        $sql = "DELETE FROM tbl_tipobra WHERE id_tipobra = $tipobra";
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar($tipobra) {
        $sql = "SELECT * FROM tbl_tipobra WHERE id_tipobra like '%" . $tipobra . "%'";
        echo $sql;
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

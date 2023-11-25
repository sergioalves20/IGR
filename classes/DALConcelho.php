<?php

require_once 'Conexao.php';
require_once 'Concelho.php';

class DALConcelho {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function cmbConcelho($concelho) {
        $sql = "SELECT * FROM tbl_concelho WHERE concelho like '%" . $concelho . "%'";
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

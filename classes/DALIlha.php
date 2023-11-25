<?php

require_once 'Conexao.php';
require_once 'Ilha.php';

class DALIlha {

    private $conexao;

    public function Localizar($ilha) {
        $sql = "SELECT * FROM tbl_ilha WHERE ilha like '%" . $ilha . "%'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function cmbIlha($ilha) {
        $sql = "SELECT * FROM tbl_ilha WHERE ilha like '%" . $ilha . "%'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
      public function TabEstrada($estrada){
         $sql = "SELECT * FROM tbl_estrada WHERE ilha = '$estrada' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ViewEstrada($estrada){
         $sql = "SELECT * FROM view_estrada WHERE id_estrada = '$estrada' AND arq = 0";
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

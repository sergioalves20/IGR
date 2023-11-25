<?php

require_once 'Conexao.php';
require_once 'PatologiaGrupo.php';

class DALPatologiaGrupo {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($grupo) {

        $sql = "INSERT INTO tbl_patologiagrupo(id_grupo,grupo) VALUES ('";
        $sql = $sql . $grupo->getId_grupo() . "','";
        $sql = $sql . $grupo->getGrupo() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($grupo) {

        $sql = "UPDATE tbl_patologiagrupo SET grupo = '" . $grupo->getGrupo() . "'WHERE id_grupo =" . $grupo->GetId_grupo();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($grupo) {
        $sql = "DELETE FROM tbl_patologiagrupo WHERE id_grupo = $grupo";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Selecionar($grupo) {
        $sql = "SELECT * FROM tbl_patologiagrupo WHERE grupo like '%" . $grupo . "%'";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
   public function cmbGrupo() {
        $sql = "SELECT tbl_patologiagrupo.id_grupo, tbl_patologiagrupo.grupo
                FROM tbl_patologiagrupo";
       // echo $sql;
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

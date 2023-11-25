<?php

require_once 'Conexao.php';
require_once 'Motivo.php';

class DALMotivo {
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
     public function Inserir($mot) {

        $sql = "INSERT INTO tbl_motivo (motivo,ass)VALUES('";     
        $sql = $sql . $mot->getMotivo() . "','";  
        $sql = $sql . $mot->getAss() . "')";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($mot) {

        $sql = "UPDATE tbl_motivo SET motivo = '" . $mot->getMotivo() .
                "',ass = '" . $mot->getAss() .
                "'WHERE id_motivo =" . $mot->getId_motivo();
               
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($mot) {
        $sql = "DELETE FROM tbl_motivo WHERE id_motivo = $mot";
      //  echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_motivo ";
       // echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaMotivo($cod) {
        $sql = "SELECT * FROM tbl_motivo WHERE id_motivo = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $mot = new Motivo($registo['id_motivo'],$registo['motivo'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $mot;
    } 
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }


}

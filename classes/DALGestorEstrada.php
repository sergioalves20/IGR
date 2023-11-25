<?php

require_once 'Conexao.php';
require_once 'GestorEstrada.php';

class DALGestorEstrada {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($gestrada) {

        $sql = "INSERT INTO tbl_gestrada (id_gestor,data,id_estrada,nomeado,substituto,interino,datai,dataf,just,ass,ativo)VALUES('";
        $sql = $sql . $gestrada->getId_gestor() . "','";
        $sql = $sql . $gestrada->getData() . "','";
        $sql = $sql . $gestrada->getId_estrada() . "','";
        $sql = $sql . $gestrada->getNomeado() . "','";
        $sql = $sql . $gestrada->getSubstituto() . "','";
        $sql = $sql . $gestrada->getInterino() . "','";
        $sql = $sql . $gestrada->getDatai() . "','";
        $sql = $sql . $gestrada->getDataf() . "','";
        $sql = $sql . $gestrada->getJust() . "','";
        $sql = $sql . $gestrada->getAss() . "','";
        $sql = $sql . $gestrada->getAtivo() . "')";       
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar ($gestrada) {

        $sql = "UPDATE tbl_gestrada SET id_gestor = '" . $gestrada->getId_gestor() .
                "',data = '" . $gestrada->getData() .
                "',id_estrada = '" . $gestrada->getId_estrada() .
                "',nomeado = '" . $gestrada->getNomeado() .
                "',substituto = '" . $gestrada->getSubstituto() .
                "',interino = '" . $gestrada->getInterino() .
                "',datai = '" . $gestrada->getDatai() .
                "',dataf = '" . $gestrada->getDataf() .
                "',just = '" . $gestrada->getJust() .
                "',ass = '" . $gestrada->getAss() .
                "',ativo = '" . $gestrada->getAtivo() . "'WHERE id_gestrada =" . $gestrada->getId_gestrada();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($gestrada) {
        $sql = "DELETE FROM tbl_gestrada WHERE id_gestrada = $gestrada";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
       
        $sql ="SELECT * FROM tbl_gestrada WHERE tbl_gestrada.ativo = 1";      
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaGestorEstrada($cod) {
        $sql = "SELECT * FROM tbl_gestrada WHERE id_gestrada = $cod";
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $gestor = new GestorEstrada($registo['id_gestrada'], $registo['id_gestor'], $registo['data'], $registo['id_estrada'], $registo['nomeado'], $registo['substituto'], $registo['interino'], $registo['datai'], $registo['dataf'], $registo['just'], $registo['ass'], $registo['ativo']);
        $this->conexao->desconectar();
        return $gestor;
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
    public function cmbGestor() {
        $sql = "SELECT * FROM tbl_gestor ORDER BY nome_gestor ASC";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function tabGestorEstrada($ilha) {
        $sql = "SELECT tbl_gestrada.*, tbl_estrada.codigo, tbl_estrada.ilha, tbl_gestor.nome_gestor
        FROM tbl_estrada INNER JOIN (tbl_gestor INNER JOIN tbl_gestrada ON tbl_gestor.id_gestor = tbl_gestrada.id_gestor) ON tbl_estrada.id_estrada = tbl_gestrada.id_estrada
        WHERE tbl_estrada.ilha = '$ilha' AND tbl_gestrada.ativo = 1";
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

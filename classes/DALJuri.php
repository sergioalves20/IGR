<?php

require_once 'Conexao.php';
require_once 'Juri.php';

class DALJuri {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($juri) {

        $sql = "INSERT INTO tbl_juri (data,id_concurso,nome,instituicao,ass)VALUES('";
        $sql = $sql . $juri->getData() . "','";
        $sql = $sql . $juri->getId_concurso() . "','";      
        $sql = $sql . $juri->getNome() . "','";
        $sql = $sql . $juri->getInstituicao() . "','";
        $sql = $sql . $juri->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($juri) {

        $sql = "UPDATE tbl_juri SET id_concurso = '" . $juri->getId_concurso() .
                "',data = '" . $juri->getData() .
                "',nome = '" . $juri->getNome() .
                "',instituicao = '" . $juri->getInstituicao() .
                "',ass = '" . $juri->getAss() . "'WHERE id_juri =" . $juri->getId_juri();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($juri) {
        $sql = "DELETE FROM tbl_juri WHERE id_juri = $juri";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_juri";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaJuri($cod) {
        $sql = "SELECT * FROM tbl_juri WHERE id_juri = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $juri = new Juri($registo['id_juri'],$registo['data'],$registo['id_concurso'],$registo['nome'],$registo['instituicao'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $juri;
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
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}

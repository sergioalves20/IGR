<?php

require_once 'Conexao.php';
require_once 'Empreitada.php';

class DALEmpreitada {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($empreitada) {

        $sql = "INSERT INTO tbl_empreitada (data,nome,tipos_proced,concurso,ass)VALUES('";
        $sql = $sql . $empreitada->getData() . "','";
        $sql = $sql . $empreitada->getNome() . "','";
        $sql = $sql . $empreitada->getTipos_proced() . "','";
        $sql = $sql . $empreitada->getConcurso() . "','";
        $sql = $sql . $empreitada->getAss() . "')"; 
        
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($empreitada) {

        $sql = "UPDATE tbl_empreitada SET data = '" . $empreitada->getData() .
                "',nome = '" . $empreitada->getNome() .
                "',tipos_proced = '" . $empreitada->getTipos_proced() .
                "',concurso = '" . $empreitada->getConcurso() .
                "',ass = '" . $empreitada->GetAss().
                "'WHERE id_empreitada =" . $empreitada->getId_empreitada();   
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($empreitada) {
        $sql = "DELETE FROM tbl_empreitada WHERE id_empreitada = $empreitada";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_empreitada";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaEmpreitada($cod) {
        $sql = "SELECT * FROM tbl_empreitada WHERE id_empreitada = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $empreitada = new Empreitada($registo['id_empreitada'],$registo['data'],$registo['nome'],$registo['tipos_proced'],$registo['concurso'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $empreitada;
    } 

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}

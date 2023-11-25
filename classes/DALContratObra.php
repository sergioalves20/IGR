<?php

require_once 'Conexao.php';
require_once 'ContratObra.php';

class DALContratObra {

    private $conexao;

    public function __construct($conexao) {
        $this->setConexao($conexao);
    }

    public function Inserir($conto) {

        $sql = "INSERT INTO tbl_contratobra (id_concurso,consorcio,empresa,datai,dataf,datass,val,ass)VALUES('";       
        $sql = $sql . $conto->getId_concurso() . "','";
        $sql = $sql . $conto->getConsorcio() . "','";
        $sql = $sql . $conto->getEmpresa() . "','";
        $sql = $sql . $conto->getDatai() . "','";
        $sql = $sql . $conto->getDataf() . "','";
        $sql = $sql . $conto->getDatass() . "','"; 
        $sql = $sql . $conto->getVal() . "','";
        $sql = $sql . $conto->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($conto) {

        $sql = "UPDATE tbl_contratobra SET id_concurso = '" . $conto->getId_concurso() . 
                "',consorcio = '" . $conto->getConsorcio() .
                "',empresa = '" . $conto->getEmpresa() .
                "',datai = '" . $conto->getDatai() .
                "',dataf = '" . $conto->getDataf() .
                "',datass = '" . $conto->getDatass() .
                "',val = '" . $conto->getVal() .
                "',ass = '" . $conto->getAss() . "'WHERE id_contratobra =" . $conto->getId_contratobra();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($conto) {
        $sql = "DELETE FROM tbl_contratobra WHERE id_contratobra = $conto";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_contratobra";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaConto($cod) {
        $sql = "SELECT * FROM tbl_contratobra WHERE id_contratobra = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $conto = new ContratObra($registo['id_contratobra'],$registo['id_concurso'],$registo['consorcio'],$registo['empresa'],$registo['datai'],$registo['dataf'],$registo['datass'],$registo['val'],['ass']);                                              
        $this->conexao->desconectar();
        return $conto;
    } 
    
    public function cmbConcurso() {
        $sql = "SELECT tbl_concurso.id_concurso,tbl_empreitada.nome
                FROM tbl_empreitada INNER JOIN tbl_concurso ON tbl_empreitada.id_empreitada = tbl_concurso.id_empreitada";       
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function cmbConsorcio() {
        $sql = "SELECT * FROM tbl_consorcio WHERE lider = 1";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
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
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
